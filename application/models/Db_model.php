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
	public function get_animation($id){
		$query = $this->db->query("SELECT ani_id, ani_libelle, ani_description, ani_dateDebut, ani_dateFin, inv_nom, inv_discipline, inv_etat,lie_id, lie_nom FROM t_invit_inv 
		join t_invit_animation using(inv_id) RIGHT join t_animation_ani using(ani_id)  LEFT join t_lieu_lie using(lie_id) where ani_id='".$id."' order by ani_dateDebut desc ;");
		
		return $query->result_array();
	}
	public function delete_animation($id){
		$query =$this->db->simple_query("call delete_animation(".$id.")");
		return $query;
	}
	//------------------------------------------------------------------------------------------
	//                                  MODEL INVITE
	//------------------------------------------------------------------------------------------
	public function get_invite($username){
        $query = $this->db->query("SELECT inv_id, inv_nom, inv_discipline, inv_biographie, inv_photo, com_login, res_libelle, res_url  FROM t_invit_inv LEFT JOIN t_invit_reseau USING(inv_id) JOIN t_reseauxSociaux_res USING(res_id) WHERE com_login='".$username."';");
        return $query->result_array();
    }
	public function get_inviteid($id){
        $query = $this->db->query("SELECT inv_id, inv_nom, inv_discipline, inv_biographie, inv_photo, com_login, res_libelle, res_url  FROM t_invit_inv LEFT JOIN t_invit_reseau USING(inv_id) JOIN t_reseauxSociaux_res USING(res_id) WHERE inv_id='".$id."';");
        return $query->result_array();
    }
	public function get_invitep($username){
        $query = $this->db->query("SELECT inv_id, inv_nom, inv_discipline, inv_biographie, inv_photo, com_login FROM t_invit_inv  WHERE com_login='".$username."';");
        return $query->row();
    }
	public function get_all_invite(){
        $query = $this->db->query("SELECT inv_id, inv_nom, inv_photo, res_libelle, res_url,pos_id, pos_libelle, pos_datePost, pos_etat, pas_etat, inv_etat FROM t_post_pos  left join t_passeport_pas USING(pas_id) RIGHT join t_invit_inv USING(inv_id) left join t_invit_reseau using(inv_id) RIGHT join t_reseauxSociaux_res USING(res_id) WHERE inv_etat = 'a' order by inv_nom , pos_datePost desc,  res_libelle;");
        return $query->result_array();
    }
	public function get_anim_invite($ani_id){
        $query = $this->db->query("SELECT inv_id,ani_id, inv_nom, inv_photo, res_libelle, res_url,pos_id, pos_libelle, pos_datePost, pos_etat, pas_etat, inv_etat FROM t_post_pos  left join t_passeport_pas USING(pas_id) RIGHT join t_invit_inv USING(inv_id) left join t_invit_reseau using(inv_id) left join t_invit_animation USING(inv_id) RIGHT join t_reseauxSociaux_res USING(res_id) WHERE ani_id='".$ani_id."' and inv_etat = 'a' order by inv_id , pos_datePost desc,  res_libelle;");
        return $query->result_array();
    }
	//------------------------------------------------------------------------------------------
	//                                  MODEL COMPTE
	//------------------------------------------------------------------------------------------ 
	public function get_all_compte(){
		$query = $this->db->query("select com_login, com_status,com_etat, inv_nom,org_nom,org_prenom,org_email from t_organisateur_org RIGHT join t_compt_com using(com_login) left join t_invit_inv using(com_login) order by com_status desc,com_etat;");
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
	public function update_compte($username, $password){
		$query =$this->db->simple_query("Update t_compt_com set com_password = '".$password."' where com_login = '".$username."';");
		return $query;
	}
	public function set_compte(){
		$this->load->helper('url');
		$id=$this->input->post('id');
		$mdp=$this->input->post('mdp');
		$req="INSERT INTO t_compt_com VALUES ('".$id."','".$mdp."',i,'a');";//choisir dans le formulair i ou o
		$query = $this->db->query($req);
		return ($query);
	}

	//------------------------------------------------------------------------------------------
	//                                  MODEL ADMIN
	//------------------------------------------------------------------------------------------ 
	public function get_admin($username){
        $query = $this->db->query("SELECT com_login, org_nom,org_prenom, org_email FROM t_organisateur_org  WHERE com_login='".$username."';");
        return $query->row();
    }

	//------------------------------------------------------------------------------------------
	//                                  MODEL LIEUX
	//------------------------------------------------------------------------------------------ 
	public function get_all_lieux(){
        $query = $this->db->query("SELECT lie_id, lie_nom, lie_description, ser_id, ser_nom FROM t_lieu_lie left join t_servic_ser using(lie_id);");
        return $query->result_array();
    }
	public function get_lieu($lie_id){
        $query = $this->db->query("SELECT lie_id, lie_nom, lie_description, ser_id, ser_nom FROM t_lieu_lie left join t_servic_ser using(lie_id) where lie_id='".$lie_id."';");
        return $query->result_array();
    }
	 

	//------------------------------------------------------------------------------------------
	//                                  MODEL PASSEPORT
	//------------------------------------------------------------------------------------------
	public function get_passeport($username){
        $query = $this->db->query("SELECT pas_id, pas_etat,pos_id,pos_libelle, pos_datePost, pos_etat from t_post_pos right join t_passeport_pas using(pas_id) join t_invit_inv using(inv_id)  WHERE pas_etat='a' and com_login='".$username."' order by pas_id, pos_datePost desc;");
        return $query->result_array();
    }
	public function add_passeport($pasId,$pasMdp,$comLogin){
		$query =$this->db->simple_query("call add_passeport('".$pasId."','".$pasMdp."','".$comLogin."')");
		return $query;
	}
	public function desactiver_passe($pasId){
		$query =$this->db->simple_query("UPDATE t_passeport_pas set pas_etat = 'd' WHERE pas_id = '".$pasId."';");
		return $query;
	}
	//------------------------------------------------------------------------------------------
	//                                  MODEL POST
	//------------------------------------------------------------------------------------------
	public function desactiver_post($postId){
		$query =$this->db->simple_query("UPDATE t_post_pos set pos_etat = 'd' WHERE pos_id = ".$postId.";");
		return $query;
	}
	public function add_post($pasId,$pasMdp,$post){
		$query =$this->db->query("select check_passeport('".$pasId."','".$pasMdp."') as res;");
		$passeOK = $query->row();

		if($passeOK->res){
			$this->db->simple_query("INSERT into t_post_pos values (NULL,'".$post."',CURDATE(),'a','".$pasId."')");
		}else{
			return false;
		}
		return true;
	}
	public function get_all_post(){
        $query = $this->db->query("SELECT inv_id, inv_nom, pos_id, pos_libelle, pos_etat, pos_datePost ,pas_id FROM t_post_pos join t_passeport_pas USING(pas_id) join t_invit_inv USING(inv_id) order by inv_nom ;");
        return $query->result_array();
    }
	public function chang_etat_post($postId,$etat){
		if($etat == 'a'){
			$this->db->simple_query("UPDATE t_post_pos set pos_etat = 'd' where pos_id='".$postId."'");
		}else{
			$this->db->simple_query("UPDATE t_post_pos set pos_etat = 'a' where pos_id='".$postId."'");
		}
	}
	//------------------------------------------------------------------------------------------
	//                                  FIIIIIIIIIIIIIIIIIIN
	//------------------------------------------------------------------------------------------

}
