var dashboardListTemplate = Handlebars.compile($('#dashboard_list_template').html());
var Dashboard = {
    run: function () {
        this.router = new this.Router();
        this.listview = new this.listView();
    }
};
Dashboard.Router = Backbone.Router.extend({
    routes: {
        '': 'renderList',
        'user/list': 'renderList'
    },
    renderList: function () {
        Dashboard.listview.listPage();
    }
});
Dashboard.listView = Backbone.View.extend({
    el: 'div#main_container',
    listPage: function () {
        this.$el.html(dashboardListTemplate);
    }
});