<?php
    $servername = "localhost";
    $username = "orcus";
    $password = "deco18007180";
    $dbname = "park";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM park WHERE shapeArea > 2000000;";
    $result = $conn->query($sql);

    $conn->close();
?>

<!doctype html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="description" content="UQ assignment">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Hsing-Yu Chen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StarGo</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        
    </head>

    <body class="page-find">

        <nav id="main-menu">

            <ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li class="current">
					<a href="find_park.php">Find Park</a>
				</li>
				<li>
					<a href="mission.html">Mission Board</a>
				</li>
                <li>
					<a href="community.html">Community</a>
				</li>
			</ul>

		</nav>

        <header id="page-header">

			<section class="banner-title">

                <div class="logo-title">

                    <h1>Find Park</h1>

                </div>
                <input type="search" placeholder="Search Location">
                <p>
                    You can browse the best parks for phtographing popular stars by selecting star categories, or you can locate the best nearby parks for stargazing by searching directly for geographical locations.
                </p>

			</section>

		</header>

        <main>

            <section id="popular-photos">
                
                <div class="title">
                    <h2>Star</h2>
                    <h2>Categories</h2>
                    
                    <p>popular stars for photography</p>
                    
                </div>
                
                <article id="star-icons">
                    <div>
                        <img src="images/icons8-aquarius-48.png" alt="Aquarius">
                        <p>Aquarius</p>
                    </div>
                    <div>
                        <img src="images/icons8-sagittarius-48.png" alt="sagittarius">
                        <p>Sagittarius</p>
                    </div>
                    <div>
                        <img src="images/icons8-cancer-48.png" alt="cancer">
                        <p>Cancer</p>
                    </div>
                    <div>
                        <img src="images/icons8-virgo-48.png" alt="virgo">
                        <p>Virgo</p>
                    </div>
                    <div>
                        <img src="images/icons8-libra-48.png" alt="libra">
                        <p>Libra</p>
                    </div>
                    <div>
                        <img src="images/icons8-leo-48.png" alt="leo">
                        <p>Leo</p>
                    </div>
                    <div>
                    <img src="images/icons8-taurus-48.png" alt="taurus">
                    <p>Taurus</p>
                </div>
                <div>
                    <img src="images/icons8-gemini-48.png" alt="gemini">
                    <p>Gemini</p>
                </div>
                <div>
                    <img src="images/icons8-aries-48.png" alt="aries">
                    <p>Aries</p>
                </div>
                <div>
                    <img src="images/icons8-pisces-48.png" alt="pisces">
                    <p>Pisces</p>
                </div>
                <div>
                    <img src="images/icons8-scorpio-48.png" alt="scorpio">
                    <p>Scorpio</p>
                </div>
            </article>
            
        </section>
        
        <section id="park-gallery">
            
            <div class="title">
                
                <h2>Park</h2>
                <h2>Gallery</h2>
                
                
            </div>
            
            
            <div>
                <?php
                    while($row = $result->fetch_assoc()) {
                ?>

                <article class="posts">
                    <a href="gallery.html"><img src="images/leyshonPark.png" alt="Leyshon Park" class="park-img"></a>
                    <div>
                        <h3><?php echo $row["parkName"];?></h3>
                        <h3>4.7</h3>
                    </div>

                    <div>
                        <?php echo "<p>Address:<br>". $row["houseNumber"] .", ". $row["streetAddress"] .", ". $row["suburb"] ."<br></p>"?>
                        <br>
                        <h4>Star Collection Progress (3/5)</h4>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star uncheck"></span>
                        <span class="fa fa-star uncheck"></span>
                        <div>
                            <img src="images/footprints.png" alt="footprints" class="post-icon">
                            <p>number of visitors</p>
                            <h4>3014</h4>
                        </div>
                        <div>
                            <img src="images/file.png" alt="file" class="post-icon">
                            <h4>5</h4>
                            <img src="images/insert-picture-icon.png" alt="file" class="post-icon">
                            <h4>2875</h4>
                            <img src="images/chat.png" alt="file" class="post-icon">
                            <h4>364</h4>
                        </div>
                    </div>

                    <div class="get-here">
                        <h3>Get Here</h3>
                        <p>open in your map</p>
                    </div>
                </article>

                <?php
                    }
                ?>
                
                <!-- <article class="posts">

                    <a href="#"><img src="images/goodwinPark.png" alt="Goodwin Park" class="park-img"></a>
                    <div>
                        <h3>Goodwin Park</h3>
                        <h3>4.5</h3>
                    </div>
                    <div>
                        <p>The hill to the south of the park is the clearest spot to photograph Cancer.</p>
                        <br>
                        <h4>Star Collection Progress (3/5)</h4>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>                        <span class="fa fa-star uncheck"></span>
                        <span class="fa fa-star uncheck"></span>
                        <div>
                            <img src="images/footprints.png" alt="footprints" class="post-icon">
                            <p>number of visitors</p>
                            <h4>5112</h4>
                        </div>
                        <div>
                            <img src="images/file.png" alt="file" class="post-icon">
                            <h4>7</h4>
                            <img src="images/insert-picture-icon.png" alt="file" class="post-icon">
                            <h4>211</h4>
                            <img src="images/chat.png" alt="file" class="post-icon">
                            <h4>314</h4>
                        </div>
                    </div>
                    <div class="get-here">
                        <h3>Get Here</h3>
                        <p>open in your map</p>
                    </div>
                    
                </article>
                
                <article class="posts">
                    
                    <a href="#"><img src="images/BerbyStreetPark.png" alt="BerbyStreetPark" class="park-img"></a>
                    
                    <div>
                        <h3>Berby Street Park</h3>
                        <h3>4.6</h3>
                    </div>
                    <div>
                        <p>The hill to the south of the park is the clearest spot to photograph Cancer.</p>
                        <br>
                        <h4>Star Collection Progress (3/5)</h4>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star uncheck"></span>
                        <span class="fa fa-star uncheck"></span>
                        <span class="fa fa-star uncheck"></span>
                        <span class="fa fa-star uncheck"></span>
                        <div>
                            <img src="images/footprints.png" alt="footprints" class="post-icon">
                            <p>number of visitors</p>
                            <h4>1571</h4>
                        </div>
                        <div>
                            <img src="images/file.png" alt="file" class="post-icon">
                            <h4>3</h4>
                            <img src="images/insert-picture-icon.png" alt="file" class="post-icon">
                            <h4>57</h4>
                            <img src="images/chat.png" alt="file" class="post-icon">
                            <h4>134</h4>
                        </div>
                    </div>
                    <div class="get-here">
                        <h3>Get Here</h3>
                        <p>open in your map</p>
                    </div>
                    
                </article>
                
                <article class="posts">
                    
                    <a href="#"><img src="images/nationalPark.png" alt="nationalPark" class="park-img"></a>
                    
                    <div>
                        <h3>National Park</h3>
                        <h3>4.3</h3>
                    </div>
                    <div>
                        <p>The hill to the south of the park is the clearest spot to photograph Cancer.</p>
                        <br>
                        <h4>Star Collection Progress (3/5)</h4>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star uncheck"></span>
                        <span class="fa fa-star uncheck"></span>
                        <span class="fa fa-star uncheck"></span>
                        <div>
                            <img src="images/footprints.png" alt="footprints" class="post-icon">
                            <p>number of visitors</p>
                            <h4>2888</h4>
                        </div>
                        <div>
                            <img src="images/file.png" alt="file" class="post-icon">
                            <h4>4</h4>
                            <img src="images/insert-picture-icon.png" alt="file" class="post-icon">
                            <h4>1323</h4>
                            <img src="images/chat.png" alt="file" class="post-icon">
                            <h4>266</h4>
                        </div>
                    </div>
                    <div class="get-here">
                        <h3>Get Here</h3>
                        <p>open in your map</p>
                    </div>
                    
                </article> -->
                
            </div>
            
        </section>
        
    </main>

        <footer id="page-footer">
            
            <div id="logo-name">
                
                <h1>Star Go</h1>
                
            </div>
            
            <div id="made-by">
                
                <h2>Made By</h2>
                
                <div id="students-names">
                    <p>Lin</p>
                    <p>Jerry</p>
                    <p>Ansley</p>
                    <p>Solar</p>
                </div>
                
            </div>
            
            <div id="contact-us">
                
                <h2>Contact Us</h2>
                
                <div id="contact-information">
                    
                    <h3>Mailbox</h3>
                    
                    <p>solarpark1226@gmail.com</p>
                    
                    <h3>Phone</h3>
                    
                    <p>0412345678</p>
                    
                </div>
                
            </div>
            
			<nav id="social-media">
                
                <ul>
                    
                    <li>
                        <a href=""></a>
					</li>
                    
				</ul>
                
			</nav>
            
		</footer>
        
    </body>
    
    </html>