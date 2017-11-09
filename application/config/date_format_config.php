<?php

define('DATEFORMAT_DDhMMhYY', 'dd-mm-yy');
define('DATEFORMAT_DDhMMhYYYY', 'dd-mm-yyyy');
define('DATEFORMAT_DDsMMsYY', 'dd/mm/yy');
define('DATEFORMAT_DDsMMsYYYY', 'dd/mm/yyyy');
define('DATEFORMAT_MMhDDhYY', 'mm-dd-yy');
define('DATEFORMAT_MMhDDhYYYY', 'mm-dd-yyyy');
define('DATEFORMAT_MMsDDsYY', 'mm/dd/yy');
define('DATEFORMAT_MMsDDsYYYY', 'mm/dd/yyyy');
define('DATEFORMAT_MYSQL', 'yyyy-mm-dd');

define('DATEFORMAT_DATEPICKER', DATEFORMAT_DDhMMhYYYY);

define('PHP_DATEFORMAT_DDhMMhYY', 'd-m-y');
define('PHP_DATEFORMAT_DDhMMhYYYY', 'd-m-Y');
define('PHP_DATEFORMAT_DDsMMsYY', 'd/m/y');
define('PHP_DATEFORMAT_DDsMMsYYYY', 'd/m/Y');
define('PHP_DATEFORMAT_MMhDDhYY', 'm-d-y');
define('PHP_DATEFORMAT_MMhDDhYYYY', 'm-d-Y');
define('PHP_DATEFORMAT_MMsDDsYY', 'm/d/y');
define('PHP_DATEFORMAT_MMsDDsYYYY', 'm/d/Y');
define('PHP_DATEFORMAT_MYSQL', 'Y-m-d');


$config['date_formats_to_php_date_formats'] = array(
    DATEFORMAT_DDhMMhYY => PHP_DATEFORMAT_DDhMMhYY,
    DATEFORMAT_DDhMMhYYYY => PHP_DATEFORMAT_DDhMMhYYYY,
    DATEFORMAT_DDsMMsYY => PHP_DATEFORMAT_DDsMMsYY,
    DATEFORMAT_DDsMMsYYYY => PHP_DATEFORMAT_DDsMMsYYYY,
    DATEFORMAT_MMhDDhYY => PHP_DATEFORMAT_MMhDDhYY,
    DATEFORMAT_MMhDDhYYYY => PHP_DATEFORMAT_MMhDDhYYYY,
    DATEFORMAT_MMsDDsYY => PHP_DATEFORMAT_MMsDDsYY,
    DATEFORMAT_MMsDDsYYYY => PHP_DATEFORMAT_MMsDDsYYYY,
    DATEFORMAT_MYSQL => PHP_DATEFORMAT_MYSQL
);
/**
 * Date Formats allowed in statement upload utility
 */
$config['statement_upload_date_formats'] = array(
    DATEFORMAT_DDhMMhYY,
    DATEFORMAT_DDhMMhYYYY,
    DATEFORMAT_DDsMMsYY,
    DATEFORMAT_DDsMMsYYYY,
    DATEFORMAT_MMhDDhYY,
    DATEFORMAT_MMhDDhYYYY,
    DATEFORMAT_MMsDDsYY,
    DATEFORMAT_MMsDDsYYYY
);
