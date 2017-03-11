<!doctype html>
<?php
include "include.php";
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="fmh.css">
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
									<img src="icons/profile-pic-male.jpg">
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
							<?php //If the user logs in (session_exists=true) hide the following
							if(!$session_exists) {
							echo "
							<a href=\"javascript:void(0)\" onclick=
							\"document.getElementById('id01').style.display='block'\">Sign In</a>
							<a href=\"javascript:void(0)\" onclick=
							\"document.getElementById('id02').style.display='block'\">Sign up</a>
								";
							}
							?>
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
					<div class="r2c1row col-12">
					
						<div class="r2c1row-head col-12">
							<h2>
								Food Items
							</h2>
						</div><!--r2c1row-head col-12-->
						
					</div>
					<?php
						$list=array("Food Crops", "Cash Crops", "Animals", 
						"Poultry", "Fish");
						for($count=0;$count<count($list); $count++) {
							echo '<div class="r2c1row col-12">
					
						<div class="r2c1row-head col-12">
							<h2>
								'.$list[$count].'
							</h2>
						</div><!--r2c1row-head col-12-->
						
					</div>';
						}
					?>
				</div><!--r2c1-->
				<div class="col-9" id="r2c2">
					<div class="r2c2row col-12">
						<div class="r2c2row-head col-12">
							<h3>
								Category
							</h3>
						</div><!--r2c2row-head col-12-->
						<div class="r2c2row-content col-12">
						
							<div class="item-slide">
								<div class="item-slide-header">
									<h3>
										Item name
									</h3>
								</div><!--item-slide-header-->
								
								<div class="item-slide-content">
									<table>
									
										<tr>
											<td>Property
											<td><i>Value</i>
										</tr>
										<tr>
											<td>Property
											<td><i>Value</i>
										</tr>
										<tr>
											<td>Property
											<td><i>Value</i>
										</tr>
										<tr>
											<td>Property
											<td><i>Value</i>
										</tr>

									</table>
								</div><!--item-slide-header-->
							</div><!--item-slide-->
							<?php//php to populate produce many item slides
								
							?>
						</div><!--r2c2row-content col-12-->
					</div>

				</div><!--r2c2-->

			</div><!--row-2-->
			<div id="row-3"> <!--This will contain the footer-->
				<div id="r3-overlay">
				</div>
			</div><!--row-3-->
		</div><!--Main wrapper-->

<!--************************************THE LOGIN FORM******************************-->
		<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="fmh.php" method="post">
    <div class="imgcontainer">
      <img src="icons/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <input type="hidden" name="formname" value="login"/>
    	
      <label><b>Phone number</b></label><?php echo $phoneno_error.'<br>' ?>
      <input type="text" placeholder="Enter Username" name="phoneno" required>

      <label><b>Password</b></label><?php echo $upassword_error.'<br>' ?>
      <input type="password" placeholder="Enter Password" name="upassword" required>

      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<!--*************************************************************************-->

<!--****************************THE SIGNUP FORM******************************-->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content animate" action="fmh.php" method="post">
    <div class="container">
    	<input type="hidden" name="formname" value="signup"/>
    	
    	<lable><b>First Name</b></lable><span class="error"> *<?php echo $fname_error ?></span>
		<input type="text" class="required" placeholder="First Name" name="fname" value="<?php if(isset($_POST['fname']) && $_POST['fname'] != null) echo $_POST['fname']; ?>" required>
		
		<lable><b>Middle Name</b></lable><span>
		<input type="text" placeholder="Middle Name" name="mname" value="<?php if(isset($_POST['mname']) && $_POST['mname'] != null) echo $_POST['mname']; ?>">
		
		<lable><b>Last Name</b></lable><span class="error"> *<?php echo $lname_error ?></span>
		<input type="text" class="required" placeholder="Last Name" name="lname" value="<?php if(isset($_POST['lname']) && $_POST['lname'] != null) echo $_POST['lname']; ?>" required>
		
		<lable><b>Company Name</b></lable>
		<input type="text" placeholder="First Name" name="coname" value="<?php if(isset($_POST['coname']) && $_POST['coname'] != null) echo $_POST['coname']; ?>">
		
		<lable><b>Sex</b></lable><span class="error"> *<?php echo $sex_error ?></span><br>
		<input type="radio" class="required" name="sex" value="M" required >M<br>
		<input type="radio" class="required" name="sex" value="F" required >F<br>
		<input type="radio" class="required" name="sex" value="C" required >Company<br><br>
		
		<lable><b>Date of Birth</b></lable><span class="error"> *<?php echo $dob_error ?></span><br>
		<input type="date" class="required" class="wide" name="dob" required><br><br>
		
		<label><b>District of Operation</b></label><span class="error"> *<?php echo $district_error ?></span>
		<input type="text" class="required" placeholder="District" name="district" value="<?php if(isset($_POST['district']) && $_POST['district'] != null) echo $_POST['district']; ?>" required>
		
		<label><b>Email</b></label><span class="warning"><?php echo $email_error ?></span>
		<input type="text" placeholder="Enter Email" name="email" value="<?php if(isset($_POST['email']) && $_POST['email'] != null) echo $_POST['email']; ?>">
		
		<label><b>Address</b></label>
		<input type="text" placeholder="E.g Plot 35 Speke street, Kampala" name="address" value="<?php if(isset($_POST['address']) && $_POST['address'] != null) echo $_POST['address']; ?>">
		
		<label><b>Phone Number</b></label><span class="error"> *<?php echo $phoneno_error ?></span>
		<input type="text" class="required" placeholder="E.g 0784596469" name="phoneno" value="<?php if(isset($_POST['phoneno']) && $_POST['phoneno'] != null) echo $_POST['phoneno']; ?>" required>
		
		<label><b>Website</b></label>
		<input type="text" placeholder="e.g www.domain.com" name="website" value="<?php if(isset($_POST['website']) && $_POST['website'] != null) echo $_POST['website']; ?>">
		
		<label><b>About Yourself</b></label><br>
		<textarea style="width: 100%" placeholder="About yourself..." name="about" value="<?php if(isset($_POST['about']) && $_POST['about'] != null) echo $_POST['about']; ?>"></textarea><br>

		<label><b>Password</b></label><span class="error"> * <?php echo $upassword_error ?></span>
		<input type="password" class="required" placeholder="Enter Password" name="upassword" required>

		<label><b>Repeat Password</b></label><span class="error"> * </span><br>
		<input type="password" class="required" placeholder="Repeat Password" name="upassword2" required>
		<span class="warning">* = required</span><br>
		<input type="checkbox" checked="checked"> Remember me
		<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>
<!--*************************************************************************-->
	<script>
	// Get the modal
	var modalin = document.getElementById('id01');
	var modalup = document.getElementById('id01');
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modalin) {
		    modalin.style.display = "none";
		}
	}
	// Get the modal

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modalup) {
		    modalup.style.display = "none";
		}
	}
	</script>
	</body>
</html>
