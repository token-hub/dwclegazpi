@component('mail::message')
<style type="text/css">
	body {
		font-size: 18px;
		line-height: 30px;
		color: black;
	}

	.message-container {
		max-width: 600px;
		max-height: 200px;
		position: relative;
	}
	
	.content {
		position: relative;
		height: 100%;
	}

	.content span {
		position: relative;
	}

	.message-container-left {
		width: 15%;
		float: left;
	}

	.message-container-right {
		width: 85%;
		float: right;
		word-wrap: break-word;
	}

	.message-container-right p {
		position: relative;
		padding: 0 1rem;
		margin: 0;
	}
</style>

<center><i><b>This is a message from the DWC-Legazpi Website.</b></i></center><br><br>

<span><b>Name:</b> {{ucfirst($data['name'])}}</span><br>
<span><b>Email:</b> {{$data['email']}}</span><br>
<span><b>Number:</b> {{$data['number']}}</span><br>
<span><b>Subject:</b> {{ucfirst($data['subject'])}}</span><br><br>

<div class='message-container'>
	<div class='message-container-left content'>
		<span><b>Message:</b></span><br>
	</div>
	<div class='message-container-right content'>
		<p>{{ucfirst($data['message'])}}</p>
	</div>
</div>

@endcomponent
