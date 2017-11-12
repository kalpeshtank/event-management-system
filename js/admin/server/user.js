var userListTemplate = Handlebars.compile($('#user_list_template').html());
var UserData = {
    run: function () {
        this.router = new this.Router();
        this.listview = new this.listView();
    }
};
UserData.Router = Backbone.Router.extend({
    routes: {
        'user/list': 'renderList'
    },
    renderList: function () {
        UserData.listview.listPage();
    }
});
UserData.listView = Backbone.View.extend({
    el: 'div#main_container',
    listPage: function () {
        if (USER_TYPE != SUPER_ADMIN) {
            showError("You Can't Access");
        } else {
            this.$el.html(userListTemplate);
            this.loadUserTable();
        }
    },
    loadUserTable: function () {
        var userActionRenderer = function (data, type, full, meta) {
            if (data == IS_ACTIVE_NO) {
                return '<button type="button" class="btn btn-xs btn-info" onclick="UserData.listview.activeDeactiveUser(' + IS_ACTIVE_YES + ',' + full.user_id + ')"><label class="label-btn-fonts">Active</label></button>';
            } else if (data == IS_ACTIVE_YES) {
                return '<button type="button" class="btn btn-xs btn-danger" onclick="UserData.listview.activeDeactiveUser(' + IS_ACTIVE_NO + ',' + full.user_id + ')"><label class="label-btn-fonts">De-Activate</label></button>';
            }
        };
        var userTypeRenderer = function (data, type, full, meta) {
            return userTypeArray[data];
        };
        var userStatusRenderer = function (data, type, full, meta) {
            if (data == IS_ACTIVE_NO) {
                return '<span class="label label-warning">' + statusArray[data] + '</span>';
            } else if (data == IS_ACTIVE_YES) {
                return '<span class="label label-success">' + statusArray[data] + '</span>';
            }
        };
        allUserDataTable = $('#user_table').DataTable({
            ajax: {url: 'admin/signup/get_all_user', dataSrc: "", type: "post"},
            bAutoWidth: false,
            ordering: false,
            columns: [
                {data: 'username'},
                {data: 'name'},
                {data: 'user_type', "render": userTypeRenderer},
                {data: 'is_active', "render": userStatusRenderer},
                {
                    "className": '',
                    "orderable": false,
                    "data": 'is_active',
                    "render": userActionRenderer
                }
            ]
        });
    },
    activeDeactiveUser: function (status, userId) {
        $.ajax({
            type: 'POST',
            url: "admin/signup/active_diactive_user",
            data: {'user_status': status, 'user_id': userId},
            success: function (data) {
                var parseData = JSON.parse(data);
                if (parseData.success == false) {
                    showError(parseData.message);
                    return false;
                }
                if (status == IS_ACTIVE_NO) {
                    showSuccess('User Deactive successfully');
                } else if (status == IS_ACTIVE_YES) {
                    showSuccess('User Active successfully');
                }
                allUserDataTable.ajax.reload();
            }
        });
    }
});