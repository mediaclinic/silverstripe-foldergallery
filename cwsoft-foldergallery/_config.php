<?php
/**
 * A lightweight folder based gallery module for the CMS SilverStripe
 *
 * Contains global settings for the SilverStripe CMS foldergallery module.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 2.4.x
 * @package     cwsoft-foldergallery
 * @author      cwsoft (http://cwsoft.de)
 * @version     1.1.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// set the folder name of the foldergallery module
define('CWS_FOLDERGALLERY_DIR', basename(dirname(__FILE__)));
define('CWS_FOLDERGALLERY_IMAGE', CWS_FOLDERGALLERY_DIR . '/images/foldergallery-page');

// decorate image to allow extraction of image description from it's file name
Object::add_extension('Image', 'cwsFolderGalleryImageDecorator');

// increase default image quality of thumbnails
GD::set_default_quality(95);