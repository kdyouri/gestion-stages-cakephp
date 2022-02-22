<?php
function mv($src, $dst, $dont_copy = false) {
    if (file_exists($src)) {
        if (strpos($src, '.git') !== false) $dont_copy = true;

        $dir_handle = opendir($src);
        if (!file_exists($dst) && !$dont_copy) mkdir($dst);

        while (($filename = readdir($dir_handle)) !== false) {
            if (($filename != '.') && ($filename != '..')) {
                if (is_dir($src . '/' . $filename)) {
                    mv($src . '/' . $filename, $dst . '/' . $filename, $dont_copy);

                } else {
                    if (!$dont_copy) copy($src . '/' . $filename, $dst . '/' . $filename);
                    chmod($src . '/' . $filename, '0755');
                    unlink($src . '/' . $filename);
                }
            }
        }
        closedir($dir_handle);
        rmdir($src);
    }
}

mv('Plugin', 'plugins');
