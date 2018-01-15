<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = getenv('DB_PORT_3306_TCP_ADDR');
$CFG->dbname    = getenv('DB_ENV_MYSQL_DATABASE');
$CFG->dbuser    = getenv('DB_ENV_MYSQL_USER');
$CFG->dbpass    = getenv('DB_ENV_MYSQL_PASSWORD');
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array(
    'dbpersist' => false,
    'dbsocket'  => false,
    'dbport'    => getenv('DB_PORT_3306_TCP_PORT'),
    'dbhandlesoptions' => false,
    'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = getenv('MOODLE_URL');

$CFG->dataroot  = '/var/moodledata';

$CFG->directorypermissions = 02777;

$CFG->admin = 'admin';
$CFG->passwordsaltalt1 = 'cc7f85eccf9179c6fc6ca21c38a72d50913f6824daef43487508dc9797d2febe';
$CFG->passwordsaltmain = '4bdeafbc02e918289ff5e4422195f9d5c3448bd14c93ee9c10ed1f677dabf4ac';

require_once(dirname(__FILE__) . '/lib/setup.php');