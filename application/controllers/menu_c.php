<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_c extends MY_Controller {

    function __construct() {
        parent::__construct();
        // if ($this->session->userdata('login') == NULL) {
            // redirect(site_url('login'));
        // }
        $this->load->model('menu_c_model');
        $this->set_identity('menu', 'id', 'menu_c_model', 'Menu');
    }

    function index() {
        $data['title'] = 'Master Menu';
        $data['menu'] = $this->menu_c_model->getMenu();
        $this->template->load('kkp', 'master_menu/index', $data);
    }

    function add() {
        $data['title'] = "Tambah Data Master Menu";
        $data['menu'] = $this->menu_c_model->getMenu();
        $this->template->load('kkp', 'master_menu/add', $data);
    }

    function create() {
        $data = $this->menu_c_model->get_data_fields();
        $model = get_object_vars($data);
        $this->menu_c_model->insert($model);
        redirect(site_url('menu_c'));
    }

    function edit($id) {
        $data['title'] = "Edit Data Master Menu";
        $data['menu'] = $this->menu_c_model->getMenuById($id);
        $data['menuall'] = $this->menu_c_model->getMenu();
        $this->template->load('kkp', 'master_menu/edit', $data);
    }

    function update() {
        $data = $this->menu_c_model->get_data_fields();
        $model = get_object_vars($data);
        $this->menu_c_model->updateMenu($model);

        redirect(site_url('menu_c'));
    }

    function delete($id) {
        $this->menu_c_model->deleteMenu($id);
        redirect(site_url('menu_c'));
    }

    function tampilIcon()
    {
        $data['icon'] = '';
        $this->template->load('ajax', 'master_menu/icon', $data);
    }

}
