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
	static $db = array('AlbumFolderID' => 'Int');
	static $icon = 'cwsoft-foldergallery/images/page-tree-icon.gif';
	static $plural_name = 'Foldergalleries';
	static $singular_name = 'Foldergallery';
	static $description = 'Folder based gallery';

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
		$fields->addFieldToTab('Root.Main', $tree, 'Content');
		
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
		
		// include i18n Javascript library and lang files
		// it doesn't work without the meta-tag (see http://open.silverstripe.org/ticket/7949)
		Requirements::insertHeadTags('<meta http-equiv="Content-language" content="' . i18n::get_locale() . '" />');
		Requirements::javascript(FRAMEWORK_DIR . "/javascript/i18n.js");
		Requirements::add_i18n_javascript('cwsoft-foldergallery/javascript/lang');
		
		// load cwsoft-foldergallery Javascript files into head
		Requirements::set_write_js_to_body(false);
		
		// include required cwsoft-foldergallery CSS and Javascript files
		Requirements::css('cwsoft-foldergallery/thirdparty/colorbox/colorbox.css');
		Requirements::css('cwsoft-foldergallery/css/cwsoft-foldergallery.css');
		Requirements::javascript('cwsoft-foldergallery/thirdparty/jquery/jquery.min.js');
		Requirements::javascript('cwsoft-foldergallery/thirdparty/colorbox/jquery.colorbox-min.js');
		Requirements::javascript('cwsoft-foldergallery/javascript/cwsoft-foldergallery.js');
	}

	/**
	 * cwsFolderGalleryPage_Controller::AlbumFolders()
	 * Returns paginated list of all album pages linked to the actual page via $AlbumFolderID.
	 * Includes extras like album cover image, available album images and album page link.
	 * @return Folder objects
	 */
	public function AlbumFolders() {
		// extract all subpage objects (album pages)
		$pages = $this->Children();
		if (! $pages->exists()) return false;
		
		// store subpage data in array for further usage
		$data = $pages->toNestedArray();
		
		// add additional information to $data array
		$albumData = new ArrayList();
		foreach($data as $index => $pageData) {
			// extract number of assigned sub albums (child pages below actual page)
			$subAlbums = SiteTree::get()->filter('ID', $pageData['ID'])->First()->Children();
			$data[$index]['AlbumNumberSubAlbums'] = ($subAlbums) ? $subAlbums->Count() : 0;

			// extract all image objects matching $page->AlbumFolderID
			$albumImages = Image::get()->filter('ParentID', $pageData['AlbumFolderID']);
			
			// add extra information to data array
			$data[$index]['AlbumNumberImages'] = $albumImages->Count();
			$data[$index]['AlbumCoverImage'] = ($albumImages) ? $albumImages->First() : false;
			$data[$index]['AlbumURL'] = $pages[$index]->RelativeLink();			
			
			// add modified subpage data to ArrayList object
			$albumData->push(new ArrayData($data[$index]));
		}
		// return paginated list of album pages
		$albumList = new PaginatedList($albumData, $this->request);
		
		// set page limit of displayed images to value defined in _config.php
		if ($albumList) {
			$albumList->setPageLength(CWS_FOLDERGALLERY_ALBUMS_PER_PAGE);
		}
		
		return $albumList;
	}

	/**
	 * cwsFolderGalleryPage_Controller::AlbumImages()
	 * Returns a paginated list of all image objects contained in page/album matching $AlbumFolderID 
	 * @return Image objects
	 */
	public function AlbumImages() {
		// get album folder matching assigned albumFolderID
		$albumFolder = Folder::get()->filter('ID', (int) $this->AlbumFolderID);
		if (! $albumFolder->exists()) return false;
		
		// fetch all images objects of actual folder and wrap it into paginated list
		$images = Image::get()->filter('ParentID', $albumFolder->First()->ID);
		$imageList = ($images->exists()) ? new PaginatedList($images, $this->request) : false;
		
		// set page limit of displayed images to value defined in _config.php
		if ($imageList) {
			$imageList->setPageLength(CWS_FOLDERGALLERY_IMAGES_PER_PAGE);
		}
		
		return $imageList;
	}

	/**
	 * cwsFolderGalleryPage_Controller::getPreviewImageMaxSize()
	 * Returns maximum jQuery preview image size in pixel
	 * @return Integer
	 */
	public function getPreviewImageMaxSize() {
		return (int) CWS_FOLDERGALLERY_PREVIEW_IMAGE_MAX_SIZE;
	}
	
	/**
	 * cwsFolderGalleryPage_Controller::getThumbnailHeight()
	 * Returns thumbnail height in pixel
	 * @return Integer
	 */
	public function getThumbnailHeight() {
		return (int) CWS_FOLDERGALLERY_THUMBNAIL_IMAGE_HEIGHT;
	}
	
	/**
	 * cwsFolderGalleryPage_Controller::getThumbnailWidth()
	 * Returns thumbnail width in pixel
	 * @return Integer
	 */
	public function getThumbnailWidth() {
		return (int) CWS_FOLDERGALLERY_THUMBNAIL_IMAGE_WIDTH;
	}
}