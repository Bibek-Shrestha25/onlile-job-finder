<?php
function sequentialSearch($arr, $target) {
    $length = count($arr);
    $indices = [];

    $newArr = [];
    for ($i = 0; $i < $length; $i++) {
        // if ($arr[$i]['title'] == $target) {
        if (isset($arr[$i]['title']) && strcasecmp($arr[$i]['title'], $target) === 0) {
            $indices[] = $i; 
            array_push($newArr, $arr[$i]);
        }
    }

    if (!empty($indices)) {
        return $newArr; // Return the array of indices
    } else {
        return [-1]; // Element not found; return an array with -1
    }
}
$targetElement = @$_GET['jobTitle'];
if($targetElement){
    $sql = "SELECT *, JOBID as id, OCCUPATIONTITLE as title FROM tbljob";
    $mydb->setQuery($sql);
    $myArray = $mydb->loadResultArray();
    if($myArray || !empty($myArray))
    {
        $result = sequentialSearch($myArray, $targetElement);
        if ($result !== [-1]) {
            $jobCount = count($result);
            foreach($result as $row){
                //viewjob&search=4
                echo "<a href='?q=viewjob&search={$row['id']}'>{$row['title']}</a><br>";
            }
            echo "<br> {$jobCount} job found";
        } else {
            echo "Job {$targetElement} not found in the array.";
        }
    }
    else
    {
        echo "no job found named {$targetElement}";
    }
}   
else {
    echo "Job name not sent";
}
