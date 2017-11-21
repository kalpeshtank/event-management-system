<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title fa fa-graduation-cap"><b>Student Master</b></h3>
            <button type="button" class="btn btn-xs btn-primary pull-right" id="new_student_btn" onclick="StudentMaster.listview.newStudent();" style="margin-right: 5px;">
                <label class="fa fa-plus label-btn-icon"></label>
                &nbsp;<label class="label-btn-fonts">New Student</label>
            </button>
            <button type="button" class="btn btn-xs btn-primary pull-right" id="new_student_btn" onclick="StudentMaster.listview.newUpload();" style="margin-right: 5px;">
                <label class="fa fa-upload label-btn-icon"></label>
                &nbsp;<label class="label-btn-fonts">Import XLS</label>
            </button>
        </div>
        <div id="student_master_form_div"></div>
        <div id="student_master_upload_form_div"></div>
    </div>
</div>
<div class="col-xs-12">
    <div class="box box-info">
        <div id="student_master_data_table"></div>
    </div>
</div>