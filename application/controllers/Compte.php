<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Compte extends CI_Controller {


		public function __construct(){
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
		}

		public function lister(){
			$data['titre'] = 'Liste des pseudos :';
			$data['pseudos'] = $this->db_model->get_all_compte();

			$this->load->view('templates/haut');
			$this->load->view('templates/menu_visiteur');
			$this->load->view('compte_liste',$data);
			$this->load->view('templates/bas');
		}

		public function connecter(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			// $this->form_validation->set_rules('pseudo', 'pseudo', 'required');
			// $this->form_validation->set_rules('mdp', 'mdp', 'required');

			if($this->input->post('mdp') == null && $this->input->post('pseudo') == null){
				$data['error'] = null; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_visiteur');
				$this->load->view('compte_connecter',$data);
				$this->load->view('templates/bas');
			}else if($this->input->post('mdp') != null && $this->input->post('pseudo') != null){					
				$username = $this->input->post('pseudo');
				$mdp = $this->input->post('mdp');
				$salt = "MY_sel@1999";
				$password = hash('sha256', $salt.$mdp);
				$res = $this->db_model->connect_compte($username,$password);
				if($res[0]){
					$session_data = array('username' => $username, 'status'=>$res[1]->com_status );
					$this->session->set_userdata($session_data);
					if($res[1]->com_status == 'i'){
						$this->load->view('templates/haut');
						$this->load->view('templates/menu_invite');
						$this->load->view('compte_menu');
						$this->load->view('templates/bas');
					}else{
						$this->load->view('templates/haut');
						$this->load->view('templates/menu_admin');
						$this->load->view('compte_menu');
						$this->load->view('templates/bas');
					}
				}else{
					$data['error'] = 'Identifiants erronés ou inexistants !'; 
					$this->load->view('templates/haut');
					$this->load->view('templates/menu_visiteur');
					$this->load->view('compte_connecter',$data);
					$this->load->view('templates/bas');
				}
			}else{
				$data['error'] = 'Veuillez remplir tous les champs !'; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_visiteur');
				$this->load->view('compte_connecter',$data);
				$this->load->view('templates/bas');
			}
		}
		public function test(){

			$this->load->view('templates/haut');
			$this->load->view('templates/menu_visiteur');
			$this->load->view('compte_menu');
			$this->load->view('templates/bas');
		}

		public function deconnecter(){
			$this->session->sess_destroy();
			redirect(base_url().'index.php/compte/connecter');
		}


	}


?>