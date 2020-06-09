function displayPostOrEvents(array, div)
{
	array.forEach(function(e) {
   		var category = e.category;
   		var clickable = e.clickable;
   		var created_at = e.created_at;
   		var overview = e.overview;
   		var paragraph = e.paragraph;
   		var title = e.title;

   		var options = {year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };

   		var divValue = document.createElement("div");
   		divValue.classList.add('value');

   		// check if data is clickable
   		if (clickable == 1) {
   			var spanClickable = document.createElement("span");
   			spanClickable.classList.add('clickable');
   			spanClickable.innerHTML = title;

   			var spanHidden = document.createElement("span");
   			spanHidden.classList.add('hidden');
   			spanHidden.innerHTML = category;

   			divValue.appendChild(spanClickable);
   			divValue.appendChild(spanHidden);
   		} else {
   			var span = document.createElement("span");
   			span.innerHTML = title;
   			divValue.appendChild(span);
   		}

		var postedDate = document.createElement("p");

		// check if array is an upcoming event
		if (div.classList.indexOf('upcomingEvents') > 0) {
			postedDate.classList.add('red');
		} 
		   		
   		postedDate.innerHTML = new Date(created_at).toLocaleDateString("en-US", options);
   		
   		div.appendChild(divValue);
   });
}

   