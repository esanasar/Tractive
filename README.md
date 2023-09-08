# Tractive Task: Translation File Sorter

## Description

The Tractive Task project is a simple script that sorts a `translation.properties` file alphabetically and saves the sorted content with comments to a new file. This can be particularly useful when working with large translation files that need organization.

## Usage

To use it, follow these steps:

1. Open your terminal.
2. Navigate to the root directory of this project.
3. Run the following command, replacing `<input_file_name>` with the name of your translation file:

   ```shell
   ./sort_translations.sh <input_file_name>
   
For example:

./sort_translations.sh en_translation_file.properties

The sorted translation file will be saved as sorted_<input_file_name> in the same directory.