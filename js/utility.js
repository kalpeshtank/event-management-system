// GST number regex
var regGst = /^[0-9]{2}[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9A-Za-z]{1}[Z]{1}[0-9a-zA-Z]{1}/;

// This function checks for session
function checkAuthenticated() {
    if (entityIdInSession == '' || bookIdInSession == '') {
        GstEntity.listview.listPage();
        GstEntity.router.navigate('entity/list');
        showError('Please Select Any Book');
        return false;
    }
    return true;
}

function bookAuthenticated() {
    if (bookStatus == bookStatusClosed) {
        showError('Book is Closed');
        return false;
    }
    if (bookLockStatus == bookStatusLock) {
        showError('Book is Locked');
        return false;
    }
    return true;
}

/**
 *  This function render options to a particular combo via a particular array
 *  dataArray - is the array which is used to generate options, this array is a two dimensional array with
 *  one key and on value, we need its key as the value of our option object and its value as the text
 *  of our option object
 *  comboId - is the id of the combo to which the generated options are to be appended
 *  
 *  TODO  name it renderOptions
 */
function renderOptionsForTwoDimensionalArray(dataArray, comboId, notDisplay, notDisplayId) {
    if (!dataArray) {
        return false;
    }
    $('#' + comboId).html('<option value="">&nbsp;</option>');
    var data = {};
    var optionResult = "";
    $.each(dataArray, function (index, dataObject) {
        if (notDisplay && index == notDisplayId) {
            return true;
        }
        data = {"value_field": index, 'text_field': dataObject};
        optionResult = optionTemplate(data);
        $("#" + comboId).append(optionResult);
    });
}

function renderOptionsForTwoDimensionalArrayForRates(dataArray, comboId) {
    if (!dataArray) {
        return false;
    }
    $('#' + comboId).html('<option value="">&nbsp;</option>');
    var data = {};
    var optionResult = "";
    $.each(dataArray, function (index, dataObject) {
        data = {"value_field": dataObject, 'text_field': dataObject};
        optionResult = optionTemplate(data);
        $("#" + comboId).append(optionResult);
    });
}
/**
 * This Function Is Used To Create Dynamic Combo Box Pass Data And KeyId And Value Id And combo Id
 * @param {type} dataArray
 * @param {type} comboId
 * @param {type} keyId
 * @param {type} valueId
 * @returns {Boolean}
 */
function renderOptionsForTwoDimensionalArrayWithKeyValue(dataArray, comboId, keyId, valueId, alias, notDisplay, notDisplayIdsArray, addBlankOption) {
    if (!dataArray) {
        return false;
    }
    if (typeof addBlankOption === "undefined") {
        addBlankOption = true;
    }
    if (addBlankOption) {
        $('#' + comboId).html('<option value="">&nbsp;</option>');
    }
    var data = {};
    var optionResult = "";
    var textField = "";
    $.each(dataArray, function (index, dataObject) {
        if (notDisplay) {
            if ($.inArray(dataObject[keyId], notDisplayIdsArray) >= 0) {
                return true;
            }
        }
        if (dataObject != undefined) {
            textField = dataObject[valueId];
            if (alias) {
                if (dataObject[alias] != '') {
                    textField = dataObject[valueId] + ' - ' + dataObject[alias];
                }
            }

            data = {"value_field": dataObject[keyId], 'text_field': textField};
            optionResult = optionTemplate(data);
            $("#" + comboId).append(optionResult);
        }
    });
}

function renderOptionsForTwoDimensionalArrayWithKeyValueForInvoiceNumbers(dataArray, comboId) {
    if (!dataArray) {
        return false;
    }
    var data = {};
    var optionResult = "";
    $.each(dataArray, function (index, dataObject) {
        if (dataObject != undefined) {
            if (dataObject['flag'] == 'purchase_invoice') {
                data = {"value_field": dataObject['purchase_invoice_id'] + '-purchase_invoice', 'text_field': dataObject['purchase_invoice_number']};
            } else if (dataObject['flag'] == 'stock_journal') {
                data = {"value_field": dataObject['stock_journal_id'] + '-stock_journal', 'text_field': dataObject['stock_journal_voucher_number']};
            }
            optionResult = optionTemplate(data);
            $("#" + comboId).append(optionResult);
        }
    });
}

