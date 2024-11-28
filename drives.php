<?php
/**
 * @package            	: Disk Drives Informations
 * @source             	: /drives-info/drives.php
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
//require_once "[YOUR ROOT SITE PATH]/afw/autoload.php";
//require_once "../afw/autoload.php";

require_once "libs/functions.php";



use ASCOOS\FRAMEWORK\Kernel\Core\TError;
use ASCOOS\FRAMEWORK\Kernel\Disks\TDriveInfo; 
 
$script_path = str_replace('\\', '/', __DIR__);

// It contains a table with the block settings.
$conf = require "$script_path/conf/config.php";

// It contains a table with the texts in the selected language.
$lang = require "$script_path/langs/".$conf['lang'].".php";

// Contains a table with error messages in the selected language.
$errors = require "$script_path/langs/".$conf['lang'].".error.php";

$user = null; // OR User. If null, in Linux = /home/

try {            
	$objDriveInfo = new TDriveInfo;		// 
    $objDriveInfo->setUser($user);         // Set user. If null, in Linux = /home/ else /home/$user
    $info = $objDriveInfo->execute();      // Execute and return Drives data 
	$dsizes = $objDriveInfo->getDrivesSize();	// Παίρνουμε έναν πίνακα που περιέχει τα μεγέθη των δίσκων. 
} catch (TError $e) {
    echo $e;		// Display Error Message
    $e->Free($e);	// Free memory for object $e<TError>
} finally {
	$objDriveInfo->Free($objDriveInfo); // Free memory for object $objDriveInfo<TDriveInfo>
}	
	

$text = '';
$text .= '<div class="block-drives-info-'.$conf['theme'].'">';
if ($conf['show_title']) { 
    $text .= '<div class="header"><h3>'.$lang['title'].'</h3></div><div class="clear"></div>';
}

$text .= '<div class="text"><div class="table">';

$text .= '<div class="th">';
$text .= '<div class="cell">'.$lang['title_drives'].'</div>';   
if ($conf['show_total_size']) $text .= '<div class="cell right">'.$lang['total_size'].'</div>'; 
$text .= '</div>'; // row

//print_r($dsizes);

foreach ($info as $drive => $sizes) {       
    if (is_array($sizes)) {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $type = $lang['drive'].' ';
            $text2 = $errors['NotValidDisk'];
        } else {
            $type = $lang['directory'].' ';
            $text2 = $errors['NotValidDirectory'];              
        }
        

		$free_percentage = (int) (($dsizes[$drive]['free'] / $dsizes[$drive]['total']) * 100);
		$text_percentage = ' (Free : '.$free_percentage.'%)';
		$disk_icon = GetPercentageIcon($free_percentage);

        $text .= '<div class="row">';
        $text .= '<div class="cell"><details><summary>'.$disk_icon.$type.'<b>'.$drive.'</b>'.$text_percentage.'</summary>';
        $text .= '<div class="row"><div class="cell">'.$lang['used_space'].'</div><div class="cell right">'.$sizes['used'].'</div></div>';
        $text .= '<div class="row"><div class="cell">'.$lang['free_space'].'</div><div class="cell right">'.$sizes['free'].'</div></div>';
        $text .= '</details></div>'; // details 
        if ($conf['show_total_size']) $text .= '<div class="cell right">'.$sizes['total'].'</div>';
        $text .= '</div>'; // row
    } else { // Error Data
		$free_percentage = -1;
		$text_percentage = $errors['NoFoundData'];
		$disk_icon = GetPercentageIcon($free_percentage);		

        $text .= '<div class="row">';
        $text .= '<div class="cell"><details><summary>'.$disk_icon.$type.'<b>'.$drive.'</b>'.$text_percentage.'</summary>';
        $text .= '<div class="row"><div class="cell">'.$text2.'</div>';
        $text .= '</details></div>'; // details
        if ($conf['show_total_size']) $text .= '<div class="cell right"> ----- </div>';     
        $text .= '</div>'; // row       
    }       
}

$text .= '</div></div>'; // table/text
$text .= '<div class="more"><a target="_blank" href="https://extensions.ascoos.com/"><strong>...'.$lang['more'].'</strong></a></div>';
$text .= '</div>'; // block
echo $text;
?>

<script type="text/javascript">
$(document).ready(function() {
    $('head').append('<link rel="stylesheet" type="text/css" href="<?php echo 'themes/'.$conf['theme'].'/theme.css';?>">'); 
    $('details').on('toggle', function() {
        if (this.open) {
            $(this).find('summary').addClass('open');
        } else {
            $(this).find('summary').removeClass('open');
        }
    });	
});
</script>