<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategory extends CI_Controller {

	public function index()
	{
    $_SESSION['page'] = 'subcategory';
    if(isset($_SESSION['user'])){
      $subcats = array();
      $query = $this->db->get("subcategories");
      $i = 0;

      foreach ($query->result() as $sub) {
        $this->db->where('id',$sub->category_id);
        $this->db->from('categories');
        $cat = $this->db->get();

        $subcats[$i] = array('subcat' => $sub, 'category' => $cat->row());
        $i++;
      }

      $sub_categories = array('sub_categories' => $subcats);

      $this->load->view('layouts/_header');
      $this->load->view('layouts/_nav_admin');
      $this->load->view('sub_category/index', $sub_categories);
      $this->load->view('layouts/_footer_admin');
    }else{
      redirect('login');
    }
  }

  public function create()
	{
    $_SESSION['page'] = 'subcategory';
    if(isset($_SESSION['user'])){
      $query = $this->db->get("categories");

      $categories = $query->result();

      $this->form_validation->set_rules('name', 'name', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));


      if ($this->form_validation->run() == TRUE)
      {
        $data = array(
          'name' => strtolower($_POST['name']),
          'category_id' => strtolower($_POST['category']),
          'created_at' => date('Y-m-d'),
          'updated_at' => date('Y-m-d')
        );
  
        $this->db->insert('subcategories', $data);
  
        $this->session->set_flashdata('success', 'Le compte a été créer avec succès');
  
        redirect("sub_categories", "refresh");
      }
      else{
        $cats = array('categories' => $categories);
        $this->load->view('layouts/_header');
        $this->load->view('layouts/_nav_admin');
        $this->load->view('sub_category/new', $cats);
        $this->load->view('layouts/_footer_admin');
      }
    }else{
      redirect('login');
    }
  }

  public function show($id)
  {
    $_SESSION['page'] = 'subcategory';
    if(isset($_SESSION['user'])){
      $this->db->where('id',$id);
      $this->db->from('subcategories');
      $query = $this->db->get();

      $sub_category['sub_category'] = $query->row();

      $this->db->where('id',$query->row()->category_id);
      $this->db->from('categories');
      $q = $this->db->get();

      $sub_category['category'] = $q->row();


      $this->load->view('layouts/_header');
      $this->load->view('layouts/_nav_admin');
      $this->load->view('sub_category/show', $sub_category);
      $this->load->view('layouts/_footer_admin');
    }else{
      redirect('login');
    }
  }
  public function update($id)
  {
    $_SESSION['page'] = 'subcategory';
    if(isset($_SESSION['user'])){
      $this->db->where('id',$id);
      $this->db->from('subcategories');
      $query = $this->db->get();

      if(!empty($query->row())){
        $q = $this->db->get("categories");

        $categories = $q->result();
        $sub_category['sub_category'] = $query->row();
        $sub_category['categories'] = $categories;

        $this->form_validation->set_rules('name', 'name', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));


        if ($this->form_validation->run() == TRUE)
        {

          $data = array(
            'name' => $_POST['name'],
            'category_id' => strtolower($_POST['category']),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
          );
          $this->db->set($data);
          $this->db->where('id',$sub_category['sub_category']->id);
          $this->db->update('subcategories');

          $this->session->set_flashdata('success', 'Sous-catégorie mise à jour');

          redirect("sub_categories/".$sub_category['sub_category']->id, "refresh");
        }
        else{
          $this->load->view('layouts/_header');
          $this->load->view('layouts/_nav_admin');
          $this->load->view('sub_category/update', $sub_category);
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
        $this->db->from('subcategories');
        $query = $this->db->get();

        if(!empty($query->row())){
          $this->db->where('id',$id);
          $this->db->from('subcategories');
          $this->db->delete();

          $this->session->set_flashdata('success', 'Une sous-catégorie supprimé avec succès!');
          redirect('sub_categories','refresh');
        }
      }else{
        redirect('sub_categories');
      }
    }else{
      redirect('login');
    }
  }

}
