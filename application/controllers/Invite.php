<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invite extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url');
	}
	public function lister(){

		$data['invs'] = $this->db_model->get_all_invite(); 
		// Chargement des 3 vues pour créer la page Web d’accueil
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('invites',$data);
		$this->load->view('templates/bas'); 
	}
	public function profile(){
		$username = $this->session->userdata('username');
		$data['invite'] = $this->db_model->get_invite($username); 
		// Chargement des 3 vues pour créer la page Web d’accueil
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_invite.php');
		$this->load->view('invite-profile',$data);
		$this->load->view('templates/bas'); 
	}
}
?>