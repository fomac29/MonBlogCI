<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['titre'] = 'Nouvelle page';
		$data['url'] = base_url();
		$data['chemin'] = base_url('application/views');
		$data['description'] = 'une nouvelle page pas très stylée pour le moment :(';
		$this->load->view('Publique/accueil', $data);
	}
	
	public function seConnecter()
	{
		$this->load->helper('url');
		redirect('/Connexion/');
	}
	
	public function apropos()
	{
		$data['titre'] = 'A propos';
		$this->load->view('Publique/apropos', $data);
	}
	
	public function lesBillets()
	{
		//charger le modèle
		$this->load->model('billet');
		//lancer la requête stockage du résultat dans un tableau
		$data['lesBillets'] = $this->billet->getBillets();
		$data['titre'] = 'Liste des billets' ;
		//chargement de la vue
		$this->load->view('Publique/v_billets',$data) ;
	}
	
	public function leBillet($idBillet)
	{
		//charger le modèle billet
		$this->load->model('billet');
		
		//charger le modèle commentaire
		$this->load->model('commentaire');
		
		//lancer la requête stockage du résultat dans un tableau
		$data['leBillet'] = $this->billet->getBillet($idBillet);
		$data['lesCommentaires'] = $this->commentaire->getCommentaires($idBillet);
		$data['titre'] = 'Liste des billets' ;
		$data['statut'] = $this->session->userdata('statut');
		//chargement de la vue
		$this->load->view('Publique/v_billet',$data) ;
	}
	
	public function ajoutCommentaire($idBillet)
	{
		$this->load->model('commentaire');
		$pseudo = $this->input->post('pseudo');
		$message = $this->input->post('message');
		$data['result'] = $this->commentaire->ajoutCommentaire($idBillet, $pseudo, $message);
		$this->leBillet($idBillet);
	}
}
