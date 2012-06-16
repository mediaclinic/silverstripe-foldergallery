/**
 * A lightweight folder based gallery module for the CMS SilverStripe
 *
 * Default settings for the jQuery colorbox plugin.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 2.4.x
 * @package     cwsoft-foldergallery
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

$(document).ready(function(){
	$("a[rel='album']").colorbox({
		transition: 'fade', 	// fade, ellastic, none
		speed: 300, 
		maxWidth: '800px', 
		maxHeight: '800px',
		current: '{current}/{total}',
		arrowKey: true,
		escKey: true
	});
});