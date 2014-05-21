<?php 
Class Conexao {

    /* HEROKU DATABASE */
    /* CLEARDB_DATABASE_URL=mysql://bbecc3778dcf9a:7b8b8d72@us-cdbr-east-05.cleardb.net/heroku_28fd5926f3cd062?reconnect=true */
    //$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

    private $db_host = 'us-cdbr-east-05.cleardb.net'; //$url["host"];
    private $db_user = 'bbecc3778dcf9a'; //$url["user"];
    private $db_pass = '7b8b8d72'; //$url["pass"];
    private $dbname  = 'heroku_28fd5926f3cd062'; //substr($url["path"],1);



    /* LOCALHOST */
/*	private $db_host = 'localhost';            // servidor
	private $db_user = 'root';                 // usuario do banco
	private $db_pass = 'root';                 // senha do usuario do banco
	private $dbname  = "webpraca_mensagens";   // banco de dados*/


    /* PRACA DO CONHECIMENTO */
    
//  private $db_host = 'pracadoconhecimento.com.br';          // servidor   

/*  private $db_host = 'localhost';                           // servidor
    private $db_user = 'praca803_addon2';                     // usuario do banco
    private $db_pass = 'RockStar9021@';                       // senha do usuario do banco
    private $dbname  = "praca803_mensagens";                  // banco de dados*/

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