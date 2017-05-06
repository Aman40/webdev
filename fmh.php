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
									<?php
										if($session_exists) {
											echo '<img src="Profiles/Pictures/'.$_SESSION["UserID"].'">';
										} else {
											echo '<img src="icons/profile-pic-male.jpg">';
										}
									?>
								</div><!--prof-picimg-->
								<div id="prof-pic-name">
									<?php
										if($session_exists) {
											echo '<span>Hello, '.$_SESSION["FirstName"].'. <a 
											href="logoff.php">Log Out</a></span>';
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
							<a href="#">Feed</a>
							<a href="Profiles/index.php">Home</a>
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
							  <input type="text" id="inventory-search" onkeydown="_checkenterkey(event)" name="search" placeholder="Search..">
                                <input type="button" onclick="javascript:_searchdb(document.getElementById('inventory-search').value)" value="Search">
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
						<div class="r2c2row-content col-12" id="inventory-display">
<!--Replaced with code to extract available items from database-->
						</div><!--r2c2row-content col-12-->
<script>
    function _checkenterkey(event) {
        if(event.key=='Enter') { //If it's the enter key, call the _searchdb function
            event.preventDefault();
            _searchdb(document.getElementById('inventory-search').value);
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
                    console.log(xmlDoc);
                    var returnStatus = xmlDoc.getElementsByTagName("status")[0].childNodes[0].nodeValue;
                    if(returnStatus==0) {
                        //get an itemNodeList object
                        itemNodeList = xmlDoc.getElementsByTagName("Items")[0].getElementsByTagName("Item");
                        //Purge the 'html' variable of previous search data
                        document.getElementById("inventory-display").innerHTML="";

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
                                document.getElementById("inventory-display").innerHTML+=html;
                            }
                        } else {
                            console.log("0 results were found");
                        }
                    } else if(returnStatus==1) { //returnStatus (defined in the php). 1=No results found.
                        console.log("No matching results were found");
                    } else if(returnStatus==2) { //2=couldn't connect to the database
                        console.log("There was a problem connecting to the database");
                    } else if(returnStatus==11) {
                        window.alert("Please log in");
                    }
                } else { //For some weird reason, no XML, null returned.
                    console.log("The is no response XML");
                }
            }
        }
        xhttp.open("GET", "Profiles/xhttp.php?table=Items&q="+str, true);
        xhttp.send();
    }

    var itemNodeListr;
    function _getInventory() {
        console.log("The function is running");
        var xmlhttpr = new XMLHttpRequest();
        xmlhttpr.responseType = "document";
        xmlhttpr.onreadystatechange = function() {
            if(this.readyState==4 && this.status==200) {//The request was fulfilled
                var xmlDoc = this.responseXML;
                console.log(xmlDoc);
                var returnStatus = xmlDoc.getElementsByTagName("status")[0].childNodes[0].nodeValue;
                if(returnStatus==0) {//Results were found
                    //get an itemNodeList object
                    itemNodeListr = xmlDoc.getElementsByTagName("Items")[0].getElementsByTagName("Item");
                    //Purge the 'html' variable of previous search data
                    var invDisplay = document.getElementById("inventory-display");
                    var html = "<div class='item-slide' onclick='javascript:add_to_inventory()' id='edit-inv-data'>";
                    html+="<img src='../icons/add.png'>"
                    html+="</div>"; //APPROPRIATE ID
                    invDisplay.innerHTML=html;

                    if(itemNodeListr.length>0) {
                        var i = 0;
                        var html="";
                        for(i=0;i<itemNodeListr.length; i++) {
                            html="<div class='item-slide'>";
                            html+="<div class='item-slide-image'>";
                            html+="<img src='"+getValue(itemNodeListr, i, 'ImageURI')+"'>";
                            html+="</div><!--item-slide-header-->"
                            html+="<div class='item-slide-content' id='itemid"+i+"'>"
                            html+="<table>";
                            html+="<tr>";
                            html+="<th>Name</th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'ItemName')+"</td>";
                            html+="</tr>";
                            html+="<tr>";
                            html+="<th>Other Names</th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'Aliases')+"</td>";
                            html+="</tr>";
                            html+="<tr>";
                            html+="<th>Description</th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'Description')+"</td>";
                            html+="</tr>";
                            html+="<tr>";
                            html+="<th>Quantity</th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'Quantity')+" "+getValue(itemNodeListr, i, 'Units')+"</td>";
                            html+="</tr>";
                            html+="<tr>";
                            html+="<th>Unit Price</th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'UnitPrice')+"</td>";
                            html+="</tr>";
                            html+="<tr>";
                            html+="<th>State</th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'State')+"</td>";
                            html+="</tr>";
                            html+="<tr>";
                            html+="<th>Description</th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'Description')+"</td>";
                            html+="</tr>";
                            html+="<tr>";
                            html+="<th>Added On</th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'DateAdded')+"</td>";
                            html+="</tr>";
                            html+="<th>Can Deliver? (Y/N) </th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'Deliverable')+"</td>";
                            html+="</tr>";
                            html+="<th>Can Deliver To: </th>";
                            html+="<td>"+getValue(itemNodeListr, i, 'DeliverableAreas')+"</td>";
                            html+="</tr>";
                            html+="</table>";
                            html+="</div><!--item-slide-header-->"
                            html+="<div id='addToRep'>";//ID means 'Add to repository'
                            html+="<button onclick='void(0)'><i class='fa fa-edit'></i> Edit</button>";
                            html+="</div>";
                            html+="<span onclick='rem_rep_item("+i+")' id='rem-rep-item"+i+"' class='close' title='Delete Item'>×</span>";
                            html+="</div>";
                            document.getElementById("inventory-display").innerHTML+=html;
                        }
                    }

                } else if(returnStatus==1) {//No Results found
                    console.log("No results were found");
                } else if(returnStatus==2) {//Problem connecting to the database
                    console.log("There was a problem connecting to the database");
                } else if(returnStatus==11) {//User is not logged in. Not even sure how that's possible
                    console.log("WTF? Is that even possible");
                }
            } else {//The request wasn't fulfilled for some reason
                console.log("The request couldn't be fulfilled!");
            }
        }
        xmlhttpr.open("GET", "xhttp.php?table=Repository", true);
        xmlhttpr.send()
    }
    function getValue(nodeList, index, tagName) { //This function is just to make things shorter ^
        var value = nodeList[index].getElementsByTagName(tagName)[0].childNodes[0].nodeValue
        return value;
    }
    function displaymodal(i) { //This function sets the data in the modal. i identifies the item
        var html=""; //in the itemNodeList
        html="<div width=100%>";
        html+="<img src='"+getValue(itemNodeList, i, 'ImageURI')+"'>";
        html+="</div>";
        document.getElementById("eAI-11").innerHTML=html;
        html="<div width=100%>";
        html+="<font size=6em position='center'>"+getValue(itemNodeList, i, 'ItemName')+"</font>";
        html+="<br>Other names:\t"+getValue(itemNodeList, i, 'Aliases');
        html+="<br>Description:\t"+getValue(itemNodeList, i, 'Description');
        html+="</div>";
        document.getElementById("item_submit_button").innerHTML="<button type='submit' onclick='submit_add_form("+i+")'><i class='fa fa-plus-square-o'></i>  Add to repository</button>";
        document.getElementById("eAI-12").innerHTML=html;
        document.getElementById("editAddItem").style.display="block";
    }
    var ddata;
    ddata = _searchdb("");
    document.getElementById("inventory-display").innerHTML=ddata;
