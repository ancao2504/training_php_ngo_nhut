<?php 

    require_once "./helpers/excute.php";

    // Example usage
    $string_before = "1, 2, 3, 4, 6, 9";
    $needed_value_replace = 1;
    $value_replace = 2;

    $results = replaceElementsArray($string_before, $needed_value_replace, $value_replace);
    if(!empty($results) && is_array($results)) {
        echo "Mảng trước khi thay thế: " . $results['string_before'] . "\r\n";
        echo "<br>";
        echo "Mảng trước khi thay thế: " . $results['string_after'] . "\r\n";
    } else {
        echo $results;
    }