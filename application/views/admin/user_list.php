<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title fa fa-cube"><b>User</b></h3>
            <button type="button" class="btn btn-xs btn-primary pull-right" id="new_user_btn" onclick="UserData.listview.newUser();" style="margin-right: 5px;">
                <label class="fa fa-plus label-btn-icon"></label>
                &nbsp;<label class="label-btn-fonts">New User</label>
            </button>
        </div>
        <div id="user_form_div"></div>
    </div>
</div>
<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body table-responsive">
            <table id="user_table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th style="width: 20%">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>