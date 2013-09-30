<?php if(!defined('DIR_APP')) die('Your have not permission'); 

class Module extends Database {
	
	/***
		eg:
			- $mod->load('menu');
			- $mod->load('catalog', 'add');
	*/
	function load($class, $method=''){
	
		$file = 'modules/'.$class.'/controller/'.$class.'.php';
		
		if( is_file($file) ) {
			include_once($file);
			if(class_exists(ucfirst($class))) {
				$name = new $class;
				if(method_exists($name, $method) && !empty($method)) {
					$name->$method();
				}
				else {
					if(method_exists($name, "index"))
						$name->index();
					else
						$this->redirect(BASE_NAME);
				}
			}
		}
		else {
			if(DEBUG==1)
				die('<h2>Error: File ['.$file.'] not exist.</h2>');
			else 
				$this->redirect(BASE_NAME);
		}
	
	}
	
	/***
		eg: $mod->controller();
	*/
	function controller(){
		$name = empty($_GET['p']) ? 'home' : $_GET['p'];
	
		$this->load($name, @$_GET['q']);
	}
	

	/***
		eg:
			+ if class controller extends class module
				- $this->model('catalog/model/query');
			+ else
				global $mod in class coltroller;
				- $mod->model('catalog/model/query');
	*/
	function model($filepath) {
		$path = 'modules/'.$filepath.'.php';
		if( is_file($path) ) {
			include_once($path);
		}
		else {			
			if(DEBUG==1)
				die('<h2>Error: File ['.$path.'] not exist.</h2>');
			else 
				$this->redirect(BASE_NAME);
		}
	}
	
	/***
		eg:
			+ if class controller extends class module
				- if($data == '') => $this->view('catalog/view/form');
				- if($data != '') => $this->view('catalog/view/form', $data);
			+ else
				global $mod in class coltroller;
				- if($data == '') => $mod->view('catalog/view/form');
				- if($data != '') => $mod->view('catalog/view/form', $data);
	*/
	function view($filepath, $data=array()){
		global $db, $mod;
	
		extract($data);
		$path = 'modules/'.$filepath.'.php';
		if( is_file($path) ) {
			include_once($path);
		}
		else {			
			if(DEBUG==1)
				die('<h2>Error: File ['.$path.'] not exist.</h2>');
			else 
				$this->redirect(BASE_NAME);
		}
		
	}
	//
	function viewContent($filepath, $data=array()){
		global $db, $mod;
		extract($data);
		ob_start(); 
		$path = 'modules/'.$filepath.'.php';
        include($path);                // Include the file
        $contents = ob_get_contents(); // Get the contents of the buffer
        ob_end_clean();                // End buffering and discard
        return $contents; 
	}
	/***
		eg:
			+ if class controller extends class module
				- if($data == '') => $this->lang('catalog');
			+ else
				global $mod in class coltroller;
				- if($data == '') => $mod->lang('catalog');
	*/
	function lang($file) {
	
		if( !empty($_POST['dirlang']) ) {
			$_SESSION['dirlang'] = $_POST['dirlang'];
		}
		
		if( !isset($_SESSION['dirlang']) ) {
			$_SESSION['dirlang'] = 'vi';
		}
		
		$path = 'locales/'.$_SESSION['dirlang'].'/'.$file.'.php';
		if( is_file($path) ) {
			include_once($path);
		}
		else {
			if(DEBUG==1)
				die('<h2>Error: File ['.$path.'] not exist.</h2>');
			else 
				$this->redirect(BASE_NAME);			
		}
	}
	
