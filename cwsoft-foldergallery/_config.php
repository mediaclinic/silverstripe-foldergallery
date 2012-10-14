<?php
/**
 * A lightweight folder based gallery module for the CMS SilverStripe
 *
 * Contains global settings for the SilverStripe CMS foldergallery module.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 3
 * @package     cwsoft-foldergallery
 * @version     2.2.0
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// ensure module is stored in folder "cwsoft-foldergallery"
$moduleName = 'cwsoft-foldergallery';
$folderName = basename(dirname(__FILE__));

if ($folderName != $moduleName) {
	user_error(
		_t(
			'_config.WRONG_MODULE_FOLDER', 
			'Please rename the folder "{folderName}" into "{moduleName}" to get the {moduleName} module working properly.',
			array('moduleName' => $moduleName, 'folderName' => $folderName)
		),
		E_USER_ERROR
	);
}

// defines size of cropped thumbnails in pixel (album cover image and album images)
// Note: adapt "css/cwsoft-foldergallery.css" if you change the dimensions below
define('CWS_FOLDERGALLERY_THUMBNAIL_IMAGE_WIDTH', 150);
define('CWS_FOLDERGALLERY_THUMBNAIL_IMAGE_HEIGHT', 115);

// defines number of albums and images displayed per page (pagination limit)
define('CWS_FOLDERGALLERY_ALBUMS_PER_PAGE', 16);
define('CWS_FOLDERGALLERY_IMAGES_PER_PAGE', 12);

// defines image quality of created thumbnails
GD::set_default_quality(95);

// extend image object to allow extraction of image description from it's filename
Object::add_extension('Image', 'cwsFolderGalleryImageExtension');
