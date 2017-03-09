<!doctype html>
<?php
include "customErrorHandler.php";
set_error_handler("customErrorHandler");
session_start();
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
								F<span style="letter-spacing: -23px">MH</span>
							</h1>
						</div><!--r1c1-->
						
						<div id="min-prof">
						
							<div id="prof-pic">
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
							<a href="#">Sign In</a>
							<a href="#">Sign up</a>
							<form>
							  <input type="text" name="search" placeholder="Search..">
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
				<div class="col-7" id="r2c2">
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
				<div class="col-2" id="r2c3">
				
				</div><!--r2c3-->
			</div><!--row-2-->
			<div id="row-3"> <!--This will contain the footer-->
			</div><!--row-3-->
		</div><!--Main wrapper-->
	</body>
</html>
