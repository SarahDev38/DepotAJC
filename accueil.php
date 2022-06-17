<?php
include_once('bdd/sqlPDO.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<title>ajc PDO</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/gabarit.css" />
</head>

<body>
	<div id="global">

		<?php include('include/header.inc.php'); ?>

		<div id="centre">

			<div id="navigation">
				<?php include('include/menu.inc.php'); ?>
			</div>

			<div id="contenu">
				<?php
				if (isset($_GET['inc']) && !empty($_GET['inc'])) {
					switch ($_GET['inc']) {
						case '1':
							include('include/contact.inc.php');
							break;
						case '2':
							include('include/cgv.inc.php');
							break;
						case '3':
							include('include/plan.inc.php');
							break;
						default:
							include('include/listing.inc.php');
							break;
					}
				} else {
					include('include/listing.inc.php');
				}
				?>

			</div>
		</div>

	</div>

	<?php include('include/footer.inc.php'); ?>
	
</body>

</html>