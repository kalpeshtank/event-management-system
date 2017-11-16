<div>
    <button type="button" class="btn btn-xs btn-primary btn-font" data-toggle="tooltip" title="Gallery!" id="edit_event_btn_{{event_id}}" onclick="EventCreate.listview.fileUpload('{{event_id}}')">
        <label class="fa fa-picture-o label-btn-icon"></label>
    </button>                    
    <button type="button" class="btn btn-xs btn-primary btn-font" id="edit_event_btn_{{event_id}}" onclick="EventCreate.listview.editEvent('{{event_id}}')">
        <label class="fa fa-pencil label-btn-icon"></label>
        &nbsp;<label class="label-btn-fonts hidden-xs hidden-sm">Edit</label>
    </button>                    
    <button type="button" class="btn btn-xs btn-primary btn-font" id="delete_event_btn_{{event_id}}" onclick="EventCreate.listview.deleteEvent('{{event_id}}')">
        <label class="fa fa-trash label-btn-icon"></label>
        &nbsp;<label class="label-btn-fonts hidden-xs hidden-sm">Delete</label>
    </button>                    
</div>