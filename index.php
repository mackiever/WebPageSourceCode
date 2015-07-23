<?php 
    require 'MVC/Model/languages_db.php';
    require 'MVC/Model/myDatabase.php';

    
    //Get all programming languages from table programming_language and store in array $languages
    $languages = get_languages();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Max Macavilca</title>
		<link href="designCSS/index.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
	
		<div id="wrapper">
	
			<header>
				<h1>Welcome to my page</h1>
				<nav>
					<ul class="navList">                                   <!-- Display new message depending on link clicked -->
						<li><a href="">Home</a></li>
						<li id="live-link"><a href="#">Education</a></li>
						<li><a href="#">Experience</a></li>
						<li><a href="#">Future Plans</a></li>
						<li><a href="#">Contact Me</a></li>
					</ul>
				</nav>
			</header>
		
			<section id="sectionOne">   <!-- Display section element on left side of page -->
				<h1 id="testingP"></h1>
				<article>
					<p>Hello, my name is Max Macavilca.  I have designed this small project in order to introduce myself and
						for you to get to know me a little bit more.</p>
					<img  src="images/mypic.png" id="mypic"/>
				</article>
			</section
			><aside>                     <!-- Display aside element on right side of page -->
				<header><h2>Other Pages</h2></header>
				<ul class="misc">        <!-- Create links available for redirecting to other pages similar to clicking on images used by left/right arrows -->
					<li><a href="https://github.com/mackiever/WebPageSourceCode">GitHub source code</a></li>
					<li><a href="pages/US.html">Growing up in the U.S.</a></li>
					<li><a href="pages/origin.html">Origin of Max Macavilca</a></li>
					<li><a href="pages/classes.php">Rutgers/NJIT classes</a></li>
					<li><a href="pages/computerScience.html">Why Computer Science?</a></li
				></ul>
			</aside>
		
			<section id="sectionTwo">
				<nav>                   <!-- Create thumbnails in order to display on img element with id "display-image-now" -->
					<ul id="ul-list">   <!-- Once thumbnail is clicked and image changes, also set the link to the appropriate href attribute depending on thumbnail clicked -->
						<li><a href="images/USAFlag.jpg"><img src="images/thumbNails/USAFlag.jpg" title="US Flag"/></a></li>
						<li><a href="images/peruImg.jpg"><img src="images/thumbNails/peruImg.jpg" title="PERU flag"/></a></li>
						<li><a href="images/rutgers.jpg"><img src="images/thumbNails/rutgers.jpg" title="SPORTS"/></a></li>
						<li><a href="images/ComputerScience.jpg"><img src="images/thumbNails/ComputerScience.jpg" title="comp science" /></a></li>
					</ul>
				</nav>
				<div id="slide-show">       <!-- Display left/right buttons with arrow images.  Display image according to thumbnail clicked by user and change href attribute to redirect user to appropriate page -->
					<img src="images/leftArrow.jpg" id="left-click" alt="left Arrow Button"/><a href="pages/US.html"><img src="images/USAFlag.jpg" id="display-image-now" alt="Main picture"/></a><img src="images/rightArrow.jpg" id="right-click" alt="right arrow button"/>
				</div>
				<aside id="aside2">
					<form action="MVC/Controller/Store_languages.php" method="POST">     <!--store user's favorite language on database and display updated piechart -->
                        <select name="lang_id">                                          <!-- after "SEND" button is clicked -->
                            <option>select</option>
                            <?php foreach( $languages as $language ) : ?>                <!-- Refer to Line 7: get all programming languages from array -->
                                <option value="<?php echo $language[ 'id' ]; ?>">        <!-- $languages and display them on drop down menu-->
                                    <?php echo $language[ 'language_name' ]; ?>          <!-- Once user selects language, use attribute name "lang_id" to -->
                                </option><br />                                          <!-- send to Store_languages.php and store them in database-->
                            <?php endforeach; ?>                                         <!-- according to language id column.-->
                        </select><br/><br /><br />
                        <!--
                        <label for="user_name">Name</label>
                        <input type="text" name="name" /><br />
                        -->                        
                        <input type="submit" value="SEND" />
                        
                    </form>
                        <?php include( "MVC/Chart_Portion.php" ); ?>                    <!-- Display pie chart using google API after converting to json format -->
				</aside>
					<!-- <h1 id="newDiv"></h1>
						<article id="loadParagraph"><p>The links on the right will show you more about my personal life and some information about 
						my time as a student and goals for the near future.</p></article> 
					-->
			</section>
			<footer>
				&copy; Created By: Max Macavilca
			</footer>
	
		</div>
		<script src="JSFolder/navListWindow.js" type="text/javascript"></script>          <!-- Display new message window after links are clicked on ul element with class attribute "navList" -->
		<script src="JSFolder/jquery-2.1.1.min.js"></script>                              <!-- Call Jquery library from specific location, avoid depending on external links -->
		<script src="JSFolder/indexSlideShow.js" type="text/javascript"></script>         <!-- Use left/right arrows to change images  -->
		<script src="JSFolder/indexThumbNails.js" type="text/javascript"></script>        <!-- After thumbnail is clicked, display thumbnail image on main img element -->
		
	
	</body>

</html>