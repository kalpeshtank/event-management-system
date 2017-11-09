<?php

/**
 * generate array index as key value as object
 * @param type $result_set
 * @param type $index_field
 * @return type
 */
function generate_array_for_id_object($result_set, $index_field) {
    $main_array = array();
    foreach ($result_set as $record) {
        $main_array[$record[$index_field]] = $record;
    }
    return $main_array;
}

/**
 * Convert Date Into Database format yyyy-mm-dd
 * @param type $date_to_be_converted
 * @return string
 */
function to_database_format($date_to_be_converted) {
    if ($date_to_be_converted == '') {
        return '0000-00-00';
    }
    return date(PHP_DATEFORMAT_MYSQL, strtotime($date_to_be_converted));
}

/**
 * Convert Date Into Database format yyyy-mm-dd
 * @param type $date_to_be_converted
 * @return string
 */
function to_DD_MM_YYYY_format($date_to_be_converted) {
    if ($date_to_be_converted == '') {
        return '00-00-0000';
    }
    return date(PHP_DATEFORMAT_DDhMMhYYYY, strtotime($date_to_be_converted));
}
