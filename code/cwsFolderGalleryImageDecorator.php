<?php
/**
 * Decorates the dataobject to provide some additional information.
 * ADDITIONAL DATAOBJECT METHODS:
 * $Object.Caption => caption from object title (object-title.ext ==> Object title)
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform	CMS Silverstripe 2.4.5
 * @package		silverstripe-foldergallery
 * @author		cwsoft (http://cwsoft.de)
 * @version		1.0.0
 * @copyright	cwsoft
 * @license		http://www.gnu.org/licenses/gpl.html
*/

class cwsFolderGalleryImageDecorator extends DataObjectDecorator {
	public function Caption() {
		// creates a nice caption from title: "XX-your-image-description.ext" ==> "Your image description"
		if (preg_match('#\d\d-.+\.(jpg|gif|png)#i', $this->owner->Title)) {
			return ucfirst(str_replace('-', ' ', substr($this->owner->Title, 3, -4)));
		}
		return $this->owner->Title; 
	}
}