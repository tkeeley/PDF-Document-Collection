PDF Documents Collection Plugin
Overview
The PDF Documents Collection Plugin is designed to display PDF documents stored in a specific folder on your WordPress site. It scans the folder for PDFs, sorts them by month and year, and displays them as links on the page. Each link opens the respective PDF in a new tab.

Features
Displays PDF documents in a specified folder.
Sorts and categorizes PDFs by month and year.
Provides clickable links that open PDFs in a new tab.
Easy to integrate using a shortcode.
Installation
Download the plugin files.
Upload the plugin folder to the /wp-content/plugins/ directory.
Activate the plugin through the 'Plugins' menu in WordPress.
Usage
Ensure your PDF documents are organized in the following structure within the plugin's directory:

yaml
Copy code
wp-content/plugins/pdf-documents-collection/documents/
├── 2023
│ ├── January 2023.pdf
│ ├── February 2023.pdf
│ └── ... (other months)
└── 2024
├── January 2024.pdf
├── February 2024.pdf
└── ... (other months)
Add the following shortcode to any post or page where you want the PDFs to be displayed:

csharp
Copy code
[data_sheets]
Customization
You can customize the appearance of the PDF list by modifying the CSS within the plugin code.

Code Explanation
Plugin Header
php
Copy code
/\*\*

- Plugin Name: PDF Documents Collection
- Description: Loop through a PDF folder to display the PDFs on the page as a link to open in a new tab
- Version: 1.0
- Author: Cup O Code
- Author URI: https://www.cupocode.com
  \*/
  Shortcode Function
  Data Sheets Shortcode
  The data_sheets_shortcode function generates the HTML and CSS for displaying the PDF links.

php
Copy code
function data_sheets_shortcode() {
ob_start();
?>
<style>
/_ CSS styles for the PDF viewer _/
</style>
<div id="datasheet-viewer">
<h4>2023</h4>
<ul>
<?php
// PHP code to loop through and display 2023 PDFs
?>
</ul>
</div>
<div id="datasheet-viewer">
<h4>2024</h4>
<ul>
<?php
// PHP code to loop through and display 2024 PDFs
?>
</ul>
</div>
<?php
return ob_get_clean();
}
Adding Shortcode
The shortcode [data_sheets] is registered using the add_shortcode function.

php
Copy code
add_shortcode('data_sheets', 'data_sheets_shortcode');
Support
For support and further customization, please visit Cup O Code.
