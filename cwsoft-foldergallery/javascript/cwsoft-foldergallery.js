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
			// work out URL to original image
			var myregex = /_resampled\/SetRatioSize\d*-/i;
			var match = myregex.exec(this.href);
			if (match != null) {
				// add link to original image size to image title
				var originalImageUrl = this.href.replace(match, '');
				return this.title + '<a href="' + originalImageUrl + '" class="download-image" target="_blank">(Full size)</a>';
			}
			// return original title
			return this.title;
		}
	});
});