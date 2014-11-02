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
				<img src='./assets/images/lb_icon.png' class='animal-icon' />
				<img src='./assets/images/h_icon.png' class='animal-icon' />
				<input name='animal-name' id='animal-name'></input>
				<img src='./assets/images/go.png' id='go-button-2' class='go-button'/>
			</div>

			<div id='main-page' class='hidden'>
				<div id='play-game-button' class='click'><h1>Play Games, earn coins</h1></div>
				<div id='tree-area'></div>
				<div class='animal'></div>
				<img src='./assets/images/inventory.png' width='5%' height='auto' id='inventory-icon' class='click'/>
				<h3 id='coins'>55</h3>
				<img src='./assets/images/coin.png' width='5%' height='auto' id='coin-icon'/>
				<div id='inventory'>
					<img src='./assets/images/c_hat1.png' width='80%' class='click' id='i-hat'/>
					<img src='./assets/images/c_cape.png' width='80%' class='click i-accessory' id='i-cape'/>
					<h3 class='small-text'>Buy more stuff</h3>
				</div>

			</div>

			<div id='game-page' class='hidden'>
				<!-- game objects go here -->

				<div id='message-box'>
					<h2 class='message'></h2>
					<h2 id='score'>Score: 0</h2>
				</div>

				<div id='word-game' class='hidden'>
					<div id='image-holder'></div>
					<div id='keyboard'></div>
					<div id='answer'></div>	
				</div>

				<h2 onclick="generateWord(1)" class='game-button click'>Play Word Game</h2>

				<h2 onclick="generateMath(1)" class='game-button click'>Play Maths Game</h2>

				<h2 onclick="generateVocab()" class='game-button click'>Word of the day</h2>

				<h2 onclick="generateSpell(0)" class='game-button click'>Play Guess Game</h2>

				<div class='animal'></div>
			</div>

		</div>


		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type='text/javascript' src='./assets/javascript/script.js'></script>
		<script type='text/javascript' src='./assets/javascript/game.js'></script>
	</body>
</html>