</script>

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
    	
    	<lable><b>First Name</b></lable><span class="error"> *<?php echo " ".$fname_error ?></span>
		<input type="text" class="required" placeholder="First Name" name="fname" value="<?php if(isset($_POST['fname']) && $_POST['fname'] != null) echo $_POST['fname']; ?>" required>
		
		<lable><b>Middle Name</b></lable><span>
		<input type="text" placeholder="Middle Name" name="mname" value="<?php if(isset($_POST['mname']) && $_POST['mname'] != null) echo $_POST['mname']; ?>">
		
		<lable><b>Last Name</b></lable><span class="error"> *<?php echo " ".$lname_error ?></span>
		<input type="text" class="required" placeholder="Last Name" name="lname" value="<?php if(isset($_POST['lname']) && $_POST['lname'] != null) echo $_POST['lname']; ?>" required>
		
		<lable><b>Company Name</b></lable><span class="error"> <?php echo " ".$coname_error ?></span>
		<input type="text" placeholder="First Name" name="coname" value="<?php if(isset($_POST['coname']) && $_POST['coname'] != null) echo $_POST['coname']; ?>">
		
		<lable><b>Sex</b></lable><span class="error"> *<?php echo $sex_error ?></span><br>
		<input type="radio" class="required" name="sex" value="M" required >M<br>
		<input type="radio" class="required" name="sex" value="F" required >F<br>
		<input type="radio" class="required" name="sex" value="C" required >Company<br><br>
		
		<lable><b>Date of Birth</b></lable><span class="error"> *<?php echo $dob_error ?></span><br>
		<input type="date" class="required" class="wide" name="dob" required value="<?php if(isset($_POST['dob']) && $_POST['dob'] != null) echo $_POST['dob']; ?>"><br><br>
		
		<label><b>District of Operation</b></label><span class="error"> *<?php echo " ".$district_error ?></span>
		<input type="text" class="required" placeholder="District" name="district" value="<?php if(isset($_POST['district']) && $_POST['district'] != null) echo $_POST['district']; ?>" required>
		
		<label><b>Email</b></label><span class="warning"><?php echo " ".$email_error ?></span>
		<input type="text" placeholder="Enter Email" name="email" value="<?php if(isset($_POST['email']) && $_POST['email'] != null) echo $_POST['email']; ?>">
		
		<label><b>Address</b></label>
		<input type="text" placeholder="E.g Plot 35 Speke street, Kampala" name="address" value="<?php if(isset($_POST['address']) && $_POST['address'] != null) echo $_POST['address']; ?>">
		
		<label><b>Phone Number</b></label><span class="error"> *<?php echo " ".$phoneno_error ?></span>
		<input type="text" class="required" placeholder="E.g 0784596469" name="phoneno" value="<?php if(isset($_POST['phoneno']) && $_POST['phoneno'] != null) echo $_POST['phoneno']; ?>" required>
		
		<label><b>Website</b></label>
		<input type="text" placeholder="e.g www.domain.com" name="website" value="<?php if(isset($_POST['website']) && $_POST['website'] != null) echo $_POST['website']; ?>">
		
		<label><b>About Yourself</b></label><br>
		<textarea style="width: 100%" placeholder="About yourself..." name="about" value="<?php if(isset($_POST['about']) && $_POST['about'] != null) echo $_POST['about']; ?>"></textarea><br>

		<label><b>Password</b></label><span class="error"> * <?php echo " ".$upassword_error ?></span>
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
	var modalup = document.getElementById('id02');
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
