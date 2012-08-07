<div id="cwsoft-foldergallery">

<% if $AlbumFolders %>
	<strong>
		<%t Foldergallery.AVAILABLE_ALBUMS 'Available Albums' %>: $AlbumFolders.Count
	</strong>
	
	<div class="album">
		<% loop $AlbumFolders %>
			<a href="$AlbumURL" title="<%t Foldergallery.ALBUM 'Album' %>: $Title <%t Foldergallery.NUMBER_OF_IMAGES '(Images: {images})' images=$AlbumNumberImages %>">
				<% with $AlbumCoverImage %>
					<% include CreateThumbnail %>
				<% end_with %>
			</a>
		<% end_loop %>
	</div>

<% else %>
	<% if $AlbumImages %>
		<strong>
			<%t Foldergallery.AVAILABLE_IMAGES 'Available Images' %>: $AlbumImages.Count
		</strong>		
		<div class="photo">
			<% loop $AlbumImages %>
				<a href="$URL" rel="album" title="$Caption">
					<% include CreateThumbnail %>
				</a>
			<% end_loop %>
		</div>
	<% else %>
		<blockquote>
			<strong><%t NOTE 'Note' %>:</strong>
			<%t Foldergallery.ALBUM_HAS_NO_IMAGES 'This album has no images assigned yet (try synchronizing the assets folder).' %>
		</blockquote>
	<% end_if %>
<% end_if %>
	
<% if $Parent %>
	<div class="backlink">
		<a href="$Parent.Link" title="$Parent.MenuTitle" >
			&raquo; <%t Foldergallery.BACK_TO_ALBUM_OVERVIEW 'Back to album overview' %>
		</a>
	</div>
<% end_if %>

</div>