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
	// decorate Image object with additional ExifDate field
	private static $db = array('ExifDate' => 'SS_Datetime');

	/**
	 * Function Caption()
	 * Creates an image caption from the image filename. 
	 * Strips off optional image order numbers and image extension.
	 * Example: "xxx-your-image-description.ext" ==> "Your image description"
	 *
	 * @return String with image caption
	 */
	public function Caption() {
		if (preg_match('#(\d*-)?(.+)\.(jpg|jpeg|gif|png|tif|tiff)#i', $this->owner->Title, $matches)) {
			return ucfirst(str_replace('-', ' ', $matches[2]));
		}
		return $this->owner->Title;
	}

	/**
	 * Function ExifData()
	 * Returns EXIF data defined by $field from images (JPEG, TIFF) stored by the camera.
	 *
	 * @return requested Exif data
	 */
	public function ExifData($field='DateTimeOriginal') {
		// only JPEG and TIFF files contain EXIF data
		$image_extension = strtolower($this->owner->Extension);
		if (! in_array($image_extension, array('jpg', 'jpeg', 'tif', 'tiff'))) {
			return null;
		}

		// extract requested EXIF field
		$image_path = Director::getAbsFile($this->owner->Filename);
		$exif_data = exif_read_data($image_path, 'EXIF', false, false);
		$exif_field = isset($exif_data[$field]) ? $exif_data[$field] : null;
		return $exif_field;
	}

	/**
	 * Function writeExifDates()
	 * Creates/updates the ExifDate DB column of all image objects.
	 * If $parentId is set, only objects assigned to ParentId are updated.
	 * @return void
	 */
	public static function writeExifDates($parentId=null) {
		// fetch all requested image objects
		if (is_numeric($parentId)) {
			$images = Image::get()->filter('ParentID', $parentID);
		} else {
			$images = Image::get();
		}

		if (! $images->exists()) return false;

		// write/update Image.ExifDate database columns
		foreach ($images as $image) {
			// get exif original storage date if available
			$exif_date = $image->ExifData($field='DateTimeOriginal');
			$exif_date = is_null($exif_date) ? $image->Created : $exif_date;

			// update database field
			$image->ExifDate = $exif_date;
			$image->write();
		}
	}
}