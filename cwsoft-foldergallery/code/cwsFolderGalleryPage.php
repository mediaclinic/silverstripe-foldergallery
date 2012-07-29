<?php
/**
 * A lightweight folder based gallery module for the CMS SilverStripe
 *
 * Implements the main functionality of the cwsoft-foldergallery module.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS SilverStripe 3
 * @package     cwsoft-foldergallery
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

class cwsFolderGalleryPage extends Page {
	static $singular_name = 'Foldergallery';
	static $plural_name = 'Foldergalleries';
	static $icon = 'cwsoft-foldergallery/images/foldergallery-page-icon.gif';
	
	static $db = array('AlbumFolderID' => 'Int');

	function getCMSFields() {
		// create folder assets/cwsoft-foldergallery if not already exists
		Folder::find_or_make('cwsoft-foldergallery');

		$fields = parent::getCMSFields();

		// add dropdown field with subfolders in assets/cwsoft-foldergallery above content field
		$album = Folder::get()->filter('Filename', 'assets/cwsoft-foldergallery/')->First();

		if ($album) {
			$tree = new TreeDropdownField(
				'AlbumFolderID', 
				_t(
					'cwsFolderGalleryPage.CHOOSEALBUMFOLDER',
					'Choose album folder (subfolder assets/cwsoft-foldergallery/)'
				),
				'Folder'
			);
			$tree->setTreeBaseID((int) $album->ID);
			$fields->addFieldToTab("Root.Main", $tree, 'Content');
		}
		
		return $fields;
	}
}
 
class cwsFolderGalleryPage_Controller extends Page_Controller {
	function init() {
		parent::init();
		
		// include jQuery and Colorbox plugin files to head section 
		Requirements::set_write_js_to_body(false);
		Requirements::css('cwsoft-foldergallery/thirdparty/colorbox/colorbox.css');
		Requirements::css('cwsoft-foldergallery/css/cwsFolderGallery.css');
		Requirements::javascript('cwsoft-foldergallery/thirdparty/jquery/jquery.min.js');
		Requirements::javascript('cwsoft-foldergallery/thirdparty/colorbox/jquery.colorbox-min.js');
		Requirements::javascript('cwsoft-foldergallery/javascript/cwsFolderGallery.js');
	}

	public function Album() {
		// return album object for the user defined subfolder
		$album = Folder::get()->filter('ID', (int) $this->AlbumFolderID)->First();
		return $album;
	}

	public function AlbumImages() {
		// return all image objects located in selected album folder
		$album = $this->Album();
		return ($album) ? Image::get()->filter('ParentID', $album->ID) : false;
	}
}