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
								<?php
								if($session_exists) {
									echo '<img src="Pictures/'.$_SESSION["UserID"].'">';
								} else {
									echo '<img src="../icons/profile-pic-male.jpg">';
								}
								?>
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
							
								<?php
								if($session_exists) {
									echo '<img class="col-12" src="Pictures/'.$_SESSION["UserID"].'">';
								} else {
									echo '<img class="col-12" src="../icons/profile-pic-male.jpg" alt="profile picture">';
								}
								?>
								
								<form action="upload-picture.php" enctype="multipart/form-data" method="post">
									<input type="file" name="profpic">
									<input type="submit" name="submit">
								</form>
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
													<td><b>First Name:</b>
													<td>".isset_or_edit('FirstName')."
												</tr>
												<tr>
													<td><b>Middle Name:</b>
													<td>".isset_or_edit('MiddleName')."
												</tr>
												<tr>
													<td><b>Last Name:</b>
													<td>".isset_or_edit('LastName')."
												</tr>
												<tr>
													<td><b>Sex:</b>
													<td>".isset_or_edit('Sex')."
												</tr>
												<tr>
													<td><b>Birth Date:</b>
													<td>".isset_or_edit('DoB')."
												</tr>
												<tr>
													<td><b>Company name:</b>
													<td>".isset_or_edit('CoName')."
												</tr>
												<tr>
													<td><b>Email Address:</b>
													<td>".isset_or_edit('Email')."
												</tr>
												<tr>
													<td><b>Physical Address:</b>
													<td>".isset_or_edit('Address')."
												</tr>
												<tr>
													<td><b>District:</b>
													<td>".isset_or_edit('District')."
												</tr>
												<tr>
													<td><b>Website:</b>
													<td>".isset_or_edit('Website')."
												</tr>
												<tr>
													<td><b>Phone No.:</b>
													<td>".isset_or_edit('PhoneNo')."
												</tr>
												<tr>
													<td><b>About:</b>
													<td>".isset_or_edit('About')."
												</tr>
											</table>
										";
										echo "
										<span id='edit-prof-data'>
											<a href='javascript:void(0)' onclick='document.getElementById(\"id02\").style.display=\"block\"'>
											Edit
											</a>
										</span>";
									}
									function isset_or_edit ($variable) {
										if(isset($_SESSION[$variable]) && $_SESSION[$variable]!= null) {
											return $_SESSION[$variable];
										} else {
											return '';
										}
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
<?php
function fill_in_blanks ($postvariable, $sessionvariable) {
	if(isset($_POST[$postvariable]) && $_POST[$postvariable] !=null) {
		echo $_POST[$postvariable];
	} else if(isset($_SESSION[$sessionvariable]) && $_SESSION[$sessionvariable] !=null) {
		echo $_SESSION[$sessionvariable];
	} else {
		echo "";
	}
}
function _selected($var) {
	if(isset($_SESSION['Sex']) && $var == $_SESSION['Sex']) {
		echo "checked";
	}  else if (isset($_POST['Sex']) && $var==$_POST['Sex']) {
		echo "checked";
	}
}
?>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content animate" action="index.php" method="post">
    <div class="container">
    	<input type="hidden" name="formname" value="profedit"/>
    	
    	<lable><b>First Name</b></lable><span class="error"> *<?php echo $fname_error ?></span>
		<input type="text" class="required" placeholder="First Name" name="fname" value="<?php fill_in_blanks('fname','FirstName'); ?>" required>
		
		<lable><b>Middle Name</b></lable><span>
		<input type="text" placeholder="Middle Name" name="mname" value="<?php fill_in_blanks('mname','MiddleName'); ?>">
		
		<lable><b>Last Name</b></lable><span class="error"> *<?php echo " ".$lname_error ?></span>
		<input type="text" class="required" placeholder="Last Name" name="lname" value="<?php fill_in_blanks('lname','LastName'); ?>" required>
		
		<lable><b>Company Name</b></lable><span class="error"> *<?php echo " ".$coname_error ?></span>
		<input type="text" placeholder="First Name" name="coname" value="<?php fill_in_blanks('coname','CoName'); ?>">
		
		<lable><b>Sex</b></lable><span class="error"> *<?php echo " ".$sex_error; ?></span><br>
		<input type="radio" class="required" name="sex" value="M" required <?php _selected('M'); ?> >M<br>
		<input type="radio" class="required" name="sex" value="F" required <?php _selected('F'); ?> >F<br>
		<input type="radio" class="required" name="sex" value="C" required <?php _selected('C'); ?> >Company<br><br>
		
		<lable><b>Date of Birth</b></lable><span class="error"> *<?php echo " ".$dob_error; ?></span><br>
		<input type="date" class="required" class="wide" name="dob" required value="<?php fill_in_blanks('dob','DoB'); ?>"><br><br>
		
		<label><b>District of Operation</b></label><span class="error"> *<?php echo " ".$district_error ?></span>
		<input type="text" class="required" placeholder="District" name="district" value="<?php fill_in_blanks('district','District'); ?>" required>
		
		<label><b>Email</b></label><span class="warning"><?php echo " ".$email_error ?></span>
		<input type="text" placeholder="Enter Email" name="email" value="<?php fill_in_blanks('email','Email'); ?>">
		
		<label><b>Address</b></label>
		<input type="text" placeholder="E.g Plot 35 Speke street, Kampala" name="address" value="<?php fill_in_blanks('address','Address'); ?>">
		
		<label><b>Phone Number</b></label><span class="error"> *<?php echo " ".$phoneno_error ?></span>
		<input type="text" class="required" placeholder="E.g 0784596469" name="phoneno" value="<?php fill_in_blanks('phoneno','PhoneNo'); ?>" required>
		
		<label><b>Website</b></label>
		<input type="text" placeholder="e.g www.domain.com" name="website" value="<?php fill_in_blanks('website','Website'); ?>">
		
		<label><b>About Yourself</b></label><br>
		<textarea style="width: 100%" placeholder="About yourself..." name="about" value="<?php fill_in_blanks('about','About'); ?>"></textarea><br>

		<input type="checkbox" checked="checked"> Remember me
		<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Update</button>
      </div>
    </div>
  </form>
</div>
<script>
	// Get the modal
	var modalup = document.getElementById('id02');
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modalup) {
		    modalup.style.display = "none";
		}
	}
</script>
<!--*************************************************************************-->

<!--****************************THE SIGNUP FORM******************************-->

<!--*************************************************************************-->

	</body>
</html>
