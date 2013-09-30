<?php if(!defined('DIR_APP')) die('Your have not permission');

define('E_HOST', 'Error: Could not connect server: %s');
define('E_DB', 'Error: Could not connect database: %s');
define('E_QUERY', '<div class="warning"><h2>Query failed: %s</h2></div>');
//include_once('lib/addslashes.php');
class Database {

	function connect($host, $user, $pass, $name) {
		$con = mysql_pconnect($host, $user, $pass);
		if($con) {
			$db = mysql_select_db($name, $con);
			if($db) {
				$this->query('set names "utf8"');
			}
			else {
				die(sprintf(E_DB, $name));
			}
		}
		else {
			die(sprintf(E_HOST, $host));
		}
	}

	function query($sql) {
		global $dbprefix;
		$res = mysql_query( str_replace('#__', $dbprefix, $sql) );
		return $res ? $res : $this->iRedirect(BASE_NAME);
	}

	function row($sql) {
		return @mysql_fetch_array($this->query($sql));
	}

	function rows($sql) {
		$res = $this->query($sql);
		while($row = @mysql_fetch_array($res)) {
			$data[] = $row;
		}
		return @$data;
	}

	function num($sql) {
		return mysql_num_rows($this->query($sql));
	}

	function id() {
		return mysql_insert_id();
	}
	function iRedirect($str='') {
		//echo "<script>window.location.href='".$str."'</script>";
	}

}

?>