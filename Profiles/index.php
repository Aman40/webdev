<!doctype html>
<?php
include "../include.php";
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
											echo '<span>Hello, '.$_SESSION["FirstName"].'. <a 
											href="../logoff.php">Log Out</a></span>';
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
							<a href="../fmh.php">Feed</a>
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
								<a href="javascript:reveal1hide23('prof-container', 'inventory-container', 'prof-orders')" id="tab-1">Profile</a>
								<a href="javascript:reveal1hide23('inventory-container', 'prof-container', 'prof-orders')" id="tab-2">Inventory</a>
								<a href="javascript:reveal1hide23('prof-orders', 'inventory-container', 'prof-container')" id="tab-3">Something</a>
								<a href="javascript:void(0)" id="tab-4">Pictures</a>
							</div><!--tab-row-->
							<div class="col-12 prof-content-row" id="prof-container">
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
											<i class='fa fa-edit'></i>
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
							</div><!-- prof-container-->
							<div class="col-12 prof-content-row" id="inventory-container">
								<p>
									This is the inventory container. Thank you!
								</p>
								<?php
									echo "
										<span id='edit-prof-data'>
											<a href='javascript:void(0)'>
											<i class='fa fa-plus-square-o'></i>
											Add Items
											</a>
										</span>";
								?>
								<div class="col-12" id="inventory-update">
									<div class="col-4" id="inventory-browse"><!--invisible until user clicks add-->
										<div class="col-12" id="inventory-search">
											<form class="search">
												<input type="text" name="search2" placeholder="Search.." id="srchdemo">
												<input type="button" onclick="javascript:_searchdb(document.getElementById('srchdemo').value)" value="Search">
											</form>
<script>
function _searchdb(str) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(this.readyState==4 && this.status==200) {
			document.getElementById("xhttpdemo").innerHTML=this.responseText;
			console.log(this.responseText);
		}
	}
	xhttp.open("GET", "xhttp.php?q="+str, true);
	xhttp.send();
}
</script>
										</div><!--Search by search-->
										<div class="col-12" id="categories"> <!--search by category-->
											<div class="col-12" id="inventory-crops">
												<div class="col-12 lvl-1" onclick="javascript:hide_show('inventory-crops')">
													<i class="fa fa-caret-right"></i>
													Crops	
												</div>
												
												<div class="col-12 inventory-hidden">
												
													<div class="col-12" id="inventory-food">
														<div class="col-12 lvl-2" onclick="javascript:hide_show('inventory-food')">
															<i class="fa fa-caret-right	"></i>
															Food crops
														</div>
														<div class="col-12 inventory-hidden"><!--Group starts here-->
															<div class="col-12" id="starchy">
															
