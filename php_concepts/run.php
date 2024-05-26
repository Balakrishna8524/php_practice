<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    
    // Write the PHP code snippet to a temporary file
    $tempFile = tempnam(sys_get_temp_dir(), 'php_compiler_');
    file_put_contents($tempFile, $code);
    
    // Execute the PHP code using the command-line interface
    exec("php -f $tempFile", $output, $returnVar);
    
    // Delete the temporary file
    unlink($tempFile);
    
    // Check if execution was successful
    if ($returnVar === 0) {
        // Output the captured output
        echo implode("\n", $output);
    } else {
        // Output an error message
        echo "Error: Failed to execute the PHP code.";
    }
}
?>
