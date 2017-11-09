<!--<form role="form" method="post" name="event_form" id="event_form">
    <input type="hidden" name="event_id" id="event_id" class="form-control" value="{{event_data.event_id}}">
    <div class="box-body with-border">
        <div class="form-group row">
            <label class="col-md-2 control-label">Event Name :</label>
            <div class="col-md-8">
                <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Event Name" value="{{event_data.event_name}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Category :</label>
            <div class="col-md-8">
                <select name="category" id="category" class="form-control select2" data-placeholder="Select Category">
                    <option value="0">Select</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Sub-Category :</label>
            <div class="col-md-8">
                <select name="sub_category" id="sub_category" class="form-control select2" data-placeholder="Select Sub-Category">
                    <option value="0">Select</option>
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <label class="col-md-2 control-label">Organized-For :</label>
            <div class="col-md-8">
                <select name="organized_for" id="organized_for" class="form-control select2" data-placeholder="Select..">
                    <option value="0">Select</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event-Type :</label>
            <div class="col-md-8">
                <select name="event_type" id="event_type" class="form-control select2" data-placeholder="Select..">
                    <option value="0">Select</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event-Place :</label>
            <div class="col-md-8">
                <input type="text" name="event_place" id="event_place" class="form-control" placeholder="Event Place"  value="{{event_data.event_description}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event Start Date :</label>
            <div class="input-group date date_picker col-md-8">
                <input  type="text" name="event_start_date" id="event_start_date" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event End Date :</label>
            <div class="input-group date date_picker col-md-8">
                <input  type="text" name="event_end_date" id="event_end_date" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event Start Time :</label>
            <div class="col-md-8">
                <div class="input-group bootstrap-timepicker">
                    <input type="text" id="event_start_time" name="event_start_time" class="form-control timepicker">
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event End Time :</label>
            <div class="col-md-8">
                <div class="input-group bootstrap-timepicker">
                    <input type="text" id="event_end_time" name="event_end_time" class="form-control timepicker">
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Registration Start Date :</label>
            <div class="input-group date date_picker col-md-8">
                <input  type="text" name="registration_start_date" id="registration_start_date" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Registration End Date :</label>
            <div class="input-group date date_picker col-md-8">
                <input  type="text" name="registration_end_date" id="registration_end_date" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event Description :</label>
            <div class="col-md-8">
                <input type="text" name="event_description" id="event_description" class="form-control" placeholder="Event Description"  value="{{event_data.event_description}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Event Photo :</label>
            <div class="col-md-8">
                <input type="file" id="event_photo" name="event_photo" class="form-control">
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
</form>-->
<form role="form" method="post" name="event_form" id="event_form">
    <input type="hidden" name="event_id" id="event_id" class="form-control" value="{{event_data.event_id}}">
    <div class="box-body with-border">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-5 control-label">Event Name :</label>
                <div class="col-md-7">
                    <input type="text" name="event_name" tabindex="1" id="event_name" class="form-control" placeholder="Event Name" value="{{event_data.event_name}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-5 control-label">Sub-Category :</label>
                <div class="col-md-7">
                    <select name="sub_category" id="sub_category" tabindex="3" class="form-control select2" data-placeholder="Select Sub-Category" style="width: 100%;">
                        <option value="0">Select</option>
                    </select>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-md-5 control-label">Event-Type :</label>
                <div class="col-md-7">
                    <select name="event_type" id="event_type" tabindex="5" class="form-control select2" data-placeholder="Select.." style="width: 100%;">
                        <option value="0">Select</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-5 control-label">Event Start Date :</label>
                <div class="col-md-7">
                    <div class="input-group date date_picker">
                        <input  type="text" name="event_start_date" tabindex="7" id="event_start_date" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-5 control-label">Event End Date :</label>
                <div class="col-md-7">
                    <div class="input-group date date_picker">
                        <input  type="text" name="event_end_date" id="event_end_date" tabindex="9" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-5 control-label">Registration Start Date :</label>
                <div class="col-md-7">
                    <div class="input-group date date_picker">
                        <input  type="text" name="registration_start_date" tabindex="11" id="registration_start_date" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-5 control-label">Event Description :</label>
                <div class="col-md-7">
                    <textarea name="event_description" id="event_description" tabindex="13" class="form-control" placeholder="Event Description">{{event_data.event_description}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-5 control-label">Category :</label>
                <div class="col-md-7">
                    <select name="category" id="category" tabindex="2" class="form-control select2" data-placeholder="Select Category" style="width: 100%;">
                        <option value="0">Select</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-5 control-label">Organized-For :</label>
                <div class="col-md-7">
                    <select name="organized_for" id="organized_for" tabindex="4" class="form-control select2" data-placeholder="Select.." style="width: 100%;">
                        <option value="0">Select</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-5 control-label">Event-Place :</label>
                <div class="col-md-7">
                    <input type="text" name="event_place" id="event_place" tabindex="6" class="form-control" placeholder="Event Place"  value="{{event_data.event_description}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-5 control-label">Event Start Time :</label>
                <div class="col-md-7">
                    <div class="input-group bootstrap-timepicker">
                        <input type="text" id="event_start_time" tabindex="8" name="event_start_time" class="form-control timepicker">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!--            <div class="form-group row">
                            <label class="col-md-5 control-label">Event End Date :</label>
                            <div class="col-md-7">
                                <div class="input-group date date_picker">
                                    <input  type="text" name="event_end_date" id="event_end_date" tabindex="8" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>-->
            <div class="form-group row">
                <label class="col-md-5 control-label">Event End Time :</label>
                <div class="col-md-7">
                    <div class="input-group bootstrap-timepicker">
                        <input type="text" id="event_end_time" name="event_end_time" tabindex="10" class="form-control timepicker">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-5 control-label">Registration End Date :</label>
                <div class="col-md-7">
                    <div class="input-group date date_picker">
                        <input  type="text" name="registration_end_date" id="registration_end_date" tabindex="12" class="form-control" data-date-format="DD-MM-YYYY" placeholder="dd-mm-yyyy">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-5 control-label">Event Photo :</label>
                <div class="col-md-7">
                    <input type="file" id="event_photo" tabindex="14" name="event_photo" class="form-control">
                </div>
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