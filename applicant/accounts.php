  <?php 
    $applicant = new Applicants();
    $appl = $applicant->single_applicant($_SESSION['APPLICANTID']);
  ?>
  <style type="text/css">
    .form-group {
      margin-bottom: 5px;
    }
  </style>
  

<form class="form-horizontal" method="POST" action="controller.php?action=edit">
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['APPLICANTID']; ?>">
      <div class="box-header with-border">
              <h3 class="box-title">Accounts</h3>
             </div> 
              <div class="form-group">
                <div class="col-md-11">
                <label class="col-md-4 control-label" for=
                  "FNAME">Firstname:</label>

                  <div class="col-md-8">
                     <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                        "Firstname" disabled type="text" value="<?php echo $appl->FNAME;?>"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "LNAME">Lastname:</label>

                  <div class="col-md-8"> 
                    <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                        "Lastname"  disabled  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->LNAME;?>">
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "MNAME">Middle Name:</label>

                  <div class="col-md-8"> 
                    <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                        "Middle Name"  disabled  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->MNAME;?>"> 
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "ADDRESS">Address:</label>

                  <div class="col-md-8">

                   <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                      "Address" disabled type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $appl->ADDRESS;?></textarea>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "Gender">Sex:</label>

                  <div class="col-md-8">
                    <input type="text" disabled class="form-control input-sm" value="<?php echo $appl->SEX; ?>">                   
                  </div>
                </div>
              </div> 

               <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "BIRTHDATE">Date of Birth:</label>

                  <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"> 
                         <i class="fa fa-calendar"></i> 
                        </span>  
                         <input class="form-control input-sm date_picker" disabled value="<?php echo date_format(date_create($appl->BIRTHDATE),'m/d/Y');?>">
                    </div>
                  </div>
                </div>
              </div>  

               <div class="form-group">
                  <div class="col-md-11">
                    <label class="col-md-4 control-label" for=
                    "BIRTHPLACE">Place of Birth:</label>

                    <div class="col-md-8">
                      
                       <textarea disabled class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
                          "Place of Birth" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $appl->BIRTHPLACE;?></textarea>
                    </div>
                  </div>
                </div> 


               <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "TELNO">Contact No.:</label>

                  <div class="col-md-8">
                    
                     <input disabled class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
                        "Contact No." type="text" any value="<?php echo $appl->CONTACTNO;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                  </div>
                </div>
              </div> 

               <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "CIVILSTATUS">Civil Status:</label>

                  <div class="col-md-8">
                    <input type="text" value="<?php echo $appl->CIVILSTATUS; ?>" disabled class="form-control input-sm">
                  </div>
                </div>
              </div>  

               <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "EMAILADDRESS">Email Address:</label> 
                  <div class="col-md-8">
                     <input type="Email" class="form-control input-sm" id="EMAILADDRESS" name="EMAILADDRESS" disabled value="<?php echo $appl->EMAILADDRESS;?>" /> 
                  </div>
                </div>
              </div>  
              
              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "DEGREE">Educational Attainment:</label>

                  <div class="col-md-8"> 
                    <input  class="form-control input-sm" id="DEGREE" name="DEGREE" placeholder=
                        "Educational Attainment" disabled onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->DEGREE;?>">
                    </div>
                </div>
              </div>  

              <div class="form-group">
                <div class="col-md-11">
                  <label class="col-md-4 control-label" for=
                  "DEGREE">Preferred Jobs: </label>

                  <div class="col-md-8"> 
                  <?php
                  if(!$appl->preferred_jobs){
                    $Sql = "SELECT *from tblcategory";
                    $mydb->setQuery($Sql);
                    $cur = $mydb->loadResultList();
                    ?>
                  <select class="js-example-basic-multiple form-control" name="P_J[]" multiple="multiple">
                  <?php
                      foreach ($cur as $a) {
                    ?>
                    <option value="<?php echo $a->CATEGORY; ?>"><?php echo $a->CATEGORY; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                  <?php
                  }
                  else{
                  ?>
                  <input type="text" class="form-control" disabled value="<?php
                    $pj = $appl->preferred_jobs;
                    $pjs = unserialize($pj);
                    echo implode(', ', $pjs);
                  ?>">
                  <?php } ?>
                  <br>
                <div class="form-group">
                  <div class="col-md-4 pull-right">
                  <input type="submit" value="Update" class="form-control btn btn-sm btn-success">
                  </div>
                </div>
              </div>

              </div>  
          </div>              
 </form>
