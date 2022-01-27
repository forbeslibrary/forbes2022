#!/usr/bin/env node
/**
 * Removes derivative files and directories.
 */

const fs = require('fs-extra');

process.stdout.write('cleaning...');
fs.removeSync('build');
fs.removeSync('tmp');
process.stdout.write('done\n');
