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
const coursesWrap = document.querySelector('#courses-section .secrion__scroll-wrapper');
const coursesArr = document.querySelectorAll('#courses-section .courses')
if (!!coursesWrap && !!coursesArr.length) {
	let lastScrollTop = 0;
	coursesWrap.addEventListener('scroll', ()=> {
		let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		for (let i=0; i<coursesArr.length; i++) {
			if (coursesWrap.getBoundingClientRect().y == coursesArr[i].getBoundingClientRect().y ) {
				let scrollTop = coursesArr[0].getBoundingClientRect().y;
				if (scrollTop > lastScrollTop) { // Scroll-up
					if(i!==0) coursesArr[i-1].classList.add('is--active')

					coursesArr[i].classList.add('is--active')
					coursesArr[i].classList.remove('is--prev')

					if(i!==coursesArr.length-1) coursesArr[i+1].classList.remove('is--active')
				} else { // Scroll-down
					if(i!==0) coursesArr[i-1].classList.remove('is--active')
					if(i!==0) coursesArr[i-1].classList.add('is--prev')

					coursesArr[i].classList.add('is--active')
				}
				lastScrollTop = scrollTop
			}
		}
	});
}