	/***
		eg:
			+ if class controller extends class module
				- $this->url('index.php?p=catalog&q=detail&id=1', 'Catalog Management');
				- $this->url('index.php?p=catalog&q=edit&id=1');
			+ else
				global $mod in class coltroller;
				- $mod->url('index.php?p=catalog&q=detail&id=1', 'Catalog Management');
				- $mod->url('index.php?p=catalog&q=edit&id=1');
			
		out:
			+ if($mod_rewrite == false)	
				- http://localhost/index.php?p=catalog&q=detail&id=1
				- http://localhost/index.php?p=catalog&q=edit&id=1
				
			+ else
				- http://localhost/catalog/detail/1/catalog-management
				- http://localhost/catalog/edit/1
				- $_GET['p'] = catalog
				- $_GET['q'] = edit
				- $_GET['id'] = 1
				
	*/
	function url($str, $title='') {
		global $mod_rewrite;
		
		$arr = array('/p=/', '/q=/', '/id=/', '/page=/');
		
		$dir = DIR_APP=='admincp' ? 'admincp/' : '';
		
		$title = empty($title) ? '' : '/' . $this->Rewrite(trim($title)).".html";
		
		$url = explode('?', $str);
		$url = str_replace('&', '/', @$url[1]);
		$url = preg_replace($arr, '', $url) . $title;
		
		return $mod_rewrite == true ? BASE_NAME . $dir . $url : $str;
	}
	
	/***
		eg: Add index page: $mod->getlink();
	*/
	function getlink() {
		global $mod_rewrite;
	
		if($mod_rewrite == true) {
			$url = explode('/', @$_GET['p']);
			$_GET['p']  	= @$url[0];
			$_GET['q']  	= @$url[1];
			$_GET['page']  	= @empty($url[3]) && is_numeric(@$url[1])?@$url[1]:@$url[3];				
			$_GET['id'] 	= @$url[2];
		}
	}
	
	/***
		eg: 
			+ if class controller extends class module
				- $this->redirect('index.php?p=catalog');
				- $this->redirect('index.php?p=catalog', 'Catalog Management');
			+ else
				global $mod in class coltroller;
				- $mod->redirect('index.php?p=catalog');
				- $mod->redirect('index.php?p=catalog', 'Catalog Management');
		out:
			- http://localhost/index.php?p=catalog
			- http://localhost/catalog/catalog-management
	*/
	function redirect($str='', $title='') {
		echo "<script>window.location.href='".$this->url($str, $title)."'</script>";
		exit();
	}
	//== check number type int
	function checkInt($int)
	{
		$ktra = is_numeric($int);
		if($ktra == 0) return 0;
		else if($ktra == 1)
		{
			if($int < 0) return 0;
			else if($int >9999) 
				return 0;
			else
				return 1;
		}
	}
	//====substring
	function cutstring($strorg,$limit){	
		if(strlen($strorg)<=$limit){
			return $strorg;
		}else{		
			if(strpos($strorg," ",$limit) > $limit){
				$new_limit=strpos($strorg," ",$limit);
				$new_strorg = substr($strorg,0,$new_limit)."...";
			return $new_strorg;
		}	
		$new_strorg = substr($strorg,0,$limit)."...";
		return $new_strorg;
		}
	}
	//=====alert & redirect
	function aRedirect($msg, $strUrl){		
	?>
		<script language="javascript">
			alert('<?php echo $msg?>');
			window.location.href='<?php echo $strUrl?>';
		</script>
	<?php
	}
	//=====redirect
	function nRedirect($msg, $strUrl){		
	?>
		<script language="javascript">
			//alert('<?php echo $msg?>');
			window.location.href='<?php echo $strUrl?>';
		</script>
	<?php
	}
	//generate string number
	function rand_str($length = 8, $chars = '0123456789')
	{
		// Length of character list
		$chars_length = (strlen($chars) - 1);
	
		// Start our string
		$string = $chars{rand(0, $chars_length)};
	   
		// Generate random string
		for ($i = 1; $i < $length; $i = strlen($string))
		{
			// Grab a random character from our list
			$r = $chars{rand(0, $chars_length)};
		   
			// Make sure the same two characters don't appear next to each other
			if ($r != $string{$i - 1}) $string .=  $r;
		}
	   
		// Return the string
		return $string;
	}
	//send mail
	function sendMailSmtp($to, $from, $from_name, $subject, $message, $signature="", $cc="", $attach_file="",$bc="")
	{
		require_once("lib/mail/class.phpmailer.php");
		require_once("lib/mail/class.smtp.php");
		$mail = new phpmailer();
		$mail->IsSMTP();                      // send via SMTP
		$mail->Host     = SERVER_SMTP; // SMTP servers
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = USER_SMTP;  // SMTP username
		$mail->Password = PASSWORD_SMTP; // SMTP password
		$mail->From     = $from;
		$mail->FromName = $from_name;
		$mail->AddAddress($to,"");//send to 
		
		//cc mail
		if($cc!=""){		
			$arr_cc=explode(',',$cc);	
			for($i=0;$i<count($arr_cc); $i++){
				$mail->AddCC($arr_cc[$i]);	
			}		
		}
		//bc mail
		if($bc!=""){		
			$arr_bc=explode(',',$bc);	
			for($i=0;$i<count($arr_bc); $i++){
				$mail->AddBCC($arr_bc[$i]);	
			}		
		}
				
		$mail->AddReplyTo($from_name,$from);
		$mail->WordWrap = 50;                              // set word wrap
		$mail->IsHTML(true);                               // send as HTML
		
		$mail->Subject  =  $subject;
		if($signature!=""){
			$message .=$signature;
		}
		$mail->Body     =  $message;
		$mail->AltBody  =  "";		
		//attach files
		if($attach_file!=""){		
			$arr_attach=explode(',',$attach_file);	
			for($i=0;$i<count($arr_attach); $i++){
				$mail->AddAttachment($arr_attach[$i]);	
			}		
		}
		//do send
		if(!$mail->Send())
		{
			$result=0;
		}else{
			$result=1;
		}		
		return $result;
	} 
	//get email from uid
	function getEmail($id){
		$sql="Select email From #__customer Where id=".$id;
		$row=parent::row($sql);
		return $row['email'];
	}
	//get name	
	function getCatName($id){
		$sql="Select name_vi From #__catalog Where id=".$id;
		$row=parent::row($sql);
		return $row['name_vi'];
	}
	
