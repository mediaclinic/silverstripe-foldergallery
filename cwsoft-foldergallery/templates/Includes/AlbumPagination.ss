<% if AlbumFolders.MoreThanOnePage %>
	<div class="pagination">
		<% if AlbumFolders.NotFirstPage %>
			<a class="prev" href="$AlbumFolders.PrevLink">Prev</a>
		<% end_if %>
    
		<% loop AlbumFolders.Pages %>
			<% if CurrentBool %>
				$PageNum
			<% else %>
				<% if Link %>
					<a href="$Link">$PageNum</a>
				<% else %>
							...
				<% end_if %>
			<% end_if %>
		<% end_loop %>
    
		<% if AlbumFolders.NotLastPage %>
			<a class="next" href="$AlbumFolders.NextLink">Next</a>
		<% end_if %>
	</div>	
<% end_if %>	
