var eventListTemplate = Handlebars.compile($('#event_list_template').html());
var eventFormTemplate = Handlebars.compile($('#event_form_template').html());
var eventTableTemplate = Handlebars.compile($('#event_table_template').html());
var EventCreate = {
    run: function () {
        this.router = new this.Router();
        this.listview = new this.listView();
    }
};

EventCreate.Router = Backbone.Router.extend({
    routes: {
        'event/list': 'renderList'
    },
    renderList: function () {
        EventCreate.listview.listPage();
    }
});
EventCreate.listView = Backbone.View.extend({
    el: 'div#main_container',
    events: {
        'click #save_event_btn': 'saveEvent',
        'click #update_event_btn': 'saveEvent'
    },
    listPage: function () {
        this.$el.html(eventListTemplate);
//        $('#event_data_table').html(eventTableTemplate);
//        this.loadEventTable();
    },
    loadEventTable: function () {
        var eventActionRenderer = function (data, type, full, meta) {
            return eventActionButtonsTemplate({"category_id": data});
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
                    "data": 'category_id',
                    "render": eventActionRenderer
                }
            ]
        });
    },
    newEvent: function () {
        $('#event_form_div').html(eventFormTemplate);
        $('#update_event_btn').hide();
        $('.select2').select2({"allowClear": true});
        datePicker();
        $(".timepicker").timepicker({
            showInputs: true
        });
    },
    saveEvent: function () {
        var that = this;
        var eventFormData = $('#event_form').serializeFormJSON();
        console.log(eventFormData);
        return;
        if (eventFormData.category_name == '') {
            showError('Please Enter Category Name');
            $('#category_name').focus();
            return false;
        }
        if (eventFormData.category_description == '') {
            showError('Please Enter Category Description');
            $('#category_description').focus();
            return false;
        }
        $('#spinner_category_btn').html(spinnerTemplate);
        $('#spinner_category_btn').show();
        $('#save_category_btn').hide();
        $('#update_category_btn').hide();
        var url;
        if (eventFormData.category_id == '') {
            url = 'create';
        } else {
            url = 'update';
        }
        $.ajax({
            type: 'POST',
            url: "admin/category/" + url + '_category',
            data: eventFormData,
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
                categoryDataTable.ajax.reload();
                that.newCategory();
            }
        });
    },
    deleteEvent: function (categoryId) {
        getConfirm(function (result) {
            if (result === false) {
                return false;
            }
            $.ajax({
                type: 'POST',
                url: "admin/category/delete_category",
                data: {"category_id": categoryId},
                success: function (data) {
                    var parseData = JSON.parse(data);
                    if (parseData.success == false) {
                        showError(parseData.message);
                        return false;
                    }
                    showSuccess(parseData.message);
                    categoryDataTable.ajax.reload();
                }
            });
        });
    },
    editEvent: function (categoryId) {
        var that = this;
        $.ajax({
            type: 'POST',
            url: "admin/category/get_category_by_id",
            data: {"category_id": categoryId},
            success: function (data) {
                var parseData = JSON.parse(data);
                $('#category_form_div').html(categoryFormTemplate({"category_data": parseData.category_data}));
                $('#save_category_btn').hide();
            }
        });
    }
});