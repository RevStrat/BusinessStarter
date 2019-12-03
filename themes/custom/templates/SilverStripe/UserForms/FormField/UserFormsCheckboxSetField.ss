<% if $Options.Count %>
    <% loop $Options %>
        <div class="form-check $Class">
            <input id="$ID" class="form-check-input checkbox" name="$Name" type="checkbox" value="$Value.ATT"<% if $isChecked %>
                   checked="checked"<% end_if %><% if $isDisabled %> disabled="disabled"<% end_if %> />
            <label class="form-check-label">$Title</label>
        </div>
    <% end_loop %>
<% else %>
    <p>No options available</p>
<% end_if %>
