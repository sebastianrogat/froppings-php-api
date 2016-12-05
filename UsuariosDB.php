<?php
class UsuariosDB {
    protected $mysqli;
    const LOCALHOST = '127.0.0.1';
    const USER = 'hemaelco_erika';
    const PASSWORD = 'eri33vgc66';
    const DATABASE = 'hemaelco_froppings';

    public function __construct() {           
        try{
            //conexión a base de datos
            $this->mysqli = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
        }catch (mysqli_sql_exception $e){
            //Si no se puede realizar la conexión
            http_response_code(500);
            exit;
        }     
    } 
    
    /**
     * obtiene un solo registro dado su ID
     * @param int $cedula identificador unico de registro
     * @return Array array con los registros obtenidos de la base de datos
     */
    public function getUsuario($cedula=0){      
        $stmt = $this->mysqli->prepare("SELECT * FROM Usuarios WHERE cedula=? ; ");
        $stmt->bind_param('i', $cedula);
        $stmt->execute();
        $result = $stmt->get_result();        
        $usuarios = $result->fetch_all(MYSQLI_ASSOC); 
        $stmt->close();
        return $usuarios;              
    }
    
    /**
     * obtiene todos los registros de la tabla "usuarios"
     * @return Array array con los registros obtenidos de la base de datos
     */
    public function getUsuarios(){        
        $result = $this->mysqli->query('SELECT * FROM Usuarios');          
        $data = [];
        while ($peoples = $result->fetch_assoc()) {
            $data[] = $peoples;
        }          
        $result->close();
        return $data; 
    }
    
    /**
     * añade un nuevo registro en la tabla usuario
     * @param String $name nombre
     * @return bool TRUE|FALSE 
     */
    public function insert($cedula=0,$nombre='',$apellido='',$direccion='',$telefono=''){
        $stmt = $this->mysqli->prepare("INSERT INTO Usuarios(name) VALUES (?,?,?,?,?); ");
        $stmt->bind_param('issss', $cedula, $nombre, $apellido, $direccion, $telefono);
        $r = $stmt->execute(); 
        $stmt->close();
        return $r;        
    }
    
    /**
     * elimina un registro dado el cedula
     * @param int $cedula 
     * @return Bool TRUE|FALSE
     */
    public function delete($cedula=0) {
        $stmt = $this->mysqli->prepare("DELETE FROM Usuarios WHERE cedula = ? ; ");
        $stmt->bind_param('i', $cedula);
        $r = $stmt->execute(); 
        $stmt->close();
        return $r;
    }
    
    /**
     * Actualiza registro dado su ID
     * @param int $cedula Description
     */
    public function update($cedula=0,$nombre='',$apellido='',$direccion='',$telefono='') {
        if($this->checkID($cedula)){
            $stmt = $this->mysqli->prepare("UPDATE Usuarios SET nombre=?, apellido=?, direccion=?, telefono=? WHERE cedula = ? ; ");
            $stmt->bind_param('ssssi', $nombre,$apellido,$direccion,$telefono,$cedula);
            $r = $stmt->execute(); 
            $stmt->close();
            return $r;    
        }
        return false;
    }
    
    /**
     * verifica si un ID existe
     * @param int $cedula Identificador unico de registro
     * @return Bool TRUE|FALSE
     */
    public function checkID($cedula){
        $stmt = $this->mysqli->prepare("SELECT * FROM Usuarios WHERE cedula=?");
        $stmt->bind_param("i", $cedula);
        if($stmt->execute()){
            $stmt->store_result();    
            if ($stmt->num_rows == 1){                
                return true;
            }
        }        
        return false;
    }
    
}
?>