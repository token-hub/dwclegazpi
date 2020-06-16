<!DOCTYPE html>
<html>
<head>
	<title>Under Maintenance</title>
	<link rel="shortcut icon" href="/storage/img/others/dwcl-Logo.ico" />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			font-family: 'Open Sans', sans-serif;
		}

		.maintenance {
			width: 100%;
			height: 100vh;
			position: relative;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background: #f1f1f1;
		}

		.img {
			position: relative;
			margin-bottom: 50px;
			display: flex;
		}

		.img img {
			position: relative;
			height: 280px;
			width: 280px;
		}

		.img i {
			font-size: 250px;
			color: gray;
			margin-top: 15px;
			margin-right: 15px;
		}
		
		.paragraphs p {
			font-size: 23px;
			margin: 10px 0;
			position: relative;
			text-align: center;
		}

		.paragraphs p:nth-child(1) {
			font-size: 38px;
			font-weight: bold;
		}
		
		/*phone*/
		@media only screen and (max-width: 767px) {
			.img img {
				height: 130px;
				width: 130px;
			}
			
			.img i {
				font-size: 140px;
				color: gray;
				margin-right: 5px;
				margin-top: 5px;
			}

			.paragraphs p {
				font-size: 18px;
			
			}

			.paragraphs p:nth-child(1) {
				font-size: 30px;
			}
		}
	</style>
</head>
<body>
	<div class='maintenance'>
	    <div class='img'>
	    	<i class='fa fa-cogs'></i>
	        <img src="/storage/img/others/dwcl-logo.png">
	    </div>

	    <div class='paragraphs'>
	        <p>Sorry, we're down for maintenance</p>
	        <p>We'll be back shortly</p>
	    </div>
	</div>
</body>
</html>