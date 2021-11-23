<?php
class Db_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}
	//------------------------------------------------------------------------------------------
	//                                  MODEL ACTUALITE
	//------------------------------------------------------------------------------------------
    public function get_actualite($numero){
        $query = $this->db->query("SELECT act_id, act_libelle  FROM t_actualitee_act WHERE act_id=".$numero.";");
        return $query->row();
    }
    public function get_all_actualite(){
		$query = $this->db->query("SELECT act_id, act_libelle, act_description, act_datePublication, act_image, act_etat,org_etat, org_id, org_nom, org_prenom FROM t_actualitee_act join t_organisateur_org using(org_id) where act_etat='a' and org_etat='a' order by act_datePublication desc limit 5");
		return $query->result_array();
	}
	//------------------------------------------------------------------------------------------
	//                                  MODEL ANIMATION
	//------------------------------------------------------------------------------------------
    public function get_all_animation(){
		$query = $this->db->query("SELECT ani_id, ani_libelle, ani_description, ani_dateDebut, ani_dateFin, inv_nom, inv_discipline, inv_etat,lie_id, lie_nom FROM t_invit_inv 
		join t_invit_animation using(inv_id) RIGHT join t_animation_ani using(ani_id)  LEFT join t_lieu_lie using(lie_id) order by ani_dateDebut desc ;");
		
		return $query->result_array();
	}
	//------------------------------------------------------------------------------------------
	//                                  MODEL INVITE
	//------------------------------------------------------------------------------------------
	public function get_invite($username){
        $query = $this->db->query("SELECT inv_id, inv_nom, inv_discipline, inv_biographie, inv_photo, com_login, res_libelle, res_url  FROM t_invit_inv JOIN t_invit_reseau USING(inv_id) JOIN t_reseauxSociaux_res USING(res_id) WHERE com_login='".$username."';");
        return $query->result_array();
    }
	public function get_all_invite(){
        //$query = $this->db->query("SELECT inv_id, inv_nom, inv_photo, res_libelle, res_url FROM t_invit_inv join t_invit_reseau using(inv_id) join t_reseauxSociaux_res USING(res_id) WHERE inv_etat = 'a' order by inv_nom, res_libelle;");
        $query = $this->db->query("SELECT inv_id, inv_nom, inv_photo, res_libelle, res_url,pos_id, pos_libelle, pos_datePost, pos_etat, pas_etat, inv_etat FROM t_post_pos  left join t_passeport_pas USING(pas_id) RIGHT join t_invit_inv USING(inv_id) left join t_invit_reseau using(inv_id) RIGHT join t_reseauxSociaux_res USING(res_id) WHERE inv_etat = 'a' order by inv_id , pos_datePost desc,  res_libelle;");
        return $query->result_array();
    }
	//------------------------------------------------------------------------------------------
	//                                  MODEL COMPTE
	//------------------------------------------------------------------------------------------ 
	public function get_all_compte(){
		$query = $this->db->query("SELECT com_login FROM t_compt_com;");
		return $query->result_array();
	}
	public function get_nb_compte(){
        $query = $this->db->query("SELECT COUNT(com_login) as nombre FROM t_compt_com;");
        return $query->row();
    }
	public function connect_compte($username, $password){
		$query =$this->db->query("SELECT com_login,com_password,com_status	FROM t_compt_com WHERE com_etat='a' AND com_login='".$username."'	AND com_password='".$password."';");
		if($query->num_rows() > 0){
			$res[0] = true;
			$res[1] = $query->row();
			return $res;
		}else{ 
			$res[0] = false;
			return $res;
		}
	}
	//------------------------------------------------------------------------------------------
	//                                  FIIIIIIIIIIIIIIIIIIN
	//------------------------------------------------------------------------------------------

}
