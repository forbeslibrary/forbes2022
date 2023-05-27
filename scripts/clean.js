#!/usr/bin/env node
/**
 * Removes derivative files and directories.
 */

const fs = require('fs-extra');

process.stdout.write('cleaning...');
fs.removeSync('build');
fs.removeSync('tmp');
fs.removeSync('forbes2022.zip');
process.stdout.write('done\n');
