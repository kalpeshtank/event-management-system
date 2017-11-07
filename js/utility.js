(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push($.trim(this.value) || '');
            } else {
                o[this.name] = $.trim(this.value) || '';
            }
        });
        return o;
    };
})(jQuery);
function datePicker() {
    $('.date_picker').datetimepicker();
    $('.date_picker').keyup(function (e) {
        e = e || window.event; //for pre-IE9 browsers, where the event isn't passed to the handler function
        if (e.keyCode == '37' || e.which == '37' || e.keyCode == '39' || e.which == '39') {
            var message = ' ' + $('.ui-state-hover').html() + ' ' + $('.ui-datepicker-month').html() + ' ' + $('.ui-datepicker-year').html();
            if ($(this).attr('id') == 'startDate') {
                $(".date_picker").val(message);
            }
        }
    });
}
function validateEmail(sEmail) {
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}

function roundOff(obj) {
    var amount = obj.val();
    if ($.isNumeric(amount)) {
        obj.val(parseFloat(amount).toFixed(2));
    }
}


var width = parseFloat($(window).width());
if (width < 1400) {
    $('body').addClass('sidebar-collapse');
} else {
    $('body').removeClass('sidebar-collapse');
}
/**
 * delete confom model
 * @param {type} callback
 * @returns {undefined}
 */
function getConfirm(callback) {
    $('#delete_model').modal({"show": true, "backdrop": 'static', "keyboard": false});
    $('#cancel_delete').one('click', function () {
        $('#delete_model').modal('hide');
        if (callback)
            callback(false);
    });
    $('#confirm_delete').one('click', function () {
        $('#delete_model').modal('hide');
        if (callback)
            callback(true);
    });
}





