<% if $MoreThanOnePage %>
<nav aria-label="Pagination">
  <ul class="pagination">
    <li class="page-item<% if not $NotFirstPage %> disabled<% end_if %>"><a class="page-link" href="{$PrevLink}">Previous</a></li>
    <% loop $PaginationSummary(4) %>
        <li class="page-item<% if $CurrentBool %> active<% end_if %>"><a class="page-link" href="$Link">$PageNum</a></li>
    <% end_loop %>
    <li class="page-item<% if not $NotLastPage %> disabled<% end_if %>"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
<% end_if %>