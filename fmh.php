<!doctype html>
<?php
include "include.php";
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="col-3" id="categories"> <!--search by category-->
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
                                            function add_to_inventory() { //Hide inventory data onclick
                                                var x=document.getElementById('inventory-display');
                                                var y=document.getElementById('inventory-update');
                                                console.log(x.style.display);
                                                console.log(y.style.display);
                                                if(x.style.display=='block' && y.style.display=='none') {
                                                    console.log("Conditions fulfilled");
                                                    x.style.display='none';
                                                    y.style.display='block';
                                                } else {
                                                    x.style.display='block';
                                                    y.style.display='none';
                                                }
                                            }
                                            function rem_rep_item(i) {
                                                //Extract the node's itemID
                                                var RepID = getValue(itemNodeListr, i, 'RepID'); //Assuming the iremNodeListr object still exists
                                                //Access the db and delete the node;
                                                var xmlhttp = new XMLHttpRequest();
                                                xmlhttp.responseType = "document";
                                                xmlhttp.onreadystatechange = function() {
                                                    //Check the return status for success/failure
                                                    if(this.readyState==4 && this.status==200) {
                                                        var xmlDoc = this.responseXML;
                                                        console.log(xmlDoc);
                                                        var return_status = xmlDoc.getElementsByTagName("status")[0].childNodes[0].nodeValue;
                                                        if(return_status==0) { //Success. Rerun the _srchdb() function
                                                            alert("Item Deleted");
                                                        } else if(return_status==1) {
                                                            alert("A problem occurred");
                                                        } else {
                                                            console.log(return_status);
                                                            reveal1hide23('inventory-container', 'prof-container', 'prof-orders');
                                                        }
                                                    } else { //There was a problem at the server end
                                                        console.log("There was a problem!");
                                                        console.log(this.readyState);
                                                        console.log(this.status);
                                                    }
                                                }
                                                xmlhttp.open("GET", "xhttp.php?table=delete_item&RepID="+RepID, true);
                                                xmlhttp.send();
                                            }
                                            function update_rep_item(i) {
                                                itemID = getValue(itemNodeListr, i, 'itemID');
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
<script>
    function hide_show(elmtId) {
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

                <div class="col-9" id="r2c2">
					<div class="r2c2row col-12">
						<div class="r2c2row-content col-12" id="inventory-display">
<!--Replaced with code to extract available items from database. Populated using id-->
						</div><!--r2c2row-content col-12-->
<script>
    function _checkenterkey(event) {
        if(event.key=='Enter') { //If it's the enter key, call the _searchdb function
            //The _searchdb function will extract the info, call the appropriate
            //div by id and display the data.
            event.preventDefault(); //Prevents the defaul of submitting the form + refreshing
            _searchdb(document.getElementById('inventory-search').value);
        }
    }

    var itemNodeList;
    //TODO: Edit _searchdb function to allow to send a different table with the query
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
                                html+="<span class='dash_item_name'>"+getValue(itemNodeList, i, 'ItemName')+"</span>";
                                html+="</div><!--item-slide-header-->"
                                html+="</div>";
                                document.getElementById("inventory-display").innerHTML+=html;
                            }
                        } else {
                            console.log("0 results were found");
                        }
                    } else if(returnStatus==1) { //returnStatus (defined in the php). 1=No results found.
                        console.log("No matching results were found");
                    } else if(returnStatus==2) { //2=Problem with the mysql query
                        console.log("There was a problem with the mysql query")
                    } else if(returnStatus==3) { //3=couldn't connect to the database
                        console.log("There was a problem connecting to the database");
                    } else if(returnStatus==11) {
                        window.alert("Please log in");
                    }
                } else { //For some weird reason, no XML, null returned.
                    console.log("The is no response XML");
                }
            }
        }
        xhttp.open("GET", "Profiles/xhttp.php?table=nonlogged&q="+str, true);
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
        xmlhttpr.open("GET", "xhttp.php?table=nonlogged", true);
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
    //What lays below is read as the page loads, hence displaying the inventory
    var ddata;
    ddata = _searchdb("");
    console.log(ddata)
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
