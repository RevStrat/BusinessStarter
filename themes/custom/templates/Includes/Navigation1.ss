<% cached 'navigation', $List('SilverStripe\CMS\Model\SiteTree').max('LastEdited'), $List('SilverStripe\CMS\Model\SiteTree').count(), $CurrentLocale %>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <% with SiteConfig %>
            <a class="navbar-brand" href="$BaseHref"><% if $Logo %>$Logo<% else %>$Title<% end_if %></a>
        <% end_with %>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <% loop $Menu(1) %>
                    <li class="nav-item<% if $LinkingMode == 'current' %> active<% end_if %><% if Children %> dropdown<% end_if %>">
                        <a class="nav-link<% if Children %> dropdown-toggle<% end_if %>" href="<% if Children %>#<% else %>$Link<% end_if %>"<% if Children %> id="dropdown-$ID" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"<% end_if %>>$MenuTitle <% if $LinkingMode == 'current' %><span class="sr-only">(current)</span><% end_if %></a>
                        <% if Children %>
                            <div class="dropdown-menu" aria-labelledby="dropdown-$ID">
                                <% loop Children %>
                                    <a class="dropdown-item" href="$Link" title="$Title">$MenuTitle</a>
                                <% end_loop %>
                            </div>
                        <% end_if %>
                    </li>
                <% end_loop %>
            </ul>
        </div>
        
        <% include InlineSearch %>
        <% include LocaleSwitcher %>
    </div>
</nav>
<% end_cached %>