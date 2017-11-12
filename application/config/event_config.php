<?php

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
