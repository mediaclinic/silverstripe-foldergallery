<div class="content-container typography">	
	<article>
		<h1>$Title</h1>
		<div class="content">
			$Content

<% if $AllChildren %>
	<b><% _t('AVAILABLECATEGORIES', 'Available Categories') %>:</b>
	
	<ul>
	<% loop $AllChildren %>
		<% if $ClassName == "cwsFolderGalleryPage" %>
			<li><a href="$Link" title="$Title">$MenuTitle</a>: $Title</li>
		<% end_if %>
	<% end_loop %>
	</ul>

<% else %>
	<% if $AlbumImages %>
		<div class="cwsoft-foldergallery">
		<% loop $AlbumImages %>
			<% if $Orientation == "2" %>
				<a href="$URL" rel="album" title="$Caption">$SetRatioSize(150,150)</a>
			<% else %>
				<a href="$URL" rel="album" title="$Caption">$CroppedImage(150,150)</a>
			<% end_if %>
		<% end_loop %>
		</div>

	<% else %>
		<blockquote>
			<b><% _t('NOTE', 'Note') %>:</b>
			<% _t('ALBUMHASNOIMAGES', 'This album has no images assigned yet (try synchronizing the assets folder)') %>
		</blockquote>

	<% end_if %>

<% end_if %>
	
<% if $Parent %>
	<div id="cwsoft-foldergallery-album">
		<a href="$Parent.Link" title="$Parent.MenuTitle" >&raquo; <% _t('BACKTOALBUMOVERVIEW','Back to album overview') %></a>
	</div>
<% end_if %>

		</div>
	</article>
	$Form
	$PageComments
</div>
<% include SideBar %>