function renderOptionsForTwoDimensionalArrayWithKeyValueForUnitRelationship(dataArray, comboId, keyId, valueId, originalNameObj, originalNameId, notDisplay, notDisplayIdsArray) {
    if (!dataArray) {
        return false;
    }
    $('#' + comboId).html('<option value="">&nbsp;</option>');
    var data = {};
    var optionResult = "";
    var textField = "";
    $.each(dataArray, function (index, dataObject) {
        if (dataObject != undefined) {
            if (notDisplay) {
                if ($.inArray(dataObject[keyId], notDisplayIdsArray) >= 0) {
                    return true;
                }
            }
            var displayId = dataObject[valueId];
            textField = originalNameObj[displayId][originalNameId];
            data = {"value_field": dataObject[keyId], 'text_field': textField};
            optionResult = optionTemplate(data);
            $("#" + comboId).append(optionResult);
        }
    });
}


/**
 * Get Group data By Change The Account Type
 * @param {type} comboId
 * @param {type} fillComboId
 * @returns {undefined}
 */
function getGroupDropDownDataByChangeAccountType(comboId, fillComboId) {
    $('#' + comboId).change(function () {
        var accountType = this.value;
        getGroupDropDownByAccountTypeId(accountType, false, '', fillComboId);
    });
}

/**
 * Get Group Data By Account Type Create Combobox
 * Edit Record While Select The Record Combobox
 * @param {type} accountType
 * @param {type} editTime
 * @param {type} groupId
 * @param {type} fillComboId
 * @returns {undefined}
 */
function getGroupDropDownByAccountTypeId(accountType, editTime, groupId, fillComboId) {
    $.ajax({
        url: 'account/get_group_by_account_type_id',
        type: 'POST',
        data: {
            "account_type": accountType
        },
        success: function (data) {
            renderOptionsForTwoDimensionalArrayWithKeyValue(JSON.parse(data), fillComboId, 'group_id', 'group_name', 'group_alias_name');
            if (editTime) {
                $('#' + fillComboId).val(groupId);
            }
            $('.select2').select2({"allowClear": true});
        }
    });
}

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
/**
 *  This function checks if a value of an object is numeric or not
 *  if the value is not numeric then the value of the object is set to blank
 */
function checkNumeric(obj) {
    if (!$.isNumeric(obj.val())) {
        obj.val("");
    }
}
/* 
 * @param {string} dateString should be in dd-mm-yyyy format, it is the date in question that need to be checked wether 
 * id is between book start date and book end date or not
 * 
 * @param {string} dateNameCaption - this is the caption to be displayed as date name while throwing date out of range error
 * 
 * @returns {boolean}
 */
function validateDateInRange(dateString, dateNameCaption) {

    var book_start_date = new Date(bookStartDate.getTime());
    var book_end_date = new Date(bookEndDate.getTime());
    book_start_date.setHours(0, 0, 0, 0);
    book_end_date.setHours(0, 0, 0, 0);
    var dateToBeValidated = ddmmyyToDate(dateString);
    dateToBeValidated.setHours(0, 0, 0, 0);
    if (dateToBeValidated < book_start_date) {
        showError(dateNameCaption + " Information", dateNameCaption + " Date cannot be smaller than book start date");
        return false;
    }

    if (dateToBeValidated > book_end_date) {
        showError(dateNameCaption + " Information", dateNameCaption + " Date cannot be greater than book end date");
        return false;
    }

    return true;
}

/**
 * 
 * @returns {undefined}
 */
