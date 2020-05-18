@extends('web.layouts.app')

@section('content')
	<div class='banner'>
		<img src="/storage/img/banner/contact-us.jpg">
	</div>

<div class='contact-us'>

	<div class="content-background"></div>
	<div class="content-background"></div>

	<div class="contact-content">
		<div class='contact-item'>
				<h1>Get in Touch</h1>
				<p> Please contact us through: </p> 
				<p><i class='fa fa-envelope'></i>dwclinfo@dwc-legazpi.edu</p>
				<p><i class='fa fa-phone'></i>(052)480-1239 &nbsp;&nbsp;&nbsp; (052)480-1239</p>
				<p><i class='fa fa-fax'></i><small>Telefax:</small> (052)480-2148 &nbsp;&nbsp;&nbsp; 481-0350 (HS)</p>
				<p><i class='fa fa-map-marker'></i><b>(SOUTH CAMPUS) - </b>
				cor.J.P Rizal and Fr. J.L. Bates Sts., Albay District, Legazpi City 4500 Philippines</p>
				<p><i class='fa fa-map-marker'></i><b>(NORTH CAMPUS) - </b>
				Capt. F. Aquende Drive, Cruzada, Legazpi City 4500 Philippines</p>
		</div>
		<div class='contact-item'>
			<div class='contact-us-form'>
				{!! Form::open(['action' => 'Web\EmailController@postSend', 'method' => 'POST']) !!}
					<div class='input-div'>
				    	{{Form::text('name', '', ['class' => 'contact-us-form-control', 'placeholder' => 'Name', 'autocomplete' => 'given-name'])}}
			    	</div>

			    	<div class='input-div'>
			    		{{Form::text('email', '', ['class' => 'contact-us-form-control', 'placeholder' => 'Email', 'autocomplete' => 'email'])}}
			    	</div>

			    	<div class='input-div'>
						{{Form::number('number', '', ['class' => 'contact-us-form-control', 'placeholder' => 'Number', 'autocomplete' => 'tel'])}}
			    	</div>

			    	<div class='input-div'>
						{{Form::text('subject', '', ['class' => 'contact-us-form-control', 'placeholder' => 'Subject', 'autocomplete' => 'given-name'])}}
			    	</div>

					<div class='input-div message'>
						{{Form::textarea('message', '', ['class' => 'contact-us-form-control', 'placeholder' => 'Message here...'])}}
						{{Form::submit('SEND', ['class' => 'btn btn-primary contact-us-submit-btn'])}}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<div class="mapouter">
	<div class="gmap_canvas">
		<iframe id="gmap_canvas" src="https://maps.google.com/maps?q=divine%20word%20college%20of%20legazpi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
		</iframe>
	</div>
</div>
@endsection


