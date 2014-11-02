$(document).ready(function(){
	var hat = false;
	var cape = false;
	//setSize();
	$('#name-input').focus();

	$('#go-button').click(function(){
		nameToPet();
	});

	$('#name-input').keypress(function(e) {
		if(e.which == 13){
			nameToPet();
		}
	});

	$('#go-button-2').click(function(){
		petToMain();
	});

	$('#animal-name').keypress(function(e) {
		if(e.which == 13){
			petToMain();
		}
	});

	$('.animal-icon').click(function(){
		$('.animal-icon').not($(this)).removeClass('active');
		$(this).addClass('active');
		$('#animal-name').focus();
	});

	$(document).on("click", '.c-seg', function(){
		wiggle();
		var timeoutID = window.setTimeout(stopWiggle, 1000);
	});

	$('#tree-area').click(function(){
		var treeSound = new Audio('./assets/sounds/tree.mp3');
		console.log('rustle rustle');
		treeSound.play();
	});

	$('#inventory-icon').click(function(event){
		event.stopPropagation();
		$('#inventory').animate({right: '+=25%'});
	});

	$(document).on("click", '.click', function(){
		console.log("click");
		var audio = new Audio('./assets/sounds/click.wav');
		audio.play();
	});

	$('body').not($('#inventory')).click(function(event){
		//console.log($('#inventory').position()['left'] - $('#canvas').width());
		if($('#inventory').position()['left'] - $('#canvas').width()<0 && $('#inventory').width() != 20){
			event.stopPropagation();
			$('#inventory').animate({right: '-=25%'});	
			var audio = new Audio('./assets/sounds/click.wav');
			audio.play();
		}
	});

	$('#play-game-button').click(function(event){
		event.stopPropagation();
		console.log('time to play');
		$('#main-page').hide();
		$('#game-page').show();
		drawAnimal(hat, cape);
		score = 0;
	});

	$('#i-hat').click(function(){
		$(this).hide();
		$('#a-hat').show();
		hat = true;
	});

	$('#i-cape').click(function(){
		$(this).hide();
		$('#a-cape').show();
		cape = true;
	});

	$(document).on("click", '.key', function(){
		addLetter($(this).add($(this).siblings()));
	});

	$(document).on("click", '.key-holder', function(){
		addLetter($(this).children());
	});

	$(document).on("click", '.key-letter', function(){
		addLetter($(this).add($(this).siblings()));
	});
});

function addLetter($key){
	$('#answer div').each(function(){
		if($(this).children().length == 0){
			console.log($(this));
			$key.appendTo($(this));
			$key.not($(this).children()).remove();
		}
	});
	checkNew();
}

function checkNew(){
	var answerWord = "";
	$('#answer div').each(function(){
		answerWord = $(this).children("h2").text() + answerWord;
	});

	console.log(answerWord);

	if(answerWord.length == word.length){
		if(answerWord == word){
			$('#message-box .message').text("Well done!");
			level++;
			generateWord(level);
			score++;
			$('#score').text("Score: " + score);
			var audio = new Audio('./assets/sounds/getcoin.wav');
			audio.play();
		} else {
			$('#message-box .message').text("Try again");
		}
	}
}

function setSize(){
	var $canvas = $('#canvas');
	$cavas.width(window.width());
	$canvas.height(window.height());
}

function nameToPet(){
	$('#name-page').hide();
	$('#pet-page').show();
	$('#animal-name').focus();
}

function petToMain(){
	$('#pet-page').hide();
	$('#main-page').show();
	drawAnimal(false, false);
}

function drawAnimal(hat, cape){
	var pos = [[1, 11.5, 10], [6, 11, 16], [11, 13, 9], [16, 9, -8], [22, 4, -8], [28, 4, 9], [29, 10, 2]];
	
	for(i=0; i<6; i++){
		//console.log(pos[i,1]);
		var rotate = " -ms-transform: rotate(" + pos[i][2] + "deg); -webkit-transform: rotate(" + pos[i][2] + "deg); transform: rotate(" + pos[i][2] + "deg);"
		$("<img src='./assets/images/c_seg.png' class='c-seg' style='right: " + pos[i][0] + "%; bottom: " + pos[i][1] + "%; width: 12%; " + rotate + "'/>").appendTo($('.animal'));
	}
	$("<img src='./assets/images/c_cape.png' id='a-cape' class='c-seg face accessory " + (cape == false ? "hidden" : "") + "' style='right: " + 4 + "%; bottom: " + 17 + "%; width: 30%; '/>").appendTo($('.animal'));
	$("<img src='./assets/images/c_face.png' class='c-seg face' style='right: " + pos[6][0] + "%; bottom: " + pos[6][1] + "%; width: 14%; " + rotate + "'/>").appendTo($('.animal'));
	$("<img src='./assets/images/c_hat1.png' id='a-hat' class='c-seg face accessory " + (hat == false ? "hidden" : "") + "' style='right: " + pos[6][0] + "%; bottom: " + pos[6][1] + "%; width: 14%; " + rotate + "'/>").appendTo($('.animal'));
}

function wiggle(){
	var audio = new Audio('./assets/sounds/wiggle.mp3');
	audio.play();
	console.log("shake it!");
	$('.c-seg').not('.face').each(function(index){
		$(this).addClass('shake').addClass('shake'+index);
	});
}

function stopWiggle(){
	$('.c-seg').each(function(index){
		$(this).removeClass('shake').removeClass('shake'+index);
	});
}