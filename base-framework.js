//First, here below, I get the objects I might need to use
var sideNav = document.getElementById("navpaneid");
var headDiv = document.getElementsByClassName("headdiv")[0];
var horNavBar = document.getElementById("hornavbarid");
var mainDiv = document.getElementsByClassName("maindiv")[0];
var revealer = document.getElementById("reveal-navpane");
var floatingPane = document.getElementsByClassName("floating-navpane")[0];
var mainContentPane = document.getElementsByClassName("maincontentpane")[0];
var hnbarid = document.getElementById("hornavbarid");
var sidepane = document.getElementsByClassName("sidepane")[0];
//Get width of the window excluding the scroll bar width
var mainDivWidth = window.innerWidth-15; 
//Get the width of the navigation pane on the left
var navPaneW = sideNav.offsetWidth;
//Set the left margin of the main content pane to be equal to the width of the
//navigation pane (navpane)
mainContentPane.style.margin = "0px 0px 0px " + navPaneW + "px";
//Now calculate the width of the main content pane by getting the width of the 
//parent (body/window) - width of the navpane
var width = mainDivWidth - navPaneW + "px";
//Assign that ^ to the main content pane
mainContentPane.style.width = width;
//Add an event listener to recalculate all the widths whenever the window size
//changes
window.addEventListener("resize", mainContentPaneWidth);
//call the resize function just in case the window size is small already
mainContentPaneWidth();
//This is the function responsible for all resizing calculations. It basically 
//repeats what's been done above, but for when the window is resized
function mainContentPaneWidth() { //What to do when the window is***************************resize
	//Change the width of the main div
	var navPaneW = sideNav.offsetWidth;
	var mainDivWidth = window.innerWidth-15; //get the window size
	var width = mainDivWidth - navPaneW + "px"; //Width for maincontentpane
	mainContentPane.style.width=width;
	//fix the size of the horizontal navbar
	document.getElementById("hornavbarid").style.width = 
	mainDiv.offsetWidth-15 + "px";
	//hide the navigation pane when the window size is <1000px	
	//Maximize the main content container	
	if(mainDivWidth<1000) {
		
		sideNav.className="nphidden"; //np=navepane
		
		mainContentPane.style.margin="0px";
		mainContentPane.style.width="100%";
		document.getElementsByClassName("contentdiv")[0].style.width="100%";
		sidepane.style.display="none";
	}
	else if(mainDivWidth>=1000) { //put everything back when the width>1000
		if((sideNav.className=="nphidden" | sideNav.className=="navpanescroll") && horNavBar.className=="hornavbarscrolled") {
			sideNav.className="navpanescroll";
		} else {
			sideNav.className="navpane";
		}
		mainContentPane.style.margin="0px 0px 0px " + navPaneW +"px";
		document.getElementsByClassName("contentdiv")[0].style.width="80%";
		sidepane.style.display="block";
	}
}

//diff is the space in the head container (headdiv) that is not the horizontal
//navigation bar (hornavbar). When the user scrolls by that much and it's the 
//navbar on top, it should remain there.
var diff = headDiv.offsetHeight-horNavBar.offsetHeight;
//In the event the user scrolls down, the horizontal navigation bar (hornavbar)
//should be fixed at the top of the screen
function onScrolling() {//*******************************************************************scroll
	//change the vertical position of the side navigation pane
	if(mainDiv.scrollTop>diff) //If scrolled up
	{
	//Change to a class where the horizontal navbar is fixed on the top
		horNavBar.className="hornavbarscrolled";
		//reduce the width of the fixed hornavbarscrolled by the width of the
		//scroll bar(15px)
		document.getElementsByClassName("hornavbarscrolled")[0].style.width = 
		mainDiv.offsetWidth-15 + "px";
		//change the class of the navbar to a classwhere the whole pane is 
		//invisible
		
		if(sideNav.className == "navpane"){
			sideNav.className="navpanescroll";
		} 
	} 
	//Undo everything in the if statement when the user scrolls back
	else {
		horNavBar.className="hornavbar";
		if(sideNav.className == "navpanescroll"){
			sideNav.className="navpane";
		} 
	}
}
//Add the scroll event listener to the main window object
window.addEventListener("scroll", onScrolling, true); 
//Time to hide and reveal the navpane
function hiderevealNavPane() {//"sideNav object****************************************************mouseover
//Before revealing it from hiding, check if the page is in a scrolled state so 
//We can return it to the floatig-navpane or navpanescroll class accordingly
	if(sideNav.className == "nphidden") {
	 	sideNav.className="floating-navpane";
	 	document.getElementsByClassName("floating-navpane")[0].style.top = 
		headDiv.offsetHeight + "px"; //THIS IS BOUND TO CHANGE TO A MORE DYNAMIC FUNCTION
 	}
	else if(sideNav.className == "floating-navpane") {
		sideNav.className = "nphidden";
	}
}

revealer.addEventListener("click", hiderevealNavPane);








//Next pick-up is from line 88
//Task 2017/02/15: The reveal navpane thing shouldn't scroll away with the page





























