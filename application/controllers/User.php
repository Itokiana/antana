<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function new_user()
	{
    $_SESSION['page'] = 'user';
    if (isset($_SESSION['user']) && $_SESSION['user']->role == 1) {
      $query = $this->db->get("users");

    $users = $query->result();

    $this->form_validation->set_rules('first_name', 'Nom', 'required',
    array(
      'required'      => 'Veuillez remplir le champ nom.'
    ));
    $this->form_validation->set_rules('last_name', 'Prénom', 'required',
    array(
      'required'      => 'Veuillez remplir le champ prénom.'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',
    array(
      'required'      => 'Veuillez remplir le champ mot de passe.',
      'min_length'     => 'Le mot de passe doit comporter au moins 6 caractères.'
    ));
    $this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required|matches[password]',
    array(
      'required'      => 'Veuillez remplir le champ de confirmation du mot de passe.',
      'matches'       => 'Les mot de passe que vous avez tapez ne sont pas conforme.'
    ));
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',
    array(
      'required'      => 'Veuillez remplir le champ email.',
      'is_unique'     => 'Cet email est déjà utilisé.'
    ));

    if ($this->form_validation->run() == TRUE)
    {
      $data = array(
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'password' => md5($_POST['password']),
        'role' => $_POST['role'],
        'created_at' => date('Y-m-d'),
        'updated_at' => date('Y-m-d')
      );

      $this->db->insert('users', $data);

      $this->session->set_flashdata('success', 'Le compte a été créer avec succès');

      redirect("users/new", "refresh");
    }
    $this->load->view('layouts/_header');
    $this->load->view('layouts/_nav_admin');
    $this->load->view('user/new');
    $this->load->view('layouts/_footer_admin');
    } else {
      redirect('login');
    }
  }
  
  public function index()
  {
    $_SESSION['page'] = 'user';
    if (isset($_SESSION['user']) && $_SESSION['user']->role == 1) {
      $query = $this->db->get("users");
      $users['users'] = $query->result();

      $this->load->view('layouts/_header');
      $this->load->view('layouts/_nav_admin');
      $this->load->view('user/index', $users);
      $this->load->view('layouts/_footer_admin');
    } else {
      redirect('login');
    } 
  }

  public function destroy($id)
  {
    if(isset($_SESSION['user'])){
      if($_SESSION['user']->role == 1){
        $this->db->where('id',$id);
        $this->db->from('users');
        $query = $this->db->get();

        if(!empty($query->row())){
          $this->db->where('id',$id);
          $this->db->from('users');
          $this->db->delete();

          $this->session->set_flashdata('success', 'Un utilisateur supprimé avec succès!');
          redirect('users','refresh');
        }
      }
    }
  }
}
