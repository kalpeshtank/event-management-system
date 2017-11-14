<form role="form" method="post" name="registration_form" id="registration_form">
    <div class="box-body with-border">
        <div class="form-group row">
            <label class="col-md-2 control-label">Full Name :</label>
            <div class="col-md-8">
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Full Name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Email :</label>
            <div class="col-md-8">
                <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Password :</label>
            <div class="col-md-8">
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Password">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" class="btn btn-xs btn-primary save_user_btn" id="save_user_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Save</label>
        </button>
        <button type="button" class="btn btn-xs btn-primary update_user_btn" id="update_user_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Update</label>
        </button>
        <a class="btn btn-xs btn-primary" id="spinner_user_btn" style="display: none">
        </a>
        <button type="button" class="btn btn-xs btn-default" id="cancel_user_btn" onclick="$('#registration_form').html('');">
            <label class="fa fa-close label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Cancel</label>
        </button>
    </div>
</form>