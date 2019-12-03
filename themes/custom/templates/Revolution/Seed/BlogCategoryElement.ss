<% if $Top.ShowTitle %>
    <div class="element col-xs-12">
        <a href="$Category.Link"><h1>$Top.Title</h1></a>
    </div>
<% end_if %>
<div class="blogcategoryelement__container">
    <% loop $Category.BlogPosts.Limit(4) %>
    <div class="element col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="blog-post__container" data-aos="fade-right" data-aos-delay="{$Pos}00">
            <% if not $LinkedPage %>
                <a href="$Link">
            <% end_if %>
                <% include Card HTML=$CardContent(25), Image=$FeaturedImage %>
            <% if not $LinkedPage %>
                </a>
            <% end_if %>
        </div>
    </div>
    <% end_loop %>
</div>