<% with SiteConfig %>
    <% if $Facebook %><a href="$Facebook" target="_blank" rel="noopener noreferrer" name="Facebook" aria-label="Facebook"><% include Facebook %></a><% end_if %>
    <% if $Instagram %><a href="$Instagram" target="_blank" rel="noopener noreferrer" name="Instagram" aria-label="Instagram"><% include Instagram %></a><% end_if %>
    <% if $LinkedIn %><a href="$LinkedIn" target="_blank" rel="noopener noreferrer" name="LinkedIn" aria-label="LinkedIn"><% include LinkedIn %></a><% end_if %>
    <% if $Twitter %><a href="$Twitter" target="_blank" rel="noopener noreferrer" name="Twitter" aria-label="Twitter"><% include Twitter %></a><% end_if %>
<% end_with %>