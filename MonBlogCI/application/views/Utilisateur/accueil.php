<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=">
<script src="<?php echo js_url('fonctions.js') ?>" ></script>
<link rel="Stylesheet" type="text/css" href="<?php echo css_url('style.css'); ?>" />
<title>Accueil</title>
</head>

<body>

<h1><?php echo $titre ;?></h1>
<p><?php echo $description ;?></p>
<p>url : <?php echo $url ;?></p>
<p>chemin : <?php echo $chemin ;?> </p>
<ul>

<li><?php echo anchor('Utilisateur/apropos','A propos'); ?></li>
<li><?php echo anchor('Utilisateur/lesBillets','Vue Billets'); ?></li>
<li><form action= "<?php echo base_url('Utilisateur/seConnecter/'); ?>"><input type="submit" ></form></li>
</ul>

</body>
</html>
