<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_finder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM tblcategory";
$rows = mysqli_query($conn, $sql);

$data = [];
while ($row = mysqli_fetch_row($rows)) {
    $data[] = $row[1];
}
//all categories in $data
// print_r($data);

$session_id = $_SESSION['APPLICANTID'];
if($session_id){
    $sql1 = "SELECT preferred_jobs FROM tblapplicants WHERE APPLICANTID = '$session_id'";
    $rows = mysqli_query($conn, $sql1);

    $user_pj = [];
    while ($row = mysqli_fetch_row($rows)) {
        $user_pj = unserialize(implode(', ', $row));
    }
}
// print_r($user_pj);
// print_r($data);
//user selected in $user_pj

$array1 = [];
foreach ($data as $key => $item) {
    if (in_array($item, $user_pj)) {
        $array1[$key] = [];
    } else {
        $array1[$key] = $item;
    }
}
// printf($array1);
//filtered data
$array2 = [];
foreach ($array1 as $key => $item) {
    if (empty($item)) {
        $array2[$key] = 1;
    } else {
        $array2[$key] = 0;
    }
}
// printf($array2);
//implementation of Cosine Similarity Algorithm.
function cosineSimilarity(array $array1, array $array2): float
{
    $dotProduct = 0;
    $norm1 = 0;
    $norm2 = 0;
    for ($i = 0; $i < count($array1); $i++) {
        $dotProduct += $array1[$i] * $array2[$i];
        $norm1 += $array1[$i] * $array1[$i];
        $norm2 += $array2[$i] * $array2[$i];
    }
    return $dotProduct / ($norm1 * $norm2);
}
$input = $array2;


$sql = "SELECT JOBID,CATEGORY FROM tbljob";
$rows = mysqli_query($conn, $sql);

$job_data = [];
while ($row = mysqli_fetch_row($rows)) {
    $job_data[$row[0]] = $row[1];
}
//job id with its category
// print_r($job_data);

$similarity = [];
foreach ($job_data as $dd) {
    $tempArray = explode(" ", $dd);
    $result = [];

    foreach($data as $d){
        if(in_array($d, $tempArray)){
            $result[] = 1;
        }
        else{
            $result[] = 0;
        }
    }
    $input2 = $result;
    $similarity = cosineSimilarity($input, $input2);
    $similarityArray[] = explode(" ", $similarity);


}


$output = [];
$counter = 0;
$total_sim = count($similarityArray);
foreach ($job_data as $index => $job) {
    // echo $index;
    $output[$index] = $similarityArray[$counter][0];
    if($counter < $total_sim){
        $counter++;
    }
}


arsort($output);