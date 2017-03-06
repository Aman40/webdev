CREATE TABLE Users 
(
UserID CHAR(14), 
UserPassword VARCHAR(255) NOT NULL,/*Use a php hash function to hash the text password*/ 
JoinDate TIMESTAMP NOT NULL,
FirstName VARCHAR(20),
MiddleName VARCHAR(20), /*Middle Name CHAR(20)*/
LastName VARCHAR(20), /*Last Name	CHAR(20)*/
Sex ENUM('M','F','C') NOT NULL, /*Sex CHAR(M, F OR C for Company)*/
DoB DATE, /*Dob			DATE*/
CoName VARCHAR(50), /*Company name VARCHAR (100)*/
Email VARCHAR(50) NOT NULL, /*Email addresses VARCHAR (50)*/
Address VARCHAR(140), /*Address VARCHAR (140)*/
District VARCHAR(20) NOT NULL,/*District (Head offices) CHAR(50)*/
Website VARCHAR(30),/*Website VARCHAR(30)*/
PhoneNo CHAR(11) NOT NULL, /*Phone number INT(11) NOT NULL*/
About blob,
UNIQUE (PhoneNo),
PRIMARY KEY (UserID)
);
CREATE TABLE Items
(
ItemID CHAR(14), /*ItemID VARCHAR(PHP uniqid(I)) PRIMARY KEY*/
ItemName VARCHAR(20) NOT NULL,/*Name (select from category) VARCHAR (50)*/
Category VARCHAR(5) NOT NULL,
Description VARCHAR(140),/*Description VARCHAR(140)*/
ImageURI VARCHAR(50),/*ImageURL VARCHAR(50)*/
PRIMARY KEY (ItemID)
);

CREATE TABLE Repository
(
UserID CHAR(14),
ItemID CHAR(14),
Quantity DECIMAL(10,2) NOT NULL,
Units VARCHAR(10) NOT NULL,
UnitPrice INT(10) NOT NULL, /*(Shillings will be assumed, unless otherwise specified)*/
State VARCHAR(50), /*(Fresh/Dried/Other[Describe])*/
DateAdded TIMESTAMP NOT NULL, /*Date added DATE()*/
Deliv VARCHAR(140), /*Deliverable areas (if deliverable) VARCHAR (256)*/
PRIMARY KEY (UserID, ItemID),
FOREIGN KEY (UserID) REFERENCES Users(UserID),
FOREIGN KEY (ItemID) REFERENCES Items(ItemID)
);

/*Any other constraints will be applied on the forms*/
