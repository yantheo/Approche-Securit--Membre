<?php 
$mysqli = new Mysqli("localhost", "root", "", "securite");
?>
<hr>

<form method="post" action="">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" id="pseudo" name="pseudo">
	<label for="mdp">Mot de passe</label>
	<input type="text" id="mdp" name="mdp">
	<input type="submit" value="Se connecter">
</form>