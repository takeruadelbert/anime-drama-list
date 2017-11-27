<?php

App::uses('AppController', 'Controller');

class GenresController extends AppController {

    var $name = "Genres";
    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }
    
    function admin_index() {
        $this->order = "Genre.name";
        parent::admin_index();
    }
}
