<?php define('DIR_APP', 'TBL'); ?>
<?php

include ('../config.php');
include ('../lib/autoload.php');

$db = new Database ();
$db->connect ( $dbhost, $dbuser, $dbpass, $dbname );
$mod = new Module ();

$get_p = $_GET['p'];
switch ($get_p) {
	case 'getCat' :
		$str = '';
		$cats = $mod->rows ( "Select caid, name From #__category Where status = 1  And parent_id = " . $_GET['parent_id'] );
		
		if (! empty ( $cats )) {
			foreach ( $cats as $cat ) {
				$str .= '<option value="' . $cat ['caid'] . '">' . $cat ['name'] . '</option>';
			}
		} else {
			$str .= '<option value="0" selected="selected"></option>';
		}
		$data['cat'] = $str;
		$data['type'] = $_GET['parent_id'];
		echo json_encode ( $data );
		break;

}
?>