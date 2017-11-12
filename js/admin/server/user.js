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
        this.$el.html(userListTemplate);
        this.loadUserTable();
    },
    loadUserTable: function () {
        var userActionRenderer = function (data, type, full, meta) {
            return '';
//            return categoryActionButtonsTemplate({"category_id": data});
        };
        var userTypeRenderer = function (data, type, full, meta) {
            return userTypeArray[data];
        };
        var userStatusRenderer = function (data, type, full, meta) {
            return statusArray[data];
        };
        categoryDataTable = $('#user_table').DataTable({
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
                    "data": 'user_type',
                    "render": userActionRenderer
                }
            ]
        });
    }
});