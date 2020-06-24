<?php
require "models/homepagemodel.php";
class Homepage extends Controller{

    public function __construct(){
        parent::__construct();
        $this->view->dataMenu = [];
        $this->view->dataSelect = [];
        $model = new HomepageModel();
        $menu = $model->getDataMenu();
        $select = $model->getDataName();

        $this->view->dataMenu = $menu;
        $this->view->dataSelect = $select;
        $this->view->render('homepage');
        
    }
}
?>