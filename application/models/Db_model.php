<?php
class Db_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}
	public function get_all_compte(){
		$query = $this->db->query("SELECT com_login FROM t_compt_com;");
		return $query->result_array();
	}
    public function get_actualite($numero){
        $query = $this->db->query("SELECT act_id, act_libelle  FROM t_actualitee_act WHERE act_id=".$numero.";");
        return $query->row();
    }
    public function get_all_actualite(){
		$query = $this->db->query("SELECT act_libelle, act_description, act_datePublication, act_image FROM t_actualitee_act where act_status='a' order by act_datePublication desc;");
		return $query->result_array();
	}
	public function get_nb_compte(){
        $query = $this->db->query("SELECT COUNT(com_login) as nombre FROM t_compt_com;");
        return $query->row();
    }

}
