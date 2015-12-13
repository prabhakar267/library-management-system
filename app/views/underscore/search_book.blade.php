<tr>
	<td><%= obj.book_id %></td>
	<td><%= obj.title %></td>
	<td><%= obj.author %></td>
	<td><%= obj.description %></td>
	<td><%
		for(var i=0; i<categories_list.length; i++){
			if(obj.category_id == categories_list[i].id){
		%>
			<%= categories_list[i].category %>
		<%
			}
		}
		%></td>
	<td><%= obj.avaliability %></td>
</tr>