<?php
/**
 * A lightweight folder based gallery module for the CMS SilverStripe
 *
 * Adds method Caption(), which fetches the image description from the image file name.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 3
 * @package     cwsoft-foldergallery
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

class cwsFolderGalleryImageExtension extends DataExtension {
	public function Caption() {
		// extract image caption from image filename and make it available via $Caption
        // Strips off optional image order numbers and image extension
        // Example: "xxx-your-image-description.ext" ==> "Your image description"
		if (preg_match('#(\d*-)?(.+)\.(jpg|gif|png)#i', $this->owner->Title, $matches)) {
			return ucfirst(str_replace('-', ' ', $matches[2]));
		}
		return $this->owner->Title; 
	}
}