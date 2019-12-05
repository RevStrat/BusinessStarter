<footer class="py-4 bg-dark text-white-50">
    <div class="container text-center text-md-left">
        <div class="row">
            <nav class="nav flex-column">
                <% loop $FooterMenu %>
                    <a class="nav-link<% if $LinkingMode == 'current' %> active<% end_if %>" href="$Link">$MenuTitle <% if $LinkingMode == 'current' %><span class="sr-only">(current)</span><% end_if %></a>
                <% end_loop %>
            </nav> 
        </div>
    </div>
</footer>