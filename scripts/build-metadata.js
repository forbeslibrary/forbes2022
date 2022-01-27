#!/usr/bin/env node
/**
 * Creates the style.css file required by Wordpress.
 *
 * The style.css file is built using the metadata.mustache template with data
 * drawn from package.json, except:
 * - We capitalize the name
 * - We append the Git hash to the version
 * - We append
 */
const fs = require('fs-extra');
const util = require('util');

const Mustache = require('mustache');

const exec = util.promisify(require('child_process').exec);
const template = fs.readFileSync('./src/metadata.mustache').toString();

let package = require('../package');

async function run() {
  package.version = await makeVersionNumber();
  package.name = package.name[0].toUpperCase() + package.name.substring(1);

  let wpStyleCss = Mustache.render(template, package);

  fs.outputFile('build/style.css', wpStyleCss)
  .then(data => {
    console.log('output style.css');
  })
  .catch(error => {
    console.log(error);
    process.exitCode = 1;
  });
}

async function makeVersionNumber() {
  let isClean = await isRepositoryClean();
  let hash = await getGitHash();
  return package.version + '+' + (isClean ? hash : hash + '-dirty');
}

function isRepositoryClean() {
  return exec('git status --short')
  .then((out) => {
    if (out.stdout === '') {
      return true;
    } else {
      return false;
    }
  });
}

function getGitHash() {
  return exec('git rev-parse --verify --short HEAD')
  .then(out => {
    return out.stdout.trim();
  })
  .catch(error => {
    console.log(error);
    process.exitCode = 1;
  });
}

run();
