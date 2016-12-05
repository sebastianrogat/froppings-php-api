<?php
require('UsuariosDB.php');
class UsuariosAPI {    
    public function API(){
        header('Content-Type: application/JSON');                
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
        case 'GET':
            $this->getUsuarios();
            break;     
        case 'POST'://inserta
            echo 'POST';
            break;                
        case 'PUT'://actualiza
            echo 'PUT';
            break;      
        case 'DELETE'://elimina
            echo 'DELETE';
            break;
        default://metodo NO soportado
            echo 'METODO NO SOPORTADO';
            break;
        }
    }

    function getUsuarios(){
     if($_GET['action']=='usuarios'){         
         $db = new UsuariosDB();
         if(isset($_GET['id'])){//muestra 1 solo registro si es que existiera ID                 
             $response = $db->getUsuario($_GET['id']);                
             echo json_encode($response,JSON_PRETTY_PRINT);
         }else{ //muestra todos los registros                   
             $response = $db->getUsuarios();              
             echo json_encode($response,JSON_PRETTY_PRINT);
         }
     }else{
            $this->response(400);
     }       
 }      

    function response($code=200, $status="", $message="") {
    http_response_code($code);
    if( !empty($status) && !empty($message) ){
        $response = array("status" => $status ,"message"=>$message);  
        echo json_encode($response,JSON_PRETTY_PRINT);    
    }            
 }   
    
}
?>
