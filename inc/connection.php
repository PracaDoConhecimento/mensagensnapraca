<?php 
Class Conexao {

    /* HEROKU DATABASE */
    private $db_host = 'us-cdbr-east-05.cleardb.net'; //$url["host"];
    private $db_user = 'bbecc3778dcf9a'; //$url["user"];
    private $db_pass = '7b8b8d72'; //$url["pass"];
    private $dbname  = 'heroku_28fd5926f3cd062'; //substr($url["path"],1);

	private $con     = NULL;	
	
    public function Conexao() {

    }

	public function Conectar() { // estabelece conexao 
    	if(!$this->con) {
        	$myconn = @mysql_connect($this->db_host, $this->db_user, $this->db_pass);
        	if($myconn) {
            	$seldb = @mysql_select_db($this->dbname, $myconn);
                mysql_query("SET NAMES 'utf8'");
                mysql_query('SET character_set_connection=utf8');
                mysql_query('SET character_set_client=utf8');
                mysql_query('SET character_set_results=utf8');
            	
            	if($seldb) {
                	$this->con = true;
                	return true;
            	} else {
                	return false;
            	}
        	}
        	else { // falha na conexão
        		echo ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
            	return false;
        	}
        }
        else {
            return true;
        }
    }

    public function Desconectar() { // fecha conexao
	    if($this->con) {
	        if(@mysql_close()) {
				$this->con = false;
	            return true;
	        }
	        else {
	            return false;
	        }
	    }
    }

}
?>