#!/usr/bin/env node
/**
 * Copies files to the build directory.
 *
 * No actual building is required for some files, so we just copy them to the
 * build directory as is.
 */

const fs = require('fs-extra');

process.stdout.write('copying PHP files...');
fs.copySync('src/php', 'build');
process.stdout.write('done\n');

process.stdout.write('copying Javascript files...');
fs.copySync('src/js', 'build/assets/js');
process.stdout.write('done\n');

process.stdout.write('copying Image files...');
fs.copySync('src/img', 'build/assets/img');
process.stdout.write('done\n');

process.stdout.write('copying screenshot.png...');
fs.copySync('src/screenshot.png', 'build/screenshot.png');
process.stdout.write('done\n');

process.stdout.write('copying readme.txt...');
fs.copySync('readme.txt', 'build/readme.txt');
process.stdout.write('done\n');
