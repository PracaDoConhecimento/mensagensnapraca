<?php 

/* HEROKU DATABASE */

$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

$db_host = $url["host"];
$db_user = $url["user"];
$db_pass = $url["pass"];
$dbname  = substr($url["path"],1);
$conn 	 = NULL;

$myconn = mysql_connect($db_host, $db_user, $db_pass);

if($myconn) {
	$seldb = mysql_select_db($dbname, $myconn);

	if($seldb) {
		$conn = true;
		return true;
	} else {
		return false;
	}
}
else { // falha na conexão
	echo ("Erro de conexão com ". $db_host .", o seguinte erro ocorreu -> ".mysql_error());
	return false;
}

//$sql = "INSERT INTO `mensagens` (`id`,`conteudo`,`autor_nome`,`autor_email`,`data_publicacao`) VALUES (NULL, '{$_msg}', '{$_nome}', '{$_email}', now());";
//$query = mysql_query($sql) or die(mysql_error());


?>