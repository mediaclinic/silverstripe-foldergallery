# FolderGallery module for CMS Silverstripe (2.4.5)

The latest version and code changes of the ***silverstripe-foldergallery*** can be found on [GitHub](https://github.com/cwsoft/silverstripe-foldergallery).

## About silverstripe-foldergallery

The ***silverstripe-foldergallery*** is a simple gallery module for the CMS Silverstripe. The gallery images are loaded from a given subfolder inside the Silverstripe ***/assets*** folder. Images needs either be uploaded via FTP or via the Silverstripe media manager itself.

The foldergallery supports the automatic creation of thumbnails and displays the images with a nice jQuery colorbox effect. Image captions are extracted from the image file name:

        XX-your-image-description.ext --> Your image description
		(where XX (00..99) reflects desired image ordering)

## Prerequisites

CMS Silverstripe version 2.4.5 (not tested for upcoming v3 release yet).

## Installation

The installation follows the standard Silverstripe installation process:

1. download archive of the latest version from the [GitHub repository](https://github.com/cwsoft/silverstripe-foldergallery/downloads)
2. extract the downloaded archive on your local computer
3. ftp entire subfolder ***silverstripe-foldergallery*** to your Silverstripe root folder
4. build required database entries using Silverstripe build mechanism

        yourdomain.com/dev/build?flush=all

## Using the foldergallery

1. log into Silverstripe backend and create a gallery page of type ***cwsFolderGalleryPage***
2. switch to Silverstripes "media & image" section
3. create a subfolder inside ***assets/cws-foldergallery*** to store all images of a specific album
4. upload images to the created subfolder (use FTP or Silverstripe media manager)
5. use reload function of Silverstripe media section to update the database content (if uploaded via FTP)
6. switch to the created gallery page and choose a subfolder for your album the dropdown list
7. add some text via the WYSIWYG editor
8. save and publish the page and you are done

### Using albums
To organize your images in albums, create a container (parent) page of type cwsFolderGalleryPage in Silverstripe. An album is basically a child page (type cwsFolderGalleryPage). The parent page will automatically create a list with links to the albums (child pages). 

**An example page tree structure for a gallery with two albums is shown below:**

<pre>
Silverstripe page tree:
 - My Gallery (type: cwsFolderGalleryPage)
   - Album 2011 (type: cwsFolderGalleryPage)
   - Album 2012 (type: cwsFolderGalleryPage)
</pre>
 
