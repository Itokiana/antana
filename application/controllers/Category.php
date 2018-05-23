<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
    $_SESSION['page'] = 'category';
    if(isset($_SESSION['user'])){
      $query = $this->db->get("categories");

      $categories = array('categories' => $query->result());

      $this->load->view('layouts/_header');
      $this->load->view('layouts/_nav_admin');
      $this->load->view('category/index', $categories);
      $this->load->view('layouts/_footer_admin');
    }else{
      redirect('login');
    }
  }

  public function show($id)
  {
    $_SESSION['page'] = 'category_show';
    if(isset($_SESSION['user'])){
      $this->db->where('id',$id);
      $this->db->from('categories');
      $query = $this->db->get();

      $category = array('category' => $query->row());

      $this->load->view('layouts/_header');
      $this->load->view('layouts/_nav_admin');
      $this->load->view('category/show', $category);
      $this->load->view('layouts/_footer_admin');
    }else{
      redirect('login');
    }
  }

  public function create()
	{
    $_SESSION['page'] = 'category';
    if(isset($_SESSION['user'])){
      $this->form_validation->set_rules('name', 'name', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));


      if ($this->form_validation->run() == TRUE)
      {
        $data = array(
          'name' => strtolower($_POST['name']),
          'created_at' => date('Y-m-d'),
          'updated_at' => date('Y-m-d')
        );
  
        $this->db->insert('categories', $data);
  
        $this->session->set_flashdata('success', 'La catégorie a été créer avec succès');
  
        redirect("categories", "refresh");
      }
      else{
        $this->load->view('layouts/_header');
        $this->load->view('layouts/_nav_admin');
        $this->load->view('category/new');
        $this->load->view('layouts/_footer_admin');
      }
    }else{
      redirect('login');
    }
  }

  public function update($id)
  {
    $_SESSION['page'] = 'category';
    if(isset($_SESSION['user'])){
      $this->db->where('id',$id);
      $this->db->from('categories');
      $query = $this->db->get();

      if(!empty($query->row())){
        $category = array('category' => $query->row());

        $this->form_validation->set_rules('name', 'name', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));


        if ($this->form_validation->run() == TRUE)
        {

          $data = array(
            'name' => $_POST['name'],
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
          );
          $this->db->set($data);
          $this->db->where('id',$category['category']->id);
          $this->db->update('categories');

          $this->session->set_flashdata('success', 'Catégorie mise à jour');

          redirect("categories/".$category['category']->id, "refresh");
        }
        else{
          $this->load->view('layouts/_header');
          $this->load->view('layouts/_nav_admin');
          $this->load->view('category/update', $category);
          $this->load->view('layouts/_footer_admin');
        }
      }else{
        redirect('categories');
      }
    }else{
      redirect('login');
    }
  }

  public function destroy($id)
  {
    if(isset($_SESSION['user'])){
      if($_SESSION['user']->role == 1 || $_SESSION['user']->role == 2){
        $this->db->where('id',$id);
        $this->db->from('categories');
        $query = $this->db->get();

        if(!empty($query->row())){
          $this->db->where('id',$id);
          $this->db->from('categories');
          $this->db->delete();

          $this->session->set_flashdata('success', 'Une catégore supprimé avec succès!');
          redirect('categories','refresh');
        }
      }else{
        redirect('products');
      }
    }else{
      redirect('login');
    }
  }

}
