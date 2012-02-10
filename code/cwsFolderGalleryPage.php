<?php
/**
 * This file implements the main functionality of the Silverstripe CMS folder gallery module.
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

class cwsFolderGalleryPage extends Page {
	static $singular_name = 'Folder Gallery';
	static $plural_name = 'Folder Galleries';
	static $icon = CWS_FOLDERGALLERY_IMAGE;
	
	static $db = array('AlbumFolderID' => 'Int');

	function getCMSFields() {
		$fields = parent::getCMSFields();

		// create folder assets/csGallery if not already exists 
		Folder::findOrMake('cws-foldergallery');
		
		// add dropdown field with folders in assets/csgallery
		$album = DataObject::get_one("Folder", "Filename = 'assets/cws-foldergallery/'");
		if ($album) {
			$tree = new TreeDropdownField('AlbumFolderID', _t('cwsFolderGalleryPage.CHOOSEALBUMFOLDER','Please choose an image folder for this album (subfolder in assets/cws-foldergallery/)'), 'Folder');
			$tree->setTreeBaseID((int) $album->ID);
			$fields->addFieldToTab("Root.Content.Main", $tree, 'Content');
		}
		
		return $fields;
	}
}
 
class cwsFolderGalleryPage_Controller extends Page_Controller {
	function init() {
		parent::init();
		
		// include jQuery and Colorbox plugin files to head section 
		Requirements::set_write_js_to_body(false);
		Requirements::css(CWS_FOLDERGALLERY_DIR .'/thirdparty/colorbox/colorbox.css');
		Requirements::css(CWS_FOLDERGALLERY_DIR . '/css/foldergallery.css');
		Requirements::javascript(CWS_FOLDERGALLERY_DIR . '/thirdparty/jquery/jquery.min.js');
		Requirements::javascript(CWS_FOLDERGALLERY_DIR . '/thirdparty/colorbox/jquery.colorbox-min.js');
		Requirements::javascript(CWS_FOLDERGALLERY_DIR . '/javascript/foldergallery.js');
	}

	public function Album() {
		$album = DataObject::get_one("Folder", "ID = '" . (int) $this->AlbumFolderID . "'");
		return $album;
	}

	public function AlbumImages() {
		// return all image objects located in selected album folder
		$album = $this->Album();
		return ($album) ? DataObject::get("Image", "ParentID = '{$album->ID}'") : false;
	}
}