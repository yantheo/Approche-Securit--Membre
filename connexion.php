<?php 
$mysqli = new Mysqli("localhost", "root", "", "securite");
if($_POST)
{	//Affichage des pseudos et mdp pour voir si on récupère bien les POST
	//echo "Pseudo posté: $_POST[pseudo] <br>";
	//echo "Mdp posté: $_POST[mdp] <br>";
	
	//Protection en cas d'attaque par injection SQL avec htmlentities et ENT_QUOTES 
	$_POST['pseudo'] = htmlentities($_POST['pseudo'], ENT_QUOTES);
	$_POST['mdp'] = htmlentities($_POST['pseudo'], ENT_QUOTES).
	
	$req = "SELECT * FROM membre WHERE pseudo='$_POST[pseudo]' && mdp='$_POST[mdp]'";
	$resultat = $mysqli->query($req);
	echo 'requete debug : ' . $req . '';
	$membre = $resultat->fetch_assoc();
	if(!empty($membre))
	{
		echo "<div class='validation'><h1>Vous êtes bien reconnu par le site web pour vous connecter...</h1></div>";
		echo "votre id est : " . $membre['id_membre'] . "<br>";
        echo "votre pseudo est : " . $membre['pseudo'] . "<br>";
        echo "votre mdp est : " . $membre['mdp'] . "<br>";
        echo "votre nom est : " . $membre['nom'] . "<br>";
        echo "votre prenom est : " . $membre['mdp'] . "<br>";
        echo "votre email est : " . $membre['email'] . "<br>";
	}
	else
	{
		echo "<div class='erreur'><h1>Erreur d\'identification</h1></div>";
	}
}
?>
<hr>

<form method="post" action="">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" id="pseudo" name="pseudo">
	<label for="mdp">Mot de passe</label>
	<input type="text" id="mdp" name="mdp">
	<input type="submit" value="Se connecter">
</form>