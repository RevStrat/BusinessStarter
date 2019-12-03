<div class="card $CardClasses my-3">
    <% if $Header %>
        <div class="card-header">
            $Header
        </div>
    <% end_if %>
    <div class="row no-gutters">
        <% if $Image && $ImageLocation == 'top' %>
            <div class="$OrientationClasses(4, 12)">
                <img src="$Image.URL" class="<% if $Overlay %>card-img<% else %>card-img-top<% end_if %>" alt="$Image.Title" />
            </div>
        <% end_if %>
        <div class="$OrientationClasses(8, 12)">
            <div class="<% if $Overlay %>card-img-overlay<% else %>card-body<% end_if %>">
                <% if $ShowTitle %>
                    <h5 class="card-title">$Title</h5>
                <% end_if %>
                $HTML
                <% if $ScreenReaderMessage %>
                    <p class="sr-only">$ScreenReaderMessage</p>
                <% end_if %>
            </div>
        </div>
        <% if $Image && $ImageLocation == 'bottom' %>
            <img src="$Image.URL" class="card-img-top" alt="$Image.Title" />
        <% end_if %>
    </div>
    <% if $Footer %>
        <div class="card-footer">
            $Footer
        </div>
    <% end_if %>
</div>