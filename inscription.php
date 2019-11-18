<html lamg="fr">

	<head>
		<meta charset="utf-8">
		<title>Whale of kraken - Inscription</title>
	</head>
	
	<body>
		<div id="mainWrapper">
			<div id="mainTitle">
				<div>
					<a href="index.php" id="title"><h1>Whales of Kraken</h1></a>
					<p id="discovered">Inscription</p>
				</div>
				<a href="index.php">
					<img src="kraken.png"/>
				</a>
			</div>			

			<form method="post" action="">
				<div>
					<label for="prenom">Votre prénom</label>
					<input type="text" name="prenom" required/>
				</div>
				
				<div>
					<label for="nom">Votre nom</label>
					<input type="text" name="nom" required/>
				</div>
				
				<div>
					<label for="login">Votre pseudo</label>
					<input type="text" name="login" required/>
				</div>
				
				<div>
					<label for="password">Votre mot de passe</label>
					<input type="password" name="password" required/>
				</div>
				
				<div>
					<label for="passwordConfirm">Vérifiez le mot de passe</label>
					<input type="password" name="passwordConfirm" required/>
				</div>
				
				<div style="justify-content:center;border-bottom:0px;">
					<input type="submit" value="Envoyer" name="submitBtn" style="margin-right:20px;margin-left:-20px;"/>
					<input type="reset" value="Effacer" name="resetBtn" required/>
				</div>
			</form>
		</div>
	</body>
</html>


<?php
	
	if(isset($_POST["submitBtn"]))
	{
		if($_POST["password"] == $_POST["passwordConfirm"])
		{
			$connect = mysqli_connect("localhost","root","","moduleconnexion");
			if (mysqli_connect_errno()) 
			{
				exit();
			}
			$validator = true;
			$result = mysqli_fetch_all(mysqli_query($connect,"SELECT * FROM utilisateurs"));
			
			
			$count = 0;
			while($count < count($result))
			{	
				if($result[$count][1] == $_POST["login"])
				{
					$validator = false;
					header("location:inscription.php");
					break;
				}
				$count++;
			}
			
			if($validator)
			{
				$request = "INSERT INTO utilisateurs (`id`, `login`, `prenom`, `nom`,`password`)
										VALUES(NULL,'".$_POST["login"]. "','" .$_POST["prenom"].   "','"
													  .$_POST["nom"].   "','" .password_hash($_POST["password"],PASSWORD_BCRYPT). "');";

				mysqli_query($connect, $request);
				mysqli_close($connect);
				
				
				header("location:connexion.php");				
			}
			
		}
	}
	
?>

<style>
	body
	{
		background-image:url("bg.png");
		background-size:cover;
		margin:0px;
		overflow-y:hidden;
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
	
	input[type="submit"], input[type="reset"]
	{
		border-radius:3px;
		border:1px solid grey;
		
		background-color:rgba(200,200,200,0.7);
		
		transition:background,border, filter 1s ease;
		filter:drop-shadow(0 0 0.4rem grey);
		
		font-size:1.5em;
		
		cursor:pointer;

	}

	input[type="submit"]:hover, input[type="reset"]:hover
	{
		background-color:rgba(250,250,250,0.9);
		transition:border, filter 1s;
		filter:drop-shadow(0 0 0.4rem white);	
	}

</style>