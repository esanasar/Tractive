<?php

// Check if the correct number of arguments (3) are provided
if (count($argv) !== 3) {
    die("Usage: php sort_translations.php input_file output_file\n");
}

// Define the input and output file names
$inputFile = $argv[1];
$outputFile = $argv[2];

// Read the input file into an array of lines
$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Separate comments and translations, grouping them together
$commentedTranslations = [];
$currentComments = [];

foreach ($lines as $line) {
    if (preg_match('/^\s*#/', $line)) {
        // If it's a comment, add it to the current comments
        $currentComments[] = $line;
    } elseif (strpos($line, '=') !== false) {
        // If it's a translation, pair it with the current comments (if any)
        $commentedTranslations[] = [
            'comments' => $currentComments,
            'translation' => $line,
        ];
        // Reset the current comments
        $currentComments = [];
    }
}

// Sort the commented translations by the translation text
usort($commentedTranslations, function ($a, $b) {
    return strcmp($a['translation'], $b['translation']);
});

// Combine the sorted pairs into lines with comments
$sortedLines = [];
foreach ($commentedTranslations as $pair) {
    $sortedLines = array_merge($sortedLines, $pair['comments']);
    $sortedLines[] = $pair['translation'];
}

// Write the sorted content to the output file
file_put_contents($outputFile, implode("\n", $sortedLines));

echo "Translations sorted and saved in $outputFile\n";
?>
