<?php

session_start();

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Patient Dashboard</title>
	</head>

	<body>

		<?php

		include("../include/header.php");

		?>
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2" style="margin-left:-30px;">
						<?php
						include("sidenav.php");
						include("../include/connection.php");
						?>
					</div>
					<div class="col-md-10">
						<h4 class="my-3 ">Patient Dashboard</h4>
						<div class="col-md-12">
							<div class="row">

								<div class="col-md-3 bg-info mx-2" style="height: 150px;">

									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4">My Profile</h5>
											</div>
											<div class="col-md-4">
												<a href="profile.php">
													<i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i>
												</a>
											</div>
										</div>
									</div>

								</div>
								<div class="col-md-3 bg-warning mx-2" style="height: 150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4">Book Appointment</h5>
											</div>
											<div class="col-md-4">
												<a href="appointment.php">
													<i class="fa fa-calendar-check fa-3x my-4" style="color:white;"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 bg-success mx-2" style="height: 150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4">My Invoice</h5>
											</div>
											<div class="col-md-4">
												<a href="invoice.php">
													<i class="fas fa-file-invoice-dollar fa-3x my-4" style="color:white;"></i>
												</a>
											</div>
										</div>
									</div>

								</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3"></div>
								
										<div class="col-md-6 jumbotron bg-info my-5">
											<h5 class="text-center my-2">Send A Report</h5>
												<form method="post" enctype="multipart/form-data">
													<label>Title</label>
													<input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report">
													<label>Message</label>
													<input type="text" name="message" autocomplete="off" class="form-control my-2" placeholder="Enter Message">
													<label>Upload previous file</label>
													<input type="file" class="form-control" name="upload">
        								
													<input type="submit" name="send" value="send report" class="btn my-2 btn-success">
										
												</form>

										</div>
							
									</div>
						</div>

							</div>
						</div>
					</div>
						<?php

						 	 if(isset($_POST['send'])){
						 	 	 $title=$_POST['send'];
						 	 	 $message=$_POST['message'];
						 	 	 $file_name=$_FILES['upload']['name']; 
						 	 	 if(empty($title)){

						 	 	 }else if(empty($message)){

						 	 	 }else{
						 	 	 	$user=$_SESSION['patient'];

						 	 	 	$query="INSERT INTO report(title,message,username,date_send,report_file) VALUES('$title','$message','$user',NOW(),'$file_name')";

						 	 	 	$res=mysqli_query($connect,$query);

						 	 	 	if($res){
						 	 	 		move_uploaded_file($_FILES['upload']['tmp_name'],"upload/$file_name");
						 	 	 		echo "<script>alert('You have sent your Report')</script>";
						 	 	 	}
						 	 	 }
						 	 }

						 ?>
						
					</div>
				</div>
			</div>
		</div>

	</body>

</html>