<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

file_fix_directory(dirname(__FILE__));

function file_fix_directory($dir, $nomask = array('.', '..')) {
    if (is_dir($dir)) {
        // Try to make the directory writable
        if (chmod($dir, 0755)) {
            echo "<p>Made writable: " . $dir . "</p>";
        } else {
            echo "<p>Failed to make writable: " . $dir . "</p>";
        }
    }

    if (is_dir($dir) && $handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if (!in_array($file, $nomask) && $file[0] != '.') {
                if (is_dir("$dir/$file")) {
                    // Recurse into subdirectories
                    file_fix_directory("$dir/$file", $nomask);
                } else {
                    $filename = "$dir/$file";
                    // Try to make each file writable
                    if (chmod($filename, 0644)) {
                        echo "<p>Made writable: " . $filename . "</p>";
                    } else {
                        echo "<p>Failed to make writable: " . $filename . "</p>";
                    }
                }
            }
        }
        closedir($handle);
    }
}
?>

