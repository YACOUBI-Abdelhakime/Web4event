<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Animation extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url');
	}
	public function lister(){

		$data['anims'] = $this->db_model->get_all_animation(); 
		// Chargement des 3 vues pour créer la page Web d’accueil
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('animations',$data);
		$this->load->view('templates/bas'); 
	}
}
?>