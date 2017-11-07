<form role="form" method="post" name="sub_category_form" id="sub_category_form">
    <input type="hidden" name="sub_category_id" id="sub_category_id" class="form-control" value="{{sub_category_data.sub_category_id}}">
    <div class="box-body with-border">
        <div class="form-group row">
            <label class="col-md-2 control-label">Sub Category Name</label>
            <div class="col-md-8">
                <input type="text" name="sub_category_name" id="sub_category_name" class="form-control" placeholder="Sub Category Name" value="{{sub_category_data.sub_category_name}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Sub Category Description</label>
            <div class="col-md-8">
                <input type="text" name="sub_category_description" id="sub_category_description" class="form-control" placeholder="Sub Category Description"  value="{{sub_category_data.sub_category_description}}">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" class="btn btn-xs btn-primary save_sub_category_btn" id="save_sub_category_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Save</label>
        </button>
        <button type="button" class="btn btn-xs btn-primary update_sub_category_btn" id="update_sub_category_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Update</label>
        </button>
        <a class="btn btn-xs btn-primary" id="spinner_sub_category_btn" style="display: none">
        </a>
        <button type="button" class="btn btn-xs btn-default" id="cancel_sub_category_btn" onclick="$('#sub_category_form').html('');">
            <label class="fa fa-close label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Cancel</label>
        </button>
    </div>
</form>