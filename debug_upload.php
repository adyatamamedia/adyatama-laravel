<?php
// Debug upload limits
echo "<h2>Upload Configuration Debug</h2>";
echo "<pre>";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "post_max_size: " . ini_get('post_max_size') . "\n";
echo "memory_limit: " . ini_get('memory_limit') . "\n";
echo "max_execution_time: " . ini_get('max_execution_time') . "\n";
echo "max_input_time: " . ini_get('max_input_time') . "\n";
echo "</pre>";

if ($_POST) {
    echo "<h2>POST Data Size</h2>";
    $postSize = strlen(serialize($_POST));
    echo "POST data size: " . number_format($postSize) . " bytes\n";

    if ($_FILES) {
        $totalFileSize = 0;
        foreach ($_FILES as $file) {
            if ($file['size'] > 0) {
                $totalFileSize += $file['size'];
                echo "File: " . $file['name'] . " - " . number_format($file['size']) . " bytes\n";
            }
        }
        echo "Total file size: " . number_format($totalFileSize) . " bytes\n";
        echo "Total POST + files: " . number_format($postSize + $totalFileSize) . " bytes\n";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="test" value="test data">
    <input type="file" name="upload">
    <input type="submit" value="Test Upload">
</form>