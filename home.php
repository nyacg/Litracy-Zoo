<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></meta>
		<title>Clever Creatures</title>
		<link rel='stylesheet' type='text/css' href='./assets/stylesheets/style.css' />
		<link href="http://fonts.googleapis.com/css?family=Signika:300,400,600,700" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id='canvas'>
			<div id='name-page'>
				<h1>Hello, welcome to Clever Creatures</h1>
				<h2>What is your name?</h2>
				<input name='name' id='name-input' type='text' autocomplete='off'></input>
				<img src='./assets/images/go.png' id='go-button' class='go-button'/>
			</div>

			<div id='pet-page' class='hidden'>
				<h2>Select and name your first pet</h2>
				<img src='./assets/images/c_icon.png' class='animal-icon' />
				<img src='./assets/images/l_icon.png' class='animal-icon' />
				<img src='./assets/images/c_icon.png' class='animal-icon' />
				<img src='./assets/images/c_icon.png' class='animal-icon' />
				<input name='animal-name' id='animal-name'></input>
				<img src='./assets/images/go.png' id='go-button-2' class='go-button'/>
			</div>

			<div id='main-page' class='hidden'>
				<div id='animal'>
					
				</div>
			</div>

		</div>


		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type='text/javascript' src='./assets/javascript/script.js'></script>
	</body>
</html>