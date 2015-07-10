<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Djail001 - Suhar Prasetyo (09/04/2013 10:40)
 */
class MY_Controller extends CI_Controller 
{		
	/**
	 * @param name of table
	 * @param name of field primary key
	*/
	private $_table_name;
	private $_primary_key;
	private $_model_name;
	
	// Default data to load Header, Footer, Navigation
	// protected $data = array(
		// 'config' => array(
			// 'header' => 'shared/header',
			// 'container' => 'shared/container',
			// 'navigation' => array(
							// 'url' => 'shared/navigation'
						// ),
			// 'breadcrumbs' => array(
							// 'url' => 'shared/breadcrumbs',
							// 'data' => 'Breadcrumbs is not Set'
						// ),
			// 'footer' => 'shared/footer'
		// )
	// );
	
	// Master view
	//protected $master_view = 'shared/master';
	
	function __construct() 
	{
		parent::__construct();
		// $this->load->helper('my_helper');
		// no_cache();
		// $this->load->model('modul_grup_model');
		// if ($this->session->userdata('identitas') != NULL) {
			// $this->_get_navigation();
		// }
	}
	
	protected function set_identity($table_name, $primary_key, $model_name, $active_nav)
	{
		$this->_table_name = $table_name;
		$this->_primary_key = $primary_key;
		$this->_model_name = $model_name;
		$this->data['config']['navigation']['active_nav'] = $active_nav;
	}
	
	// protected function set_breadcrumbs($value=array())
	// {
		// $this->data['config']['breadcrumbs']['data'] = $value;
	// }
	
	// protected function validate_input()
	// {
		
	// }
	
	// protected function table_config()
	// {
		// $tmpl = array (
                    // 'table_open'          => '<table class="table table-striped table-hover table-bordered" id="example">',

                    // 'heading_row_start'   => '<tr>',
                    // 'heading_row_end'     => '</tr>',
                    // 'heading_cell_start'  => '<th>',
                    // 'heading_cell_end'    => '</th>',

                    // 'row_start'           => '<tr align="center">',
                    // 'row_end'             => '</tr>',
                    // 'cell_start'          => '<td>',
                    // 'cell_end'            => '</td>',

                    // 'row_alt_start'       => '<tr align="center">',
                    // 'row_alt_end'         => '</tr>',
                    // 'cell_alt_start'      => '<td>',
                    // 'cell_alt_end'        => '</td>',

                    // 'table_close'         => '</table>'
              // );

		// $this->table->set_template($tmpl); 
		// $this->table->set_empty("-");
	// }
	
	// protected function pagination_config()
	// {
		// $config['uri_segment'] = 3;
		// $config['num_links'] = 2;
		// $config['use_page_numbers'] = TRUE;
		// $config['prev_tag_open'] = '<div class="btn btn-default">';
		// $config['prev_tag_close'] = '</div>';
		// $config['next_tag_open'] = '<div class="btn btn-default">';
		// $config['next_tag_close'] = '</div>';
		// $config['num_tag_open'] = '<div class="btn btn-default">';
		// $config['num_tag_close'] = '</div>';
		// $config['cur_tag_open'] = '<b class="btn btn-default disabled">';
		// $config['cur_tag_close'] = '</b>';
	// }
	
	// protected function config($title, $content)
	// {
		// $this->data['config']['title'] = $title;
		// $this->data['config']['content'] = $content;
	// }
	
	// private function _get_navigation()
	// {
		// $this->data['config']['navigation']['data'] = $this->modul_grup_model->get_modul_grup();
	// }
	
}

/* End of file DJAIL_Controller.php */
/* Location: ./application/core/DJAIL_Controller.php */