<?php 
Class Conexao {

    /* DATABASE */
    private $db_host = 'localhost';
    private $db_user = 'praca803_addon2'; 
    private $db_pass = 'RockStar9021@'; 
    private $dbname  = 'praca803_mensagens'; 
    private $conn    = NULL;

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
        		echo ("Erro de conex&atilde;o com localhost, o seguinte erro ocorreu -> ".mysql_error());
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