 
	<section id="content">
	
	<div class="container">
		<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
									<h3></h3>
									<p>Our search filters enable you to narrow down your job search based on specific criteria such as location, industry, job type, salary range, and more. This ensures that you receive personalized results tailored to your preferences.</p>
                                    	<p> We provide tools and resources to help you create an impressive and professional resume. Our resume builder guides you through the process, allowing you to highlight your skills, experience, and qualifications effectively.</p>
								</div>  
							</div>
						</div>
	<div class="row">
								<div class="col-md-6">
									<p></p>
								  	
		   <!-- Form itself -->
          <form name="sentMessage" id="contactForm"  novalidate>
	       <h3>Contact Us</h3>
		 <div class="control-group">
                    <div class="controls">
			<input type="text" class="form-control" 
			   	   placeholder="Full Name" id="name" required
			           data-validation-required-message="Please enter your name" />
			  <p class="help-block"></p>
		   </div>
	         </div> 	
                <div class="control-group">
                  <div class="controls">
			<input type="email" class="form-control" placeholder="Email" 
			   	            id="email" required
			   		   data-validation-required-message="Please enter your email" />
		</div>
	    </div> 	
			  
               <div class="control-group">
                 <div class="controls">
				 <textarea rows="10" cols="100" class="form-control" 
                       placeholder="Message" id="message" required
		       data-validation-required-message="Please enter your message" minlength="5" 
                       data-validation-minlength-message="Min 5 characters" 
                        maxlength="999" style="resize:none"></textarea>
		</div>
               </div> 		 
	     <div id="success"> </div> <!-- For success/fail messages -->
	    <button type="submit" class="btn btn-primary pull-right">Send</button><br />
          </form>
								</div>
								<div class="col-md-6">
<!---<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">   --->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sen=false"> 





</script><div style="overflow:hidden;height:500px;width:600px;"><div id="gmap_canvas" 
style="height:500px;width:600px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}
</style><a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">trivoo</a></div><script type="text/javascript"> 

// function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(40.805478,-73.96522499999998),

	function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(27.700769,85.300140),

mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);


// marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.805478, -73.96522499999998)});

marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(27.702471,85.341403)});



// infowindow = new google.maps.InfoWindow({content:"<b>The Breslin</b><br/>2880 Broadway<br/> New York" });google.maps.event.addListener

infowindow = new google.maps.InfoWindow({content:"<b>ONLINE JOB FINDER</b><br/>44600 Zip code<br/> kathmandu" });google.maps.event.addListener
(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
</script>


								</div>
							</div>
	</div>
 
	</section>
 