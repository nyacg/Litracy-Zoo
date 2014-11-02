<html>
<head>
<script>

var level = 1;
var word = "";
var mode = 0;  //0 for words, 1 for maths, 2 for vocabulary

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
	mode = 2;
}

function maths(theLength) {
	if(theLength == document.getElementById("l0").value.length) {
		check();
	}
}

function moveCursor(id) {
	if(id == word.length) {
		check();
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

function check() {
	if(mode == 0) {
		var answer = "";
		for(i = 0; i < word.length; i++) {
			answer += document.getElementById("l" + i).value
		}
		if(answer == word) {
			if(level < 5) {
				level += 1;
			}
			alert("Well Done, let's try a new word :-)");
			generateWord(level);
		}
		else {
			alert("Sorry");
		}
	}
	else {
		if(document.getElementById("l0").value == word) {
			alert("Well Done");
			level += 1;
			generateMath(level);
		}
		else {
			alert("Try again");
		}
	}
}

</script>
</head>
<body onload="generateWord(1)">

<div id="display">
</div>

<input onclick="generateWord(1)" type="button" name="button" value="Play Words">

<input onclick="generateMath(1)" type="button" name="button" value="Play Maths">

<input onclick="generateVocab()" type="button" name="button" value="Play Vocabulary">

</body>
</html>
