<?php
/**
 * This file contains the global settings of the Silverstripe CMS foldergallery module.
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

// dynamically define folder name of cws-foldergallery module
define('CWS_FOLDERGALLERY_DIR', basename(dirname(__FILE__)));
define('CWS_FOLDERGALLERY_IMAGE', CWS_FOLDERGALLERY_DIR . '/images/foldergallery-page');

// add image decorator which allows to retrieve a description from a image filename
Object::add_extension('Image', 'cwsFolderGalleryImageDecorator');

// increase default image quality of thumbnails
GD::set_default_quality(95);