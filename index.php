<html lamg="fr">

	<head>
		<meta charset="utf-8">
		<title>Whale of kraken - Présentation</title>
	</head>
	
	<body>
		<div id="mainTitle">
			<a href="index.php" id="title"><h1>Whales of Kraken</h1></a>
			<a href="index.php">
				<img src="kraken.png"/>
			</a>
		</div>
		
		
		<div id="buttonZone">
			<?php
				session_start();
				if(!isset($_SESSION["login"]))
				{
					echo '<a id="connexionLink" href="connexion.php">Se connecter</a>
						  <a id="inscriptionLink" href="inscription.php">S\'inscrire</a>';				
				}
				else
				{
					echo '<a href="profil.php">Votre profil</a>
						  <form method="post" action="">
							<input id="decoBtn" type="submit" value="Déconnecter" name="decoBtn"/>
						  </form>';
						  
					if($_SESSION["login"] == "admin")
					{
						echo"<a href='admin.php' style='width:100%;'>Page Admin</a>";
					}	
				}
				
				if(isset($_POST["decoBtn"]))
				{
					session_destroy();
					header("location:index.php");
				}
			?>
		</div>
		
		<div id="defineZone">
			<div class="paper" style="border-left:0px;">
				<h1>Echangez vos devises</h1>
				<h2>En toutes <strong>sécurité</strong></h2>
			</div>
			
			<div class="paper">
				<h1>Découvrez la finance</h1>
				<h2>Avec nos professionnels</h2>
			</div>

			<div class="paper">
				<h1>Le secret du capitaine</h1>
				<h2><strong>17.3%</strong> de rentabilité</h2>
			</div>
			
		
		</div>
	</body>


</html>




<style>
	body
	{
		background-image:url("bg.png");
		background-size:cover;
	}

	#mainTitle
	{
		display:flex;
		flex-direction:row;
		justify-content:space-evenly;
		width:50%;
		
		margin:auto;
		margin-top:5%;
		
		text-align:center;
		
		border-radius:2px;	
		
		background-color:rgba(200,200,200,0.6)
	}
	
	
	#title
	{
		margin-top:15%;
		font-size:1.5em;
		color:black;
		text-decoration:none;
	}
	
	#mainTitle img 
	{
		width:400px;
	}

	#buttonZone
	{
		margin:auto;
		margin-top:20px;
		width:50%;
		
		border-radius:2px;
		
		display:flex;
		flex-direction:row;
		flex-wrap:wrap;
		
		justify-content:space-between;
	}
	
	#buttonZone > *
	{
		background-color:rgba(200,200,200,0.6);
		
		width:49.8%;
		height:2%;
		
		text-align:center;
		font-size:1.5em;
		
		margin-top:-15px;
		
		transition:background 0.5s ease;
		
		cursor:pointer;

		color:black;
		text-decoration:none;
	}
	
	#decoBtn
	{
		width:100%;
		
		background-color:rgba(0,0,0,0);
		border:0px;
		font-size:0.89em;
		
		cursor:pointer;
		
		transition:background 0.5s ease;
	}
	
	#buttonZone a:hover, #decoBtn:hover
	{
		background-color:rgba(200,200,200,1);
	}
	
	#defineZone
	{
		display:flex;
		flex-direction:row;
		justify-content:space-evenly;
		
		width:50%;
		margin:auto;
		margin-top:30px;
		
		background-color:rgba(200,200,200,0.6);
	}
	
	.paper
	{
		width:33%;
		text-align:center;
		
		border-left:1px solid;
		
		border-image:linear-gradient(to top,transparent,rgba(0,0,0,0.7),transparent)1 100%;
		
		transition:background 0.3s ease;
	}
	
	.paper:hover
	{
		background-color:rgba(200,200,200,0.9);
	}
	
	.paper h1
	{
		font-size:30px;
		text-decoration:underline;
	}
	
	.paper h2
	{
		margin-top:-20px;
		color:rgba(0,0,0,0.6);
	}
	
	.paper strong
	{
		color:green;
	}

</style>