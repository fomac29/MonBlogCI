<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=">
<script src="<?php echo js_url('fonctions.js') ?>" ></script>
<link rel="Stylesheet" type="text/css" href="<?php echo css_url('style.css'); ?>" />
<title><?php echo $leBillet['titre'];?></title>
</head>
<body>
<h1><?php echo $titre; ?></h1>
	<h3> <?php echo $leBillet['titre']; ?> </h3>
	<time><?php echo $leBillet['date']; ?></time>
	<p><?php echo $leBillet['contenu']; ?></p>
	<hr>
	
	<form action="<?php echo base_url('Utilisateur/ajoutCommentaire/'.$leBillet['id'])?>" method="post">
	
	<input type="text" name='pseudo'><br/>
	<textarea rows="4" cols="50" name='message'></textarea><br/>
	<input type="submit" value="Poster un commentaire">
	
	</form>
	<hr>
	<?php foreach ($lesCommentaires as $commentaire) : ?>
	<h3> <?php echo $commentaire['COM_AUTEUR']; ?> </h3>
	<p> <?php  echo $commentaire['COM_DATE']; ?> </p>
	<p> <?php  echo $commentaire['COM_CONTENU']; ?> </p>
	<hr />
	<?php endforeach; ?>
</body>
</html>