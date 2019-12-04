<main id="Content" class="container py-5">
    <h1>$Title</h1>
    <% if $Query %>
        <p class="searchQuery">You searched for &quot;{$Query}&quot;</p>
    <% end_if %>
    <% if $Results %>
        <ul id="SearchResults">
            <% loop $Results %>
                <li>
                    <h4>
                        <a href="$Link">
                            <% if $MenuTitle %>
                            $MenuTitle
                            <% else %>
                            $Title
                            <% end_if %>
                        </a>
                    </h4>
                    <% if $Content %>
                        <p>$Content.LimitWordCountXML</p>
                    <% end_if %>
                    <a class="readMoreLink" href="$Link" title="Read more about &quot;{$Title}&quot;">Read more about &quot;{$Title}&quot;...</a>
                </li>
            <% end_loop %>
        </ul>
    <% else %>
        <p>Sorry, your search query did not return any results.</p>
    <% end_if %>
    <% with $Results %>
        <% include SilverStripe\\Blog\\Pagination %>
    <% end_with %>
</main>
