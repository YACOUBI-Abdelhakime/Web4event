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
					$time = date('H:i:s');
					$session_data = array('username' => $username, 'status'=>$res[1]->com_status, 'start'=>$time );
					$this->session->set_userdata($session_data);
					redirect(base_url().'index.php/compte/home');
					/*if($res[1]->com_status == 'i'){
						$this->load->view('templates/haut');
						$this->load->view('templates/menu_invite');
						$this->load->view('compte_menu');
						$this->load->view('templates/bas');
					}else{
						$this->load->view('templates/haut');
						$this->load->view('templates/menu_admin');
						$this->load->view('compte_menu');
						$this->load->view('templates/bas');
					}*/
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
		public function home(){			
			$username = $this->session->userdata('username');
			$status = $this->session->userdata('status');
			$starttime = $this->session->userdata('start');
			if($starttime == null){
				$session_life = null;
			}else{
				$session_life =  date_diff(date_create( $starttime ), date_create( date('H:i:s') ))->format('%r%i') ;
			}

			if($session_life!= null && $session_life < 10){
				if($username != null && $status == 'i' ){
					$data['start'] = date('H:i:s');
					$invite = $this->db_model->get_invitep($username);
					$data['nom'] = $invite->inv_nom;
					$this->load->view('templates/haut');
					$this->load->view('templates/menu_invite');
					$this->load->view('compte_menu',$data);
					$this->load->view('templates/bas');
				}else if($username != null && $status == 'o' ){
					$data['start'] = date('H:i:s');
					$admin = $this->db_model->get_admin($username);
					$data['nom'] = $admin->org_prenom.' '.$admin->org_nom;
					$this->load->view('templates/haut');
					$this->load->view('templates/menu_admin');
					$this->load->view('compte_menu',$data);
					$this->load->view('templates/bas');
				}
			}else{
				redirect(base_url().'index.php/compte/connecter');
			}
		}
		public function test(){
			$session_life =  date_diff(date_create( $_SESSION['start'] ), date_create( date('H:i:s') ))->format('%r%i') ;
			$data['life'] = $session_life;
			$data['timeout'] = $_SESSION['start'];
			$data['time'] = date('H:i:s');

			$this->load->view('templates/haut');
			$this->load->view('templates/menu_visiteur');
			$this->load->view('compte_menu',$data);
			$this->load->view('templates/bas');
		}

		public function deconnecter(){
			$this->session->sess_destroy();
			redirect(base_url().'index.php/compte/connecter');
		}
		public function creer(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('id', 'id', 'required');
			$this->form_validation->set_rules('mdp', 'mdp', 'required');			
			$data['error'] = null;

			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_admin');
				$this->load->view('compte_creer',$data);
				$this->load->view('templates/bas');
			}else{
				$this->db_model->set_compte();
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_admin');
				$this->load->view('compte_succes');
				$this->load->view('templates/bas');
			}
		}



	}


?>