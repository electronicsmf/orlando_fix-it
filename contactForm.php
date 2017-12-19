
<?php 


include('header.php');




?>



<body>
     <div id="contactForm" class="container-fluid">
              <div class="row">
                   <div class="col-sm-offset-1 col-sm-10 contactForm">
                         <h1>Contact us:</h1>
<?php
//Get users input
$name = $_POST['name'];						 
$email = $_POST['email'];						 
$message = $_POST['message'];
//error messages
$missingName = '<p><strong>Please Enter your Name!</strong></p>';
$missingEmail = '<p><strong>Please Enter your Email Address</strong></p>'; 
$invalidEmail = '<p><strong>Please Enter a Valid Email</strong></p>';
$missingMessage ='<p><strong>Please enter a message</strong></p>';

if(isset($_POST["submit"])){
	 if(!$name){
     $errors .= $missingName;		 
	}else{
		$name = filter_var($name,FILTER_SANITIZE_STRING);
	 }
	 if(!$email){
	 $errors .= $missingEmail;
	 }else{
	    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
	 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				 $errors .= $invalidEmail;
				}
		 }
	if(!$message){
	$errors .= $missingMessage;
	}else{
   $message = filter_var($message,FILTER_SANITIZE_STRING);
			}
   if($errors){
	  $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>'; 
			}else{
				$to = "Electronicsmf@aol.com";
				$subject = "Contact";
				$message = "
				<p>Name: $name.</p>
				<p>Email: $email.</p>
				<p>Message:</p>
				<p><strong>$message</strong></p>";
				$headers = "Content-type: text/html";
				if(mail($to,$subject,$message,$headers)){
					$resultMessage = '<div class="alert alert-success">Thanks for your Message. We will get back to you as soon as possible!</div>';
				}else{
					$resultMessage = '<div class="alert alert-warning">Unable to Email.Please try again later!</div>';
				}
			}
	
   echo $resultMessage;
}						 
						 
?>						 
				         <form action="contactForm.php" method="post">
						       <div class="form-group">
							        <label for="name">Name</label>
						                   <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?php echo $_POST['name'];?>">
							   </div>		   
							   <div class="form-group">
									<label for="email">Email</label>
						                   <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $_POST['email'];?>">
						       </div>
							   <div class="form-group">
							        <label for="message">Message</label>
							        <textarea name="message" id="message" class="form-control" rows="5"><?php echo$_POST['message'];?></textarea>
							  </div>
							  <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message">
				         </form>
                   </div>
            </div>
     </div>


</body>
</html>