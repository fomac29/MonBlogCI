<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentif extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	 /**
	 * Teste si un quelconque utilisateur est connecté
	 * 
	 * @return vrai ou faux 
	 */
	public function estConnecte()
	{
	  return $this->session->userdata('idUser');
	}
	
	/**
	 * Enregistre dans une variable session les infos d'un utilisateur
	 * 
	 * @param $id 
	 * @param $nom
	 * @param $prenom
	 */
	public function connecter($idUser,$nom,$prenom,$statut)
	{	// TODO : s'assurer que les paramètres reçus sont cohérents avec ceux mémorisés en session

		$authUser = array(
                   'idUser'  => $idUser,
                   'nom' => $nom,
                   'prenom' => $prenom,
				   'statut' => $statut
				);

		$this->session->set_userdata($authUser);
	}

	/**
	 * Détruit la session active et redirige vers le contrôleur par défaut
	 */
	public function deconnecter()
	{
		$authUser = array(
                   'idUser'  => '',
                   'nom' => '',
                   'prenom' => '',
				   'statut' => ''
				);
	
		$this->session->unset_userdata($authUser);
		$this->session->sess_destroy();

		$this->load->helper('url');
		redirect('/Connexion/');
	}

	/**
	 * Vérifie en base de données si les informations de connexions sont correctes
	 * 
	 * @return : renvoie l'id, le nom et le prenom de l'utilisateur dans un tableau s'il est reconnu, sinon un tableau vide.
	 */
	public function authentifier ($login, $mdp) 
	{	// TODO : s'assurer que les paramètres reçus sont cohérents avec ceux mémorisés en session
	
		$this->load->model('dataAccess');

		$authUser = $this->dataAccess->getInfosUtilisateur($login, $mdp);

		return $authUser;
	}
}
