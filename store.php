<?php
$servername = "localhost";
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<html>
<body>
<head>
<script>
function ajax() {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  var name = document.getElementById("id")

  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.write(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","create.php?q="+name,true);
  xmlhttp.send();
}
</script>
</head>
<form action="welcome.php" method="post">
	Select your buddy
<input type="radio" name="sex" value="male">Lion<br>
<input type="radio" name="sex" value="female">Caterpillar<br>
Name your pet: <input type="text" name="name">
<input type="hidden" name="Language" value="<?php echo $_POST["name"]; ?>">
<input type="submit">
</form>


</body>
</html>
