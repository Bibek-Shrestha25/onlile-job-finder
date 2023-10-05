<div class="container"  style="margin: 20px auto;">
<?php
// Algo
function sequentialSearch($arr, $target) {
    //linear search algorith
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
              <div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <img src="dist\img\cartoon.jpg" alt="Job Vacancy" class="img-fluid">
        </div>
        <div class="col-md-5">
            <div class="alert alert-info">
                <h4 class="alert-heading">Sorry, The Job vacancy application that you're looking for is not available at the moment.</h4>
                <p>We will notify you soon when the vacancy is announced.</p>
                <form action="" method="GET">

                    <div>
                        <!-- Add a search button here -->
                        <input type="hidden" name="q" value="sequential-search">
                          <input type="text" name="jobTitle" style = "height:50px; widhth:60px" class="form-control rounded"  placeholder="Enter the Job Title" aria-label="Search" aria-describedby="submit" />

                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery (if needed) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      
      
        <?php }
    }
}   

?>
</div>

