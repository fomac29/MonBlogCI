<head>
<meta http-equiv="Content-Type" content="text/html; charset=">
<script src="<?php echo js_url('fonctions.js') ?>" ></script>
<link rel="Stylesheet" type="text/css" href="<?php echo css_url('style.css'); ?>" />
<title>Connexion</title>
</head>

<?php
$this->load->helper('url');
$path = base_url();
?>

<div id="contenu">
	<h2>Identification utilisateur</h2>

	<?php if (isset($erreur))	echo '<div class ="erreur"><ul><li>'.$erreur.'</li></ul></div>'; ?>

	<form method="POST" action="<?php echo base_url('Connexion/connecter/'); ?>">
		<p>
			<label for="login">Login*</label>
			<input id="login" type="text" name="login"  size="30" maxlength="45"/>
		</p>
		<p>
			<label for="mdp">Mot de passe*</label>
			<input id="mdp"  type="password"  name="mdp" size="30" maxlength="45"/>
		</p>
		<p>
			<input type="submit" value="Valider" name="valider"/>
			<input type="reset" value="Effacer" name="annuler"/> 
		</p>
	</form>

</div>