<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {

	public function login()
	{
    $this->form_validation->set_rules('email', 'email', 'required',
      array(
        'required' => 'Veuillez saisir votre email', 
      )
    );
    $this->form_validation->set_rules('password', 'password', 'required|min_length[6]',
      array(
        'required' => 'Veuillez saisir votre mot de passe', 
      )
    );

    if($this->form_validation->run() == TRUE){
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where(array('email' => $_POST['email'], 'password' => md5($_POST['password'])));
        $query = $this->db->get();

        $user = $query->row();

        if ($user->email) {
            $this->session->set_flashdata('success', 'Vous êtes connecté en tant que '.$user->first_name." ".$user->last_name);

            $_SESSION['user'] = $user;

            redirect('products','refresh');

        }else{
            $this->session->set_flashdata('error', 'Email ou mot de passe invalide');
            redirect('login','refresh');
        }

    }

    $this->load->view('layouts/_header');
    $this->load->view('sessions/new');
  }
  
  public function destroy()
  {
    session_destroy();
    redirect('login','refresh');
  }
}
