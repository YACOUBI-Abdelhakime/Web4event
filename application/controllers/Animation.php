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
		$data['date'] = date('Y-m-j H:i:s'); 
		// Chargement des 3 vues pour créer la page Web d’accueil
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('animations',$data);
		$this->load->view('templates/bas'); 
	}	
	public function admin(){
		$username = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		$session_life =  date_diff(date_create( $_SESSION['start'] ), date_create( date('H:i:s') ))->format('%r%i') ;

		if($username != null&& $status == 'o' && $session_life < 10){			
			$_SESSION['start'] = date('H:i:s');	
			$data['anims'] = $this->db_model->get_all_animation();
			$data['date'] = date('Y-m-j H:i:s');

			$this->load->view('templates/haut');
			$this->load->view('templates/menu_admin');
			$this->load->view('admin-programmation',$data);
			$this->load->view('templates/bas'); 
		}else{
			redirect(base_url().'index.php/compte/connecter');
		}
	}
	public function detaille($id){
		$data['anim'] = $this->db_model->get_animation($id); 
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('info-animation',$data);
		$this->load->view('templates/bas'); 
	}
	public function supprimer($id){
		$username = $this->session->userdata('username');
		$status = $this->session->userdata('status');
		$session_life =  date_diff(date_create( $_SESSION['start'] ), date_create( date('H:i:s') ))->format('%r%i') ;

		if($username != null&& $status == 'o' && $session_life < 10){			
			$_SESSION['start'] = date('H:i:s');	
			$this->db_model->delete_animation($id);
			
			redirect(base_url().'index.php/animation/admin');
		}else{
			redirect(base_url().'index.php/compte/connecter');
		} 
		 
	}
	public function galerie($aniId){
		//FONCTION POUR LES VISITEUR
		$data['invs'] = $this->db_model->get_anim_invite($aniId); 
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur.php');
		$this->load->view('animation-galerie',$data);
		$this->load->view('templates/bas'); 
	}
	public function lieu($lie_id){
		//FONCTION POUR LES VISITEUR
		$data['lieux'] = $this->db_model->get_lieu($lie_id);
		$this->load->view('templates/haut');
		$this->load->view('templates/menu_visiteur');
		$this->load->view('animation-lieu',$data);
		$this->load->view('templates/bas');
	}
}
?>