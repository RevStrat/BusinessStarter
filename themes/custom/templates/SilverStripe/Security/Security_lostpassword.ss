<!DOCTYPE html>
<!--
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Habitat.life. by Rob Rankin (revolutionstrategy.com, @revstrat) for Habitat Life
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
-->

<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
    <% base_tag %>
    <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    $GenerateMetaTags.RAW
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="themes/habitat/images/favicon.ico" />
</head>
<body class="LoginPage typography" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>
    <% with SiteConfig %>
    <picture class="background">
        <source media="(min-width: 1440px)" srcset="$AgeGateBackground.FocusFill(1920, 1080).URL" />
        <source media="(min-width: 1024px)" srcset="$AgeGateBackground.FocusFill(1200, 1200).URL" />
        <source media="(min-width: 768px)" srcset="$AgeGateBackground.FocusFill(992, 992).URL" />
        <img src="$AgeGateBackground.FocusFill(768, 768).URL" alt="Background image" />
    </picture>
    <% if $AgeGateVideoSmall && $AgeGateVideoMedium && $AgeGateVideoLarge %>
        <video class="background" autoplay muted loop playsinline poster="$AgeGateBackground.URL">
            
        </video>
    <% end_if %>
    <% end_with %>
    <div class="login_window">
        $Content
        $Form
    </div>
    <% with SiteConfig %>
        <% if $AgeGateVideoSmall && $AgeGateVideoMedium && AgeGateVideoLarge %>
            <script type="text/javascript">
                const bgVideos = {
                    "small": {src: "$AgeGateVideoSmall.URL", mimeType: "$AgeGateVideoSmall.MimeType"},
                    "medium": {src: "$AgeGateVideoMedium.URL", mimeType: "$AgeGateVideoMedium.MimeType"},
                    "large": {src: "$AgeGateVideoLarge.URL", mimeType: "$AgeGateVideoLarge.MimeType"}
                };
                function updateLoginVideo() {
                    const video = document.querySelectorAll('.LoginPage video.background')[0];

                    var source = document.createElement('source');
                    var currentSize = "large";
                    if (window.innerWidth < 768) {
                        currentSize = "small"
                    } else if (window.innerWidth < 992) {
                        currentSize = "medium"
                    }
                    source.setAttribute('src', bgVideos[currentSize].src);
                    source.setAttribute('type', bgVideos[currentSize].mimeType);
                    video.innerHTML = "";
                    video.appendChild(source);
                }
                window.addEventListener('resize', updateLoginVideo);
                updateLoginVideo();
            </script>
        <% end_if %>
    <% end_with %>
    <% include Analytics %>
</body>
</html>
