<?php
if (! defined ( 'DIR_APP' ))
	die ( 'Your have not permission' );
class ModelContact {
	function delete($data = array()) {
		$idstr = '(' . implode ( ',', $data ) . ')';
		$sql = "delete from #__contact where id IN " . $idstr . "";
		$res = $this->query ( $sql );
		return $res ? true : false;
	}
}

?>