<?php
class Billet extends CI_Model {
	
	/**
	 * Constructeur : fait appel à la classe parent
	 */
	
	public function _construct()
	{
		parent::_construct();
	}
	
	/*
	 * Renvoie tous les billets du blog
	 */
	
	public function getBillets()
	{
		$req = "select BIL_ID as id, BIL_TITRE as titre, BIL_CONTENU as contenu, BIL_DATE as date from t_billet";
		// exécution requête
		$rs = $this->db->query($req);
		$lesBillets = $rs->result_array();
		return $lesBillets;
	}
	
	/*
	 * Renvoie UN BILLET
	 */
	
	public function getBillet($idBillet )
	{
		$req = "select BIL_ID as id, Bil_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu from t_billet where BIL_ID = ?";
		// exécution requête en fournissant le paramètre
		$rs = $this->db->query($req, array($idBillet));
		//lecture de la première ligne
		$billet = $rs->first_row('array');
		return $billet;
	}
}