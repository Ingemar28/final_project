function traingle_icon() {
    let element_1 = document.getElementById("search-box");
    element_1.classList.toggle("shown");
    element_1.classList.toggle("hidden");
    let element_2 = document.getElementById("search-list");
    element_2.classList.toggle("hidden");
    element_2.classList.toggle("shown");
}

function star(num){
    let element = document.querySelector(".collect")
    element.classList.remove("hidden")
    // console.log(num == 1)
    if (num == 2 || num == 3){
        document.querySelector(".collect > h3").textContent = "Not Collected"
        document.querySelector(".collect > img").style.display = "none"
        document.querySelector(".collect > h4").style.display = "none"
        document.querySelector(".collect > p:first-of-type").textContent = "Check out requirements on mission board"
        document.querySelector(".collect > a").style.display = "block"

    }
    else{
        document.querySelector(".collect > h3").textContent = "Collected"
        document.querySelector(".collect > img").style.display = "block"
        document.querySelector(".collect > h4").style.display = "block"
        document.querySelector(".collect > a").style.display = "none"
        if (num == 1){
            document.querySelector(".collect > p:first-of-type").textContent = "10:25PM 31-09-2022"
        }
        else if (num == 4){
            document.querySelector(".collect > p:first-of-type").textContent = "12:40AM 16-10-2022"

        }
        else{
            document.querySelector(".collect > p:first-of-type").textContent = "08:55PM 11-09-2022"
        }
    }
    
    let star = document.querySelectorAll('.stars');

    star.forEach(star => {
        star.classList.remove('selected');
    });

    document.getElementById("star-" + num).classList.toggle("selected");
}

function moon_ajax_js(){
    // Create an XMLHttpRequest object
    const xhttp = new XMLHttpRequest();
    console.log(document.getElementById("time").value)
    // Define a callback function
    xhttp.onload = function() {
        console.log(this.responseText);
        document.getElementById("moon-phase").src = this.responseText;
    }

    // Send a request
    xhttp.open("GET", "phpController.php?js=true&funname=load_moon()&date=" + document.getElementById("time").value);
    xhttp.send();

}

function star_ajax_js(){
    // Create an XMLHttpRequest object
    const xhttp = new XMLHttpRequest();
    console.log(document.getElementById("time").value)
    // Define a callback function
    xhttp.onload = function() {
        console.log(this.responseText);
        document.getElementById("starchart").src = this.responseText;
    }

    // Send a request
    xhttp.open("GET", "phpController.php?js=true&funname=load_star()&date=" + document.getElementById("time").value);
    xhttp.send();

}

function preview() {
    blah.src=URL.createObjectURL(event.target.files[0]);
    blah.id="preview-photo";
}