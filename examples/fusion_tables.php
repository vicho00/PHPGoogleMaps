<?php

require( '../google_maps.php' );
require( '_system/config.php' );

$map = new \googlemaps\GoogleMap();
$ft_options = array(
	'query' => 'SELECT location FROM 232192 WHERE state_province_abbrev="CT"'
);
$ft = new \googlemaps\layer\FusionTable( 232192, $ft_options );

$ft_options2 = array(
	'query'	=> 'SELECT location FROM 232192 WHERE state_province_abbrev="RI"',
	'heatmap'	=> true
);
$ft2 = new \googlemaps\layer\FusionTable( 232192, $ft_options2 );

$a = array( &$ft, $ft2 );

$map->addObjects( $a );
$map->setCenterByLocation( 'Connecticut' );
$map->setZoom( 7 );

?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Fusion Tables - <?php echo PAGE_TITLE ?></title>
	<link rel="stylesheet" type="text/css" href="_css/style.css">
	<?php $map->printHeaderJS() ?>
	<?php $map->printMapJS() ?>
</head>
<body>

<h1>Fusion Tables</h1>
<?php require( '_system/nav.php' ) ?>

<?php $map->printMap() ?>

<a href="#" onclick="<?php echo $ft->getJsVar() ?>.setOptions({heatmap:true})">Make CT a heat map</a>

</body>

</html>

