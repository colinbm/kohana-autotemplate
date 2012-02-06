<?php defined('SYSPATH') or die('No direct script access.');

class AutoTemplate_Core_Controller_Auto_Template extends Controller_Template {
	
	public $template = 'template.tpl';
	
	protected $stylesheets = array();
	
	public function before() {
		parent::before();
		
		if ($this->auto_render === true) {
			$defaults = $this->request->route()->defaults();
			
			$controller = $defaults['controller'];
			$action     = $defaults['action'];
			
			$view = "{$controller}/{$action}"
			      . ((bool)Kohana::find_file('views', "{$controller}/{$action}", 'tpl') ? '.tpl' : '');
			
			$this->template->content = View::factory($view);
		}
		
	}
	
}