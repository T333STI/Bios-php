window.addEventListener("load", function ()
{
	const preloader = document.getElementById("preloader");
	setTimeout(function ()
	{
		preloader.classList.add("fade");
		console.log('hey, why are you looking here... :sad:')
	}, 1000);
});