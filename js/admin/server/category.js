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
        'click #new_group_btn': 'newGroup'
    },
    listPage: function () {
        this.$el.append(categoryListTemplate);
//        $('#group_data_table').html(categoryTableTemplate);
//        this.loadGroupTable();
    },
    newGroup: function () {
        if (!bookAuthenticated()) {
            return false;
        }
        $('#group_form_div').html(groupFormTemplate);
        $('#group_level').val(1);
        $('#update_group_btn').hide();
        renderOptionsForTwoDimensionalArrayWithKeyValue(groupData, "parent_group", 'group_id', 'group_name', 'group_alias_name');
        $("#parent_group").append("<option value='0'>primary</option>");
        renderOptionsForTwoDimensionalArray(accountTypeArray, 'group_type');
        this.onchageGroupType();
        $('.select2').select2({"allowClear": true});
    }
});