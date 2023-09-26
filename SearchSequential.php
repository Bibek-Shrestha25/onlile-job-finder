<?php
function sequentialSearch($arr, $target) {
    $length = count($arr);
    $indices = [];

    for ($i = 0; $i < $length; $i++) {
        if ($arr[$i] === $target) {
            $indices[] = $i; // Element found, add its index to the array
        }
    }

    if (!empty($indices)) {
        return $indices; // Return the array of indices
    } else {
        return [-1]; // Element not found; return an array with -1
    }
}

// Example usage:
$sql = "SELECT tbljob.OCCUPATIONTITLE FROM tbljob";
$mydb->setQuery($sql);
$resultList = $mydb->loadResultList();
// $result = $mydb->fetch_array($resultList);

print_r($resultList);
die;

$myArray = [3, 6, 1, 9, 5, 2, 9, 8];
$targetElement = 9;
$result = sequentialSearch($myArray, $targetElement);

if ($result !== [-1]) {
    echo "Element {$targetElement} found at indices: " . implode(", ", $result) . ".";
} else {
    echo "Element {$targetElement} not found in the array.";
}

