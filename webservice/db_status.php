<?php 

/* DATABASE */
$db_host = 'localhost';
$db_user = 'praca803_addon2'; 
$db_pass = 'RockStar9021@'; 
$dbname  = 'praca803_mensagens'; 
$conn 	 = NULL;

$myconn = mysql_connect($db_host, $db_user, $db_pass);

if($myconn) {
	$seldb = mysql_select_db($dbname, $myconn);

	if($seldb) {
		echo "conectou";
		$conn = true;
		return true;		
	} else {
		echo "não conectou";
		return false;
	}
}
else { // falha na conexão
	echo ("Erro de conexão com ". $db_host .", o seguinte erro ocorreu -> ".mysql_error());
	return false;
}



/*  */

if (isset($_POST['action'])) {

	$action = $_POST['action'];


}




?>