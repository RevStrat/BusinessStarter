<% loop $Options %>
    <div class="form-check $Class">
        <input id="$ID" class="form-check-input radio" name="$Name" type="radio" value="$Value.ATT"<% if $isChecked %>
               checked="checked"<% end_if %><% if $isDisabled %> disabled="disabled"<% end_if %> <% if $Up.Required %>required<% end_if %>/>
        <label class="form-check-label">$Title</label>
    </div>
<% end_loop %>
