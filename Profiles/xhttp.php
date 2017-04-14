<?php
session_start();
include "customErrorHandler2.php";
set_error_handler("customErrorHandler2");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
if(isset($_SESSION['UserID'])) {
	$UserID = $_SESSION['UserID'];
} else { //Kill script with error
	die("<error>Dafuq do you think you're doing? STOP!</error>
	<status>11</status>");
}

$table = filter($_REQUEST['table']);
//Access the database in search for item var
$servername = "localhost"; //This is bound  change when I upload to the real website.
$username = "aman";
$password = "password";
$database = "test";
$reply="<Items>";
$result="";
$conn = new mysqli($servername, $username, $password, $database);
if(!$conn->connect_error) {  //Connection successful. Do stuff
	if($table=="Items") {
	//Get the query
		$var = filter($_REQUEST['q']);
		
		$sql = "select ItemID, ItemName, Aliases, Category, Description, ImageURI from Items where ItemName like '%".$var."%' or Aliases like '%".$var."%'";
		$result = $conn->query($sql);
		if($result!=false) { //Check success
			if($result->num_rows > 0) { //Check the number of rows to return appropriate response when there are no results and when the query fails
				echo "<status>0</status>"; //Results found
				while($row = $result->fetch_assoc()) {
					$ItemID = $row['ItemID'];
					$ItemName = $row['ItemName'];
					$Aliases = setdefault($row['Aliases'], "empty");
					$Category = $row['Category'];
					$Description = setdefault($row['Description'], "No description");
					$ImageURI = setdefault($row['ImageURI'], "../icons/placeholder.png");
					//Convert to XML
					$reply=$reply."<Item><ItemID>".$ItemID."</ItemID><ItemName>".$ItemName."</ItemName><Aliases>".$Aliases."</Aliases><Category>".$Category."</Category><Description>".$Description."</Description><ImageURI>".$ImageURI."</ImageURI></Item>";//Build the XML
				}
				//Close the xml doc
				$reply=$reply."</Items>";
				//return the XML document to the page
				echo $reply;
			} else { //O results found
				echo "<status>1</status>";
			}
		
		} else { //There's a problem with excecution of the query
			echo "<status>2</status>"; //No results found
		} 
		$conn->close(); //Close the connection 
	} else if($table=="Repository") {
			$sql = "SELECT Items.ItemID AS ItemID,
					Items.ItemName AS ItemName,
					Items.Aliases AS Aliases,
					Items.Category AS Category,
					Items.Description AS DefaultDescription,
					Items.ImageURI AS ImageURI,
					TempTable.RepID AS RepID,
					TempTable.Quantity AS Quantity,
					TempTable.Units AS Units,
					TempTable.UnitPrice AS UnitPrice,
					TempTable.State AS State,
					TempTable.DateAdded AS DateAdded,
					TempTable.Description AS Description,
					TempTable.Deliverable AS Deliverable,
					TempTable.DeliverableAreas AS DeliverableAreas
					 FROM (SELECT * FROM Repository WHERE UserID='".$UserID."')
					 AS TempTable JOIN Items ON TempTable.ItemID = Items.ItemID";
		$result = $conn->query($sql);
		if($result!=false) { //If everything went well
			if($result->num_rows>0) { //non-zero results found
				echo "<status>0</status>";
				
				while($row=$result->fetch_assoc()) {//Fetch row by row
					$ItemID = $row['ItemID'];
					$ItemName = $row['ItemName'];
					$Aliases = setdefault($row['Aliases'], "None");
					$Category = $row['Category'];
					$DefaultDescription = setdefault($row['DefaultDescription'], "None");
					$ImageURI =	setdefault($row['ImageURI'], "None");
					$RepID = $row['RepID'];
					$Quantity = $row['Quantity'];
					$Units = $row['Units'];
					$UnitPrice = $row['UnitPrice'];
					$State = setdefault($row['State'], "None");
					$DateAdded = $row['DateAdded'];
					$Description = setdefault($row['Description'], "None");
					$Deliverable = $row['Deliverable'];
					$DeliverableAreas = $row['DeliverableAreas'];
					$reply.="<Item>";
					$reply.="<ItemID>".$ItemID."</ItemID>";
					$reply.="<ItemName>".$ItemName."</ItemName>";
					$reply.="<Aliases>".$Aliases."</Aliases>";
					$reply.="<Category>".$Category."</Category>";
					$reply.="<DefaultDescription>".$DefaultDescription."</DefaultDescription>";
					$reply.="<ImageURI>".$ImageURI."</ImageURI>";
					$reply.="<RepID>".$RepID."</RepID>";
					$reply.="<Quantity>".$Quantity."</Quantity>";
					$reply.="<Units>".$Units."</Units>";
					$reply.="<UnitPrice>".$UnitPrice."</UnitPrice>";
					$reply.="<State>".$State."</State>";
					$reply.="<DateAdded>".$DateAdded."</DateAdded>";
					$reply.="<Description>".$Description."</Description>";
					$reply.="<Deliverable>".$Deliverable."</Deliverable>";
					$reply.="<DeliverableAreas>".$DeliverableAreas."</DeliverableAreas>";
					$reply.="</Item>";
				}
				$reply.="</Items>";
				echo $reply;
			} else { //No results were found
				echo "<status>1</status>";
			}
			
		} else {//A problem occured during execution of the query
			echo "<status>2</status>";
		}
	} else if($table=='delete_item') {
		//Get the itemID
		$RepID = filter($_REQUEST['RepID']);
		$sql = "DELETE FROM Repository WHERE RepID='".$RepID."'";
		$result=$conn->query($sql);
		if($result==true) {
			echo "<status>0</status>";//Success
		} else {
			echo "<status>1</status>";//Failure
		}
		$conn->close();
	}
} else {
	echo "<status>2</status>"; //There's a problem with the connection to the database
}
function filter($entry) {
$entry = htmlspecialchars($entry); //Against any XSS and SQL injections
$entry = trim($entry); //Against SQL injections
$entry = stripslashes($entry);
return $entry; //Sanitized input
}
function setdefault($value, $default) {
	if($value==null) {
		return $default;
	} else {
		return $value;
	}
}
