#!/usr/bin/env node
/**
 * Packages our build directory in a zip file
 */
const fs = require('fs');
const archiver = require('archiver');

if (!fs.existsSync('build')) {
    throw("build directory is missing; can't create zip file");
}

process.stdout.write('creating zip file...');

const output = fs.createWriteStream('forbes2022.zip');
const archive = archiver('zip', {
  zlib: { level: 9 } // Sets the compression level.
});

output.on('close', function() {
  process.stdout.write(`done: ${archive.pointer()} total bytes\n`);
});

archive.on('warning', function(err) {
    console.log(err);
});

archive.on('error', function(err) {
  throw err;
});

archive.pipe(output);
archive.directory('build/', 'forbes2022');
archive.finalize();