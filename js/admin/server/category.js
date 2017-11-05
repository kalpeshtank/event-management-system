var categoryListTemplate = Handlebars.compile($('#category_list_template').html());
var categoryTableTemplate = Handlebars.compile($('#category_table_template').html());
var categoryFormTemplate = Handlebars.compile($('#category_form_template').html());
var Category = {
    run: function () {
        this.router = new this.Router();
        this.listview = new this.listView();
    }
};

Category.Router = Backbone.Router.extend({
    routes: {
        '': 'renderList',
        'category/list': 'renderList'
    },
    renderList: function () {
        Category.listview.listPage();
    }
});
Category.listView = Backbone.View.extend({
    el: 'div#main_container',
    events: {
        'click #save_category_btn': 'saveCategory',
        'click #update_category_btn': 'saveCategory'
    },
    listPage: function () {
        this.$el.html(categoryListTemplate);
        $('#category_data_table').html(categoryTableTemplate);
        this.loadCategoryTable();
    },
    loadCategoryTable: function () {
        var groupActionRenderer = function (data, type, full, meta) {
            return '';
//            return groupActionButtonsTemplate({"group_id": data});
        };
        categoryDataTable = $('#category_table').DataTable({
            ajax: {url: 'admin/category/get_category', dataSrc: "", type: "post"},
            bAutoWidth: false,
            ordering: false,
            columns: [
                {data: 'category_name'},
                {data: 'category_description'},
                {
                    "className": '',
                    "orderable": false,
                    "data": 'group_id',
                    "render": groupActionRenderer
                }
            ]
        });
    },
    newCategory: function () {
        $('#category_form_div').html(categoryFormTemplate);
        $('#update_category_btn').hide();
    },
    saveCategory: function () {
    }
});