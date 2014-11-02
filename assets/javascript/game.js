var level = 1;
var word = "";
var mode = 0;  //0 for words, 1 for maths, 2 for spelling
var score = 0;

function generateSpell(diff) {
	var out = "";
	var correct = ["table", "flower", "glass", "finger", "bottle"];
	var incorrect = ["tabel", "flowar", "glas", "fingar", "bottel"];
	out += "A piece of furniture with a flat top<br>Which word is spelt CORRECTLY? ";
	if(Math.random() > 0.5) {
		out += "<input onclick=\"check(this.value)\" type=\"button\" value=\"" + correct[diff] +"\">";
		out += "<input onclick=\"check(this.value)\" type=\"button\" value=\"" + incorrect[diff] +"\"><br>&nbsp;";
	}
	else {
		out += "<input onclick=\"check(this.value)\" type=\"button\" value=\"" + incorrect[diff] +"\">";
		out += "<input onclick=\"check(this.value)\" type=\"button\" value=\"" + correct[diff] +"\"><br>&nbsp;";
	}
		
	var dis = document.getElementById('display');
	word = correct[diff];
	dis.innerHTML = out;
	mode = 2;
}

function generateMath(difficulty) {
	var out = "";
	var first = Math.floor((Math.random() * 5) * difficulty + 1);
	var second = Math.floor((Math.random() * 5) * difficulty + 1);
	word = (first + second) + "";
	out += "Solve this: " + first + " + " + second + " ";
	out += "<input type=\"text\" id=\"l0\" onkeyup=\"maths(" + word.length + ")\">";
	var dis = document.getElementById('display');
	dis.innerHTML = out;
	moveCursor(0);
	mode = 1;
}

function generateVocab() {
	var dis = document.getElementById('message');
	document.getElementById('display').innerHTML = "";
	var vocabulary = ["<b>supermarket</b> - is a shop selling foods and household goods", 
	"<b>library</b> - is room in a house where books are kept, not everyone has got one", 
	"<b>university</b> - is a school where students study for expensive degrees", 
	"<b>vocabulary</b> - is a body of words used in a particular language",
	"<b>motivation</b> - is a reason for acting or behaving in a particular way",
	"<b>google</b> - is to search, copy, paste and claim it's your work!"];
	rand = Math.floor((Math.random() * 6));
	while(rand == level) {
		rand = Math.floor((Math.random() * 6));
	}
	level = rand;
	dis.innerHTML = vocabulary[level];
}

function maths(theLength) {
	if(theLength == document.getElementById("l0").value.length) {
		check("Argument not needed");
	}
}


function generateWord(difficulty) {
	$('.game-button').hide();
	$('#word-game').show();
	$('#keyboard').empty();
	$('#answer').empty();
	$('#image-holder').empty();

	var words = ['apple','banana','boy','girl','sun','baloon','cherries','horse','zebra','wheel','jellyfish','moon','pig','book','popcorn','cracker','cobweb','milk','flower','snake'];
    var levels = [2,2,1,1,1,4,5,3,3,4,5,2,1,2,4,5,4,2,3,3];
    //words = shuffle(words);
	var dis = document.getElementById('display');
	

	for(i = 0; i < words.length; i++) {
		if(levels[i] == difficulty) {
			word = words[i];
			
			$("<img src='./assets/images/game/" + word + ".png'/>").appendTo('#image-holder');
			level = difficulty;

			$('#message-box .message').text("Guess the word!");

			//generate letter underlines
			for(j=0; j<word.length; j++){
				$("<div style='left: " + ((word.length -1)* 15 + 5 - j*15 ) + "%'></div>").appendTo($('#answer'));
			}

			var letters = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
			var w_word = word;
			while(w_word.length > 0){
				var index = Math.floor(Math.random()*letters.length);
				if(letters[index] == 0){
					letters[index] = w_word[0];
					w_word = w_word.substr(1);
				}
			}
			for(l=0; l<letters.length; l++){
				if(letters[l] == 0){
					letters[l] = String.fromCharCode(Math.floor(Math.random()*26)+97);
				}
			}

			//generate keyboard keys
			for(k=0; k<12; k++){
				$("<div class='key-holder'><img class='key click' src='./assets/images/letter_placeholder.png' /><h2 style='color: black; margin: 0; position: absolute; top: 10%; left: 35%;' class='click'>" + letters[k] + "</h2></div>").appendTo($('#keyboard'));
			}

			break;
		}
	}
	mode = 0;
}

function messageBox(message) {
	document.getElementById("message").innerHTML = message;
}

function check(arg) {
	switch(mode) {
		case 0: var answer = "";
				for(i = 0; i < word.length; i++) {
					answer += document.getElementById("l" + i).value
				}
				if(answer == word) {
					level = ((level + 1) % 5) + 1;
					messageBox("Well Done, new word :-)");
					generateWord(level);
				}
				else {
					messageBox("Sorry");
				}
		break;
		case 1: if(document.getElementById("l0").value == word) {
					messageBox("Well Done :-)");
					level = (level + 1) % 5;
					generateMath(level);
				}
				else {
					messageBox("Try again...");
				}
		break;
		case 2: if(arg == word) {
					messageBox("Well Done :-)");
					level = (level + 1) % 5;
					generateSpell(level);
					
				}
				else {
					messageBox("Try again...");
				}
		break;
	}
}
