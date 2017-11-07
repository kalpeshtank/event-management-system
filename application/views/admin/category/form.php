<form role="form" method="post" name="category_form" id="category_form">
    <input type="hidden" name="category_id" id="category_id" class="form-control" value="{{category_data.category_id}}">
    <div class="box-body with-border">
        <div class="form-group row">
            <label class="col-md-2 control-label">Category Name :</label>
            <div class="col-md-8">
                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name" value="{{category_data.category_name}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 control-label">Description :</label>
            <div class="col-md-8">
                <input type="text" name="category_description" id="category_description" class="form-control" placeholder="Category Description"  value="{{category_data.category_description}}">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" class="btn btn-xs btn-primary save_category_btn" id="save_category_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Save</label>
        </button>
        <button type="button" class="btn btn-xs btn-primary update_category_btn" id="update_category_btn">
            <label class="fa fa-check label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Update</label>
        </button>
        <a class="btn btn-xs btn-primary" id="spinner_category_btn" style="display: none">
        </a>
        <button type="button" class="btn btn-xs btn-default" id="cancel_category_btn" onclick="$('#category_form').html('');">
            <label class="fa fa-close label-btn-icon"></label>
            &nbsp;<label class="label-btn-fonts">Cancel</label>
        </button>
    </div>
</form>