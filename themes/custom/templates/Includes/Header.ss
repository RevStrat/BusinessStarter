<header class="header" role="banner">
    <picture class="background">
        <source media="(min-width: 1440px)" srcset="$Poster.FocusFill(1920, 1079).URL" />
        <source media="(min-width: 1024px)" srcset="$Poster.FocusFill(1440, 1079).URL" />
        <source media="(min-width: 768px)" srcset="$Poster.FocusFill(1024, 1079).URL" />
        <img src="$Poster.FocusFill(768, 768).URL" alt="Background image" />
    </picture>
	<% if $SmallVideo && $MediumVideo && $LargeVideo %>
        <video class="background" autoplay muted loop playsinline poster="$Poster.URL">
            
        </video>
    <% end_if %>
    <img class="hidden-lg dockInNav" src="$ThemeDir/images/habitat-logo-white.svg" alt="Logo" style="width: 320px;" />
</header>
<% if $SmallVideo && $MediumVideo && LargeVideo %>
<script type="text/javascript">
    const videoSources = {
        "small": {src: "$SmallVideo.URL", mimeType: "$SmallVideo.MimeType"},
        "medium": {src: "$MediumVideo.URL", mimeType: "$MediumVideo.MimeType"},
        "large": {src: "$LargeVideo.URL", mimeType: "$LargeVideo.MimeType"}
    };
    function updateVideo() {
        const video = document.querySelectorAll('video.background')[0];
        var source = document.createElement('source');
        var currentSize = "large";
        if (window.innerWidth < 768) {
            currentSize = "small"
        } else if (window.innerWidth < 992) {
            currentSize = "medium"
        }
        source.setAttribute('src', videoSources[currentSize].src);
        source.setAttribute('type', videoSources[currentSize].mimeType);
        video.innerHTML = "";
        video.appendChild(source);
    }
    window.addEventListener('resize', updateVideo);
    updateVideo();
</script>
<% end_if %>