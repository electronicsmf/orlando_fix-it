<!DOCTYPE html>
<head>
     <title>Contact Me</title>
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="contact.css/contact.css"/>
</head>
<body>
<section id="contact">
	     <div class="container">
	          <div class="row">
	               <div class="col-lg-12 text-center">
						<h2>Contact Me</h2>
<?php							  
$name =$_POST['name']; 						  
$email=$_POST['email']; 							  
$message =$_POST['message'];							  

$missingName ='<p><strong>Please Enter a Valid name</strong></p>';
$missingEmail = '<p><strong>Please Enter a Email Address</strong></p>';							  
$invalidEmail = '<p><strong>Please Enter a valid Email address</strong></p>';							  
$missingMessage = '<p><strong>Please Enter a Message</strong></p>';							  
							  
if(isset($_POST['submit'])){
	if(!$name){
		$errors .= $missingName;
	    }else{
			 $name = filter_var($name,FILTER_SANITIZE_STRING);
		}
	if(!$email){
		$erros .= $missingEmail;
		}else{
			$email = filter_var($email,FILTER_SANITIZE_EMAIL);
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$errors .= $invalidEmail;
			}
		}
	    if(!$errors){
			$resultMessage = '<div class="alert alert-danger">' .$errors . '</div>';
			}else{
				$to = "Electronicsmf@aol.com";			
				$subject = "contact";
				$message = "
				<p>Name: $name.</p>
				<p>Email: $email.</p>
				<p>Message:</p>
				<p><strong>$message</strong></p>";
				$headers = "content-type: text/html";
				if(mail($to,$subject,$message,$headers)){
					$resultMessage = '<div class="alert alert-success">Thanks for your Message.We will get back to you as soon as possible!</div>';
				}else{
					$resultMessage = '<div class="alert alert-warning">Unable to Email.Please try again later!</div>';
					}
			}
	        echo $resultMessage;
	
}							  
							  
							  
							  
?>							  
						      <hr class="star-primary">
	                     </div>
	                </div>
					<div class="row">
	                     <div class="col-lg-8 col-lg-offset-2">
	                          <form name="sendMessage" id="contactForm novalidate">
	                                <div class="row control-group">
									      <div class="form-group col-xs-12 floating-label-form-group-controls">
									           <label for="name">Name</label>
										       <input type="text" class="form-control" placeholder="name" id="name" required data-validation-required-message="Please enter your name.">
										       <p class="help-block text-danger"></p>
									      </div>
										  <div class="form-group col-xs-12 floating-label-form-group-controls">
										       <label for="email">Email Address</label>
										       <input type="text" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
										       <p class="help-block text-danger"></p>
										  </div>
										  <div class="form-grop col-xs-12 floating-label-form-group-controls">
										      <label for="phone">Phone Number</label>
											  <input type="text" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
										      <p class="help-block text-danger"></p>
										  </div>
										  <div class="form-group col-xs-12 floating-label-form-group-controls">
										       <label for="message">Message</label>
										       <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message.">
										       </textarea>
											   <p class="help-block text-danger"></p>
										  </div>
										  <br>
										  <div id="success"></div>
										  <div class="row">
										       <div class="form-group col-xs-12">
										            <button type="submit" class="btn btn-success btn-lg">Send</button>
											   </div>
										  </div>
									</div>
	                          </form>
	                    </div><!--col-lg-12-->
	               </div><!--row-->
	          </div><!--container-->
	 </section>
</body>
</html>