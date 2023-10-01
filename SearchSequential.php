<div class="container"  style="margin: 20px auto;">
<?php
// Algo
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
            ?>
        <table class="table table-bordered pt-2">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Required No. of Employee's</th>
                    <th>Salary</th>
                    <th>Duration of Employment</th>
                    <th>Preferred Sex</th>
                    <th>Sector of Vacancy</th>
                    <th>Qualification/Work Experience</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($result as $row){ ?>
                <tr>
                    <td><a href='?q=viewjob&search=<?= $row['id'] ?>'><?= $row['title'] ?></a></td>
                    <td><?= $row['REQ_NO_EMPLOYEES'] ?></td>
                    <td><?= $row['SALARIES'] ?></td>
                    <td><?= $row['DURATION_EMPLOYEMENT'] ?></td>
                    <td><?= $row['PREFEREDSEX'] ?></td>
                    <td><?= $row['SECTOR_VACANCY'] ?></td>
                    <td><?= $row['QUALIFICATION_WORKEXPERIENCE'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfooter>
                <tr>
                    <td colspan=7><?= "{$jobCount} job found" ?></td>
                </tr>
            </tfooter>
        </table>
    <?php
        } else { ?>
             <img src ="dist/img/nojob.jpg"div style="border-bottom: 0px solid #ddd;padding: opx; align-items:center; justify-content: center">
             <p><b> Sorry, The Job vacancy application that your'e looking for is not available at the moment.<br>
             We will notify you Soon when the vacancy is announced.</b></p>
             <!-- <div style="border-bottom: 0px solid #ddd;padding: opx; align-items:center; justify-content: center"> -->
      
        <?php }
    }
    else
    {
        echo "no job found named {$targetElement}";
    }
}   
else {
    echo "Invalid Request, please input the Job title";
}
?>
</div>

