const navBtn = document.querySelector('.nav__btn');
if(!!navBtn) navBtn.addEventListener('click', ()=>{
	navBtn.classList.toggle("is--opened");
	document.querySelector('.nav__menu--hidden').classList.toggle('is--opened');
})