<!DOCTYPE html>
<html>
    <head>
        <title>Index page</title>
    </head>
    <body>
        <?php include './nav.php'?>

        <div id="home-container">
            <div class="slideshow-container">

                <div class="mySlides fade">
                     <div class="numbertext">1 / 3</div>
                    <img src="./resources/house1.jpg" style="width:100%">
                    <div class="text">Listing Price:$525,000</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="./resources/house2.jpg" style="width:100%">
                    <div class="text">Listing Price:$325,000</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="./resources/house3.jpg" style="width:100%">
                    <div class="text">Listing Price:$382,000</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <div id="Slogan-container">
            <p id="Slogan">Where your homebuying experience is as smooth as possible</p>
            <a class="searching" href="./search/src/search.php">Start Searching</a>
        </div>
        </div>
    </body>
    <script src="script.js"></script><br>
    <script src="./search/src/index.js"></script><br>
</html>