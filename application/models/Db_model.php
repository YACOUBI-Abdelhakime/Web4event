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
		$query = $this->db->query("SELECT act_id, act_libelle, act_description, act_datePublication, act_image, org_id, org_nom, org_prenom FROM t_actualitee_act join t_organisateur_org using(org_id) where act_status='a' order by act_datePublication desc limit 5");
		return $query->result_array();
	}
	public function get_nb_compte(){
        $query = $this->db->query("SELECT COUNT(com_login) as nombre FROM t_compt_com;");
        return $query->row();
    }
    public function get_all_animation(){
		$query = $this->db->query("SELECT ani_id, ani_libelle, ani_description, ani_dateDebut, ani_dateFin, inv_nom, inv_discipline, lie_nom FROM t_invit_inv join t_invit_animation using(inv_id) RIGHT join t_animation_ani using(ani_id)  LEFT join t_lieu_lie using(lie_id) order by ani_dateDebut desc ;");
		return $query->result_array();
	}
	public function get_all_invite(){
        $query = $this->db->query("SELECT inv_id, inv_nom, inv_photo, res_libelle, res_url FROM t_invit_inv join t_invit_reseau using(inv_id) join t_reseauxSociaux_res USING(res_id) WHERE inv_etat = 'a';");
        return $query->result_array();
    }

}
