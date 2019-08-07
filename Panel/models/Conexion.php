<?php
declare(strict_types=1);
Class Conexion
{
    // variable que retornara la Conexion y se usaran en clases hijas
    protected $db;
   public function __construct()
    {
        $this->db=$this->conectar();
    }
    private function conectar()
    {
        try
        {
            $servidor="mysql:dbname=galvanic_therapy;host=127.0.0.1";
            $usuario="root";
            $password="";
            $pdo =new PDO($servidor,$usuario,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            // echo "Conectado";

        }
        catch(PDOException $e){
                echo $e->getMessage();
        }
        return $pdo;
    }
    // AQUI INCLUIREMOS LA CONSULTA SIMPLE PARA PODER REUTILIZARLA
    public function ConsultaSimple(string $query):array
    {   
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    // AQUI INCLUIREMOS LA BUSQUEDA PARA PODER REUTILIZARLA
    protected function ConsultaCompleja(string $tabla,string $where,array $array):array
    {
    $query= "SELECT *FROM {$tabla} {$where}";
    $result = $this->db->prepare($query);
    $result ->execute($array);
    return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Renglones (string $query)
    {
        $result = $this->db->prepare($query);
        $result->execute();
        return $result;
    }
}
// $ins=new Conexion();
//  print_r($ins->ConsultaSimple("SELECT *FROM categories"));
?>