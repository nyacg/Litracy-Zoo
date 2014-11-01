$(document).ready(function(){

	//setSize();
	$('#name-input').focus();

	$('#go-button').click(function(){
		nameToPet();
	});

	$(document).keypress(function(e) {
		if(e.which == 13){
			nameToPet();
		}
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
}