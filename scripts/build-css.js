#!/usr/bin/env node
/**
 * Process .less files and and pass the result the posscss.
 */

const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const fs = require('fs-extra');
const glob = require('glob');
const less = require('less');
const path = require('path');
const postcss = require('postcss');

glob('src/less/*.less', (er, files) => {
  files.forEach(infile => {
    outfile = 'build/assets/css/' + path.basename(infile, '.less') + '.min.css';
    processLess(infile, outfile);
  });
});

function processLess(infile, outfile) {
  fs.readFile(infile)
  .then(input => {
    return less.render(input.toString(), { paths: ['src/less'], sourceMap: false});
  })
  .then(output => {
    return postcss([autoprefixer, cssnano])
    .process(output.css, {from: undefined, map: false});
  })
  .then(output => {
    console.log(`${infile} -> ${outfile}`);
    fs.outputFile(outfile, output.css);
  })
  .catch(error => {
    console.log(error);
    process.exitCode = 1;
  });
}
