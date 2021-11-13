<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function afficher()
	{
		// Chargement des 3 vues pour créer la page Web d’accueil
		$this->load->view('templates/haut');
		$this->load->view('page_accueil');
		$this->load->view('templates/bas');
	}

}
?>