let sliderInterval = null;


// slider
var slideIndex = 2;
function plusDivs(n) {
    if(sliderInterval) clearInterval(sliderInterval);
    /*sliderInterval = setInterval(() => {
        plusDivs(1);
    }, 5000);*/
    showDivs(slideIndex += n, slideIndex);
}
function showDivs(n, oldN) {
    if(!oldN) oldN = n-1;
    let newN = String(n);
    // get the slidecounter
    var slidecounter = document.getElementById('slidecounter');
    // get all elements with class="slide"
    var x = document.getElementsByClassName("slide");
    // if n is bigger than the number of elements, set n to 1
    if (n > x.length-1) slideIndex = 0;
    // if n is smaller than 1, set n to the number of elements
    else if (n < 0) slideIndex = x.length-1;
    // else set n to n
    else slideIndex = n;
    // change the display of elements
    for (let i = 0; i < x.length; i++) {
        if(i == slideIndex) {
            x[i].style["z-index"] = x.length;
            x[i].style.display = "block";
            x[i].style.transform = "translateX(0%)";
        } else if(i == slideIndex+1 || (slideIndex+1 > x.length-1   && i == 0)) {
            if(oldN < newN) x[i].style["z-index"] = x.length-1;
            else x[i].style["z-index"] = x.length-2;
            x[i].style.display = "block";
            x[i].style.transform = "translateX(100%)";
        } else if(i == slideIndex-1 || (slideIndex-1 < 0            && i == x.length-1)) {
            if(oldN > newN) x[i].style["z-index"] = x.length-1;
            else x[i].style["z-index"] = x.length-2;
            x[i].style.display = "block";
            x[i].style.transform = "translateX(-100%)";
        } else {
            x[i].style["z-index"] = x.length-3;
            x[i].style.display = "none";
            x[i].style.transform = "translateX(0%)";
        }
    }
    // change the slidecounter
    slidecounter.innerHTML = slideIndex + 1 + '/' + x.length;
}