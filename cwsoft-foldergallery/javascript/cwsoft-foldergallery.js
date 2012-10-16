/**
 * A lightweight folder based gallery module for the CMS SilverStripe
 *
 * Default settings for the jQuery colorbox plugin.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 3
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
		escKey: true,
		title: function(){
			// check if displayed jQuery preview image was resized by SilverStripe
			var myregex = /_resampled\/SetRatioSize\d*-/i;
			var match = myregex.exec(this.href);
			if (match == null) {
				// jQuery shows original sized image, return image title
				return this.title;
			}

			// fetch URL to original image from resized image URL
			var originalImageUrl = this.href.replace(match, '');

			// insert link to left side of the jQuery close button to display original image in new window
			$("#cboxClose").after('<a href="' + originalImageUrl + '" target="_blank" class="cboxFullSizeView" title="Full size">Full size</a>');

			// return default jQuery image titel
			return this.title;
		}
	});
});