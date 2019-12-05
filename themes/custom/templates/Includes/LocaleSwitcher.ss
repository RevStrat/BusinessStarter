<% if $Locales %>
<div class="dropdown my-3 my-lg-0 ml-lg-3">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="localeSwitcher" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        $SelectedLanguage.Title
    </button>
    <div class="dropdown-menu" aria-labelledBy="localeSwitcher">
        <% loop $Locales %>
            <% if $LinkingMode != 'current' %><a class="dropdown-item" href="$Link.ATT" <% if $LinkingMode != 'invalid' %>rel="alternate" hreflang="$LocaleRFC1766"<% end_if %>>$Title.XML</a><% end_if %>
        <% end_loop %>
    </div>
</div>
<% end_if %>
