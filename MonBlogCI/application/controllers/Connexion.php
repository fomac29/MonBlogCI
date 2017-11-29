<?php
class Connexion extends CI_Controller {
	
	public function index()
	{
		$this->load->model('authentif');
		
		if (!$this->authentif->estConnecte())
		{
			$data = array();
			$this->load->view('Publique/v_connexion', $data);
		}
		
		else if($this->session->userdata('statut') == 'administrateur')
		{
			$this->load->helper('url');
			redirect('/Administrateur/');
		}
		
		else if($this->session->userdata('statut') == 'utilisateur')
		{
			$this->load->helper('url');
			redirect('/Utilisateur/');
		}
	}
	
	/**
	 * Traite le retour du formulaire de connexion afin de connecter l'utilisateur
	 * s'il est reconnu
	 */
	public function connecter ()
	{	// TODO : contrôler que l'obtention des données postées ne rend pas d'erreurs
		
		$this->load->model('authentif');
		
		$login = $this->input->post('login');
		$mdp = $this->input->post('mdp');
		
		$authUser = $this->authentif->authentifier($login, $mdp);
		
		if(empty($authUser))
		{
			$data = array('erreur'=>'Login ou mot de passe incorrect');
			$this->load->view('Publique/v_connexion', $data);
		}
		else
		{
			$this->authentif->connecter($authUser['id'], $authUser['nom'], $authUser['prenom'], $authUser['statut']);
			$this->index();
		}
	}
}