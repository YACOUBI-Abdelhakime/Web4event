<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lieux extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url');
	}
	public function lister(){
		$data['lieux'] = $this->db_model->get_all_lieux();
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur');
		$this->load->view('lieux',$data);
		$this->load->view('templates/bas'); 
	}
}
?>