<div class='posts-and-events'>
	<div class="items">
		<div class="top"><h2>Upcoming Events</h2></div>
		
		<div class="bottom upcomingEvents">
		</div>
	</div>

	<div class="items">
		<div class="top"><h2>Latest Post</h2></div>
		<div class="bottom latestPosts">
			
		</div>
	</div>

	<div class="items">
		<div class="top"><h2>Categories</h2></div>
		<div class="bottom">
			<div class="value">
				<a href="{{ url('/updates/announcement-overview') }}">Announcement </a>
			</div>
			<div class="value">
				<a href="{{ url('/updates/news-and-events-overview') }}">News and Events</a>
			</div>
		</div>
	</div>
</div>

@push('scripts')
	<script type="text/javascript">
		$( document ).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				}
			});

		    $.ajax({
		        url: "{{url('/updates/update-latest-data')}}",
		        type: 'GET',
		        success: function(data) {

		        	// ------------------ [ LATEST POST ] ------------------
		        
			       data.latestPosts.forEach(function(e) {
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
			       		postedDate.innerHTML = new Date(created_at).toLocaleDateString("en-US", options);

			       		divValue.appendChild(postedDate);

			       		document.querySelector('.latestPosts').appendChild(divValue);
			       });


			       // ------------------ [ UPCOMING EVENTS ] ------------------

			       // check if there's an upcoming events
			       if (data.upcomingEvents.length > 0) {
				      	 data.upcomingEvents.forEach(function(e) {
				       		var category = e.category;
				       		var clickable = e.clickable;
				       		var created_at = e.created_at;
				       		var overview = e.overview;
				       		var paragraph = e.paragraph;
				       		var title = e.title;

				       		var options = {year: 'numeric', month: 'long', day: 'numeric'};

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
				       		postedDate.classList.add('red');
				       		postedDate.innerHTML = new Date(created_at).toLocaleDateString("en-US", options);

				       		divValue.appendChild(postedDate);

				       		document.querySelector('.upcomingEvents').appendChild(divValue);
				       });
			       } else {
			       		
			       		var divValue = document.createElement("div");
			       			divValue.style.cssText = 'text-align:center;';
				       		divValue.classList.add('value');

			       		var span = document.createElement("span");
			       			span.innerHTML = 'No Upcoming events';
			       			span.style.cssText = 'color:black;';
			       			divValue.appendChild(span);

				       	document.querySelector('.upcomingEvents').appendChild(divValue);
			       }
			      
			       // load scripts with ajax
			       $.getScript("http://testing.test/js/app.js");
			    },
			    error: function(data) {
			        console.log('Error:', data);
			    },
		    });
	    });
	</script>
@endpush