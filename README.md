# Foldergallery module for CMS SilverStripe (2.4.x)
A lightweight folder based gallery module for the [SilverStripe CMS](http://silverstripe.org).

## Features
- easy upload of images via Ftp or the SilverStripe backend (Files & Images)
- thumbnails of uploaded images are created on the fly
- larger image scale appears on mouse click using a jQuery Colorbox effect
- image description is fetched from the image file name
- support for multiple albums included
- appearance of the thumbnails can be customized via template and CSS files
- multilingual support included (currently: English and German)

## Download
The latest stable release of the `cwsoft-foldergallery` module is available as ZIP or TAR archive in GitHubs [download area](https://github.com/cwsoft/silverstripe-foldergallery/downloads). [Previous releases](https://github.com/cwsoft/silverstripe-foldergallery/tags) are still available for download, but are no longer maintained. The development history of the foldergallery module can be tracked via [GitHub](https://github.com/cwsoft/silverstripe-foldergallery/commits/master).

## License
The cwsoft-foldergallery module is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements
The minimum requirements to get the cwsoft-foldergallery module running on your SilverStripe installation are as follows:

- SilverStripe ***2.4.5*** or higher (recommended last stable 2.4.x version)
- PHP ***5.2.2*** or higher (recommended last stable PHP 5.3.x version)

## Installation
1. download latest archive from GitHub [download area](https://github.com/cwsoft/silverstripe-foldergallery/downloads)
2. unpack the archive on your local computer
3. upload the entire ***cwsoft-foldergallery*** folder to your SilverStripe root folder using your preferred Ftp program
4. update your SilverStripe database via `http://yourdomain.com/dev/build?flush=all`

## Usage
The required steps to create a single album page with the ***cwsoft-foldergallery*** module are explained below.

1. log into your SilverStripe backend and create a new page of type ***Folder Gallery*** (this creates a subfolder *assets/cwsoft-foldergallery* if not already exists)
2. now create a album subfolder inside *assets/cwsoft-foldergallery* (via Ftp or SilverStripe "Files & Images")
3. upload images to the created album folder (via Ftp or SilverStripe "Files & Images" section)
4. rename your images to `XX-your-image-description.ext` (XX image order 00..99)
5. this will create nice looking image descriptions in the form: "Your image description"
6. switch to the gallery page created in step 1
7. choose a subfolder for your album from the dropdown list
8. add a album header and some description via the WYSIWYG field
9. save and publish the gallery page

### Using albums
The ***cwsoft-foldergallery*** supports multiple albums. An album is basically a child page of a page of type `Folder Gallery`. The parent page will automatically create a list with the links to the individual albums available (child pages). 

To use the multiple albums features, create a page tree structure as follows:

	SilverStripe page tree:
	- Gallery (type: Folder Gallery)
	  + Album 2011 (type: Folder Gallery)
	  + Album 2012 (type: Folder Gallery)

Screenshots of the frontend and backend view for a single cwsoft-foldergallery album page are shown below:

***Frontend view:***
![](https://github.com/cwsoft/silverstripe-foldergallery/raw/master/.screenshots/cwsoft-foldergallery-frontend.png) 

***Backend view:***
![](https://github.com/cwsoft/silverstripe-foldergallery/raw/master/.screenshots/cwsoft-foldergallery-backend.png) 

## Known Issues
Known issues can be tracked and reported via GitHubs [issue tracking service](https://github.com/cwsoft/silverstripe-foldergallery/issues). If you run into any issues with the cwsoft-foldergallery module, visit the issue tracker and check if a similar issue was already reported. If not, just add a new topic descriping your issue.

## Questions
If you have questions or issues with cwsoft-foldergallery, please visit the [SilverStripe](http://www.silverstripe.org/all-other-modules/show/19245) forum thread and ask for feedback.

***Always provide the following information with your support request:***

 - detailed error description (what happens, what have you already tried ...)
 - the cwsoft-foldergallery version used
 - your PHP and SilverStripe version used
 - information about your operating system (e.g. Windows, Mac, Linux) incl. version
 - information of your browser and browser version used
