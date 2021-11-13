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
			$this->load->view('compte_liste',$data);
			$this->load->view('templates/bas');
		}

	}


?>