<!DOCTYPE html>
<html>
<body>

<p id="p1">Hello World!</p>
<div id="p2" style="position:relative;">Hello World!</div>

<script>
document.getElementById("p2").style.left='20%';
document.getElementById("p2").style.fontFamily="Arial";
document.getElementById("p2").style.fontSize="larger";
</script>

<p>The paragraph above was changed by a script.</p>

</body>
</html>
