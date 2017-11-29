<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=">
<script src="<?php echo js_url('fonctions.js') ?>" ></script>
<link rel="Stylesheet" type="text/css" href="<?php echo css_url('style.css'); ?>" />
<title>Les billets</title>
</head>

<body>
<h1><?php echo $titre; ?></h1>
<?php foreach ($lesBillets as $billet) : ?>
	<h3> <?php  echo anchor('Administrateur/leBillet/'.$billet['id'],$billet['titre']); ?> </h3>
	<p> <?php echo $billet['date']; ?></p>
	<p> <?php echo $billet['contenu']; ?></p>
	<hr />
	<?php endforeach; ?>
</body>
</html>