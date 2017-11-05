<div>
    <button type="button" class="btn btn-xs btn-primary btn-font" id="edit_group_btn_{{category_id}}" onclick="Category.listview.editCategory('{{category_id}}')">
        <label class="fa fa-pencil label-btn-icon"></label>
        &nbsp;<label class="label-btn-fonts hidden-xs hidden-sm">Edit</label>
    </button>                    
    <button type="button" class="btn btn-xs btn-primary btn-font" id="edit_group_btn_{{category_id}}" onclick="Category.listview.deleteCategory('{{category_id}}')">
        <label class="fa fa-trash label-btn-icon"></label>
        &nbsp;<label class="label-btn-fonts hidden-xs hidden-sm">Delete</label>
    </button>                    
</div>