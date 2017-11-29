<?php
class Utilisateur extends CI_Controller {
	
		public function index()
		{
			// chargement du modèle d'authentification
			$this->load->model('authentif');
			
			// contrôle de la bonne authentification de l'utilisateur
			if (!$this->authentif->estConnecte())
			{
				// l'utilisateur n'est pas authentifié, on envoie la vue de connexion
				$data = array();
				$this->load->view('Utilisateur/v_connexion', $data);
			}
			
			else if($this->session->userdata('statut') != 'utilisateur')
			{
				$this->load->helper('url');
				redirect('/Connexion/');
			}
			else
			{
			echo 'utilisateur</br>';
			echo anchor('Utlisateur/deconnecter','déconnecter');
			
			$data['titrePage'] = 'Accueil';
			$data['titre'] = 'Nouvelle page';
			$data['url'] = base_url();
			$data['chemin'] = base_url('application/views');
			$data['description'] = 'une nouvelle page pas très stylée pour le moment :(';
			$this->load->view('Utilisateur/accueil', $data);
			}
		}
		
		
		public function lesBillets()
		{
			//charger le modèle
			$this->load->model('billet');
			//lancer la requête stockage du résultat dans un tableau
			$data['lesBillets'] = $this->billet->getBillets();
			$data['titre'] = 'Liste des billets' ;
			//chargement de la vue
			$this->load->view('Utilisateur/v_billets',$data) ;
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
			$this->load->view('Utilisateur/v_billet',$data) ;
		}
		
		public function ajoutCommentaire($idBillet)
		{
			$this->load->model('commentaire');
			$pseudo = $this->input->post('pseudo');
			$message = $this->input->post('message');
			$data['result'] = $this->commentaire->ajoutCommentaire($idBillet, $pseudo, $message);
			$this->leBillet($idBillet);
		}
		
		public function deconnecter()
		{
			$this->load->model('authentif');
			$this->authentif->deconnecter();
		}
		public function apropos()
		{
			$data['titre'] = 'A propos';
			$this->load->view('Utilisateur/apropos', $data);
		}
	}
	?>