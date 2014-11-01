<html>
<head>
<script>
function showUser() {
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
  xmlhttp.open("GET","store.php?q="+name,true);
  xmlhttp.send();
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
