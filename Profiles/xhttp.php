<?php
$var = filter($_REQUEST['q']);
//Access the database in search for item var
$servername = "localhost"; //This is bound  change when I upload to the real website.
$username = "aman";
$password = "password";
$database = "test";
$reply="<Items>";
$result="";
$conn = new mysqli($servername, $username, $password, $database);
if(!$conn->connect_error) {  //Connection successful. Do stuff
	$sql = "select ItemID, ItemName, Aliases, Category, Description, ImageURI from Items where ItemName like '%".$var."%' or Aliases like '%".$var."%'";
	$result = $conn->query($sql);
	if($result==false) {
		die("No results for ".$var."");
	} else {
		echo "I got ".$result->num_rows." results";
	}
	if($result->num_rows > 0) { //Check success
		while($row = $result->fetch_assoc()) {
			$ItemID = $row['ItemID'];
			$ItemName = $row['ItemName'];
			$Aliases = $row['Aliases'];
			$Category = $row['Category'];
			$Description = $row['Description'];
			$ImageURI = $row['ImageURI'];
			//Convert to XML
			$reply=$reply."<Item><ItemID>".$ItemID."</ItemID><ItemName>".$ItemName."</ItemName><Aliases>".$Aliases."</Aliases><Category>".$Category."</Category><Description>".$Description."</Description><ImageURI>".$ImageURI."</ImageURI></Item>";//Build the XML
		}
		//return the XML to the page
		$reply=$reply."</Items>";
		echo $reply;
	} else {
		echo "No results found";
	} 
	$conn->close(); //Close the connection 
} else {
	echo "There's a problem with the connection to the database";
}
function filter($entry) {
$entry = htmlspecialchars($entry); //Against any XSS and SQL injections
$entry = trim($entry); //Against SQL injections
$entry = stripslashes($entry);
return $entry; //Sanitized input
}
?>
