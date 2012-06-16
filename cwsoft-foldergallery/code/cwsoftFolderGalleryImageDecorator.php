<?php
/**
 * A lightweight folder based gallery module for the CMS SilverStripe
 *
 * Adds method Caption(), which fetches the image description from the image file name.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 2.4.x
 * @package     cwsoft-foldergallery
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

class cwsoftFolderGalleryImageDecorator extends DataObjectDecorator {
	public function Caption() {
		// fetches image caption from filename: "XX-your-image-description.ext" ==> "Your image description"
		if (preg_match('#\d\d-.+\.(jpg|gif|png)#i', $this->owner->Title)) {
			return ucfirst(str_replace('-', ' ', substr($this->owner->Title, 3, -4)));
		}
		return $this->owner->Title; 
	}
}