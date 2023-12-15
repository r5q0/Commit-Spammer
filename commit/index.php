<?php
// FILEPATH: /C:/Users/raqo/Desktop/Prive-Projecten/Commit-Spammer/index.php

// Function to add a file with 500 lines
function addFileWith500Lines() {
    $filename = 'file.txt';
    $file = fopen($filename, 'w');
    for ($i = 1; $i <= 500; $i++) {
        fwrite($file, "Line $i\n");
    }
    fclose($file);
}

// Function to commit the file
function commitFile() {
    exec('git add file.txt');
    exec('git commit -m "Added file.txt"');
    exec('git push origin main');
}

// Function to remove the file
function removeFile() {
    unlink('file.txt');
}

// Function to run the script in a loop with a delay
function runScriptInLoop($loopCount, $delayInSeconds) {
    for ($i = 1; $i <= $loopCount; $i++) {
        addFileWith500Lines();
        commitFile();
        removeFile();
        commitFile();
        sleep($delayInSeconds);
    }
}

// Run the script in a loop with a delay of 5 seconds between each step
runScriptInLoop(10, 5);
?>
