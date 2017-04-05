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
										<span id='edit-prof-data'>
											<a href='javascript:void(0)'>
											<i class='fa fa-plus-square-o'></i>
											Add Items
											</a>
										</span>
								<div class="col-12" id="inventory-update">
									<div class="col-4" id="inventory-browse"><!--invisible until user clicks add-->
										<div class="col-12" id="inventory-search">
											<form class="search">
												<input type="text" name="search2" placeholder="Search.." id="srchdemo" onkeydown="javascript:_checkenterkey(event)">
												<input type="button" onclick="javascript:_searchdb(document.getElementById('srchdemo').value)" value="Search">
											</form>
<script>
function _checkenterkey(event) {
	if(event.key=='Enter') { //If it's the enter key, call the _searchdb function
		event.preventDefault();
		_searchdb(document.getElementById('srchdemo').value);
	}
}

var itemNodeList;
function _searchdb(str) {
	var xhttp = new XMLHttpRequest();
	xhttp.responseType = "document";//Only this way, shall we be able to return an XML/HTML document
	xhttp.onreadystatechange = function() { //If we get a reply from the server
		if(this.readyState==4 && this.status==200) { //Check the status and readystate
			if(this.responseXML!=null) { //Do we have any meaningful response other than null?
					var xmlDoc = this.responseXML;
					var returnStatus = xmlDoc.getElementsByTagName("status")[0].childNodes[0].nodeValue;
					if(returnStatus==0) {
					//get an itemNodeList object
					itemNodeList = xmlDoc.getElementsByTagName("Items")[0].getElementsByTagName("Item");
					//Purge the 'html' variable of previous search data
					document.getElementById("xhttpdemo").innerHTML="";
				
					if(itemNodeList.length>0) {
							var html="";
							var i=0;
							for(i=0;i<itemNodeList.length;i++) {
								html="<div class='item-slide'>";
								html+="<div class='item-slide-image'>";
								html+="<img src='"+getValue(itemNodeList, i, 'ImageURI')+"'>";
								html+="</div><!--item-slide-header-->"				
								html+="<div class='item-slide-content' id='itemNo"+i+"'>"
									html+="<table>";
									html+="<tr style=\"display:none\">";
									html+="<th>ItemID</th>";
									html+="<td id=\"slide_item_ID\">"+getValue(itemNodeList, i, 'ItemID')+"</td>";
									html+="</tr>";
									html+="<tr>";
									html+="<th>Name</th>";
									html+="<td>"+getValue(itemNodeList, i, 'ItemName')+"</td>";
									html+="</tr>";
									html+="<tr>";
									html+="<th>Other Names</th>";
									html+="<td>"+getValue(itemNodeList, i, 'Aliases')+"</td>";
									html+="</tr>";
									html+="<tr>";
									html+="<th>Description</th>";
									html+="<td>"+getValue(itemNodeList, i, 'Description')+"</td>";
									html+="</tr>";
									html+="</table>";
								html+="</div><!--item-slide-header-->"
								html+="<div id='addToRep'>";//ID means 'Add to repository'
								html+="<button onclick='displaymodal("+i+")'><i class='fa fa-plus-square-o'></i> Add Item</button>";
								html+="</div>";
								html+="</div>";
								document.getElementById("xhttpdemo").innerHTML+=html;
							}
					} else {
						console.log("0 results were found");
					}
				} else if(returnStatus==1) { //returnStatus (defined in the php). 1=No results found. 
					document.getElementById("xhttpdemo").innerHTML="No matching results were found";
				} else if(returnStatus==2) { //2=couldn't connect to the database
					console.log("There was a problem connecting to the database");
				}
			} else { //For some weird reason, no XML, null returned.
				console.log("The is no response XML");
			}
		}
	}
	xhttp.open("GET", "xhttp.php?q="+str, true);
	xhttp.send();
}
function getValue(itemNodeList, index, tagName) { //This function is just to make things shorter ^
	var value = itemNodeList[index].getElementsByTagName(tagName)[0].childNodes[0].nodeValue
	return value;
}
function displaymodal(i) { //This function sets the data in the modal
	var html="";
	html="<div width=100%>";
	html+="<img src='"+getValue(itemNodeList, i, 'ImageURI')+"'>";
	html+="</div>";
	document.getElementById("eAI-11").innerHTML=html;
	html="<div width=100%>";
	html+="<font size=6em position='center'>"+getValue(itemNodeList, i, 'ItemName')+"</font>";
	html+="<br>Other names:\t"+getValue(itemNodeList, i, 'Aliases');
	html+="<br>Description:\t"+getValue(itemNodeList, i, 'Description');
	html+="</div>";
	document.getElementById("eAI-12").innerHTML=html;
	document.getElementById("editAddItem").style.display="block";
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
																	<div class="col-12 lvl-4" onclick="_searchdb('Cassava')">
																		Cassava
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Rice')">
																		Rice
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Sweet Potatoes')">
																		Sweet Potatoes
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Irish Potatoes')">
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
																	<div class="col-12 lvl-4" onclick="_searchdb('Yellow Bananas')">
																		Yellow Bananas
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Passion Fruits')">
																		Passion Fruits
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Tomatoes')">
																		Tomatoes
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Avocadoes')">
																		Avocadoes
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Egg Plant')">
																		Egg Plant
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Plantain')">
																		Plantain/Gonja
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Paprika')">
																		Paprika
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Mangoes')">
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
																	<div class="col-12 lvl-4" onclick="_searchdb('Cabbage')">
																		Cabbage
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Amaranthus')">
																		Dodo/Amaranthus
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Nakati')">
																		Nakati
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Sukuma Wiki')">
																		Sukuma Wiki
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Lettuce')">
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
																	<div class="col-12 lvl-4" onclick="_searchdb('Beans')">
																		Beans
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Ground Nuts')">
																		Ground Nuts/Pea Nuts
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Peas')">
																		Peas
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Lentils')">
																		Lentils
																	</div>
																	<div class="col-12 lvl-4" onclick="_searchdb('Soy Beans')">
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
															<div class="lvl-3" onclick="_searchdb('Coffee')">
																Coffee
															</div>
															<div class="lvl-3" onclick="_searchdb('Cotton')">
																Cotton
															</div>
															<div class="lvl-3" onclick="_searchdb('Tea')">
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
													<div class="col-12 lvl-2" onclick="_searchdb('Cows')">
														Cows
													</div>
													<div class="col-12 lvl-2" onclick="_searchdb('Goats')">
														Goats
													</div>
													<div class="col-12 lvl-2" onclick="_searchdb('Sheep')">
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
													<div class="col-12 lvl-2" onclick="_searchdb('Chicken')">
														Chicken
													</div>
													<div class="col-12 lvl-2" onclick="_searchdb('Ducks')">
														Ducks
													</div>
													<div class="col-12 lvl-2" onclick="_searchdb('Turkeys')">
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
													<div class="col-12 lvl-2" onclick="_searchdb('Tilapia')">
														Tilapia
													</div>
													<div class="col-12 lvl-2" onclick="_searchdb('Cat Fish')">
														Cat Fish
													</div>
													<div class="col-12 lvl-2" onclick="_searchdb('Mud Fish')">
														Mud Fish
													</div>
													<div class="col-12 lvl-2" onclick="_searchdb('Nile Perch')">
														Nile Perch
													</div>
												</div>
											</div><!--inventory-animals-->
											
										</div><!--search by category-->
									</div><!--inventory-browse-->
									
									<div class="col-8" id="inventory-display">
										<p id="xhttpdemo">
										</p>
										<!--Display results here-->
										
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
<iframe name="hidden_iframe" style="display:none"></iframe>
<div class="modal" id="editAddItem">
	<span onclick="document.getElementById('editAddItem').style.display='none'" class="close" title="Close Modal">×</span>
	<div id="eAI-1" class="modal-content animate">		
		<div id="eAI-11">
		</div>
		<div id="eAI-12">
		</div>
		<div id="eAI-13">
			<form target="hidden_iframe">
				<label>Stock Quantity</label><br>
				<input id="quantity" name="quantity" type="number" min=0 max=9999999 step=0.01>
				<select name="units" id="units">
					<option value="kgs">Kilograms</option>
					<option value="grams">Grams</option>
					<option value="pieces">Pieces</option>
					<option value="units">Units</option>
					<option value="bunches">Bunches</option>
					<option value="bags">Bags</option>
					<option value="litres">Litres</option>
					
				</select>
				<br>
				<label>State</label><br>
				<select name="state" id="state">
					<option value="fresh">Fresh (Unprocessed)</option>
					<option value="dry">Dried</option>
					<option value="preprocessed">Pre-processed</option>
					<option value="prepackaged">Pre-packaged</option>
					<option value="Salted">Salted</option>
				</select><br>
				<label>Unit Price (UGX)</label><br>
				<input name="price" type="number" min=0 max=9999999 step=1 id="price">
				<br>
				<label>Item Description</label><br>
				<input type="text" name="description" id="description"><br>
				<label>Do you deliver?</label><br>
				<input type="radio" name="deliverable" value="yes" onclick='getradio("yes")'>Yes<br>
				<input type="radio" name="deliverable" value="no" onclick='getradio("no")'>No<br>
				<label>Deliverable Places</lable><br>
				<input type="text" name="dplace" id="dplace"><br>
				<button type="submit" onclick="submit_add_form()">Add to repository</button>
			</form>
		</div>
	</div>
</div><!--Edit-->
<script>
var deliverable="";
function getradio(option) {
console.log("getting radio");
	if(option=="yes") {
		deliverable="Y";
	} else if(option=="no") {
		deliverable="N";
	}
}
function submit_add_form() {
	var quantity=readval("quantity");
	var units=readval("units");
	var state=readval("state");
	var price=readval("price");
	var description=readval("description");
	var dplace=readval("dplace");
	var itemID = document.getElementById("slide_item_ID").innerHTML;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () { //When we get a reply from the webserver
	//Display success/failure status
		if(this.readyState==4 && this.status==200){
			console.log(this.responseText);
			if(this.responseText==true){ //Success. Close the modal
				document.getElementById("editAddItem").style.display="none";
				window.alert("Item successfully added");
			} else { //Failure. alert an error
				window.alert("There was a problem");
			}
		}
	}
	xhttp.open("GET", "add_item.php?itemID="+itemID+"&quantity="+quantity+"&units="+units+"&state="+
	state+"&price="+price+"&description="+description+"&deliverable="+deliverable+
	"&dplace="+dplace, true);
	xhttp.send();
}
function readval(id) {
	return	document.getElementById(id).value;
}
</script>
<!--*************************************************************************-->

<!--****************************THE SIGNUP FORM******************************-->

<!--*************************************************************************-->

	</body>
</html>
