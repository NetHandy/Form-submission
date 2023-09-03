<docTYPE html>
    <html>
        <head>
            <title>THE GLORY OF CHRIST BIBLE CHURCH</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="index.css" rel="stylesheet" type="text/css"> 
            <link href="file:///C:/Users/Faith%20PC/Desktop/RUTH/AFRESH/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            
        </head>
       <body class="container-fluid p-3" style="box-sizing: content-box ;">  

        	<?php
							
				include('db_connect.php');

				if(isset($_POST['delete'])){
					$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

					$sql = "DELETE FROM user_details WHERE id = $id_to_delete";

					if (mysqli_query($conn, $sql)) {
						//success

						header('Location: FORM_SUBMISSION_REDIRECT.php');
					} {
						//failure
						echo 'query error: ' . mysqli_error($conn);
					}
				}

				//check GET request id param
				if(isset($_GET['id'])){
                    $id = mysqli_real_escape_string($conn, $_GET['id']);

                    //make sql
                    $sql ="SELECT * FROM user_details WHERE id = $id";


                    //get the query result
                    $result = mysqli_query($conn, $sql);

                    // fetch the result in array format
                    $detail = mysqli_fetch_assoc($result);

                    mysqli_free_result($result);

                	mysqli_close($conn);

                	//print_r($detail);
				}
						?>


				

				<div class="container text-center">
					<h2>STUDENT DETAILS</h2>
					<?php if($detail): ?>

						<h4><?php echo htmlspecialchars($detail['email']); ?></h4>
						<p>Level of Education: <?php echo htmlspecialchars($detail['level']); ?></p>
						<p>Phone Number: <?php echo htmlspecialchars($detail['phone']); ?></p>

						<p>This record was created at: <?php echo date($detail['created_at']); ?></p>

						<form action="dets.php" method="POST">
							<input type="hidden" name="id_to_delete" value="<?php echo $detail['id'] ?>">
							<input type="submit" name="delete" value="Delete" class="btn btn-secondary">
						</form>


						<?php else: ?>

							<h4>No such student exists</h4>

						<?php endif; ?>
				</div>

				