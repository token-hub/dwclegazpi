const inputs = document.querySelectorAll('.input-control');
const checkboxes = document.querySelector('.checkboxes-placeholder');
const checkboxesContainer = document.querySelector('.checkbox-container');
const checkboxInputs = document.querySelectorAll('.checkbox-container .checkbox-item input[type=checkbox]');
const labels = document.querySelectorAll('.dashboard-input label');
const showHidePassword = document.querySelectorAll('.password');
const eye  = document.querySelectorAll('.password-content i');
var permissions = document.querySelectorAll('.checkboxes-placeholder span');
var notificationMessage = document.querySelector('.notification-content ul li');

// check if there's error session
if (notificationMessage) {
	location.reload();
}

// ========== [ FORMS INPUT HOVER EFFECT FUNCTION ] ==========
inputs.forEach(function(e){
	// get the label of the form
	const label = document.querySelector('label[for="'+e.id+'"]');

	// check if input box has a value
	if (e.value !== "") {

		label.classList.add('dashboard-input-focus');
	} else {
			e.addEventListener('focus', function(){
				// activate label transition	
				label.classList.add('dashboard-input-focus');

				e.addEventListener("blur", function(){
					// check if input box has a value	
					if (e.value === "") {
						label.classList.remove('dashboard-input-focus');
					} 
				});
		}); 
	}
});

if (checkboxes) {
	var label = document.querySelector('label[for="'+checkboxes.nextElementSibling.getAttribute('for')+'"]');
	checkboxesContainer.classList.toggle('checkbox-visible');

	// check if checkbox div has a child
	if (checkboxes.childNodes) {
		label.classList.add('dashboard-input-focus');
	}

	if (permissions.length > 3) {
		removeElementsAndchangeCheckboxPlaceholder(permissions.length);
	}

	checkboxes.addEventListener('click', function(){
		checkboxesContainer.classList.toggle('checkbox-visible');
	});
}

// ========== [ CHECKBOX INPUT CLICK FUNCTION ] ==========
checkboxInputs.forEach(function(e){
	e.addEventListener('click', function(){
		e.parentNode.classList.toggle('highlighted');
		var selectedPermissions = document.querySelectorAll('.highlighted');
		
		var itemFound = 0;

		// check label already focused
		if (!label.classList.contains('dashboard-input-focus')) {
			label.classList.add('dashboard-input-focus');
		}

		selectedPermissions.forEach(function(f){
			if (f.firstElementChild.nextElementSibling.innerHTML == e.nextElementSibling.innerHTML+',') {
				itemFound++;
			}
		});

		// check if there's no matching records
		if (itemFound < 1) {

			// check user permissions on checkbox placeholder
			if (selectedPermissions.length > 3) {
				removeElementsAndchangeCheckboxPlaceholder(selectedPermissions.length);
			} else {

				// check if the checkbox clicked is highlighted - means not deselected
				if (e.parentNode.classList.contains('highlighted')) {
					var span = document.createElement('span');
					span.innerHTML = e.nextElementSibling.innerHTML + ', ';
					checkboxes.append(span);
				} else {

					// remove all child elements of checkbox placeholder
					while (checkboxes.firstChild) {
					    checkboxes.firstChild.remove();
					}

					// add the remaining selected permissions
					selectedPermissions.forEach(function(f){
						var selectedCheckboxText = f.firstElementChild.nextElementSibling.innerHTML;
						var span = document.createElement('span');
						span.innerHTML = selectedCheckboxText + ', ';
						checkboxes.append(span);
					});
				}

				// check if nothing is selected, then remove label focus
				if (selectedPermissions.length == 0) {
					label.classList.remove('dashboard-input-focus');
				}
			}
		}
	})
});

// ========== [ SHOW/HIDE PASSWORD EYE FUNCTION ] ==========
if (showHidePassword) {
	showHidePassword.forEach(function(e){
		// Show password hide/show button
		e.addEventListener('focus', function(){
			e.nextElementSibling.classList.add('dropdownShow');
			e.nextElementSibling.classList.add('visible');

			e.addEventListener('blur', function(){
				if (e.value == "") {
					e.nextElementSibling.classList.remove('visible');
				}
			});
		});
	})
}

// ========== [ PASSWORD EYE CHANGE INPUT TYPE FUNCTION ] ==========
if (eye) { 
	eye.forEach(function(e){
		e.addEventListener('click', function(){
			
			if (e.classList.contains('slash') != -1 ) {
				e.classList.toggle('fa-eye-slash');
				
				showHidePassword.forEach(function(f){
					if (e.previousElementSibling.id == f.id) {
						if (f.type === "password") {
						    f.type = "text";
						  } else {
						    f.type = "password";
						  }
					} 
				 });
			} 
		});
	});
}

function removeElementsAndchangeCheckboxPlaceholder(length) {
	// replace N permission is selected.
	while (checkboxes.firstChild) {
	    checkboxes.firstChild.remove();
	}

	var span = document.createElement('span');
	span.innerHTML = length+' permissions selected';
	checkboxes.append(span);
}