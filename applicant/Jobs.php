<?php   
    $view = isset($_GET['view']) ? $_GET['view'] :"";  
	  $appl = New Applicants();
	  $applicant = $appl->single_applicant($_SESSION['APPLICANTID']); 
  ?>
  <style type="text/css">
/*    #image-container {
      width: 230px;
    }*/
    .panel-body img{
      width: 100%;
      height: 50%;
    }
    .panel-body img:hover{
      cursor: pointer;
    }
  </style>
<section id="inner-headline">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h2 class="pageTitle">Profile</h2>
          </div>
      </div>
  </div>
</section>
<div class="container" style="margin-top: 10px;min-height: 600px;">

    <div class="row">

        <div class="col-sm-3"><!--left col-->
           <div class="panel panel-default">            
            <div class="panel-body"> 
              <div  id="image-container">
                <img title="profile image"  data-target="#myModal"  data-toggle="modal"  src="<?php echo web_root.'applicant/'.$applicant->APPLICANTPHOTO; ?>">  
              </div>
             </div>
          <ul class="list-group">
       
         
            <li class="list-group-item text-muted">Profile</li><!-- 
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2014</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li> -->
            <li class="list-group-item text-right"><span class="pull-left"><strong>Real Name</strong></span> 
             <?php echo $applicant->FNAME .' '.substr($applicant->MNAME, 1,2).'. '.$applicant->LNAME; ?> 
             </li>
            
          </ul> 
               
              <!-- <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a> -->

          <div class="box box-solid">  
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked"> 
              <li class="<?php echo ($view=='jobs' || $view=='') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=jobs'; ?>"><i class="fa fa-list"></i> Available Jobs
                   </a></li>
                <li class="<?php echo ($view=='appliedjobs') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=appliedjobs'; ?>"><i class="fa fa-list"></i> Applied Jobs
                   </a></li>
                  <li class="<?php echo ($view=='accounts') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=accounts'; ?>"><i class="fa fa-user"></i> Accounts </a></li>
                <li class="<?php echo ($view=='message') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=message'; ?>"><i class="fa fa-envelope-o"></i> Messages
                  <span class="label label-success pull-right"><?php echo isset($showMsg->COUNT) ? $showMsg->COUNT : 0;?></span></a></li>
              <!--      <li class="<?php echo ($view=='notification') ? 'active': '';?>"><a href="<?php echo web_root.'applicant/index.php?view=notification'; ?>"><i class="fa fa-bell-o"></i> Notification
                  <span class="label label-success pull-right"><?php echo $notif; ?></span></a></li> -->
                <!-- <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li> -->
                <!-- <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li> -->
                <!-- <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a> 
                </li>-->
                <!-- <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li> --> 
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
  
          <!-- /.box -->
          </div>
          
        </div> 
        <div class="col-sm-9">
        <?php
        check_message();  
        check_active(); 
            
        ?>

          <!-- <h1><?php echo $applicant->FNAME .' '.$applicant->MNAME.' '.$applicant->LNAME; ?>  </h1> -->
<?php 
    // if ($view =="message") { 
    //  require_once("message.php");
    // }elseif($view=='notification'){  
    //     require_once("notification.php");  
    // }elseif($view=='appliedjobs'){    
    //     require_once("appliedjobs.php"); 
    // }elseif($view=='accounts'){  
    //     require_once("accounts.php");  
    // }else{ 
    //     require_once("appliedjobs.php");
    // } 

    switch ($view) {
      case 'message':
        # code...
        require_once("message.php");
        break;
      case 'notification':
        # code...
        require_once("notification.php");
        break;
      case 'appliedjobs':
        # code...
        require_once("appliedjobs.php");
        break;
      case 'accounts':
        # code...
        require_once("accounts.php");
        break;
    case 'jobs':
        # code...
        require_once("Jobs.php");
        break;
      default:
        # code...
        require_once("appliedjobs.php");
        break;
    }


    include '../recommend.php';
?>  
 <table class="table table-bordered pt-2">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($output as $key => $o){
            $sql = "SELECT * FROM tbljob WHERE JOBID='$key'";
            $rows = mysqli_query($conn, $sql);

            // $job_data = [];
            while ($row = $rows->fetch_assoc()) {
                $job_data = $row;
            }
        ?>
        <tr>
            <td>
            <div class="panel-header">
                <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">
                <?php echo $job_data['OCCUPATIONTITLE']; ?> 
                </div> 
            </div>
                <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fp-ht-bed"></i>Required No. of Employee's : <?php echo $job_data['REQ_NO_EMPLOYEES']; ?></li>
                                                <li><i class="fp-ht-food"></i>Salary : <?php echo number_format($job_data['SALARIES'],2);  ?></li>
                                                <li><i class="fa fa-sun-"></i>Duration of Employment : <?php echo $job_data['DURATION_EMPLOYEMENT']; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul> 
                                                <li><i class="fp-ht-tv"></i>Prefered Sex : <?php echo $job_data['PREFEREDSEX']; ?></li>
                                                <li><i class="fp-ht-computer"></i>Sector of Vacancy : <?php echo $job_data['SECTOR_VACANCY']; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Qualification/Work Experience :</p>
                                             <ul style="list-style: none;"> 
                                                <li><?php echo $job_data['QUALIFICATION_WORKEXPERIENCE'] ;?></li> 
                                            </ul> 
                                        </div>
                                        <div class="col-sm-12"> 
                                            <p>Job Description:</p>
                                            <ul style="list-style: none;"> 
                                                 <li><?php echo $job_data['JOBDESCRIPTION'] ;?></li> 
                                            </ul> 
                                         </div>
            </td>
            <td>
                <a href="/online job finder/index.php?q=apply&job=<?php echo $job_data['JOBID']; ?>&view=personalinfo" class="btn btn-sm btn-main btn-next-tab">Apply Now !</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
            








        </div><!--/col-sm-9-->
    </div><!--/row-->

  </div><!--/contanier--> 

   <?php  
    unset($_SESSION['appliedjobs']);
    unset($_SESSION['accounts']); 
     ?>
 
         <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>

                                    <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                                </div>

                                <form action="controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">
                                                          <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button  class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
