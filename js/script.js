const buttontoscrollUp = document.querySelector("#buttontoscrollUp");

buttontoscrollUp.addEventListener("click", function() {

	window.scrollTo ({
		top: 0,
		left:  0,
		behavior: "smooth"
		});
});