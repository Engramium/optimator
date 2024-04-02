const fs = require('fs');
const path = require('path');
const archiver = require('archiver');
const glob = require('glob');

function readPackageJson() {
    const packageJsonPath = path.join(__dirname, 'package.json');
    const packageJson = require(packageJsonPath);
    return packageJson;
}

function createZipWithFolderStructure(filesToZip, outputZipFilePath, directoryPath) {
    const outputZipStream = fs.createWriteStream(outputZipFilePath);
    const archive = archiver('zip', {
        zlib: { level: 9 }
    });

    archive.pipe(outputZipStream);

    filesToZip.forEach(file => {
        const relativePath = path.relative(directoryPath, file);
        archive.file(file, { name: `optimator/${relativePath}` });
    });

    archive.finalize();

    outputZipStream.on('close', () => {
        console.log(`Zip file created successfully: ${outputZipFilePath}`);
    });

    archive.on('error', (err) => {
        console.error('Error occurred during archiving:', err);
    });
}

function selectFilesWithPatterns(patterns, directoryPath) {
    const filesToZip = [];

    patterns.forEach(pattern => {
        const matchedFiles = glob.sync(pattern, { cwd: directoryPath, nodir: true });
        filesToZip.push(...matchedFiles);
    });

    return filesToZip;
}

const directoryPath = './';
const patterns = [
    './dist/assets/**/*',
    './dist/assets/icons/**/*',
    './dist/assets/logo/**/*',
    './i18n/**/*',
    './includes/**/*',
    './public/**/*',
    './vendor/**/*',
    './LICENSE',
    './optimator.php',
    './readme.txt',
];

const filesToZip = selectFilesWithPatterns(patterns, directoryPath);
const packageJson = readPackageJson();
const outputZipFilePath = `optimator-v${packageJson.version}.zip`;

createZipWithFolderStructure(filesToZip.map(file => path.join(directoryPath, file)), outputZipFilePath, directoryPath);