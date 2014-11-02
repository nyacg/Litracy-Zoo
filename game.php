<html>
<head>
<script>

var level = 1;
var word = "";
var mode = 0;  //0 for words, 1 for maths, 2 for spelling

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
	var dis = document.getElementById('display');
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

function moveCursor(id) {
	if(id == word.length) {
		check("Argument not used");
	}
	else {
		document.getElementById("l" + id).focus();
	}
}

function generateWord(difficulty) {
	var words = ['apple','banana','boy','girl','sun','balloon','cherries','horse','zebra','wheel','jellyfish','moon','pig','book','popcorn','cracker','cobweb','milk','flower','snake'];
    var levels = [2,2,1,1,1,4,5,3,3,4,5,2,1,2,4,5,4,2,3,3];
    //words = shuffle(words);
	var dis = document.getElementById('display');
	var out = "";
	
	for(i = 0; i < words.length; i++) {
		if(levels[i] == difficulty) {
			var w = words[i];
			word = w;
			level = difficulty;
			out += "Guess the word! ->" + word;
			for(j = 0; j < w.length; j++) {
				out += "<input onkeyup=\"moveCursor(" + (j + 1) + ")\" type=\"text\" id=\"l" + j + "\">"
			}
			break;
		}
	}
	dis.innerHTML = out;
	moveCursor(0);
	mode = 0;
}

function check(arg) {
	switch(mode) {
		case 0: var answer = "";
				for(i = 0; i < word.length; i++) {
					answer += document.getElementById("l" + i).value
				}
				if(answer == word) {
					level = ((level + 1) % 5) + 1;
					alert("Well Done, let's try a new word :-)");
					generateWord(level);
				}
				else {
					alert("Sorry");
				}
		break;
		case 1: if(document.getElementById("l0").value == word) {
					alert("Well Done");
					level = (level + 1) % 5;
					generateMath(level);
				}
				else {
					alert("Try again");
				}
		break;
		case 2: if(arg == word) {
					alert("Well Done");
					level = (level + 1) % 5;
					generateSpell(level);
					
				}
				else {
					alert("Try again");
				}
		break;
	}
}

</script>
</head>
<body onload="generateWord(1)">

<div id="display">
</div>

<input onclick="generateWord(1)" type="button" name="button" value="Play Word Game">

<input onclick="generateMath(1)" type="button" name="button" value="Play Maths Game">

<input onclick="generateVocab()" type="button" name="button" value="Word of the day">

<input onclick="generateSpell(0)" type="button" name="button" value="Play Guess Game">

</body>
</html>
