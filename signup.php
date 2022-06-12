<html>
<head>
	<link rel="stylesheet" href="main.css">
</head>
<body style="background-image:url(images/signup.jpg)">
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="cover.php" class="logo"><img src="images/cc.png" width="30px" height="30px"><strong> Cabinet </strong>Dr. Foulen</a></li>
					<li><a href="cover.php">Acceuil</a></li>
				</ul>
</div>
<form action="signup.php" method="post">
	<div class="sucontainer">
		<label><b>Name:</b></label><br>
		<input type="text" placeholder="Nom et Prénom" name="fname" required><br>
	
		<label><b>Date de naissance:</b></label><br>
		<input type="date" name="dob" required><br><br>
	
		<label><b>Sexe</b></label><br>
		<input type="radio" name="gender" value="female">Femme
		<input type="radio" name="gender" value="male">Homme
		<br><br>
		
		<label><b>Numéro de Tel.:</b></label><br>
		<input type="number" placeholder="Numéro de Téléphone" name="contact" required><br>
		
		<label><b>Nom d'utilisateur:</b></label><br>
		<input type="text" placeholder="Nom d'utilisateur" name="username" required><br>
		
		<label><b>Email:</b></label><br>
		<input type="email" placeholder="Email" name="email" required><br>

		<label><b>Mot de passe:</b></label><br>
		<input type="password" placeholder="Mot de passe" name="pwd" id="p1" required><br>

		<label><b>Répéter le mot de passe:</b></label><br>
		<input type="password" placeholder="Répéter le mot de passe" name="pwdr" id="p2" required><br>
		<p style="color:white">Lors de la création de votre compte vous accépter notre <a href="#" style="color:blue">Terms & Conditions</a>.</p><br>

		<div class="container" style="background-color:grey">
			<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annuler</button>
			<button type="submit" name="signup" style="float:right">Créer mon compte</button>
		</div>
  </div>
<?php

function newUser()
{
		include 'dbconfig.php';
		$name=$_POST['fname'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['pwd'];
		$prepeat=$_POST['pwdr'];
		$sql = "INSERT INTO Patient (Name, Gender, DOB,Contact,Email,Username,Password) VALUES ('$name','$gender','$dob','$contact','$email','$username','$password') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to login page....</h2>";
		header( "Refresh:3; url=cover.php");

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkusername()
{
	include 'dbconfig.php';
	$usn=$_POST['username'];
	$sql= "SELECT * FROM Patient WHERE Username = '$username'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
		{
			echo"<b><br>Username already exists!!";
		}
		else if($_POST['pwd']!=$_POST['pwdr'])
		{
			echo"Passwords dont match";
		}
		else if(isset($_POST['signup']))
		{ 
			newUser();
		}

	
}
if(isset($_POST['signup']))
{
	if(!empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['fname']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['email']) && !empty($_POST['contact']))
			checkusername();
}
?>

</form>
</body>
</html>