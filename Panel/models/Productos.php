<?php
// modo estricto
declare(strict_types=1);
require_once 'Conexion.php';

class Productos extends Conexion
{
    public function __construct()
    {   
        parent::__construct();
        // para poder instanciar la variable db desde productos
    }
    public function insert(int $productid,string $productname,string $picture,string $description,string $content,float $price,int $unitsinstock,strin $categoryid)
    {
        error_reporting(0);
        try{
            $query = "INSERT INTO products VALUES(:productid,:productname,:picture,
            :description,:content,:price,:unitsinstock,:categoryid);";
            $result=$this->db->prepare($query);
            $result->execute(array(':producid'=>$productid,':productname'=>$productname,':picture'=>$picture,
            ':description'=>$description,':content'=>$content,':price'=>$price,':unitsinstock'=>$unitsinstock,
            ':categoryid'=>$categoryid));
            echo 'BIEN';
        }catch(PDOException $e){
            echo 'ERROR';
        }
    }
    public function delete(int $productid)
    {
        error_reporting(0);
        try{
         $query= "DELETE FROM products WHERE productid=:productid;";
         $result=$this->db->prepare($query);
        $result->execute(array(':producid'=>$productid));
        }catch(PDOException $e){
            echo 'ERROR';
        }
        
    }
    public function edit(int $productid,string $productname,string $picture,string $description,string $content,float $price,int $unitsinstock,strin $categoryid)
    {
        error_reporting(0);
        try{
            $query = "UPDATE products SET productid=:productid,productname=:productname,picture=:picture,
            description=:description,content=:content,price=:price,unitsinstock=:unitsinstock,categoryid=:categoryid
            WHERE productid=:productid;";
            $result=$this->db->prepare($query);
            $result->execute(array(':producid'=>$productid,':productname'=>$productname,':picture'=>$picture,
            ':description'=>$description,':content'=>$content,':price'=>$price,':unitsinstock'=>$unitsinstock,
            ':categoryid'=>$categoryid));
            if($result->rowCount()){
                echo 'BIEN';
            }
            echo 'Datos iguales';
         } catch(PDOException $e){
            echo 'ERROR';
            }

        }
    public function getCategorias():array
    {
    $query="SELECT *FROM categories";
        // llamando al metodo de conexion
        return $this->ConsultaSimple($query);
    }
    public function getAll(int $desde,int $filas):array
    {
    $query="SELECT *FROM products ORDER BY productname LIMIT {$desde},{$filas}";
        // llamando al metodo de conexion
        return $this->ConsultaSimple($query);
    }
    // METODO PARA VISUALIZAR PRODUCTOS
    public function MostrarTablaproductos(array $array):string
    {
                $html='';
        if(count($array)){
            $html='<table class="table table-striped table-bordered table-condensed table-hover"id="table">
            <thead>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen</th>                  
            <th>Content</th>                  
            <th>Categoria</th>                  
            <th>Precio</th>                  
            <th>Stock</th>                  
            <th>Accion</th>                  
            </thead>
            <tbody>
            ';
            foreach($array as $value){
                $html.='<tr>
                <td>'.$value['productid'].'</td>
                <td>'.$value['productname'].'</td>
                <td>'.$value['description'].'</td>
                <td>'.$value['picture'].'</td>
                <td>'.$value['content'].'</td>
                <td>'.$value['categoryid'].'</td>
                <td>'."$".$value['price'].'</td>
                <td>'.$value['unitsinstock'].'</td>
                <td class="text-center">
                <button title="Editar" type="button" class="btn btn-secondary editar" data-toggle="modal"
                data-target="#ModalProductos">
                <i class="fa fa-pencil-square-o"></i>
                </button>

                <button title ="Eliminar" type="button" class="btn btn-danger eliminar" data-toggle="modal"
                data-target="#ModalProductos">
                <i class="fa fa-trash-o"></i>
                </button>
                </td>
                </tr>
                ';
            }
            $html.='<t/body>
                </table>';
            }
            else
            {
                $html='<h4 class="tex-center">No hay datos..</h4>';
            }
            return $html;
    }

    Public function Paginacion():array
    {
        $query ="SELECT COUNT(*) FROM products;";
        return array(
            "filasTotal"=>intval($this->db->query($query)->fetch(PDO::FETCH_BOTH)[0]),
            "filasPagina"=>3,
        );
    }
    //METODO BUSQUEDA 
    public function BusquedaProductos(string $termino):array{
        $tabla="products";
        // =:productanme == ? por parametros 
        $where="WHERE productname LIKE :productname ORDER BY productname ASC";
        $array=array(':productname'=>'%'.$termino.'%');
        return $this->ConsultaCompleja($tabla,$where,$array);
    }
}
?>