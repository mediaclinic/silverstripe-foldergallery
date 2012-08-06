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
	static $allowed_children = array('cwsFolderGalleryPage');
	static $db = array(
		'AlbumFolderID' => 'Int',
	);
	static $icon = 'cwsoft-foldergallery/images/foldergallery-page-icon.gif';
	static $plural_name = 'Foldergalleries';
	static $singular_name = 'Foldergallery';

	/**
	 * cwsFolderGalleryPage::getCMSFields()
	 * Adds dropdown field containing album folders (subfolders of assets/cwsoft-foldergallery)
	 * @return Backend fields
	 */
	function getCMSFields() {
		// create folder assets/cwsoft-foldergallery if not already exists
		Folder::find_or_make('cwsoft-foldergallery');

		// get default CMS fields
		$fields = parent::getCMSFields();

		// get "cwsoft-foldergallery" folder object
		$album = Folder::get()->filter('Filename', 'assets/cwsoft-foldergallery/')->First();
		if (! $album) return $fields;

		// add dropdown field with album folders (subfolders of assets/cwsoft-foldergallery)
		$tree = new TreeDropdownField(
			'AlbumFolderID', 
			_t(
				'cwsFolderGalleryPage.CHOOSE_IMAGE_FOLDER',
				'Choose image folder (subfolder assets/cwsoft-foldergallery/)'
			),
			'Folder'
		);
		$tree->setTreeBaseID((int) $album->ID);
		$fields->addFieldToTab("Root.Main", $tree, 'Content');
		
		return $fields;
	}
}
 
class cwsFolderGalleryPage_Controller extends Page_Controller {
	/**
	 * cwsFolderGalleryPage_Controller::init()
	 * Inlcudes the CSS and Javascript files required by the cwsoft-foldergallery module.
	 * @return void
	 */
	function init() {
		parent::init();
		
		// load cwsoft-foldergallery Javascript files into head
		Requirements::set_write_js_to_body(false);
		
		// include required cwsoft-foldergallery CSS and Javascript files
		Requirements::css('cwsoft-foldergallery/thirdparty/colorbox/colorbox.css');
		Requirements::css('cwsoft-foldergallery/css/cwsFolderGallery.css');
		Requirements::javascript('cwsoft-foldergallery/thirdparty/jquery/jquery.min.js');
		Requirements::javascript('cwsoft-foldergallery/thirdparty/colorbox/jquery.colorbox-min.js');
		Requirements::javascript('cwsoft-foldergallery/javascript/cwsFolderGallery.js');
	}

	/**
	 * cwsFolderGalleryPage_Controller::AlbumFolders()
	 * Returns album pages linked to actual page via $AlbumFolderID.
	 * Includes extras like album cover image, available album images and album page link.
	 * @return Folder objects
	 */
	public function AlbumFolders() {
		// extract all subpage objects (album pages)
		$pages = $this->Children();
		if (! $pages) return false;
		
		// store subpage data in array for further usage
		$data = $pages->toNestedArray();
		
		// add additional information to $data array
		$albumData = new ArrayList();
		foreach($data as $index => $pageData) {
			// extract all image objects matching $page->AlbumFolderID
			$albumImages = Image::get()->filter('ParentID', $pageData['AlbumFolderID']);
			
			// add extra information to data array
			$data[$index]['AlbumNumberImages'] = _t(
				'cwsFolderGalleryPage.NUMBER_OF_IMAGES',
				' (Images: {images})', 
				array('images' => $albumImages->Count())
			);
			$data[$index]['AlbumCoverImage'] = ($albumImages) ? $albumImages->First() : false;
			$data[$index]['AlbumURL'] = $pages[$index]->RelativeLink();			
			
			// add modified subpage data to ArrayList object
			$albumData->push(new ArrayData($data[$index]));
		}
		return $albumData;
	}

	/**
	 * cwsFolderGalleryPage_Controller::AlbumImages()
	 * Returns all image objects of the given page/album matching $AlbumFolderID. 
	 * @return Image objects
	 */
	public function AlbumImages() {
		// fetch all images from folder of actual album
		$albumFolder = Folder::get()->filter('ID', (int) $this->AlbumFolderID);
		return ($albumFolder) ? Image::get()->filter('ParentID', $albumFolder->First()->ID) : false;
	}
}