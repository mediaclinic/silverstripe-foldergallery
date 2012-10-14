<div id="cwsoft-foldergallery">

<% if $AlbumFolders %>
	<strong>
		<%t Foldergallery.DISPLAYED_ALBUMS 'Displayed albums' %>: 
		
		<% if $AlbumFolders.MoreThanOnePage %>
			{$AlbumFolders.FirstItem}-{$AlbumFolders.LastItem} / $AlbumFolders.Count
		<% else %>
			$AlbumFolders.Count / $AlbumFolders.Count
		<% end_if %>
	</strong>
	
	<div class="album">
		<% loop $AlbumFolders %>
			<% if $AlbumNumberSubAlbums == 0 %>
				<a href="$AlbumURL" title="<%t Foldergallery.ALBUM 'Album' %>: $Title <%t Foldergallery.NUMBER_OF_IMAGES '(Images: {images})' images=$AlbumNumberImages %>">
					<% with $AlbumCoverImage %>
						$CroppedImage($Top.ThumbnailWidth, $Top.ThumbnailHeight)
					<% end_with %>
				</a>
			
			<% else %>
				<a href="$AlbumURL" title="<%t Foldergallery.ALBUM 'Album' %>: $Title <%t Foldergallery.NUMBER_OF_SUB_ALBUMS '(Sub albums: {subAlbums})' subAlbums=$AlbumNumberSubAlbums %>">
					<img src="cwsoft-foldergallery/images/subfolder.png" class="subfolder" alt="subfolders"/>
				</a>
			<% end_if %>
		<% end_loop %>
	</div>

	<% include AlbumPagination %>
	
<% else %>
	<% if $AlbumImages %>
		<strong>
			<%t Foldergallery.DISPLAYED_IMAGES 'Displayed images' %>:

			<% if $AlbumImages.MoreThanOnePage %>
				{$AlbumImages.FirstItem}-{$AlbumImages.LastItem} / $AlbumImages.Count
			<% else %>
				$AlbumImages.Count / $AlbumImages.Count
			<% end_if %>
		</strong>		
		
		<div class="photo">
			<% loop $AlbumImages %>
				<a href="$SetRatioSize($Top.PreviewImageMaxSize, $Top.PreviewImageMaxSize).URL" rel="album" title="$Caption">
					$CroppedImage($Top.ThumbnailWidth, $Top.ThumbnailHeight)
				</a>
			<% end_loop %>
		</div>
	
		<% include ImagePagination %>
	
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