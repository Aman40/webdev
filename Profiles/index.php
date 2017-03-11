<!doctype html>
<?php
include "../include.php";
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="index.css">
	</head>
	<body>
		<div id="main-wrapper">
			<div id="row-1">
				
				<div class="col-12" id="r1c2">
					<div id="r1c2r1">
						<div class="col-3" id="r1c1">
							<h1>
								F<span>MH</span>
							</h1>
						</div><!--r1c1-->
						
						<div id="min-prof">
						
							<div id="prof-pic">
								<div id="prof-pic-img">
									<img src="../icons/profile-pic-male.jpg">
								</div><!--prof-picimg-->
								<div id="prof-pic-name">
									<?php
										if($session_exists) {
											echo '<span>Hello, '.$_SESSION["FirstName"].'. <a 														href="logoff.php">Log Out</a></span>';
										}
									?>
								</div>
							</div><!--prof-pic-->
							
							<div id="notifications"> <!--comments, orders -->
								<a href="#" id="orders">
									<div id="order-count">
										5
									</div><!--order-count-->
								</a><!--orders-->
								<a href="#" id="comments">
									<div id="comment-count">
										7
									</div><!--comment-count-->
								</a><!--comments-->
							</div><!--notifications-->
							
						</div><!--min-prof-->
					</div><!--r1c2r1-->
					<div id="r1c2r2"><!--Insert an unorered list here for the menu-->
						<div id="hor-menu">
							<a href="#">Stall</a>
							<a href="#">Home</a>
							<a href="#">About Us</a>
							<form class="search">
							  <input type="text" name="search" placeholder="Search..">
							  <input type="submit" value="Search">
							</form>
							
						</div><!--hor-menu-->
					
					</div><!--r1c2r2-->
				</div><!--r1c2-->
				
			</div><!--row-1-->
			<div id="row-2">
				<div class="col-3" id="r2c1">
					<div class="col-12" id="prof-r2c1row">
						<div class="col-12" id="prof-page-side">
							<div class="col-12" id="row1">
								<img class="col-12" src="../icons/profile-pic-male.jpg" alt="profile picture">
							</div>
							<div class="col-12" id="row2">
								<h3>Brief description</h3>
								<p>
									A brief description of the account owner goes here. 
								</p>
							</div>
						</div>
					</div><!--r2c1row col-12-->
				</div><!--r2c1-->
				<div class="col-9" id="r2c2">
					<div class="col-12 r2c2row">
						<div class="col-12" id="prof-page-main">
							<div class="col-12" id="tab-row">
								<a href="javascript:void(0)" id="tab-1">Profile</a>
								<a href="javascript:void(0)" id="tab-2">Inventory</a>
								<a href="javascript:void(0)" id="tab-3">Something</a>
								<a href="javascript:void(0)" id="tab-4">Pictures</a>
							</div><!--tab-row-->
							<div class="col-12 prof-content-row">
								<?php
									if(!$session_exists) {
										echo "<i>You have nothing to show!</i>";
									} else {
										echo 
										"
											<table>
												<tr>
													<td>First Name:
													<td>".$_SESSION['FirstName']."
												</tr>
												<tr>
													<td>Middle Name:
													<td>".$_SESSION['MiddleName']."
												</tr>
												<tr>
													<td>Last Name:
													<td>".$_SESSION['LastName']."
												</tr>
												<tr>
													<td>Sex:
													<td>".$_SESSION['Sex']."
												</tr>
												<tr>
													<td>Birth Date:
													<td>".$_SESSION['DoB']."
												</tr>
												<tr>
													<td>Company name:
													<td>".$_SESSION['CoName']."
												</tr>
												<tr>
													<td>Email Address:
													<td>".$_SESSION['Email']."
												</tr>
												<tr>
													<td>Physical Address:
													<td>".$_SESSION['Address']."
												</tr>
												<tr>
													<td>District:
													<td>".$_SESSION['District']."
												</tr>
												<tr>
													<td>Website:
													<td>".$_SESSION['Website']."
												</tr>
												<tr>
													<td>Phone No.:
													<td>".$_SESSION['PhoneNo']."
												</tr>
												<tr>
													<td>About:
													<td>".$_SESSION['About']."
												</tr>
											</table>
										";
									}
								?>
							</div>
						</div><!--prof-page-main-->
						
					</div><!--col-12 r2c2row-->
				</div><!--r2c2-->
			</div><!--row-2-->
			<div id="row-3"> <!--This will contain the footer-->
				<div id="r3-overlay">
				</div>
			</div><!--row-3-->
		</div><!--Main wrapper-->

<!--************************************THE LOGIN FORM******************************-->

<!--*************************************************************************-->

<!--****************************THE SIGNUP FORM******************************-->

<!--*************************************************************************-->

	</body>
</html>
