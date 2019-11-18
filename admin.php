<?php
	
	session_start();
	if($_SESSION["login"] != "admin")
	{
		header("location:index.php");
	}
	
	$connect = mysqli_connect("localhost","root","","moduleconnexion");
		
	$request = "SELECT * FROM utilisateurs;";
	
	$query = mysqli_query($connect,$request);
	
	$result = mysqli_fetch_all($query);

?>

<html lamg="fr">

	<head>
		<meta charset="utf-8">
		<title>Whale of kraken - Présentation</title>
	</head>
	
	<body>
		<div id="mainWrapper">
			<div id="mainTitle">
				<a href="index.php" id="title"><h1>Whales of Kraken</h1></a>
				<a href="index.php">
					<img src="kraken.png"/>
				</a>
			</div>
			
			<table>
				<thead>
				<?php
					$requestName = "DESCRIBE utilisateurs;";
					$queryName = mysqli_query($connect, $requestName);
					$resultName = mysqli_fetch_all($queryName);
							
					$k = 0;
					while($k < count($resultName))
					{
						echo "<th>".$resultName[$k][0]."</th>";
						$k ++;
					}
					echo "</thead><tbody>";
					
					$i = 0;
					while($i < count($result))
					{
						echo "<tr>";
						$j = 0;
						while($j < count($result[$i]))
						{
							echo "<td>".$result[$i][$j]."</td>";
							$j++;
						}
						echo "</tr>";
						$i++;
					}
				?>
				</tbody>
			</table>
		</div>
	</body>
</html>

<style>

	table
	{
		margin:auto;
		
	}

	table th
	{
		font-size:1.3em;
		width:10%;
		border:1px solid white;
	}
	
	table tr td
	{
		border:1px solid white;
	}
	
	table tr td
	{
		text-align:center;
	}
	
	

	body
	{
		background-image:url("bg.png");
		background-size:cover;
		margin:0px;
		overflow-y:hide;
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
</style>
