document.addEventListener("readystatechange", function(event) {
	if(event.target.readyState == "interactive") {
        document.getElementById("traingle-icon").addEventListener("click", traingle_icon);

        function traingle_icon() {
            let element_1 = document.getElementById("search-box");
            element_1.classList.toggle("shown");
            element_1.classList.toggle("hidden");
            let element_2 = document.getElementById("search-list");
            element_2.classList.toggle("hidden");
            element_2.classList.toggle("shown");
        }
		
	}
});