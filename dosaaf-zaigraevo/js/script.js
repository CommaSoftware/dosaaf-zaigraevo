// Navigation opening & Header floating
const navBtn = document.querySelector('.nav__btn');
const header = document.querySelector('.header');

if (!!navBtn) navBtn.addEventListener('click', ()=>{
	navBtn.classList.toggle("is--opened");
	document.querySelector('.nav__menu--hidden').classList.toggle('is--opened');

	const navLinks = document.querySelectorAll('.nav__menu--hidden a');
	for (let navLink of navLinks) {
		navLink.addEventListener('click', ()=> {
			if (navBtn.classList.contains('is--opened')) {
				navBtn.classList.toggle("is--opened");
				document.querySelector('.nav__menu--hidden').classList.toggle('is--opened');
				header.classList.remove('is--hiding')
			};
		})
	}
})

if (!!header && !!navBtn) {
	let last_scroll = 0;
	window.addEventListener('scroll', ()=>{
		window.scrollY > last_scroll && !navBtn.classList.contains("is--opened")
		? header.classList.add('is--hiding')
		: header.classList.remove('is--hiding')
		last_scroll = window.scrollY;
	});
}


// Courses Slider
const coursesArr = document.querySelectorAll('#courses-section .courses')
// if (!!coursesArr.length) {
// 	window.addEventListener('scroll', ()=> {
// 		document.getElementById('showScroll').innerHTML = pageYOffset + 'px';

// 	});
// }