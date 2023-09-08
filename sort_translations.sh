#!/bin/bash

# Check if the correct number of arguments is provided
if [ "$#" -ne 1 ]; then
    echo "Usage: $0 <input_translation_file>"
    exit 1
fi

input_file="$1"
output_file="sorted_$input_file"

# Check if the input file exists
if [ ! -f "$input_file" ]; then
    echo "Input file not found: $input_file"
    exit 1
fi

# Run the PHP script to sort translations
php -f sort_translations.php "$input_file" "$output_file"

echo "Translations sorted and saved in $output_file"
