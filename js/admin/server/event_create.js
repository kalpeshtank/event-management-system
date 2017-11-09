var eventListTemplate = Handlebars.compile($('#event_list_template').html());
var eventFormTemplate = Handlebars.compile($('#event_form_template').html());
var eventTableTemplate = Handlebars.compile($('#event_table_template').html());
var eventActionButtonTemplate = Handlebars.compile($('#event_action_button_template').html());
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
        $('#event_data_table').html(eventTableTemplate);
        this.loadEventTable();
    },
    loadEventTable: function () {
        var eventActionRenderer = function (data, type, full, meta) {
            return eventActionButtonTemplate({"event_id": data});
        };
        eventsDataTable = $('#event_table').DataTable({
            ajax: {url: 'admin/events/get_events_data', dataSrc: "", type: "post"},
            bAutoWidth: false,
            ordering: false,
            columns: [
                {data: 'event_name'},
                {data: 'event_description'},
                {
                    "className": '',
                    "orderable": false,
                    "data": 'event_id',
                    "render": eventActionRenderer
                }
            ]
        });
    },
    newEvent: function () {
        $('#event_form_div').html(eventFormTemplate);
        $('#update_event_btn').hide();
        renderOptionsForTwoDimensionalArrayForRates(eventOrganizedForArray, 'organized_for');
        renderOptionsForTwoDimensionalArrayForRates(eventTypeArray, 'event_type');
        renderOptionsForTwoDimensionalArrayWithKeyValue(categoryData, 'category_id', 'category_id', 'category_name');
        renderOptionsForTwoDimensionalArrayWithKeyValue(subCategoryData, 'sub_category_id', 'sub_category_id', 'sub_category_name');
        $('.select2').select2({"allowClear": true});
        datePicker();
        $(".timepicker").timepicker({showInputs: true});
    },
    saveEvent: function () {
        var that = this;
        var eventFormData = $('#event_form').serializeFormJSON();
        eventFormData.event_end_time = changeTimeFormat(eventFormData.event_start_time);
        eventFormData.event_start_time = changeTimeFormat(eventFormData.event_start_time);
        if (eventFormData.event_name == '') {
            showError('Please Enter Event Name');
            $('#event_name').focus();
            return false;
        }
        if (eventFormData.category_id == '') {
            showError('Please Select Category');
            $('#category_id').focus();
            return false;
        }
        if (eventFormData.sub_category_id == '') {
            showError('Please Select Sub-Category');
            $('#sub_category_id').focus();
            return false;
        }
        if (eventFormData.organized_for == '') {
            showError('Please Select Organized For');
            $('#organized_for').focus();
            return false;
        }
        if (eventFormData.event_type == '') {
            showError('Please Select Event Type');
            $('#event_type').focus();
            return false;
        }
        if (eventFormData.event_place == '') {
            showError('Please Enter  Event Place');
            $('#event_place').focus();
            return false;
        }
        if (eventFormData.event_start_date == '') {
            showError('Please Enter Event Start Date');
            $('#event_start_date').focus();
            return false;
        }
        if (eventFormData.event_start_time == '') {
            showError('Please Enter Event Start Time');
            $('#event_start_time').focus();
            return false;
        }
        if (eventFormData.event_end_date == '') {
            showError('Please Enter Event End Date');
            $('#event_end_date').focus();
            return false;
        }
        if (eventFormData.event_end_time == '') {
            showError('Please Enter Event End Time');
            $('#event_end_time').focus();
            return false;
        }
        if (eventFormData.registration_start_date == '') {
            showError('Please Enter Registration Start Date');
            $('#registration_start_date').focus();
            return false;
        }
        if (eventFormData.registration_end_date == '') {
            showError('Please Enter Registration End Date');
            $('#registration_end_date').focus();
            return false;
        }
        $('#spinner_event_btn').html(spinnerTemplate);
        $('#spinner_event_btn').show();
        $('#save_event_btn').hide();
        $('#update_event_btn').hide();
        var url;
        if (eventFormData.event_id == '') {
            url = 'create';
        } else {
            url = 'update';
        }
        $.ajax({
            type: 'POST',
            url: "admin/events/" + url + '_events',
            data: eventFormData,
            success: function (data) {
                var parseData = JSON.parse(data);
                $('#spinner_event_btn').html('');
                $('#spinner_event_btn').hide();
                if (url == 'create') {
                    $('#save_event_btn').show();
                } else if (url == 'update') {
                    $('#update_event_btn').show();
                }
                if (parseData.success == false) {
                    showError(parseData.message);
                    return false;
                }
                showSuccess(parseData.message);
                eventsDataTable.ajax.reload();
                that.newEvent();
            }
        });
    },
    deleteEvent: function (eventId) {
        getConfirm(function (result) {
            if (result === false) {
                return false;
            }
            $.ajax({
                type: 'POST',
                url: "admin/events/delete_event",
                data: {"event_id": eventId},
                success: function (data) {
                    var parseData = JSON.parse(data);
                    if (parseData.success == false) {
                        showError(parseData.message);
                        return false;
                    }
                    showSuccess(parseData.message);
                    eventsDataTable.ajax.reload();
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