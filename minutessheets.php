<?php
/**
 * Plugin Name: PDF Documents Collection
 * Description: Loop through a PDF folder to display the PDF's on the page as a link to opn in a new tab
 * Version: 1.0
 * Author: Cup O Code
 * Author URI: https://www.cupocode.com
 */

function data_sheets_shortcode() {
    ob_start();
    ?>

    <style>
        #datasheet-viewer {
            text-align: left;
            max-width: 80%;
            margin: 0 auto;
        }

        #datasheet-viewer h3 {
            margin-bottom: 1rem;
        }

        #datasheet-viewer h4 {
            margin-bottom: 0.5rem;
        }

        #datasheet-viewer ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            list-style-type: none;
        }

        #datasheet-viewer li {
            margin-bottom: 0.25rem;
        }

        #datasheet-viewer h4 {
            font-weight: 600;
        }
    </style>

    <div id="datasheet-viewer">
        <h4>2023</h4>
        <ul>
            <?php
            // Month name to number mapping
            $month_order = [
                'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
                'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
                'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
            ];

            // Get files and extract month and year
            $files_2023 = glob(plugin_dir_path(__FILE__) . 'documents/2023/' . '*');
            $files_data_2023 = [];
            foreach ($files_2023 as $file) {
                $basename = basename($file, ".pdf");
                $parts = explode(' ', $basename);
                $month = $parts[0];
                $year = $parts[1];
                $files_data_2023[] = [
                    'file' => $file,
                    'month' => $month,
                    'year' => $year,
                    'order' => $month_order[$month]
                ];
            }

            // Sort files by month order
            usort($files_data_2023, function($a, $b) {
                return $a['order'] - $b['order'];
            });

            // Display sorted files
            foreach ($files_data_2023 as $file_data) {
                $basename = basename($file_data['file']);
                echo "<li><a href='" . plugin_dir_url(__FILE__) . "documents/2023/$basename' target='_blank'>$basename</a></li>";
            }
            ?>
        </ul>
    </div>
    <br>
    <div id="datasheet-viewer">
        <h4>2024</h4>
        <ul>
            <?php
            // Get files and extract month and year
            $files_2024 = glob(plugin_dir_path(__FILE__) . 'documents/2024/' . '*');
            $files_data_2024 = [];
            foreach ($files_2024 as $file) {
                $basename = basename($file, ".pdf");
                $parts = explode(' ', $basename);
                $month = $parts[0];
                $year = $parts[1];
                $files_data_2024[] = [
                    'file' => $file,
                    'month' => $month,
                    'year' => $year,
                    'order' => $month_order[$month]
                ];
            }

            // Sort files by month order
            usort($files_data_2024, function($a, $b) {
                return $a['order'] - $b['order'];
            });

            // Display sorted files
            foreach ($files_data_2024 as $file_data) {
                $basename = basename($file_data['file']);
                echo "<li><a href='" . plugin_dir_url(__FILE__) . "documents/2024/$basename' target='_blank'>$basename</a></li>";
            }
            ?>
        </ul>
    </div>
    
    <?php
    return ob_get_clean();
}

add_shortcode('data_sheets', 'data_sheets_shortcode');
?>