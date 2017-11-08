<form role="form" method="post" name="event_form" id="event_form">
    <input type="hidden" name="event_id" id="event_id" class="form-control" value="{{event_data.event_id}}">
    <div class="box-body with-border">
        <div class="form-group row">
            <label class="col-md-2 control-label">Event Name :</label>
            <div class="col-md-8">
                <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Event Name" value="{{event_data.event_name}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Category:</label>
            <div class="col-md-8">
                <select name="category" id="category" class="form-control select2" data-placeholder="Select Category">
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Sub-Category:</label>
            <div class="col-md-8">
                <select name="sub_category" id="sub_category" class="form-control select2" data-placeholder="Select Sub-Category">
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                    Option one is this and that—be sure to include why it's great
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Option two can be something else and selecting it will deselect option one
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
                    Option three is disabled
                </label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event Description :</label>
            <div class="col-md-8">
                <input type="text" name="event_description" id="event_description" class="form-control" placeholder="Event Description"  value="{{event_data.event_description}}">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" class="btn btn-xs btn-primary save_event_btn" id="save_event_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Save</label>
        </button>
        <button type="button" class="btn btn-xs btn-primary update_event_btn" id="update_event_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Update</label>
        </button>
        <a class="btn btn-xs btn-primary" id="spinner_event_btn" style="display: none">
        </a>
        <button type="button" class="btn btn-xs btn-default" id="cancel_event_btn" onclick="$('#event_form').html('');">
            <label class="fa fa-close label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Cancel</label>
        </button>
    </div>
</form>