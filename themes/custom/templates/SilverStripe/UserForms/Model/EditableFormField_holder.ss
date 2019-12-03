<div id="$Name" class="field $ColClasses">
    <% if FileField %><div class="custom-file"><% end_if %>
    <% if $Title %><label class="<% if FileField %>custom-file-label<% end_if %>" for="$ID">$Title</label><% end_if %>
    $Field
    <% if FileField %></div><% end_if %>
    <% if $RightTitle %><span id="{$Name}_right_title" class="right-title">$RightTitle</span><% end_if %>
    <% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
</div>