	//get name	
	function getUserId($email){
		$sql="Select id From #__customers Where email='".$email."'";
		$row=parent::row($sql);
		return $row['id'];
	}
	//get username	
	function getUserName($id){
		$sql="Select username From #__customers Where id='".$id."'";
		$row=parent::row($sql);
		return $row['username'];
	}
	
	// Rewrite Label
	function aRewrite($label){
		$search = array("À","Á","Â","Ã","Ä","Å","à","á","ả","â","ã","ä","å","Ò","Ó","Ô","Õ","Ö","Ø","ò","ó","ô","õ","ö","ø","È","É","Ê","Ë","è","é","ê","ễ","ế","ề","ể","ệ","ë","Ç","ç","Ì","Í","Î","Ï","ì","í","î","ï","Ù","Ú","Û","Ü","ù","ú","û","ü","ÿ","Ñ","ñ");
		$model = array("A","A","A","A","A","A","a","a","a","a","a","a","a","O","O","O","O","O","O","o","o","o","o","o","o","E","E","E","E","e","e","e","e","e","e","e","e","e","C","c","I","I","I","I","i","i","i","i","U","U","U","U","u","u","u","u","y","N","n");
		$label = str_replace($search,$model,$label);
		$search2 = array ('@[^a-zA-Z0-9]@');
		$replace = array (' ');
		$label =  preg_replace($search2, $replace, $label); 
		
		$label = strtolower($label); // mais toutes les lettres de la chaîne en minuscule
		$label = str_replace(" ",'-',$label); // remplace les espaces en tirets
		$label = preg_replace('#\-+#','-',$label); // enlève les autres caractères inutiles
		$label = preg_replace('#([-]+)#','-',$label);
		trim($label,'-'); // remplace les espaces restants par des tirets
	
		return $label;
	}
	function Rewrite($text) {
        $text = str_replace(
                array(' ', '%', "/", "\\", '"', '?', '<', '>', "#", "^", "`", "'", "=", "!", ":", ",,", "..", "*", "&", "__", "▄", "-"), array('-', '', '', '', '', '', '', '', '', '', '', '', '-', '', '-', '', '', '', "va", "-", "-", "-"), $text);

        $chars = array("a", "A", "e", "E", "o", "O", "u", "U", "i", "I", "d", "D", "y", "Y");

        $uni[0] = array("á", "à", "ạ", "ả", "ã", "â", "ấ", "ầ", "ậ", "ẩ", "ẫ", "ă", "ắ", "ằ", "ặ", "ẳ", "� �");
        $uni[1] = array("Á", "À", "Ạ", "Ả", "Ã", "Â", "Ấ", "Ầ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ắ", "Ằ", "Ặ", "Ẳ", "� �");
        $uni[2] = array("é", "è", "ẹ", "ẻ", "ẽ", "ê", "ế", "ề", "ệ", "ể", "ễ");
        $uni[3] = array("É", "È", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ế", "Ề", "Ệ", "Ể", "Ễ");
        $uni[4] = array("ó", "ò", "ọ", "ỏ", "õ", "ô", "ố", "ồ", "ộ", "ổ", "ỗ", "ơ", "ớ", "ờ", "ợ", "ở", "� �");
        $uni[5] = array("Ó", "Ò", "Ọ", "Ỏ", "Õ", "Ô", "Ố", "Ồ", "Ộ", "Ổ", "Ỗ", "Ơ", "Ớ", "Ờ", "Ợ", "Ở", "� �");
        $uni[6] = array("ú", "ù", "ụ", "ủ", "ũ", "ư", "ứ", "ừ", "ự", "ử", "ữ");
        $uni[7] = array("Ú", "Ù", "Ụ", "Ủ", "Ũ", "Ư", "Ứ", "Ừ", "Ự", "Ử", "Ữ");
        $uni[8] = array("í", "ì", "ị", "ỉ", "ĩ");
        $uni[9] = array("Í", "Ì", "Ị", "Ỉ", "Ĩ");
        $uni[10] = array("đ");
        $uni[11] = array("Đ");
        $uni[12] = array("ý", "ỳ", "ỵ", "ỷ", "ỹ");
        $uni[13] = array("Ý", "Ỳ", "Ỵ", "Ỷ", "Ỹ");

        for ($i = 0; $i <= 13; $i++) {
            $text = str_replace($uni[$i], $chars[$i], $text);
        }
        return strtolower($text);
    }	
	//
	function getConfig(){
		$sql="Select * From tbl_config";
		return mysql_fetch_array(mysql_query($sql));	
	}
	//get title
	function getTitle($p="",$id=""){
		$title="";
		switch($p){
			case 'contact':
				$title= "Liên hệ | Vacation Travel";
				break;		
			case 'about':
				$title= "Giới thiệu | Vacation Travel";
				break;
			case 'services':
				$title= "Dịch vụ | Vacation Travel";
				break;
			case 'news':
				$title= "Tin tức | Vacation Travel";
				break;
			case 'history':
				$title= "Nhật ký tour | Vacation Travel";
				break;
			case 'tourist':
				$title= "Du lịch | Vacation Travel";
				break;
			case 'product':				
				if($id=="")
					$title= "Sản phẩm | Vacation Travel";	
				else{
					if($_GET['q']=='index'){					
						$row=mysql_fetch_array(mysql_query("Select * From tbl_category Where caid ='".$_GET['id']."'"));	
						$title= $this->stripslash($row['name']). " | Vacation Travel";	
					}else{
						$row=mysql_fetch_array(mysql_query("Select * From tbl_product Where proid ='".$_GET['id']."'"));	
						$title= $this->stripslash($row['name']). " | Vacation Travel";	
					}
					
				}		
				break;
					
			default:				
				$title= "Trang chủ | Vacation Travel";			
			break;
		}
		return $title;
	}
	//get title
	function getKeywords($p="",$id=""){
		$keyword="";
		switch($p){
			case 'contact':
				$keyword= "Contact - GCMedia";
				break;
			case 'partners':
				$keyword= "Partners - GCMedia";
				break;
			case 'services':
				if($id=="")
					$keyword= "Services - GCMedia";	
				else{
					$row=mysql_fetch_array(mysql_query("Select * From tbl_services Where id='".$_GET['id']."'"));					
					$keyword= $row['title_vi']." - Services - GCMedia";					
				}		
			break;
			case 'introduction':
				if($id=="")
					$keyword= "Introduction - GCMedia";			
				break;
			
		}
		return $keyword;
	}
	//stripslashes custom
	function stripslash($str){		
		$arr_search=array("<title></title>","<html>","<head>","</head>","<body>","</body>","</html>");
		$arr_replace=array("","","","","","","");
		$str=str_replace($arr_search,$arr_replace,$str);
		
		return str_replace("\\","",$str);
	}
	//encrypt
	function encrypt($x, $key) {		
		//return bin2hex($string);
		$x .=$key;
		$s=''; 
		foreach(str_split($x) as $c) $s.=sprintf("%02X",ord($c)); 
		return($s); 
	}	
	//format number
	function formatNumber($number, $ext="VNĐ"){
		$strResult="";
		
		if($ext=="") $strResult=number_format($number, 0, ',', '.');
		else $strResult=number_format($number, 0, ',', '.'). " ".$ext;
		
		return $strResult;
	}
	//decrypt
	function decrypt($x, $key) {
		/*if (!is_string($h)) return null;
		$r='';
		for ($a=0; $a<strlen($h); $a+=2) { $r.=chr(hexdec($h{$a}.$h{($a+1)})); }
		return $r;*/
		$x .=$key;
		$s=''; 
		foreach(explode("\n",trim(chunk_split($x,2))) as $h) $s.=chr(hexdec($h)); 
		
		return(substr($s,0,-3)); 
	}	
	//format currency
	function formatCurreny($number,$float){
		return number_format($number,$float,'.','');	
	}
	function getRateUSD()
	{
		$data = file_get_contents("http://www.vietcombank.com.vn/exchangerates/ExrateXML.aspx");
		$p = explode("<Exrate ", $data);
		$tg = array();
		for($a = 1; $a<count($p); $a++) {
			if(strpos($p[$a],'USD')) {
				$posCurrencyCode = strrpos($p[$a],'CurrencyCode="')+14;
				$CurrencyCode = substr( $p[$a], $posCurrencyCode, 3);
				
				$posBuy = strrpos($p[$a],'Buy="')+5;
				$priceBuy = floatval(substr( $p[$a], $posBuy, 8));
				$posTransfer = strrpos($p[$a],'Transfer="')+10;
				$priceTransfer = floatval(substr( $p[$a],$posTransfer, 6));
				$posSell = strrpos($p[$a],'Sell="')+6;
				$priceSell = floatval(substr( $p[$a], $posSell, 8));
				$tg[$a] = array('CurrencyCode'=>$CurrencyCode, 'Buy'=>$priceBuy, 'Transfer'=>$priceTransfer, 'Sell'=>$priceSell);			
			}
		}
		return $tg[18]['Buy'];
	}	
	
}
function autoLogin(){	
	
	// Check if the cookie exists
	if(isset($_COOKIE["siteAuth"]))
	{
		parse_str($_COOKIE["siteAuth"]);
		
		// Make a verification
	
		if($user_id!="" && $user_email!="")
		{
			// Register the session
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_email'] = $user_email;
			$_SESSION['username'] = $username;
			$_SESSION['sex'] = $sex;	
			$this->query("Update #__customers Set last_connection=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' Where id=".$user_id);
		}
	}
	
}
?>