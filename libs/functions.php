<?php 
/**
 * @package            	: Disk Drives Informations
 * @source             	: /drives-info/libs/functions.php
 * @version            	: 1.0.0
 * @created            	: 2024-11-27 07:00:00 UTC+3
 * @updated            	: 
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 8.2.0
 */
function GetPercentageIcon(int $percentage): string {
    switch ($percentage) {
        case $percentage >= 90: return ' ⚪ ';  // Green circle		
        case $percentage >= 75: return ' 🟢 ';  // Green circle
        case $percentage >= 50: return ' 🔵 ';  // Blue circle
        case $percentage >= 30: return ' 🟣 ';  // Purple circle
        case $percentage >= 20: return ' 🟡 ';  // Orange circle
        case $percentage >= 10: return ' 🟠 ';  // Orange circle
        case $percentage >= 0: return ' 🔴 ';  // Orange circle		
        case $percentage < 0: return ' ⚫ ';  // Orange circle			
		default: return ' ⚫ ';  // Red circle
		
    }
}

?>