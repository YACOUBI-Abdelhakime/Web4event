<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url');
	}
	public function afficher(){ 
		$file = base_url()."style/assets/event-info.txt";
		$myfile = fopen($file, "r");
		$data['info'] = fread($myfile,9999);
		fclose($myfile);

		$data['actus'] = $this->db_model->get_all_actualite(); 
		// Chargement des 3 vues pour créer la page Web d’accueil
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('page_accueil',$data);
		$this->load->view('templates/bas');
	}
}
?>