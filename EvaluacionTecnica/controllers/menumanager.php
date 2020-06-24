<?php
require "models/menumanagermodel.php";
class Menumanager extends Controller{

    public function __construct(){
        
    }

    public function saveMenu(){
        $model = new MenumanagerModel();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $query = $model->insert([
            "Nombre" => $nombre, 
            "Descripcion" => $descripcion,
            "DependenciaMenu" => $id
            ]);
        return $query;
    }

    public function updateMenu(){
        $model = new MenumanagerModel();
        $id = $_POST['id'];
        $dependencia = $_POST['dependencia'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $query = $model->update([
            "Id" => $id, 
            "Nombre" => $nombre, 
            "Descripcion" => $descripcion,
            "DependenciaMenu" => $dependencia
            ]);
        return $query;
    }

    public function deleteMenu(){
        require_once "libs/view.php";
        $view = new View();
        $model = new MenumanagerModel();
        $id = $_POST['id'];
        $model->delete($id);
        $view->render('homepage');
    }
}
