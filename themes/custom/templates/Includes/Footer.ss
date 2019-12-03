<footer class="bg-primary">
    <div class="container p-5">
        <div class="row justify-content-center">
            <% with SiteConfig %>
                <a class="navbar-brand" href="$BaseHref"><% if $Logo %>$Logo<% else %>$Title<% end_if %></a>
            <% end_with %>    
        </div>
    </div>
</footer>