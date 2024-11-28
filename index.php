<?php
/**
 * @package            	: Disk Drives Informations
 * @source             	: /drives-info/index.php
 * @version            	: 1.0.0
 * @created            	: 2024-11-27 07:00:00 UTC+3
 * @updated            	: 
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 8.2.0
 */
declare(strict_types=1); 
//require_once "../afw/autoload.php";

// Load Ascoos Framework 24
require_once "[YOUR ROOT SITE PATH]/afw/autoload.php";

// Load Configurations
$config = require str_replace('\\', '/', __DIR__).'/conf/config.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $config['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disk Drives Informations</title>
    <link rel="stylesheet" href="assets/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/main.css" type="text/css" />    
    <script type="text/javascript" src="assets/js/jquery.js" charset="UTF-8"></script>
</head>
<body>
    <div class="efp-template">
        <?php require_once "drives.php"; ?>
    </div>
</body>
</html>