<?php
class Commentaire extends CI_Model
{
	/**
	 * Constructeur : fait appel à la classe parent
	 */
	
	public function _construct()
	{
		parent::_construct();
	}
	
	public function getCommentaires($idBillet)
	{
		$req = "select COM_ID, COM_DATE, COM_AUTEUR, COM_CONTENU from t_commentaire where BIL_ID = ?";
		// exécution requête en fournissant le paramètre
		$rs = $this->db->query($req, array($idBillet));
		//lecture de la première ligne
		$commentaire = $rs->result_array();
		return $commentaire;
	}
	
	public function ajoutCommentaire($idBillet, $auteur, $contenu)
	{
		$data = array(
				'COM_AUTEUR' => $auteur,
				'COM_CONTENU' => $contenu,
				'COM_DATE' => date('Y-m-d H:i:s'),
				'BIL_ID' => $idBillet
				);
			return $this->db->insert('t_commentaire', $data);
	}
}