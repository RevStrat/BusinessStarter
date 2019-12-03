<main class="blog-entry container">
    <article>
        <h1>$Title</h1>

        <% if $FeaturedImage %>
            <p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
        <% end_if %>

        <div class="content">$Content</div>

        <% include SilverStripe\\Blog\\EntryMeta %>
    </article>

    $Form
    $CommentsForm
</div>
