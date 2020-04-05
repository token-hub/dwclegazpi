const sidebarDropdown = document.querySelectorAll('.left-content-link span');
if (sidebarDropdown !== null) {
	sidebarDropdown.forEach(function(e){
		e.addEventListener('click', function(){
			var sliderContent = e.parentNode.nextElementSibling;
			console.log(sliderContent);
			sliderContent.classList.toggle('content-dropdown-clicked');
			if (e.classList.contains('fa-sort-desc')) {
					e.classList.remove('fa-sort-desc') ;
					e.classList += ' fa-sort-asc';
			} else {
					e.classList.remove('fa-sort-asc') ;
					e.classList += ' fa-sort-desc'; 
			}
		});
	});
}


