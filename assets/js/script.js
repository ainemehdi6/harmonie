
function AddEventBoxOn() {
	var popup = document.getElementById("job_post");
    var main = document.getElementById("main");
    var footer = document.getElementById("footer");
    popup.classList.toggle("active");
    main.classList.toggle("overlay");
}
function AddEventBoxOff() {
	var popup = document.getElementById("job_post");
    var main = document.getElementById("main");
    popup.classList.toggle("active");
    main.classList.remove("overlay");
}




