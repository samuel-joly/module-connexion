<?php

	session_start();
	$connect = mysqli_connect("localhost","root","","moduleconnexion");
	$request= "SELECT login,prenom,nom,password FROM utilisateurs WHERE login = '".$_SESSION["login"]."';";
	$query = mysqli_query($connect,$request);
	$result = mysqli_fetch_all($query);	
	
	if(isset($_POST["submitBtn"]))
	{
		if(password_verify($_POST["password"], $result[0][3]))
		{	
			foreach($_POST as $key => $value)
			{
				if($key != "password"  && $key != "passwordChange" && $key != "submitBtn")
				{
					$request= "SELECT ".$key." FROM utilisateurs WHERE login = '".$_SESSION["login"]."';";
					$queryCheck = mysqli_query($connect,$request);
					$response = mysqli_fetch_all($queryCheck);
					
					
				
					if ($value != $response[0][0])
					{
						$request= "UPDATE utilisateurs SET ".$key." = '".$value."' WHERE login = '".$_SESSION["login"]."';";
						mysqli_query($connect,$request);
					}		
				}
				else if($key == "passwordChange" && strlen($value) > 0)
				{
					$request= "UPDATE utilisateurs SET password = '".password_hash($value,PASSWORD_BCRYPT)."' WHERE login = '".$_SESSION["login"]."';";
					$query = mysqli_query($connect,$request);
				}
			}
		}
	}
	
	$request= "SELECT login,prenom,nom,password FROM utilisateurs WHERE login = '".$_SESSION["login"]."';";
	$query = mysqli_query($connect,$request);
	$result = mysqli_fetch_all($query);	


?>

<html lamg="fr">

	<head>
		<meta charset="utf-8">
		<title>Whale of kraken - Profil</title>
	</head>
	
	<body>
		<div id="mainWrapper">
			<div id="mainTitle">
				<div>
					<a href="index.php" id="title"><h1>Whales of Kraken</h1></a>
					<p id="discovered">Profil de <?php echo $_SESSION["login"]; ?></p>
				</div>
				<a href="index.php">
					<img src="kraken.png"/>
				</a>
			</div>
		
			<form method="post" action="">

				<div>
					<label for="login">Votre pseudo</label>
					<input type="text" name="login" value='<?php echo $result[0][0]; ?>' required/>
				</div>
				
				<div>
					<label for="prenom">Votre prénom</label>
					<input type="text" name="prenom" value='<?php echo $result[0][1]; ?>' required/>
				</div>

				<div>
					<label for="nom">Votre nom</label>
					<input type="text" name="nom" value='<?php echo $result[0][2]; ?>' required/>
				</div>
								
				<div id="password">
					<label for="password">Votre mot de passe</label>
					<input type="password" name="password" required/>
				</div>
				

				<div id="passwordChange">
					<label for="passwordChange">Nouveau mot de passe</label>
					<input type="password" name="passwordChange"/>
				</div>				

				<div id="buttonZone" style="border-bottom:0px;">
					<a href="index.php">Retour</a>
					<input type="submit" value="Modifier" name="submitBtn" />
				</div>
			</form>
		</div>
	</body>
	
</html>


<style>
	body
	{
		background-image:url("bg.png");
		background-size:cover;
	}

	#mainWrapper
	{
		width:50%;
		
		overflow:hidden;
		max-height:65px;
		
		margin:auto;
		margin-top:5%;
		
		padding:10px;
		background-color:rgba(200,200,200,0.6);
		border-radius:3px;

		animation-name:form-scale;
		animation-fill-mode:forwards;
		animation-duration:3s;
	}

	@keyframes form-scale
	{
		from
		{
			margin-top:5%;
			background-color:rgba(200,200,200,0.6);
			max-height:65px;
		}
		to
		{
			margin-top:8%;
			background-color:rgba(200,200,200,0.8);
			max-height:60vh;
		}
	}
	
	#mainTitle
	{
		display:flex;
		flex-direction:row;
		justify-content:space-between;
		padding-bottom:10px;
		
		margin:auto;
		
		border-radius:2px;
		
	}
	
	
	#title
	{
		margin-top:15%;
		font-size:1.5em;
		color:black;
		text-decoration:none;
		
		animation-name:title-scale;
		animation-fill-mode:forwards;
		animation-duration:2s;
	}
	
	@keyframes title-scale
	{
		from
		{
			margin-top:18%;
			font-size:1.5em;
		}
		to
		{
			margin-top:0%;
			font-size:1em;
		}
	}
	
	#mainTitle img 
	{
		width:400px;
		height:400px;
		
		animation-name:image-scale;
		animation-fill-mode:forwards;
		animation-duration:2s;
	}
	
	@keyframes image-scale
	{
		from
		{
			width:400px;
			height:400px;
		}
		to
		{
			width:70px;
			height:70px;
		}
	}

	#discovered
	{
		margin-top:-30px;
		margin-left:5px;
		opacity:0;
		
		color:black;
		text-decoration:underline;
		font-size:1em;
		
		animation-name:discovered;
		animation-delay:2s;
		animation-duration:1s;
		animation-fill-mode:forwards;
	}

	@keyframes discovered
	{
		from
		{
			opacity:0;
		}
		to
		{
			opacity:1;
		}
	}
	
	#mainWrapper form
	{
	
		margin:auto;
		margin-top:-0.064%;
		
		padding-top:15px;
		
		border-radius:0 0 3px 3px ;
		
		opacity:0;
		
		animation-name:discovered;
		animation-duration:0.8s;
		animation-delay:2s;
		animation-fill-mode:forwards;
	}
	
	#mainWrapper form div
	{
		display:flex;
		flex-direction:row;
		justify-content:space-between;
		
		width:97%;
		
		margin:auto;
		margin-top:10px;
		
		padding-bottom:3px;
		
		border-bottom:1px solid;
		border-top:0px;
		border-image:linear-gradient(to right,transparent 15%,black,black)100% 0;
		
		font-size:1.5em;
	}
	
	input
	{
		border-radius:4px;
		border:1px;
	}
	
	input[type="submit"]
	{
		border-radius:3px;
		border:1px solid grey;
		
		background-color:rgba(200,200,200,0.7);
		
		transition:background,border, filter 1s ease;
		filter:drop-shadow(0 0 0.4rem grey);
		
		font-size:1.5em;
		
		cursor:pointer;

	}

	input[type="submit"]:hover, #buttonZone a:hover
	{
		background-color:rgba(250,250,250,0.9);
		transition:border, filter 1s;
		filter:drop-shadow(0 0 0.4rem white);	
	}
	
	#buttonZone a
	{
		border-radius:3px;
		border:1px solid grey;
		
		background-color:rgba(200,200,200,0.7);
		
		transition:background,border, filter 1s ease;
		filter:drop-shadow(0 0 0.4rem grey);
		
		font-size:1.5em;
		color:black;
		
		width:140px;
		
		text-decoration:none;
		text-align:center;
		cursor:pointer;
	}
	
</style>