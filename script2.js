
function filterProducts() {
    var input = document.getElementById("searchInput");
    var filter = input.value.toLowerCase();
    

    var gallery = document.getElementById("gallery");
    var boxes = gallery.getElementsByClassName("image-box");
    
    //  I-loop ang bawat box
    for (var i = 0; i < boxes.length; i++) {
        // Kuhanin ang text content ng caption
        var caption = boxes[i].getElementsByClassName("main-caption")[0];
        var txtValue = caption.textContent || caption.innerText;
        
        // I-check kung ang filter (search term) ay nasa caption text
        if (txtValue.toLowerCase().indexOf(filter) > -1) {
            boxes[i].style.display = ""; // Ipakita ang box (kasama ang picture)
        } else {
            boxes[i].style.display = "none"; // Itago ang box
        }
    }
}