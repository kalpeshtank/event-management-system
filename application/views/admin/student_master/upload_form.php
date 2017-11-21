<form role="form" method="post" name="new_student_upload_form" id="new_student_upload_form">
    <div class="box-body with-border">
        <div class="form-group col-md-6">
            <label>Type</label>
            <select name="file_type" id="file_type" class="form-control select2" data-placeholder="File Type">
                <option value="">&nbsp;</option>
                <option value="xls">XLS</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Select File</label>
            <input type="file" name="student_data_file" id="student_data_file" class="student_data_file" style="visibility: hidden;position: absolute;">
            <div class="input-group">
                <input type="text" class="form-control" id="display_selected_file_student_data" disabled placeholder="Select XLS File">
                <span class="input-group-btn">
                    <button class="browse_student_data btn btn-primary" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                </span>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" class="btn btn-xs btn-primary save_student_upload_btn" id="save_student_upload_btn">
            <label class="fa fa-upload label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Upload</label>
        </button>
        <a class="btn btn-xs btn-primary" id="spinner_student_upload_btn" style="display: none">
        </a>
        <button type="button" onclick="$('#new_student_upload_form').html('');" class="btn btn-xs btn-default">
            <label class="fa fa-close label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Cancel</label>
        </button>
    </div>
</form>
