<div class="card-$GroupStyle">
    <% loop Cards.Sort('SortOrder', 'ASC') %>
        <% include Card %>
    <% end_loop %>
</div>