function datePicker(journal) {
    if (journal) {
        $('.date_picker').datetimepicker({
            minDate: dateTo_YYYY_MM_DD(new Date(bookStartDate), '/'),
            maxDate: dateTo_YYYY_MM_DD(new Date(bookEndDate), '/')
        });
    } else {
        $('.date_picker').datetimepicker();
    }



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
/**
 * 
 * @param {type} x
 * @returns {String}
 */
function convertToIndianCurrency(x) {
    if (x == '') {
        return '0.00';
    }
    x = parseFloat(x).toFixed(2);
    x = x.toString();
    var afterPoint = '';
    if (x.indexOf('.') > 0) {
        afterPoint = x.substr(x.indexOf('.'), 3);
    }

    if (afterPoint == '') {
        afterPoint = '.00';
    }

    x = x > 0 ? Math.floor(x) : Math.ceil(x);
    x = x.toString();
    var lastThree = x.substring(x.length - 3);
    var otherNumbers = x.substring(0, x.length - 3);
    if (otherNumbers != '' && otherNumbers != '-')
        lastThree = ',' + lastThree;
    var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
    return res;
}
/**
 * 
 * @type Number
 */
var maxStringLength = 15;
function formatLongString(subjectString) {
    if (subjectString != '') {
        var string_length = subjectString.length;
    }
    if (subjectString < maxStringLength) {
        return subjectString;
    } else {

        var final_description = '';
        var words = subjectString.split(" ");
        var word_length = 0;
        $.each(words, function () {
            word_length = this.length;
            if (word_length > maxStringLength) {
                final_description = final_description + '' + breakWord(this);
            } else {
                final_description = final_description + ' ' + this;
            }
        });
        return final_description;
    }
}
/**
 * Breaks the word of a certain length into smaller words separated with spaces for proper rendering
 * @param {String} word
 * @returns {String}
 */
function breakWord(word) {
    var word_length = word.length;
    var final_word = '';
    var word_part = '';
    for (var i = 0; i <= word_length; i += maxStringLength) {
        word_part = word.substr(i, maxStringLength);
        final_word = final_word + ' ' + word_part;
    }
    return final_word;
}
/**
 * 
 * @param {type} balance
 * @returns {Number|String}
 */
function getBalanceLabel(balance) {
    var balanceLabel = 0;
    if (balance.indexOf('-') > -1) {
        balanceLabel = balance.substring(1, balance.length);
        balanceLabel = convertToIndianCurrency(balanceLabel) + " CR";
    } else {
        balanceLabel = convertToIndianCurrency(balance) + " DR";
    }
    return balanceLabel;
}
/**
 *  This function render options to a particular combo via a particular array
 *  dataArray - is the array which is used to generate options
 *  valueField - is the field of the dataArray that is to be used as value of the options generated
 *  textField - is the field of the dataArray that is to be used as text of the options generated
 *  comboId - is the id of the combo to which the generated options are to be appended
 *  
 *  TODO name it as renderOptionsForObjectArrays
 */

function renderOptionsForObjectArrays(arrayOfIds, comboId, alias, mainDataArray, textField, addBlankOption) {
    if (!arrayOfIds) {
        return false;
    }
    if (typeof addBlankOption === "undefined") {
        addBlankOption = true;
    }
    if (addBlankOption) {
        $('#' + comboId).html('<option value="">&nbsp;</option>');
    }
    var optionObject = {};
    var optionResult = "";
    var displayText = "";
    $.each(arrayOfIds, function (index, dataObject) {
        displayText = mainDataArray[dataObject][textField];
        if (alias != '' && mainDataArray[dataObject][alias] != '') {
            displayText = mainDataArray[dataObject][textField] + ' - ' + mainDataArray[dataObject][alias];
        }
        optionObject = {"value_field": dataObject, 'text_field': displayText};
        optionResult = optionTemplate(optionObject);
        $("#" + comboId).append(optionResult);
    });
}

function renderOptionsForObjectArraysByClass(arrayOfIds, comboClass, alias, mainDataArray, textField) {
    if (!arrayOfIds) {
        return false;
    }
    $('.' + comboClass).html('<option value="">&nbsp;</option>');
    var optionObject = {};
    var optionResult = "";
    var displayText = "";
    $.each(arrayOfIds, function (index, dataObject) {
        displayText = mainDataArray[dataObject][textField];
        if (alias != '' && mainDataArray[dataObject][alias] != '') {
            displayText = mainDataArray[dataObject][textField] + ' - ' + mainDataArray[dataObject][alias];
        }
        optionObject = {"value_field": dataObject, 'text_field': displayText};
        optionResult = optionTemplate(optionObject);
        $("." + comboClass).append(optionResult);
    });
}
/**
 * 
 * @param {type} date
 * @returns {String|Boolean}
 */
function convertToDD_MM_YY_Format(dateSupplied) {
    if (!dateSupplied) {
        return false;
    }
    var date = new Date(dateSupplied);
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var year = date.getFullYear();
    return (day < 10 ? '0' : '') + day + '-' + (month < 10 ? '0' : '') + month + '-' + year;
}

/**
 * This is the renderer defined for dataTable
 * formats data variable, and breaks it by adding spaces if data is too long
 * @param string data 
 * @param {type} type
 * @param {type} full
 * @param {type} meta
 * @returns {String}
 */
var generalLongStringRenderer = function (data, type, full, meta) {
    return formatLongString(data);
};
/**
 * Set Dynamically url in stock summary
 * @param {type} data
 * @param {type} type
 * @param {type} full
 * @param {type} meta
 * @returns {String}
 */
var nameRendererStockSummary = function (data, type, full, meta) {
    var cssStyles = '';
    var url = '';
    if (full.flag == 'group') { // if it is a header then bold the fonts
        cssStyles += 'font-weight:bold;';
        url = 'main#stock_summary/' + full.stock_group_id;
    } else {
        url = 'main#stock_item_monthly_summary/' + full.stock_item_id;
    }
    return '<a href="' + url + '" style="color: black;cursor: pointer;' + cssStyles + '">' + full.name + '</a>';
};
/**
 * Format Amount
 * @param {type} data
 * @param {type} type
 * @param {type} full
 * @param {type} meta
 * @returns {String}
 */
var amountRenderStockSummary = function (data, type, full, meta) {
    return convertToIndianCurrency(data);
};
/**
 * Footer callback for Stock Summary
 * @param {type} row
 * @param {type} data
 * @param {type} start
 * @param {type} end
 * @param {type} display
 * @returns {undefined}
 */
var footerCallbackForTotal = function (row, data, start, end, display) {
    var api = this.api(), data;
    var intVal = function (i) {
        return typeof i === 'string' ?
                i.replace(/[\$,]/g, '') * 1 :
                typeof i === 'number' ?
                i : 0;
    };
    var total = api.column(2).data().reduce(function (a, b) {
        return (intVal(a) + intVal(b)).toFixed(2);
    }, 0);
    $('#value_grand_total').html(convertToIndianCurrency(total));
};
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

function openNewForm(idOfFormToHide, moduleToLoad) {
    openForms.push(idOfFormToHide);
    $('#' + idOfFormToHide).hide();
    if (moduleToLoad == 'account') {
        Accounts.listview.listPage('child_form');
    }
    if (moduleToLoad == 'company') {
        CompanyMaster.listview.listPage('child_form');
    }
    if (moduleToLoad == 'stock_location') {
        StockLocation.listview.listPage('child_form');
    }
    if (moduleToLoad == 'stock_item') {
        StockItem.listview.listPage('child_form');
    }
    if (moduleToLoad == 'stock_unit') {
        StockUnit.listview.listPage('child_form');
    }
    if (moduleToLoad == 'stock_group') {
        StockGroup.listview.listPage('child_form');
    }
    if (moduleToLoad == 'group') {
        Group.listview.listPage('child_form');
    }

}


function closeMainGroup(idOfModuleToClose) {
    if (openForms.length != 0) {
        var lastFormId = openForms.pop();
        $('#' + lastFormId).show();
    }
    $('#' + idOfModuleToClose).remove();
}

var width = parseFloat($(window).width());
if (width < 1400) {
    $('body').addClass('sidebar-collapse');
} else {
    $('body').removeClass('sidebar-collapse');
}
/**
 * Get Group data By Change The Account Type
 * @param {type} comboId
 * @param {type} fillComboId
 * @returns {undefined}
 */
function getAccountDropDownDataByChangeGroupType(comboId, fillComboId) {
    $('#' + comboId).change(function () {
        var groupId = this.value;
        if (groupId == '*') {
            renderOptionsForTwoDimensionalArrayWithKeyValue(allAccounts, fillComboId, 'account_id', 'account_name', 'account_alias_name');
            $('#' + fillComboId).val('').trigger('change');
        } else {
            getAccountDropDownByGroupTypeId(groupId, fillComboId);
        }
    });
}
/**
 * Get Account Data By Group Type Create Combobox
 * Edit Record While Select The Record Combobox
 * @param {type} GroupId
 * @param {type} editTime
 * @param {type} accountId
 * @param {type} fillComboId
 * @returns {undefined}
 */
function getAccountDropDownByGroupTypeId(GroupId, fillComboId) {
    $.ajax({
        url: 'account/get_account_by_group_type_id',
        type: 'POST',
        data: {
            "group_id": GroupId
        },
        success: function (data) {
            renderOptionsForTwoDimensionalArrayWithKeyValue(JSON.parse(data), fillComboId, 'account_id', 'account_name', 'account_alias_name');
            $('#ledger_account_name').prepend("<option value='*'>All</option>");
            $('.select2').select2({"allowClear": true});
        }
    });
}

/**
 * 
 * @returns {Array}
 */
function getPurchaseInvoiceAccountArray() {
    var finalArray = [];
    $.merge(finalArray, purchaseAccounts);
    $.merge(finalArray, directExpensesAccounts);
    $.merge(finalArray, inDirectExpensesAccounts);
    return finalArray;
}

function getAccountIdsObjWithBankCashEquivalents() {
    var finalArray = [];
    $.merge(finalArray, getTradePayableAndTradeReceivableAccounts());
    $.merge(finalArray, cashBankAccounts);
    return finalArray;
}

function getTradePayableAndTradeReceivableAccounts() {
    var finalArray = [];
    $.merge(finalArray, tradePayableAccounts);
    $.merge(finalArray, tradeReceivableAccounts);
    return finalArray;
}

function getVoucherNumber(voucherTypeId, invoiceDate, invoiceNumberId) {
    if (voucherTypeId == '' || !voucherTypeId) {
        showError('Please select voucher type');
        return false;
    }
    if (invoiceDate == '') {
        showError('Please select date');
        return false;
    }
    var methodOfNumbering = allVoucherType[voucherTypeId]['method_of_numbering'];
    if (methodOfNumbering == MANUAL) {
        $('#' + invoiceNumberId).val('');
        return false;
    }
    $.ajax({
        type: 'POST',
        url: 'voucher_types/get_voucher_number',
        data: {'voucher_type_id': voucherTypeId, 'invoice_date': invoiceDate},
        success: function (data) {
            var parseData = JSON.parse(data);
            var invoiceNumber = parseData.invoice_number;
            $('#' + invoiceNumberId).val(invoiceNumber);
        }
    });
}

function invoiceDateAndVoucherTypeChangeEvent(isNew, invoiceDateId, invoiceVoucherTypeId, invoiceNumberId) {
    $('#' + invoiceDateId).blur(function () {
        var date = $(this).val();
        if (date == '') {
            showError('Please select date');
            $('#' + invoiceNumberId).val('');
            return false;
        }
        var voucherTypeId = $('#' + invoiceVoucherTypeId).val();
        if (!voucherTypeId) {
            showError('Please select voucher type');
            $('#' + invoiceNumberId).val('');
            return false;
        }
        getVoucherNumber(voucherTypeId, date, invoiceNumberId);
    });
    $('#' + invoiceVoucherTypeId).change(function () {
        var voucherTypeId = $(this).val();
        if (!voucherTypeId) {
            showError('Please select voucher type');
            $('#' + invoiceNumberId).val('');
            return false;
        }
        if (isNew) {
            isReadonlyVoucherNumber(voucherTypeId, invoiceNumberId);
        }
        var invoiceDate = $('#' + invoiceDateId).val();
        if (invoiceDate == '') {
            showError('Please select date');
            $('#' + invoiceNumberId).val('');
            return false;
        }
        getVoucherNumber(voucherTypeId, invoiceDate, invoiceNumberId);
    });
}

function isReadonlyVoucherNumber(voucherTypeId, invoiceNumberId) {
    var methodOfNumbering = allVoucherType[voucherTypeId]['method_of_numbering'];
    methodOfNumbering == AUTOMATIC ? $('#' + invoiceNumberId).attr('readonly', 'readonly') : $('#' + invoiceNumberId).removeAttr('readonly');
}
/**
 * return location information for billto account,purchase from account,and consignee
 * @param {type} companyAddressInfo
 * @param {type} locationName
 * @returns {Array|getCompanyLocationDetails.locationDataArray}
 */
function getCompanyLocationDetails(companyAddressInfo, locationName) {
    var gstNumber = '';
    var addressOfGSTSelected = '';
    var addressOfLocationSelected = '';
    var stateCode = '';
    var locationDataArray = [];
    $.each(companyAddressInfo, function (key, value) {
        addressOfGSTSelected = value.address_info;
        $.each(addressOfGSTSelected, function (key1, value1) {
            if ((value1.location_name).trim() == locationName.trim()) {
                gstNumber = value.gst_number;
                stateCode = value1['state_code'];
                delete value1['state_code'];
                delete value1['location_name'];
                addressOfLocationSelected = Object.values(value1);
            }
        });
    });
    locationDataArray['gst_number'] = gstNumber;
    locationDataArray['state_code'] = stateCode;
    locationDataArray['selected_address'] = addressOfLocationSelected;
    return locationDataArray;
}

var nameRendererStockInOutSummary = function (data, type, full, meta) {
    var cssStyles = '';
    var url = '';
    if (full.flag == 'group') { // if it is a header then bold the fonts
        cssStyles += 'font-weight:bold;';
        url = 'main#stock_in_out_reports/' + full.stock_group_id;
    } else {
        url = 'main#stock_in_out_item_reports/' + full.stock_item_id;
    }
    return '<a href="' + url + '" style="color: black;cursor: pointer;' + cssStyles + '">' + full.name + '</a>';
};

/*
 * @param {array} dataArray
 * @param {string} valueField
 * @param {string} textField
 * @returns {string of options}
 * This function accepts a dataArray, picks up two fields from it, and treates one as value and one as text for <option> object
 * and returns a string that has all options generated from dataArray
 */
function generateOptionStringForAccounts(dataArray, mainArray, name) {
    if (!dataArray) {
        return '';
    }
    var data = {};
    var optionResult = '';
    var allOptions = '';
    $.each(dataArray, function (index, dataObject) {
        data = {"value_field": dataObject, 'text_field': mainArray[dataObject][name]};
        optionResult = optionTemplate(data);
        allOptions = allOptions + optionResult;
    });
    return allOptions;
}

var transactionAccountsRenderer = function (data, type, full, meta) {
    if (typeof data === 'number') {
        return allAccounts[data]['account_name'];
    }
    return '<a class="details-control">' + data + '</a>';
};

var reconciliationActionRenderer = function (data, type, full, meta) {
    if (full.bank_reconciliation_id === null) {
        return reconciliationButtonsTemplate({'reconcile_button_caption': 'Reflect', 'function_name': 'BankReconciliation.listview.reconcile($(this), ' + full.journal_id + ',' + meta.row + ', event)', 'row_id': meta.row});
    } else {
        if ($.inArray(full.journal_id, reconcileList) === -1) {
            BankReconciliation.listview.manageClosingBalanceAsPerBank(full, $('#selected_bank_account_id').val());
            reconcileList.push(full.journal_id);
        }
        return reconciliationButtonsTemplate({'reconcile_button_caption': 'UnReflect', 'function_name': 'BankReconciliation.listview.askForUndoReflect(' + full.journal_id + ',' + full.bank_reconciliation_id + ',' + meta.row + ',event, ' + data + ')', 'row_id': meta.row});
    }
};