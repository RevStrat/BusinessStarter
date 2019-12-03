<% if ShowTitle %>
    <h2>$Title</h2>
<% end_if %>
<div id="carousel-$ID" class="carousel slide<% if $Fade %> carousel-fade<% end_if %> break-out" data-ride="carousel">
    <% if ShowIndicators %>
        <ol class="carousel-indicators">
            <% loop $Slides %>
                <li data-target="#carousel-$Up.ID" data-slide-to="$Pos" class="<% if $First %>active<% end_if %>"></li>
            <% end_loop %>
        </ol>
    <% end_if %>
    <div class="carousel-inner">
        <% loop $Slides %>
            <div class="carousel-item<% if $First %> active<% end_if %>"<% if $Interval %> data-interval="$Interval"<% end_if %>>
                <img src="$Image.FocusFillMax(1920,1080).URL" class="d-block w-100" alt="$Image.Title" />
                <% if $Caption %>
                    <div class="carousel-caption d-none d-md-block">
                        $Caption
                    </div>
                <% end_if %>
            </div>
        <% end_loop %>
    </div>
    <% if ShowControls %>
        <a class="carousel-control-prev" href="#carousel-$ID" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-$ID" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    <% end_if %>
</div>