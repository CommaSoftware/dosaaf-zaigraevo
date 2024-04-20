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
	let prevWrap = coursesWrap.closest('#courses-section').previousElementSibling;
	let nextWrap = coursesWrap.closest('#courses-section').nextElementSibling;

	let wheelEvents = ['mousewheel', 'wheel'];

	for(wheelEvent of wheelEvents) {
		prevWrap.addEventListener(wheelEvent, (e)=> { if (e.deltaY > 0) coursesWrap.scrollIntoView({ behavior: 'smooth' }) });
		nextWrap.addEventListener(wheelEvent, (e)=> { if (e.deltaY < 0) coursesWrap.scrollIntoView({ behavior: 'smooth' }) });
		coursesWrap.addEventListener(wheelEvent, (e)=> {
			e.preventDefault()
			let current = document.querySelector('#courses-section .courses.is--active');
			for (let i=0; i<coursesArr.length; i++) {
				if (current == coursesArr[i]) {
					if (e.deltaY > 0) { // Scroll-up
						if(!!coursesArr[i+1]) {
							coursesArr[i].classList.remove('is--active')
							coursesArr[i].classList.add('is--prev')
	
							coursesArr[i+1].classList.add('is--active')
						} else {
							nextWrap.scrollIntoView({ behavior: 'smooth' })
						}
					} else { // Scroll-down
						if(!!coursesArr[i-1]) {
							coursesArr[i-1].classList.add('is--active')
							coursesArr[i-1].classList.remove('is--prev')
	
							coursesArr[i].classList.remove('is--active')
						} else {
							prevWrap.scrollIntoView({ behavior: 'smooth' })
						}
					}
				}
		}
		});
	}
}