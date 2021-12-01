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
		//FONCTION POUR LES VISITEUR
		$data['invs'] = $this->db_model->get_all_invite(); 
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('invites',$data);
		$this->load->view('templates/bas'); 
	}
	public function detaille($id){
		//FONCTION POUR LES VISITEUR
		$data['invite'] = $this->db_model->get_inviteid($id); 
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('info-invite',$data);
		$this->load->view('templates/bas'); 
	}
	public function profile(){
		$username = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		$session_life =  date_diff(date_create( $this->session->userdata('start')  ), date_create( date('H:i:s') ))->format('%r%i') ;

		if($username != null && $status == 'i' && $session_life < 10){
			$data['invite'] = $this->db_model->get_invite($username); 
			$this->load->view('templates/haut');
			$this->load->view('templates/menu_invite.php');
			$this->load->view('invite-profile',$data);
			$this->load->view('templates/bas'); 
		}else{
			redirect(base_url().'index.php/compte/connecter');
		}
	}
	public function modifier(){
		$username = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		//$session_life =  date_diff(date_create( $this->session->userdata('start')  ), date_create( date('H:i:s') ))->format('%r%i') ;
		$starttime = $this->session->userdata('start');
			if($starttime == null){
				$session_life = null;
			}else{
				$session_life =  date_diff(date_create( $starttime ), date_create( date('H:i:s') ))->format('%r%i') ;
			}

		if($username == null && ($status == 'o' || $status==null ) && ($session_life==null || $session_life >= 10)){
			redirect(base_url().'index.php/compte/connecter');
		}else{		
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['invite'] = $this->db_model->get_invitep($username);
			// $this->form_validation->set_rules('mdp', 'mdp', 'required');
			// $this->form_validation->set_rules('cnfmdp', 'cnfmdp', 'required');

			if ($this->input->post('mdp') == null && $this->input->post('cnfmdp') == null){ 
				$data['error'] = null;  
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_invite.php');
				$this->load->view('invite-modifier',$data);
				$this->load->view('templates/bas');
			}else if($this->input->post('mdp') != null && $this->input->post('cnfmdp') != null){
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
			}else{
				$data['error'] = 'Champs de saisie vides !'; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_invite.php');
				$this->load->view('invite-modifier',$data);
				$this->load->view('templates/bas');
			}
		}
	}
    public function passeport(){
		$username = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		$session_life =  date_diff(date_create( $this->session->userdata('start') ), date_create( date('H:i:s') ))->format('%r%i') ;

		if($username != null&& $status == 'i' && $session_life < 10){
			$_SESSION['start'] = date('H:i:s');	
            $data['passeports'] = $this->db_model->get_passeport($username);
			$data['error'] = null;

            $this->load->view('templates/haut');
            $this->load->view('templates/menu_invite');
            $this->load->view('invite-passeports',$data);
            $this->load->view('templates/bas');
			
		}else{
            redirect(base_url().'index.php/compte/connecter');
        }
    }
	public function ajoute_passe(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$username = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		$session_life =  date_diff(date_create( $this->session->userdata('start') ), date_create( date('H:i:s') ))->format('%r%i') ;
		
		
		if($username != null&& $status == 'i' && $session_life < 10){
			$_SESSION['start'] = date('H:i:s');
			if($this->input->post('pasId') == null && $this->input->post('pasMdp') == null && $this->input->post('pasCnfMdp') == null){	
					//add test session
					$data['error'] = null; 
					$this->load->view('templates/haut');
					$this->load->view('templates/menu_invite');
					$this->load->view('invite-add-passeport',$data);
					$this->load->view('templates/bas');

			}else if($this->input->post('pasId') != null && $this->input->post('pasMdp') != null && $this->input->post('pasCnfMdp') ==  $this->input->post('pasMdp') ){					
				$pasId = $this->input->post('pasId');
				$pasMdp = $this->input->post('pasMdp');
				$pasCnfMdp = $this->input->post('pasCnfMdp');
				$salt = "MY_sel@1999";
				$password = hash('sha256', $salt.$pasMdp);
				$ok = $this->db_model->add_passeport($pasId,$password,$username);
				if($ok){
					$data['error'] = "Passeport ajouté avec succés"; 
					$this->load->view('templates/haut');
					$this->load->view('templates/menu_invite');
					$this->load->view('invite-add-passeport',$data);
					$this->load->view('templates/bas');
				}else{
					$data['error'] = "Erreur inconnu réessayer plus tard !"; 
					$this->load->view('templates/haut');
					$this->load->view('templates/menu_invite');
					$this->load->view('invite-add-passeport',$data);
					$this->load->view('templates/bas');
				}
			}else if($this->input->post('pasId') != null && $this->input->post('pasMdp') != null && $this->input->post('pasCnfMdp') !=  $this->input->post('pasMdp') ){
				$data['error'] = "Confirmation du mot de passe erronée, veuillez réessayer !"; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_invite');
				$this->load->view('invite-add-passeport',$data);
				$this->load->view('templates/bas');
			}else {
				$data['error'] = "Veuillez remplir tous les champs"; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_invite');
				$this->load->view('invite-add-passeport',$data);
				$this->load->view('templates/bas');
			}
		}else{
			redirect(base_url().'index.php/compte/connecter');
		}
	}
    public function desactiver_passe($pas_id){
		$username = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		$session_life =  date_diff(date_create( $this->session->userdata('start') ), date_create( date('H:i:s') ))->format('%r%i') ;

		if($username != null&& $status == 'i' && $session_life < 10){
			$_SESSION['start'] = date('H:i:s');	
            $this->db_model->desactiver_passe($pas_id);
			redirect(base_url().'index.php/invite/passeport');
		}else{
            redirect(base_url().'index.php/compte/connecter');
        }
    }
    public function desactiver_post($post_id){
		$username = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		$session_life =  date_diff(date_create( $this->session->userdata('start') ), date_create( date('H:i:s') ))->format('%r%i') ;

		if($username != null&& $status == 'i' && $session_life < 10){
			$_SESSION['start'] = date('H:i:s');	
            $this->db_model->desactiver_post($post_id);
			redirect(base_url().'index.php/invite/passeport');
		}else{
            redirect(base_url().'index.php/compte/connecter');
        }
    }
}
?>