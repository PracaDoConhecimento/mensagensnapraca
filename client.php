<?php
// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the client instance
$client = new nusoap_client('http://localhost/webpraca/mensagens/server.php');
// Check for an error
$err = $client->getError();
if ($err) {
    // Display the error
    echo '<p><b>Constructor error: ' . $err . '</b></p>';
    // At this point, you know the call that follows will fail
}
// Call the SOAP method
//$result = $client->call(
//    'hello',                     // method name
//    array('name' => 'Scott'),    // input parameters
//    'uri:helloworld',            // namespace
//    'uri:helloworld/hello'       // SOAPAction
//);

// Call the SOAP method
/*$result = $client->call(
                'joinparams',
                array('s' => 'foo', 
                	  'i' => 21, 
                	  'f' => 43.21, 
                	  'b' => true)
            );*/

// Call the SOAP method
$result = $client->call('get_mensagens',
						'',
						'uri:MyServicewsdl',
				  		'uri:MyServicewsdl/get_mensagens');

/*$result = $client->call('set_mensagem', array('nome' => 'Antonio', 
											  'email' => 'a@gmail.com', 
											  'msg' => "Lorem ipsum dolor sit amet"));*/

// Strange: the following works just as well!
//$result = $client->call('hello', array('name' => 'Scott'));
// Check for a fault
if ($client->fault) {
    echo '<p><b>Fault: ';
    print_r($result);
    echo '</b></p>';
} else {
    // Check for errors
    $err = $client->getError();
    if ($err) {
        // Display the error
        echo '<p><b>Error: ' . $err . '</b></p>';
    } else {
        // Display the result
        print_r($result);
    }
}
?>