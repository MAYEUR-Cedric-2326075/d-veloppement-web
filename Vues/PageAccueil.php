<?php
include 'fonctions.php';

class PageAccueil {
    public function show(): void {
        ob_start();
        haut_page();
        header_page();
        ?>
        <div id="slider">
            <div class="slide" id="slide3">
                <img class="img" src="../Images/Slider3.jpg">
            </div>
            <div class="slide" id="slide2">
                <img class="img" src="../Images/Slider2.jpg">
            </div>
            <div class="slide" id="slide1">
                <img class="img" src="../Images/Slider1.jpg">
            </div>
            <button class="slidebutton left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="slidebutton right" onclick="plusDivs(1)">&#10095;</button>
            <p id="slidecounter">Page</p>
        </div>
        <main>

        </main>
        <?php
        bas_page();
    }
}
?>