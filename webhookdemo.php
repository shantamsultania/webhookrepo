<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST")
{
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);
    
    $text = $json->result->parameters->any;
    
    switch ($text) 
    {
    case 'my name is kamal vaid':
            $speech = 'hi kamal how can i help you';
        break;
    case 'bye':
            $speech = 'bye see you again';
            break;
    default:
         $speech = 'sorry i was not able to get that please try again';
            break;
}
    
    $response = new \stdClass();
    $response->speech = "";
    $response->displayText = "";
    $response->source = "webhook";
    echo json_encode($response);
    
}
else
{
    echp "only POST method allowed";
}

?>
