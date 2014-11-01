<html>
<head>
<script>

var level = 1;
var word = "";

function shuffle(o){
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
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
}

function check() {
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

function goBack() {
	level -= 1;
	generateWord(level);
}

</script>
</head>
<body onload="generateWord(1)">

<div id="display">
</div>
<!--
<input onclick="check()" type="button" name="button" value="Check Answer">

<input onclick="goBack()" type="button" name="button" value="Back to Previous Level">
-->
</body>
</html>
