<docTYPE html>
    <html>
        <head>
            <title>TGCBCI</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!--<link href="index.css" rel="stylesheet" type="text/css"> -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="file:///C:/Users/Faith%20PC/Desktop/PORTFOLIO/WEB%201/fontawesome-free-5.12.0-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            
        </head>

<body class="container-fluid p-3" style="box-sizing: content-box ;">  
	<?php
	include('db_connect.php');
	//write query for all inputs
	$sql = 'SELECT email, level, phone, id FROM user_details ORDER BY created_at';

	//make query and get results
	$results = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array;
	$details = mysqli_fetch_all($results, MYSQLI_ASSOC);

	mysqli_free_result($results);

	//close result template

	//print_r(explode(',' , $details[0]['email']));
	//print_r(explode(',' , $details[0]['phone']));



	//print_r($details);


			$errors = array('email' => '', 'level' => '' , 'phone' => '');



	if(isset($_POST['submit'])){
	
		//check email
		if(empty($_POST['email'])){
			$errors['email'] =  '*An email is required <br />';
		} else {
			$email = htmlspecialchars($_POST['email']);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = '*email must be a valid email address';
			}
			echo '<br />';
		}

		//check level
		if(empty($_POST['level'])){
			$errors['level'] =  '*enter your level <br />';
		}else{
			$level = htmlspecialchars($_POST['level']);
			if(!preg_match('/^[^\W_]+$/', $level)) {
				$errors['level'] =  '*it must be letters and space only'; echo '<br />';
			}
		}
			

		//check gsm
		
		if(empty($_POST['phone'])){
			$errors['phone'] =  "*please enter your phone number";
		}else{
			$phone = htmlspecialchars($_POST['phone']);
			function validate_phone_number($phone){
			
			 // Allow +, - and . in phone number
		     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
		     // Remove "-" from number
		     $phone_to_check = str_replace("-", "", $filtered_phone_number);
		     // Check the lenght of number
		     // This can be customized if you want phone number from a specific country
		     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
		        return false;
		       } else {
		       return true;
     		   }

			}
			 if (validate_phone_number($phone) == false) {
  			 $errors['phone'] = "*Invalid phone number";
			}
		} 


			if(array_filter($errors)){
				//echo ' <html> <div class = "red-text"> * make sure all spaces are filled correctly </div> </html> ' ;
			}else{

				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$level = mysqli_real_escape_string($conn, $_POST['level']);
				$phone = mysqli_real_escape_string($conn, $_POST['phone']);
			

				//create sql

				$sql = "INSERT INTO user_details(email, level, phone) VALUES('$email', '$level', '$phone')";
				
				//save to db and check
				if(mysqli_query($conn, $sql)){
					//success
				}else{
					//error
					 echo 'query error: ' . mysqli_error($conn);
					 //close connection
					mysqli_close($conn);
				} 


					

				//echo "form is valid";
				header('Location: FORM_SUBMISSION_REDIRECT.php');
			}
			
	}// end of post check

	?>



<section class="section container" id="contact">
<div class="center-align indigo-text"><h4>STUDENTS DATA</h4></div>
            <div class="row">
                <div class="col s12 l6 offset-0">
                    <form  action="FORM_SUBMISSION.php" method="POST">
                        <div class="input-field">
                            <i class="material-icons prefix indigo-text" >email</i>
                            <input type="text" id="email" name="email">
							<label for="email">Your Email</label>
							
							<div class = "red-text"> <?php echo $errors['email'] ?> </div>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix indigo-text">book</i>
                            <input type="text" id="level" name="level">
							<label for="level">Level</label>
							
							<div class = "red-text"> <?php echo $errors['level'] ?> </div>
						</div>
						<div class="input-field">
                            <i class="material-icons prefix indigo-text">phone</i>
                            <input type="text" id="phone" name="phone">
							<label for="phone">Phone</label>
							
							<div class = "red-text"> <?php echo  $errors['phone']; ?> </div>
                        </div>
                        

                        <div>

                        </div>
                        <div class="input-field center">
                            <button name = "submit" type="submit" class="btn" style="background: #1a237e;">Send</button>
                        </div>
                    </form>
		
		
		


</body>
</html>