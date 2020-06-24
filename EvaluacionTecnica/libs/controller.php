<?php
class Controller {

    public function __construct() {
        $this->view = new View();
    }

    function loadModel($modelo){
        $url = "models/" . $modelo . "model.php";

        if(file_exists($url)){
            require $url;
            $nameModel = $modelo . "Model";
            $this->model = new $nameModel;
        }
    }
}