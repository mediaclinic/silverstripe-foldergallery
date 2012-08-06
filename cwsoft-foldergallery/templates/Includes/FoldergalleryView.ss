<div id="cwsoft-foldergallery">

<% if $AlbumFolders %>
	<strong><% _t('AVAILABLE_ALBUMS', 'Available Albums') %>:</strong>
	
	<div class="album">
	<% loop $AlbumFolders %>
		<% if $AlbumCoverImage.Orientation == 2 %>
			<a href="$AlbumURL" title="<% _t('ALBUM', 'Album') %>: $Title $AlbumNumberImages">
				$AlbumCoverImage.SetRatioSize(150,150)
			</a>
		<% else %>
			<a href="$AlbumURL" title="<% _t('ALBUM', 'Album') %>: $Title $AlbumNumberImages">
				$AlbumCoverImage.CroppedImage(150,150)
			</a>
		<% end_if %>
	<% end_loop %>
	</div>

<% else %>
	<% if $AlbumImages %>
		<div class="photo">
		<% loop $AlbumImages %>
			<% if $Orientation == 2 %>
				<a href="$URL" rel="album" title="$Caption">
					$SetRatioSize(150,150)
				</a>
			<% else %>
				<a href="$URL" rel="album" title="$Caption">
					$CroppedImage(150,150)
				</a>
			<% end_if %>
		<% end_loop %>
		</div>

	<% else %>
		<blockquote>
			<b><% _t('NOTE', 'Note') %>:</b>
			<% _t('ALBUM_HAS_NO_IMAGES', 'This album has no images assigned yet (try synchronizing the assets folder)') %>
		</blockquote>
	<% end_if %>

<% end_if %>
	
<% if $Parent %>
	<div class="backlink">
		<a href="$Parent.Link" title="$Parent.MenuTitle" >
			&raquo; <% _t('BACK_TO_ALBUM_OVERVIEW','Back to album overview') %>
		</a>
	</div>
<% end_if %>

</div>