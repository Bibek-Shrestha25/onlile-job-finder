
<section id="banner" height="50%">
  
   
   <!-- Slider -->
         <div id="main-slider" class="flexslider">
 
 
         
         
 
             <ul class="slides">
            
              
               <li>
                 <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/UI.jpg" alt="" />
                 <div class="flex-caption">
                     <!-- <h3>Innovation</h3> 
                    <p>Find the Perfect Job Opportunities with Our Platform."</p> 
              -->
             <div class="row">
 <!--                 
                 <div class="col-sm-12 search1">
                   <label class="col-sm-3"></label> -->
               
 
 
 
 
   <form action="index.php" method="GET"> 
 
 
   <div class="input-group" style="align:Y-axis-40;">
   <input type="hidden" name="q" value="sequential-search">
   <input type="text" name="jobTitle" required style = "height:50px; widhth:60px" class="form-control rounded"  placeholder="Enter the Job Title" aria-label="Search" aria-describedby="submit" />
   <button type="submit" class="btn btn-outline-primary">Search</button>
   <?php
        echo "Please enter a Valid input.";
    
    ?>
    <li >
                <!-- <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/slides2.jpg" alt="" />
                <div class="flex-caption"  >
                    <h3 class = "col-5" style="color:#3366FF;text-align:left">CareerLink</h3>
                     <p style="color:#3366FF">Success depends on work</p> 
           
                </div>
              </li> -->
            </ul>
        
 </div>
 
           
            
               
                     
               
   </div>
  </section>
  </form>
  
 
 
 
 
                 </div>
 
 
 
              
         </div>
   <!-- end slider -->
 
 
 
 
 
 
 
 
 
 
 
 
 
  
   </section> 
 
 
 
 
 
 
 
   <section id="call-to-action-2">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12 col-sm-12" >
           <h3>Discover, Connect, Succeed</h3>
           <p><b>
           Welcome to our online job platform, where possibilities meet success.
            Our platform is designed to revolutionize the way you search for your dream career. With our 
            user-friendly interface, we empower you to effortlessly explore a vast array of
             job opportunities from top companies and industries. Our intelligent matching algorithm ensures that you 
             are connected with the perfect opportunities that align with your skills qualifications, and aspirations.
</b></p>
         </div>
        <!--  <div class="col-md-2 col-sm-3">
           <a href="#" class="btn btn-primary">Read More</a>
         </div> -->
       </div>
     </div>
   </section>
   
   <section id="content">
   
   
   <div class="container">
         <div class="row">
       <div class="col-md-12">
         <div class="aligncenter"><h2 class="aligncenter">Featured Company</h2><!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt.. --></div>
         <br/>
       </div>
     </div>
 
     <?php 
       $sql = "SELECT * FROM `tblcompany`";
       $mydb->setQuery($sql);
       $comp = $mydb->loadResultList();
 
 
       foreach ($comp as $company ) {
         # code...
     
     ?>
             <div class="col-sm-4 info-blocks">
                 <i class="icon-info-blocks fa fa-building-o"></i>
                 <div class="info-blocks-in">
                     <h3><?php echo $company->COMPANYNAME;?></h3>
                     <!-- <p><?php echo $company->COMPANYMISSION;?></p> -->
                     <p>Address :<?php echo $company->COMPANYADDRESS;?></p>
                     <p>Contact No. :<?php echo $company->COMPANYCONTACTNO;?></p>
                 </div>
             </div>
 
     <?php } ?> 
   </div>
   </section>
   
   <section class="section-padding gray-bg">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="section-title text-center">
            
           </div>
         </div>
       </div>
       
     </div>
   </section>    
   <section id="content-3-10" class="content-block data-section nopad content-3-10">
   <div class="image-container col-sm-6 col-xs-12 pull-left">
     <div class="background-image-holder">
 
     </div>
   </div>
 
   <div class="container-fluid">
     <div class="row">
       <div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
         <div class="editContent">
           <h3>Our Team</h3>
         </div>
         <div class="editContent-col-md-12"  style="height:235px;" >
           <p style=margin:20px;> 
           Our team at the Online Job Finder system is a dedicated group of professionals passionate about connecting 
           job seekers with their ideal career paths. With a diverse range of expertise in technology, data analysis, 
           user experience, and industry knowledge, we work tirelessly to create an exceptional platform that caters to 
           your job search needs. We understand the challenges and complexities of the job market, and our team is 
           committed 
           to providing you with innovative solutions and a seamless user experience. With a customer-centric approach, 
           we continuously strive to improve and enhance our system to ensure that you have the best tools and resources
            at your fingertips. Trust our team to be your partner in navigating the 
           job landscape and empowering you to find the opportunities that propel your career forward.
           </P>
 
           
         </div> 
       </div>
     </div><!-- /.row-->
   </div><!-- /.container -->
 </section>
      
 