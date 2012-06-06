<div id="content" class="typography">
$Content

<% if AllChildren %>
	<b><% _t('AVAILABLECATEGORIES','Available Categories') %>:</b>
	
	<ul>
	<% control AllChildren %>
		<% if ClassName == "cwsFolderGalleryPage" %>
			<li><a href="$Link" title="$Title">$MenuTitle</a>: $Title</li>
		<% end_if %>
	<% end_control %>
	</ul>

<% else %>
	<% if AlbumImages %>
		<div class="cws-foldergallery">
		<% control AlbumImages %>
			<% if getOrientation == 2 %>
				<a href="$URL" rel="album" title="$Caption">$SetRatioSize(150,150)</a>
			<% else %>
				<a href="$URL" rel="album" title="$Caption">$CroppedImage(150,150)</a>
			<% end_if %>
		<% end_control %>
		</div>

	<% else %>
		<blockquote>
			<b><% _t('NOTE','Note') %>:</b>
			<% _t('ALBUMHASNOIMAGES','This album has no images assigned yet (try synchronizing the assets folder)') %>
		</blockquote>

	<% end_if %>

<% end_if %>
	
<% if Parent %>
	<div id="cws-foldergallery-album">
		<a href="$Parent.Link" title="$Parent.MenuTitle" >&raquo; <% _t('BACKTOALBUMOVERVIEW','Back to album overview') %></a>
	</div>
<% end_if %>
</div>