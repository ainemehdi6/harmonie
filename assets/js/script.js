
function AddEventBoxOn() {
	var popup = document.getElementById("job_post");
    var main = document.getElementsByName("main");
    var header = document.getElementsByName("header");
    var footer = document.getElementsByName("footer");
    popup.classList.toggle("active");
    main.classList.toggle("overlay");
    header.classList.toggle("overlay");
    footer.classList.toggle("overlay");
}
function AddEventBoxOff() {
	var popup = document.getElementById("job_post");
    var main = document.getElementsByName("main");
    var header = document.getElementsByName("header");
    var footer = document.getElementsByName("footer");
    popup.classList.toggle("active");
    main.classList.remove("overlay");
    header.classList.remove("overlay");
    footer.classList.remove("overlay");
}




