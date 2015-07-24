<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu {
	var $ci;
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function display_child($parent, $id) {
	
		$sql = '
				SELECT 
					a.id, 
					a.nama, 
					a.url, 
					a.icon, 
					DERIV1.JML,
					(select rules_user.loads from rules_user where rules_user.menu_id=a.id and rules_user.group_id=\''.$id.'\' limit 1) loads
				FROM 
					menu a 
				LEFT OUTER JOIN 
				(
					SELECT 
					parent, 
					COUNT(*) JML 
					FROM 
					menu 
					GROUP BY 
					parent
				) 
				DERIV1 ON 
				a.id = DERIV1.parent 
				WHERE 
				a.parent = \''.$parent.'\' and a.status = 1 order by urutan
			';

		$data = $this->ci->db->query($sql);
		$url = $this->ci->uri->segment(3);
		$html = '';

		foreach ($data->result() as $key => $value) {

		  	if ($value->JML > 0 && $value->loads == 1) {
		  	// if ($value->JML > 0 && $value->loads == '1') {

				      
			  	$html .= '<li class="nav-dropdown">
							<a title="Menu Levels" href="'.$value->url.'">
								<i class="fa fa-lg fa-fw '.$value->icon.'"></i>
							'.$value->nama.'
							</a>
			  			';
		  		$html .= '<ul class="nav-sub">';
			  	$html .= $this->display_child($value->id, $id);
			  	$html .= "</ul>";
		  		$html .= '</li>';
			  
		  	} elseif ($value->JML == "" && $value->loads == 1) {
		  	// } elseif ($value->JML == "" && $value->loads == '1') {
		  		$html .= '
			                <li class="nav-dropdown">
			                    <a href="'.base_url().$value->url.'" title="Level 3.2">
			                        <i class="fa fa-fw '.$value->icon.'"></i>
			                        '.$value->nama.'
			                    </a>
		  				';
		  		$html .= '</li>';

		  	}
		}
		return $html;
    }
}