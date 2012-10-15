# cwsoft-foldergallery module for CMS SilverStripe 3.x
The `cwsoft-foldergallery` module is a light weight folder based gallery for the [CMS SilverStripe 3](http://silverstripe.org) which enables to setup small to medium image galleries with ease.

## Features
- image upload via Ftp or the SilverStripe files & media centre
- image description built from image filenames (e.g. "001-your-description.jpg" --> "Your description")
- image order can be defined by optional prefixing image filenames with numbers (e.g. "001-first-image.jpg")
- automatic thumbnail creation of uploaded images
- automatic image resize of preview images used in jQuery effect (full image accessable via jQuery image)
- pagination of albums and images (number of albums/images per pages configurable via "_config.php")
- multiple albums support included (organized via subfolders)
- image gallery appearance customizable via template and CSS files
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
To setup a `cwsoft-foldergallery` page with two albums "Animals" and "Buildings", just follow the steps shown in the sketch below. The steps below assume you have already installed the module before.

![](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/raw/master/.screenshots/cwsoft-foldergallery-backend.png) 

1. Create a page of type `Foldergallery` (will serve as album overview) and save it (saving will create the folder 'assets/cwsoft-foldergallery for you)
2. Create album folders `animals` and `buildings` inside `assets/cwsoft-foldergallery` via SilverStripe Files section and upload images to it. Images named "001-this-will-be-the-first-image.jpg" get a description as follows: "This will be the first image". The first image in an album folder will be used as album cover image.
3. For the album overview page (container), we do not need to select an album image folder. This step is only required for the album children pages created in step 5
4. Provide a description for the album overview page or the album pages via the WYSIWYG editor and save the page if done
5. Now create child pages of type `Foldergallery` for the albums `Animals` and `Buildings`. Choose the album image folder from the dropdown box (3) and provide a album description via the WYSIWYG editor (4) and save the pages

Tip: If you do just want to show a single page with images on it, just follow steps 1 through 4, but choose an image folder in step 3. 

A collage of the frontend view for this set-up is shown below:

***Collage (album overview / album page / Colorbox effect):***
![](https://github.com/cwsoft/silverstripe-cwsoft-foldergallery/raw/master/.screenshots/cwsoft-foldergallery-frontend.png) 

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
