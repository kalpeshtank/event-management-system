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
        var categoryFormData = $('#category_form').serializeFormJSON();
        if (categoryFormData.category_name == '') {
            showError('Please Enter Category Name');
            $('#category_name').focus();
            return false;
        }
        if (categoryFormData.category_description == '') {
            showError('Please Enter Category Description');
            $('#category_description').focus();
            return false;
        }
        $('#spinner_category_btn').html(spinnerTemplate);
        $('#spinner_category_btn').show();
        $('#save_category_btn').hide();
        $('#update_category_btn').hide();
        var url;
        if (categoryFormData.category_id == '') {
            url = 'create';
        } else {
            url = 'update';
        }
        $.ajax({
            type: 'POST',
            url: "category/" + url + '_category',
            data: categoryFormData,
            success: function (data) {
                var parseData = JSON.parse(data);
                $('#spinner_category_btn').html('');
                $('#spinner_category_btn').hide();
                if (url == 'create') {
                    $('#save_category_btn').show();
                } else if (url == 'update') {
                    $('#update_category_btn').show();
                }

                if (parseData.success == false) {
                    showError(parseData.message);
                    return false;
                }
                showSuccess(parseData.message);
                var currentGroupData = parseData.group_data;
                switch (parseInt(currentGroupData.default_group_id)) {
                    case GROUP_TYPE_PURCHASE:
                        purchaseGroups.push(currentGroupData.group_id);
                        break;
                    case GROUP_TYPE_SALES:
                        salesGroups.push(currentGroupData.group_id);
                        break;
                    case GROUP_TYPE_INVENTORIES:
                        inventoriesGroups.push(currentGroupData.group_id);
                        break;
                    case GROUP_TYPE_OPENING_STOCK:
                        openingStockGroups.push(currentGroupData.group_id);
                        break;
                    case GROUP_TYPE_CLOSING_STOCK:
                        closingStockGroups.push(currentGroupData.group_id);
                        break;
                }
                groupData[currentGroupData.group_id] = currentGroupData;
                //Group.listview.listPage();
                groupsDataTable.ajax.reload();
                if (openForms.length != 0 && url == 'create') {
                    Group.listview.newGroup();
                    renderOptionsForTwoDimensionalArrayWithKeyValue(groupData, "parent_group", 'group_id', 'group_name', 'group_alias_name');
                } else {
                    if (url == 'create') {
                        Group.listview.newGroup();
                    } else {
                        $('#group_form_div').html('');
                    }
                }

            }
        });
    }
});