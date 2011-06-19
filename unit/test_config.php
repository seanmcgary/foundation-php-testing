<?php
/**
 * @author Sean McGary <sean@seanmcgary.com>
 */
define('LIB', dirname(dirname(__FILE__)).'/lib/');
define('CORE', dirname(dirname(__FILE__)).'/core/');
define('ROOT_BASEPATH', dirname(dirname(__FILE__)).'/');

set_include_path(get_include_path() . ':'.CORE);
set_include_path(get_include_path() . ':'.LIB.'config');
set_include_path(get_include_path() . ':'.LIB);

function autoload($class_name)
{
    $class = str_replace('_', '/', $class_name);
    require_once($class.'.php');
}

spl_autoload_register('autoload');

require_once('config.php');
require_once('routes.php');
// load some common functions
require_once('common.php');

require_once('util.php');

//$URI_INST = $LOADER_INST::get_inst('lib_core_uri', false, array('foo', 'bar'));
//$URI_INST = core_loadFactory::get_inst('core_uri', false, array('foo', 'bar'));
$URI_INST = core_loadFactory::get_inst('core_uri', 'uri', array('foo', 'bar'));
$LOAD = core_loadFactory::get_inst('core_load', 'load');

if($config['index_page'] != '')
{
    define('BASEURL', $config['base_url'].$config['url_extension'].$config['index_page']);
}
else
{
    define('BASEURL', $config['base_url'].$config['url_extension']);
}


//$URI_INST =& load_class('uri', $URI_SEG);
//$LOADER_INST =& load_class('loader');

