<!DOCTYPE html>
<html>
<body style="background-image:url(images/p1.jpg)">
<link rel="stylesheet" href="main.css">
			<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="cover.php" class="logo"><img src="images/cc.png" width="30px" height="30px"><strong> Cabinet </strong> Dr.Foulen</a></li>
					
					<li><a href="#home">Acceuil</a></li>
				</ul>
			</div>
			<div class="center">
				<h1>Cabinet Dr. Foulen</h1><br>
				<p style="text-align:center;color:black;font-size:30px;top:35%">Prenez vos rendez-vous en ligne</p><br>
				<button onclick="document.getElementById('id01').style.display='block'" style="position:absolute;top:50%;left:50%">Connexion</button>
				
			</div>	
			
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="cover.php">
    <div class="imgcontainer">
		<span style="float:left"><h2>&nbsp&nbsp&nbsp&nbspConnexion</h2></span>
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
	
    <div class="container">
      <label><b>Nom d'utilisateur</b></label>
      <input type="text" placeholder="Nom d'utilisateur" name="uname" required>

      <label><b>Mot de passe</b></label>
      <input type="password" placeholder="mot de passe" name="psw" required>
		<button type="submit" name="login">Connexion</button>
		
      <input type="checkbox" checked="checked"> Mémoriser les infos
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
      <button onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'" style="float:right">Créer un compte</button>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="signup.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><br>
    </div>

	<div class="imgcontainer">
      <img src="images/steps.png" alt="Avatar" class="avatar">
    </div>
	
    <div class="container">
		<p style="text-align:center;font-size:18px;"><b>Créer un compte -> Choisir votre date de rendez-vous -> Réserver votre rendez-vous</b></p>
      <p style="text-align:center"><b>3 étapes pour faciliter votre prise de rendez-vous!</b></p>
	  
    </div>
	
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annuler</button>
	  <button type="submit" name="signup" style="float:right">Créer un compte</button>
    </div>
	
  </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

</script>
<?php
session_start();
$error=''; 
if (isset($_POST['login'])) {
if (empty($_POST['uname']) || empty($_POST['psw'])) {
$error = "Nom d'utilisateur ou le mot de passe est incorrect";
}
else
{
	include 'dbconfig.php';
	$username=$_POST['uname'];
	$password=$_POST['psw'];

	$query = mysqli_query($conn,"select * from patient where password='$password' AND username='$username'");
	$rows = mysqli_fetch_assoc($query);
	$num=mysqli_num_rows($query);
	if ($num == 1) {
		$_SESSION['username']=$rows['username'];
		$_SESSION['user']=$rows['name'];
		header( "Refresh:1; url=ulogin.php"); 
	} 
	else 
	{
		$error = "Nom d'utilisateur ou le mot de passe est incorrect";
	}
	mysqli_close($conn); 
}
}
?>
</body>
</html>
