<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function showUser() {
	
	var name = $("#name").val();
	$.ajax({
		url: "store.php?q="+name,
		context: document.body,
		success: function(result){
    console.log(result);}
	});
}
</script>
</head>
<body>

<?php
echo "Hello and Welcome to Literacy Zoo"
?>
<form onsubmit="showUser()" method="post">
Tell us about your name: <input type="text" id="name"><br>
<input type="submit">
</form>

</body>
</html>
