

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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
    </head>

    <body class="page-home">

        <nav id="main-menu">

            <a href="login.html">Login</a>
            
            <ul>
				<li class="current">
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="find_park.html">Find Park</a>
				</li>
				<li>
					<a href="mission.html">Mission Board</a>
				</li>
                <li>
					<a href="">Community</a>
				</li>
			</ul>

		</nav>

        <header id="page-header">

			<section class="banner-title">

                <div class="logo-title">

                    <figure id="logo">
                        <img src="images/logo.png" alt="StarGo logo">
                    </figure>
                    
                    <h1>Star Go</h1>

                </div>

                <p>
                    It's time to go for Star Go and relax
                </p>

			</section>

		</header>

        <section id="popular-photos">

            <div class="title">

                <h2>Popular</h2>

                <h2>Photos</h2>
    
                <p>Today's Top Community Photography Showcase is here.</p>

            </div>


            <div>
                    
                <article class="posts">

                    <img src="images/rockandstars.JPEG" alt="Rock and stars">

                    <div class="wraper">
    
                        <h3 class="description">user account</h3>
                        
                    </div>

                    <p>Description</p>

                </article>


                <article class="posts">

                    <img src="images/fullmoon.JPEG" alt="Full moon">

                    <div class="wraper">
    
                        <h3 class="description">user account</h3>

                    </div>

                    <p>Description</p>
    
                </article>


                <article class="posts">

                    <img src="images/snowmountain.JPEG" alt="snow mountain">

                    <div class="wraper">
    
                        <h3 class="description">user account</h3>
                        
                    </div>

                    <p>Description</p>
    
                </article>

                <article class="posts">

                    <img src="images/starysky.JPEG" alt="starysky">

                    <div class="wraper">
    
                        <h3 class="description">user account</h3>
                        
                    </div>

                    <p>Description</p>
    
                </article>

            </div>

            <a class="btn" href="">Community&rarr;</a>

        </section>

        <section id="popular-parks">

            <div class="title">

                <h2>Popular</h2>

                <h2>Parks</h2>
    
                <p>Here are recommendations for popular stargazing parks.</p>

            </div>

            <div>

                <article class="posts">

                    <img src="images/leyshonPark.png" alt="Leyshon Park">

                    <div class="wraper">
    
                        <h3 class="description">Leyshon Park</h3>
                        
                    </div>

                    <div>

                        <p>Likes</p>

                        <a class="btn" href="">Go Here</a>

                    </div>
    
                </article>
    
                <article class="posts">

                    <img src="images/goodwinPark.png" alt="Goodwin Park">

                    <div class="wraper">
    
                        <h3 class="description">Goodwin Park</h3>
                        
                    </div>

                    <div>

                        <p>Likes</p>

                        <a class="btn" href="">Go Here</a>

                    </div>
    
                </article>

                <article class="posts">

                    <img src="images/BerbyStreetPark.png" alt="BerbyStreetPark">

                    <div class="wraper">
    
                        <h3 class="description">Berby Street Park</h3>
                        
                    </div>

                    <div>

                        <p>Likes</p>

                        <a class="btn" href="">Go Here</a>

                    </div>
    
                </article>

                <article class="posts">

                    <img src="images/nationalPark.png" alt="nationalPark">

                    <div class="wraper">
    
                        <h3 class="description">National Park</h3>
                        
                    </div>

                    <div>

                        <p>Likes</p>

                        <a class="btn" href="">Go Here</a>

                    </div>
    
                </article>

            </div>

            <a class="btn" href="">Find Park&rarr;</a>

        </section>

        <section id="search-star">

            <div class="title">

                <h2>Search</h2>

                <h2>Star</h2>
    
                <p>Here are recommendations for popular stargazing parks.</p>

            </div>

            <div id="search-bar">

                <form class="location" action="">
    
                    <label for="locations">Location: </label>
    
                    <select name="location" id="location">
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "root";
                            $dbname = "park";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT parkName FROM park WHERE id <= 10";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='". $row["parkName"]. "'>". $row["parkName"]. "</option>";
                                }
                            } else {
                                echo "0 results";
                            }

                            $conn->close();
                        ?>

                    </select>
    
                </form>