<script>
function hide_show(elmtId)
{
	var element = document.getElementById(elmtId);
	var arrow = element.getElementsByTagName("i")[0];
	element = element.getElementsByClassName('inventory-hidden')[0];
	//if it's hidden show it. If it's visible, hide it.
	if(element.style.display=="none" || element.style.display=="") {
		element.style.display="block";
		arrow.className="fa fa-caret-down";
	} else {
		element.style.display="none";
		arrow.className="fa fa-caret-right";
	}
}
</script>

																<div class="col-12 lvl-3" onclick="javascript:hide_show('starchy')">
																	<i class="fa fa-caret-right	"></i>
																	Starchy foods
																</div>
																<div class="col-12 inventory-hidden">
																	<div class="col-12 lvl-4" onclick="_searchdb('Bananas')">
																		Bananas/Matooke
																	</div>
																	<div class="col-12 lvl-4">
																		Cassava
																	</div>
																	<div class="col-12 lvl-4">
																	
																		Rice
																	</div>
																	<div class="col-12 lvl-4">
																		Sweet Potatoes
																	</div>
																	<div class="col-12 lvl-4">
																		Irish Potatoes
																	</div>
																</div>
															</div><!--starchy-->
															<div class="col-12" id="fruits">
																<div class="col-12 lvl-3" onclick="javascript:hide_show('fruits')">
																	<i class="fa fa-caret-right	"></i>
																	Fruits
																</div>
																<div class="col-12 inventory-hidden">
																	<div class="col-12 lvl-4">
																		Yellow Bananas
																	</div>
																	<div class="col-12 lvl-4">
																		Passion Fruits
																	</div>
																	<div class="col-12 lvl-4">
																		Tomatoes
																	</div>
																	<div class="col-12 lvl-4">
																		Avocadoes
																	</div>
																	<div class="col-12 lvl-4">
																		Egg Plant
																	</div>
																	<div class="col-12 lvl-4">
																		Plantain/Gonja
																	</div>
																	<div class="col-12 lvl-4">
																		Paprika
																	</div>
																	<div class="col-12 lvl-4">
																		Mangoes
																	</div>
																</div>
															</div><!--fruits-->
															<div class="col-12" id="veggies">
																<div class="col-12 lvl-3" onclick="javascript:hide_show('veggies')">
																	<i class="fa fa-caret-right	"></i>
																	Vegetables
																</div>
																<div class="col-12 inventory-hidden">
																	<div class="col-12 lvl-4">
																		Cabbage
																	</div>
																	<div class="col-12 lvl-4">
																		Dodo/Amaranthus
																	</div>
																	<div class="col-12 lvl-4">
																		Nakati
																	</div>
																	<div class="col-12 lvl-4">
																		Sukuma Wiki
																	</div>
																	<div class="col-12 lvl-4">
																		Lettuce
																	</div>
																</div>
															</div><!--veggies-->
															<div class="col-12" id="legumes">
																<div class="col-12 lvl-3" onclick="javascript:hide_show('legumes')">
																	<i class="fa fa-caret-right	"></i>
																	Legumes
																</div>
																	<div class="col-12 inventory-hidden">
																	<div class="col-12 lvl-4">
																		Beans
																	</div>
																	<div class="col-12 lvl-4">
																		Ground Nuts/Pea Nuts
																	</div>
																	<div class="col-12 lvl-4">
																		Peas
																	</div>
																	<div class="col-12 lvl-4">
																		Lentils
																	</div>
																	<div class="col-12 lvl-4">
																		Soy Beans
																	</div>
																	</div><!--hidden-->
															</div><!--legumes-->
													
														</div><!--Group ends here-->
													
													</div><!--inventory-food-->
													
													<div class="col-12" id="inventory-cash">
														<div class="lvl-2" onclick="javascript:hide_show('inventory-cash')">
															<i class="fa fa-caret-right	"></i>
															Cash Crops
														</div>
														<div class="col-12 inventory-hidden">
															<div class="lvl-3">
																Coffee
															</div>
															<div class="lvl-3">
																Cotton
															</div>
															<div class="lvl-3">
																Tea
															</div>
														</div>
													</div><!--inventory-cash-->
												
												</div>
											
											</div><!--inventory-crops-->
											
											<div class="col-12" id="inventory-animals">
												<div class="col-12 lvl-1" onclick="javascript:hide_show('inventory-animals')">
													<i class="fa fa-caret-right	"></i>
													Animals
												</div>
												<div class="col-12 inventory-hidden">
													<div class="col-12 lvl-2">
														Cows
													</div>
													<div class="col-12 lvl-2">
														Goats
													</div>
													<div class="col-12 lvl-2">
														Sheep
													</div>
												</div>
											</div><!--inventory-animals-->
											
											<div class="col-12" id="inventory-poultry">
												<div class="col-12 lvl-1" onclick="javascript:hide_show('inventory-poultry')">
													<i class="fa fa-caret-right	"></i>
													Poultry
												</div>
												<div class="col-12 inventory-hidden">
													<div class="col-12 lvl-2">
														Chicken
													</div>
													<div class="col-12 lvl-2">
														Ducks
													</div>
													<div class="col-12 lvl-2">
														Turkeys
													</div>
												</div>
											</div><!--inventory-animals-->
											
											<div class="col-12" id="inventory-fish">
												<div class="col-12 lvl-1" onclick="javascript:hide_show('inventory-fish')">
													<i class="fa fa-caret-right	"></i>
													Fish
												</div>
												<div class="col-12 inventory-hidden">
													<div class="col-12 lvl-2">
														Tilapia
													</div>
													<div class="col-12 lvl-2">
														Cat Fish
													</div>
													<div class="col-12 lvl-2">
														Mud Fish
													</div>
													<div class="col-12 lvl-2">
														Nile Perch
													</div>
												</div>
											</div><!--inventory-animals-->
											
										</div><!--search by category-->
									</div><!--inventory-browse-->
									
									<div class="col-8" id="inventory-display">
										<p id="xhttpdemo">
										</p>
									</div><!--inventory-display-->
								</div><!--Inventory update-->
							</div><!--Inventory container-->
							<script>//This will be for adding content to the inventory
								function addItems() {
									var inventoryContainer = document.getElementById('inventory-container');
									
								}
							</script>
							<div class="col-12 prof-content-row" id="prof-orders">
								<p>
									This is orders container. Still under development.
								</p>
							</div>
							<div>
							</div>
							<script>
							function reveal1hide23(div1, div2, div3) {
								document.getElementById(div1).style.display="block";
								document.getElementById(div2).style.display="none";
								document.getElementById(div3).style.display="none";
							}
							</script>
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