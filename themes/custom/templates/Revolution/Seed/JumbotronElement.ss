<div class="jumbotron<% if FullWidth %> jumbotron-fluid break-out<% end_if %>">
    <% if $FullWidth %><div class="container"><% end_if %>
    <% if $ShowTitle %>
        <h3>$Title</h3>
    <% end_if %>
    $HTML
    <% if $FullWidth %></div><% end_if %>
</div>