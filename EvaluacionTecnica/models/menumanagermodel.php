<?php
class MenumanagerModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        $query = $this->db->connect()->prepare("INSERT INTO menu 
                                                        (Nombre, Descripcion, DependenciaMenu)
                                                        VALUES(:nombre, :descripcion, :dependenciamenu)");
        try{
            $query->execute([
                "nombre" => $data['Nombre'],
                "descripcion" => $data['Descripcion'],
                "dependenciamenu" => $data['DependenciaMenu']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function update($data){
        $query = $this->db->connect()->prepare("UPDATE menu SET 
                                                    Nombre = :nombre, 
                                                    Descripcion = :descripcion, 
                                                    DependenciaMenu = :dependencia 
                                                    Where Id = :id");
        try{
            $query->execute([
                "id" => $data['Id'],
                "nombre" => $data['Nombre'],
                "descripcion" => $data['Descripcion'],
                "dependencia" => $data['DependenciaMenu']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM menu WHERE Id = :id");
        try{
            $query->execute([
                "id" => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>