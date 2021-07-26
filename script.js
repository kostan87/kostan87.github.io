let links = document.querySelectorAll('a[href^="#"]'),
  pos = document.headerPosition.pos,
  header = document.querySelector('header'),
  topOffset = 0;
for (let one in pos) {
  one.addEventListener('click', function() {
	header.style.position = this.value;
	if (this.value !== 'static') {
		header.classList.add(this.value);
		document.body.classList.add('for-fixed');
		topOffset = header.offsetHeight;
		console.log(header.offsetHeight);
	} else {
		header.removeAttribute('class');
		document.body.classList.remove('for-fixed');
		topOffset = 0;
	}
  })
}

links.forEach(item => {
  item.addEventListener('click', function(e) {
	e.preventDefault();
	let href = this.getAttribute('href').slice(1);
	const targetElem = document.getElementById(href);

	const elemPosition = targetElem.getBoundingClientRect().top;
	const offsetPosition = elemPosition - topOffset;
	window.scrollBy({
		top: offsetPosition,
		behavior: 'smooth'
	});
  });
});
