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
	public function ajouter_post(){ 
		$this->load->helper('form');
		$this->load->library('form_validation');
		

		if($this->input->post('pasId') == null && $this->input->post('pasMdp') == null && $this->input->post('post') == null){	
				//add test session
				$data['error'] = null; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_visiteur');
				$this->load->view('ajouter-post',$data);
				$this->load->view('templates/bas');

		}else if($this->input->post('pasId') != null && $this->input->post('pasMdp') != null && $this->input->post('post') != null && strlen($this->input->post('post')) <= 140 ){
			$pasId = $this->input->post('pasId');
			$pasMdp = $this->input->post('pasMdp');
			$post = $this->input->post('post');
			$salt = "MY_sel@1999";
			$password = hash('sha256', $salt.$pasMdp);
			$ok = $this->db_model->add_post($pasId,$password,$post);
			if($ok){
				$data['error'] = "Post ajouté avec succés"; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_visiteur');
				$this->load->view('ajouter-post',$data);
				$this->load->view('templates/bas');
			}else{
				$data['error'] = "Identifiant ou mot de passe erronée, aucun passeport trouvé !"; 
				$this->load->view('templates/haut');
				$this->load->view('templates/menu_visiteur');
				$this->load->view('ajouter-post',$data);
				$this->load->view('templates/bas');
			}
		}else if($this->input->post('pasId') != null && $this->input->post('pasMdp') != null && strlen($this->input->post('post')) > 140 ){
			$data['error'] = "Un post a 140 caractères maximum !"; 
			$this->load->view('templates/haut');
			$this->load->view('templates/menu_visiteur');
			$this->load->view('ajouter-post',$data);
			$this->load->view('templates/bas');
		}else {
			$data['error'] = "Veuillez remplir tous les champs"; 
			$this->load->view('templates/haut');
			$this->load->view('templates/menu_visiteur');
			$this->load->view('ajouter-post',$data);
			$this->load->view('templates/bas');
		}
	}
}
?>