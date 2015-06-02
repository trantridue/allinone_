<form>
	<table width="100%" class="searchcriteriatable">
		<tr>
			<td style="text-align: right;">Description :</td>
			<td><textarea name="search_news_description" id="search_news_description" cols="80" rows="4"></textarea></td>
			<td style="text-align: right;"></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2"><input type="button" class="menu_btn_sub"
				value="SEARCH NEWS" onclick="listNews('true');"><input type="button" class="menu_btn_sub"
				value="SHOW ADD" onclick="$('#search_news_description').val('');toggleDiv('searchNewsAreaId');toggleDiv('addNewsAreaId');"></td>
			<td></td>
		</tr>
	</table>
</form>