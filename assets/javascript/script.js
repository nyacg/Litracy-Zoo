$(document).ready(function(){
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

});

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
	drawAnimal();
}

function drawAnimal(){

	var pos = [[1, 11.5, 10], [6, 11, 16], [11, 13, 9], [16, 9, -8], [22, 4, -8], [28, 4, 9], [29, 10, 2]];
	
	for(i=0; i<6; i++){
		//console.log(pos[i,1]);
		var rotate = " -ms-transform: rotate(" + pos[i][2] + "deg); -webkit-transform: rotate(" + pos[i][2] + "deg); transform: rotate(" + pos[i][2] + "deg);"
		$("<img src='./assets/images/c_seg.png' class='c-seg' style='right: " + pos[i][0] + "%; bottom: " + pos[i][1] + "%; width: 12%; " + rotate + "'/>").appendTo($('#animal'));
	}
	$("<img src='./assets/images/c_face.png' class='c-seg face' style='right: " + pos[6][0] + "%; bottom: " + pos[6][1] + "%; width: 14%; " + rotate + "'/>").appendTo($('#animal'));
	$("<img src='./assets/images/c_hat1.png' class='c-seg face accessory' style='right: " + (pos[6][0]) + "%; bottom: " + (pos[6][1]) + "%; width: 14%; " + rotate + "'/>").appendTo($('#animal'));
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