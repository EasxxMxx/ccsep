$(document).ready(function () {
    // Get all elements with class="box" and remove the class "active"
    var boxes = document.querySelectorAll('.sidebar a');
    // Loop through each box and add a click event listener
    boxes.forEach(function(box) {
        box.addEventListener('click', function() {
            // Remove 'active' class from all boxes
            boxes.forEach(function(b) {
                b.classList.remove('active');
            });

            // Add 'active' class to the clicked box
            box.classList.add('active');
        });
    });
});