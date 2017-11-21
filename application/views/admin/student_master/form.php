<form role="form" method="post" name="student_master_form" id="student_master_form">
    <input type="hidden" name="student_id" id="student_id" value="">
    <div class="box-body with-border">
        <div class="form-group row">
            <label class="col-md-2 control-label">Course :</label>
            <div class="col-md-8">
                <select name="course" id="course" tabindex="2" class="form-control select2" data-placeholder="Select Course" style="width: 100%;">
                    <option value="BCA">BCA</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Semester :</label>
            <div class="col-md-8">
                <select name="semester" id="semester" tabindex="2" class="form-control select2" data-placeholder="Select Semester" style="width: 100%;">
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Division :</label>
            <div class="col-md-8">
                <select name="division" id="division" tabindex="2" class="form-control select2" data-placeholder="Select Division" style="width: 100%;">
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Enrollment Number :</label>
            <div class="col-md-8">
                <input type="text" name="enrollment_no" id="enrollment_no" class="form-control" placeholder="Enter Enrollment Number">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Roll Number :</label>
            <div class="col-md-8">
                <input type="text" name="roll_number" id="roll_number" class="form-control" placeholder="Enter Roll Number">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Student Full Name :</label>
            <div class="col-md-8">
                <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Full Name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Student Mobile :</label>
            <div class="col-md-8">
                <input type="text" name="student_mobile_no" id="student_mobile_no" class="form-control" placeholder="Student Mobile Number">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Gender :</label>
            <div class="col-md-8">
                <label class="radio-inline">
                    <input type="radio" name="gender" id="male" value="1">Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" id="female" value="2">Female
                </label>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" class="btn btn-xs btn-primary save_student_btn" id="save_student_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Save</label>
        </button>
        <button type="button" class="btn btn-xs btn-primary update_student_btn" id="update_student_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Update</label>
        </button>
        <a class="btn btn-xs btn-primary" id="spinner_student_btn" style="display: none">
        </a>
        <button type="button" class="btn btn-xs btn-default" id="cancel_student_btn" onclick="$('#student_master_form').html('');">
            <label class="fa fa-close label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Cancel</label>
        </button>
    </div>
</form>