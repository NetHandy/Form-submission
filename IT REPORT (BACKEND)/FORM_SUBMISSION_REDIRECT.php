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
       <body class="container-fluid" style="box-sizing: content-box ; padding: 6px;">  

        	<?php
				include('db_connect.php');
					//write query for all inputs
					$sql = 'SELECT email, level, phone, id FROM user_details ORDER BY created_at';

					//make query and get results
					$results = mysqli_query($conn, $sql);

					// fetch the resulting rows as an array;
					$details = mysqli_fetch_all($results, MYSQLI_ASSOC);

					mysqli_free_result($results);
			?>
          
            <div class="container-fluid bg-secondary text-primary p-3">
                <div class="row">
                <div class="col-9">
                <!--HEAD-->
                <!--nav-->
                <nav class="navbar navbar-expand-sm bg-none navbar-dark">
                  <!-- Brand -->
                  <a class="navbar-brand" href="#">Logo</a>
                
                  <!-- Links -->
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link bg-red" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link bg-red" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="news.html">News</a>
                    </li>
                
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Dropdown link
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="sermons.html">Sermon</a>
                        <a class="dropdown-item" href="about.html">About Us</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                      </div>
                    </li>
                  </ul>
                </div>

                <div class="col-3">
                  <form class="form-inline" action="/action_page.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                  </form>
                </div>
              </div>
            </div>
                </nav>
              </div>
                <br>
                
                
               <!-- <header>
                        <div class="btn-group">
                                <button type="button" class="btn btn-success "><a href="index.html">Home</a></button>
                                <button type="button" class="btn btn-success"><a href="About.html">About</a></button>
                                <button type="button" class="btn btn-success"><a href="News.html">News</a></button>
                                <button type="button" class="btn btn-success"><a href="Sermon.html">Sermon</a></button>
                                <button type="button" class="btn btn-success"><a href="Contact.html">Contact</a></button>
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Sony
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Tablet</a>
                                <a class="dropdown-item" href="#">Smartphone</a>
                                </div>
                                </div>
                            </div>

                        <div class="btn-group side float-right">
                            <button type="button" class="btn btn-primary">Sign-up</button>
                            <button type="button" class="btn btn-primary">Login</button>
                        </div>
                </header>
                    <br />
                <!--middle-->


                        	<h4 class="text-danger text-center">STUDENTS</h4>

					<div class="row container-fluid">

						
						<?php foreach($details as $detail){ ?>

								<div class="col-sm-12 col-lg-4 col-md-12 bg-secondary  align-center p-3" style="border-right: 3px solid white; border-bottom: 3px solid white; border-radius: 6px;">
                  
                  
                <div class="text-center"><?php echo htmlspecialchars($detail['email']); ?></div>
										<br /><br />

									<div class="card-caption text-center justify-between">
										<a href="dets.php?id=<?php echo $detail['id']; ?>" class="text-white">More Info</a>
										
									</div>
								</div>
						<?php } ?>
					</div>

					<br />
					<br />

						<!--<ul>
							//<?php foreach($details as $detail){
								//foreach(explode(',' , $detail['phone']) as $pho){ ?>
								//<li><?php echo htmlspecialchars($pho); ?></li>
							<?php } ?>
						</ul> -->

					
		

		
		
		

                
                <!--footer-->
                <footer>
                    
                </footer>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="file:///C:/Users/Faith%20PC/Desktop/RUTH/AFRESH/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            
        </body>
    </html>