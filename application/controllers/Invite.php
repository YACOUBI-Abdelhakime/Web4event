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
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('invites',$data);
		$this->load->view('templates/bas'); 
	}
	public function profile(){
		$username = $this->session->userdata('username');
		$data['invite'] = $this->db_model->get_invite($username); 
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_invite.php');
		$this->load->view('invite-profile',$data);
		$this->load->view('templates/bas'); 
	}
	public function modifier(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('mdp', 'mdp', 'required');
		$this->form_validation->set_rules('cnfmdp', 'cnfmdp', 'required');

		if ($this->form_validation->run() == FALSE){ 
			$data['error'] = null; 
			$this->load->view('templates/haut');
			$this->load->view('templates/menu_invite.php');
			$this->load->view('invite-modifier',$data);
			$this->load->view('templates/bas');
		}else{
			$cnfmdp = $this->input->post('cnfmdp');
			$mdp = $this->input->post('mdp');

			if($cnfmdp != $mdp){
				$data['error'] = 'Confirmation du mot de passe erronée, veuillez réessayer !'; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_invite.php');
				$this->load->view('invite-modifier',$data);
				$this->load->view('templates/bas');
			}else{
				$salt = "MY_sel@1999";
				$password = hash('sha256', $salt.$mdp);
				$username = $this->session->userdata('username');
				$res = $this->db_model->update_compte($username,$password);
				if($res){
					redirect(base_url().'index.php/invite/profile/');
				}else{
					$data['error'] = 'Erreur inconnu, Vous pouvez réessayer plus tard !'; 
					$this->load->view('templates/haut');
					$this->load->view('templates/menu_invite.php');
					$this->load->view('invite-modifier',$data);
					$this->load->view('templates/bas');
				}	
			}
		}
	}
}
?>