<!-- 
                <form class="star" action="">
    
                    <label for="star">Star: </label>
    
                    <select name="star" id="star">
                      <option value="Paris">Paris, French</option>
                      <option value="Rome">Rome, Italy</option>
                      <option value="Tokyo">Tokyo, Japan</option>
                      <option value="London">London, UK</option>
                      <option value="Kobenhavn">København, Denmark</option>
                      <option value="Agra">Agra, India</option>
                      <option value="Lofoten">Lofoten, Norway</option>
                      <option value="Brisbane">Brisbane, Australia</option>
                      <option value="New York">New York, USA</option>
                    </select>
    
                </form> -->

                <form class="time" action="">

                    <label for="time">Time: </label>
                    <?php
                        date_default_timezone_set('Australia/Brisbane');
                        echo "<input type='date' id='time' name='time' value='" .date('Y-m-d'). "'>";
                    ?>
                    <!-- <input type="datetime-local" id="time" name="time"> -->
                
                </form>

                <button name="search" onclick="moon_ajax_js(this.value)"><i class="material-icons">search</i>Search</button>
                <p id="search_date"></p>

            </div>

            <div id="search-result">

                <?php
                    require "phpController.php";
                    date_default_timezone_set('Australia/Brisbane');
                    echo "
                        <figure class='result'>
                            <img id='moon-phase' src='" . load_moon(date('Y-m-d')) . "'>
                        </figure>";     
                ?>

                <?php

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.astronomyapi.com/api/v2/studio/star-chart',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                        "observer": {
                            "latitude": -27.4705,
                            "longitude": 153.0260,
                            "date": "2022-10-18"
                        },
                        "view": {
                            "type": "area",
                            "parameters": {
                                "position": {
                                    "equatorial": {
                                        "rightAscension": 14.83,
                                        "declination": -15.23
                                    }
                                },
                                "zoom": 2
                            }
                        }
                    }',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic ZWMyZjdhODYtYzA4Mi00ZDkzLTk1M2EtZDU5NDA2N2RjZjQwOmNjNDU3Y2ExNWE4MDI0OTg0ZTljMGVjMmY3MjRkMDkxNGJhNThhMjAwZmU1OWU3ODU1MzhlY2M0ZTM2OTQ5MTRmOGQ4Zjk4NGI5ZTY4NmIyYWJjODBmOTVmMmMxMTYyYjlmZTEzMjVmNWMyYjQ2Y2U1ZTc4ODRiYTMzYjQwNjc5Y2JiZmZiOGQ4YjI3MTIyM2EzNTYzZmVmYTk1NzFkMGViNmQ2Zjc0ODI4ZmU5MjQ2ZTc1Mjk0YTlhNTMxM2E3MTk3OTA1NzI4Y2UyMzA2ZGJkYTFlNDkzZjhlZTY5YjEx',
                        'Content-Type: application/json'
                    ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);

                    $data = json_decode($response, true);

                    if(is_array($data)) {

                            $recordValue = $data["data"];

                            $recordImage = $recordValue["imageUrl"];

                    }

                    echo "
                    <figure class='result'>
                        <img id='starchart' src='" . $recordImage . "'>
                    </figure>";
                ?>

            </div>

        </section>

        <section id="upload-photos">

            <div class="title">

                <h2>Upload</h2>

                <h2>Photos</h2>
    
                <p>Upload your first star photographs here.</p>

            </div>

            <article class="upload-function">

                <div class="description">

                    <div id="user-info">

                        <figure class="profile">

                            <img src="images/profile.png" alt="user profile">

                            <h3>User Name</h3>

                        </figure>

                        <form>
                            <textarea>Some text...</textarea>
                        </form>

                    </div>

                    <div id="select-button">

                        <img src="images/logo.png" alt="star go">

                        <button onclick="location.href='find_park.html'"><i class="material-icons">place</i>Select Location</button>

                        <button onclick="location.href='mission.html'"><i class="material-icons">star</i>Select Mission</button>

                    </div>

                    
                </div>
                
                <div>

                    <div id="photo-preview">
                        
                        <input id="file-input" type="file" onchange="preview()">

                        <label for="file-input">
                            <img id="blah" src="images/insert-picture-icon.png" alt="picture icon">
                        </label>

                    </div>
                    
                    <button class="submit">Submit</button>
                    
                </div>

            </article>
            
            <img id="bottom-decorate" src="images/bottomstars" alt="bottom star">
        
        </section>

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

        <script src="js/script.js"></script>
        
        <script src="js/script.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

    </body>

</html>