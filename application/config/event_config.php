<?php

define('USER_COMING_SOON', TRUE);
define('ADMIN_COMING_SOON', FALSE);
/**
 * Event Organized For 
 */
define('MALE', 1);
define('FEMALE', 2);
define('BOTH', 3);

$config['event_organized_for_array'] = array(
    MALE => 'Male',
    FEMALE => 'Female',
    BOTH => 'Both'
);
/**
 * Event Type array 
 */
define('SINGLE', 1);
define('TEAM', 2);

$config['event_type_array'] = array(
    MALE => 'Single player',
    TEAM => 'Team'
);
/**
 * user type array
 */
define('SUPER_ADMIN', 1);
define('ADMIN', 2);
$config['user_type_array'] = array(
    SUPER_ADMIN => 'Super Admin',
    ADMIN => 'Admin'
);
/**
 * user Status
 */
define('IS_ACTIVE_YES', 1);
define('IS_ACTIVE_NO', 2);

$config['status_array'] = array(
    IS_ACTIVE_YES => 'Active',
    IS_ACTIVE_NO => 'Processing'
);
/**
 * semester config
 */
define('ONE', 1);
define('TWO', 2);
define('THREE', 3);
define('FOUR', 4);
define('FIVE', 5);
define('SIX', 6);
define('SEVEN', 7);
define('EIGHT', 8);

$config['semester_array'] = array(
    ONE => 'Sem-I',
    TWO => 'Sem-II',
    THREE => 'Sem-III',
    FOUR => 'Sem-IV',
    FIVE => 'Sem-V',
    SIX => 'Sem-VI'
);
/**
 * Division
 */
$config['division_array'] = array(
    ONE => 'Div-I',
    TWO => 'Div-II',
    THREE => 'Div-III',
    FOUR => 'Div-IV',
    FIVE => 'Div-V',
    SIX => 'Div-VI',
    SEVEN => 'Div-VII',
    EIGHT => 'Div-VIII'
);
