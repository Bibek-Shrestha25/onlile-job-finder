<?php 
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Message</h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>Name</th> 
				  		<th>email</th> 
				  		<th>Message </th> 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tblcontact`  ORDER BY `tblcontact`.`id` DESC");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				  			echo '<td>' . $result->id.'</a></td>';
				  			echo '<td>' . $result->full_name.'</td>';
				  			echo '<td>' . $result->email.'</td>';
				  			echo '<td>' . $result->message.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
				 <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<?php
					if($_SESSION['ADMIN_ROLE']=='Administrator'){
					// echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
					; }?>
				</div>
			
			
				</form>
	
 <div class="table-responsive">	 