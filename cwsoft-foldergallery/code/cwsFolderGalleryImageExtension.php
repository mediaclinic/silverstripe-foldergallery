<?php
/**
 * A lightweight folder based gallery module for the CMS SilverStripe
 *
 * Extends Image objects to provide image caption build from the filename.
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
	/**
	 * Image::Caption()
	 * Creates an image caption from the image filename. 
	 * Strips off optional image order numbers and image extension.
	 * Example: "xxx-your-image-description.ext" ==> "Your image description"
	 *
	 * @return String with image caption
	 */
	public function Caption() {
		if (preg_match('#(\d*-)?(.+)\.(jpg|gif|png)#i', $this->owner->Title, $matches)) {
			return ucfirst(str_replace('-', ' ', $matches[2]));
		}
		return $this->owner->Title;
	}
}