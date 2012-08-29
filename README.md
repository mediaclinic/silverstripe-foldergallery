# cwsoft-foldergallery module for CMS SilverStripe 3.x
The `cwsoft-foldergallery` module is a light weight folder based gallery for the [CMS SilverStripe 3](http://silverstripe.org) which enables to setup small to medium image galleries with ease.

## Features
- upload your images via Ftp or the SilverStripe files & media centre
- image description build from the image filename (e.g. "001-your-description.jpg" --> "Your description")
- sort images by optional prefixing image filenames with numbers (e.g. "001-first-image.jpg")
- automatic thumbnail creation of uploaded images
- enlarged image views are rendered via a jQuery Colorbox effect
- multiple albums support included (organized via subfolders)
- image gallery appearance fully customizable by templates files and CSS
- multilingual support included (actual: English and German language files included)

## Download
The latest stable release of the `cwsoft-foldergallery` module is available as ZIP or TAR archive in GitHubs [download area](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/downloads). [Older releases](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/tags) are still available for download, but are no longer maintained. The development history of the foldergallery module can be tracked via [GitHub](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/commits/master).

Note: An older, but unsupported version for SilverStripe 2.4.x can be found and downloaded in the [2.4.x branch](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/tree/2.4.x) at GitHub.

## License
The `cwsoft-foldergallery` module is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements
The minimum requirements to get the cwsoft-foldergallery module running on your SilverStripe installation are as follows:

- SilverStripe ***3.0.x*** or higher (recommended last stable 3.x version)
- PHP ***5.3*** or higher (recommended last stable PHP 5.3.x version)

## Installation
1. download latest archive from GitHub [download area](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/downloads)
2. unpack the archive on your local computer
3. upload the entire ***cwsoft-foldergallery*** folder to your SilverStripe root folder using your preferred Ftp program
4. update your SilverStripe database via `http://yourdomain.com/dev/build?flush=all`

## Usage
The required steps to create a single album page with the ***cwsoft-foldergallery*** module are explained below.

1. log into your SilverStripe backend and create a new page of type ***Foldergallery*** (this creates a subfolder *assets/cwsoft-foldergallery* if not already exists)
2. now create a album subfolder inside *assets/cwsoft-foldergallery* (via Ftp or SilverStripe "Files section")
3. upload images to the created album folder (via Ftp or SilverStripe "Files section")
4. rename your images to `XXX-your-image-description.ext` (XXX optional image order 000..999)
5. image description is fetched from the image filenames and put into human readable form: "Your image description"
6. switch to the gallery page created in step 1
7. choose a subfolder for your album from the dropdown list
8. add a album header and some description via the WYSIWYG field
9. save and publish the gallery page

### Using albums
The ***cwsoft-foldergallery*** supports multiple albums. An album is basically a child page of type `Folder Gallery` added to a parent of the same type. The parent page will automatically create thumbnail images for all albums (subpages) by extracting the first album image as cover image. Clicking on a album image will open the album site (subpage) providing a view of all album images contained in it.

To use the multiple albums features, create a page tree structure as follows:

	SilverStripe page tree:
	- Album overview (type: Foldergallery)
	  + Animals (type: Foldergallery)
	  + Buildings (type: Foldergallery)

A collage of the frontend view of cwsoft-foldergallery is shown below:

***Collage (album overview / album page / Colorbox effect):***
![](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/raw/master/.screenshots/cwsoft-foldergallery.png) 

## Known Issues
Known issues can be tracked and reported via GitHubs [issue tracking service](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/issues). If you run into any issues with the cwsoft-foldergallery module, visit the issue tracker and check if a similar issue was already reported. If not, just add a new topic descriping your issue.

## Questions
If you have questions or issues with cwsoft-foldergallery, please visit the [SilverStripe](http://www.silverstripe.org/all-other-modules/show/20738) forum thread and ask for feedback.

***Always provide the following information with your support request:***

 - detailed error description (what happens, what have you already tried ...)
 - the cwsoft-foldergallery version used
 - your PHP and SilverStripe version used
 - information about your operating system (e.g. Windows, Mac, Linux) incl. version
 - information of your browser and browser version used
