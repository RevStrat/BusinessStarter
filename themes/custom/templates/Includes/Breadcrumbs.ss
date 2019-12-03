<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <% loop $TreePath %>
        <li class="breadcrumb-item <% if $Last %>active<% end_if %>" <% if $Last %>aria-current="page"<% end_if %>>
            <% if not $Last && $ClassName.ShortName != 'RedirectorPage' %>
                <a href="$Link" title="$Title">
            <% end_if %>
            $MenuTitle
            <% if not $Last %>
                </a>
            <% end_if %>
        </li>
    <% end_loop %>
  </ol>
</nav>
