<?php
require "./libs/object/menu.php";
require "./libs/object/menufather.php";
class HomepageModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getDataMenu(){
        $items = [];
        $query = $this->db->connect()->query("SELECT 
                                                m1.*, 
                                                m2.Nombre AS NombreD 
                                            FROM menu m1 
                                            LEFT JOIN menu m2 ON m2.Id = m1.DependenciaMenu");
        while($row = $query->fetch()){
            $item = new Menu();
            $item->id = $row['Id'];
            $item->nombre = $row['Nombre'];
            $item->descripcion = $row['Descripcion'];
            $item->dependencia = $row['NombreD'];
            array_push($items, $item);
        }
        return $items;
    }

    public function getDataName(){
        $items = [];
        $query = $this->db->connect()->query("SELECT 
                                                Id,
                                                Nombre
                                            FROM menu");
        while($row = $query->fetch()){
            $item = new MenuFather();
            $item->id = $row['Id'];
            $item->nombre = $row['Nombre'];
            array_push($items, $item);
        }
        return $items;
    }
}
?>