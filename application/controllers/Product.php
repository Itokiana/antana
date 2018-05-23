<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
    $_SESSION['page'] = 'product';
    if(isset($_SESSION['user'])){
      $prods = array();
      $query = $this->db->get("products");
      

      $products = array('products' => $query->result());
        
      $this->load->view('layouts/_header');
      $this->load->view('layouts/_nav_admin');
      $this->load->view('product/index', $products);
      $this->load->view('layouts/_footer_admin');

    }else {
      redirect("login", "refresh");
    }
  }

  public function show($id)
  {
    $_SESSION['page'] = 'product';
    if (isset($_SESSION['user'])) {
      $this->load->helper('html');

      $prod = array();
      $this->db->where('id',$id);
      $this->db->from('products');
      $query = $this->db->get();

      $this->db->where('id',$query->row()->category_id);
      $this->db->from('categories');
      $cat = $this->db->get();
      
      $this->db->where('id',$query->row()->subcategory_id);
      $this->db->from('subcategories');
      $sub_cat = $this->db->get();
      
      $prod = array('product' => $query->row(), 'category' => $cat->row(), 'sub_category' => $sub_cat->row());

      $product['product'] = $prod; 

      $this->load->view('layouts/_header');
      $this->load->view('layouts/_nav_admin');
      $this->load->view('product/show', $product);
      $this->load->view('layouts/_footer_admin');

    } else {
      redirect('login');
    }
    
  }

  public function create()
	{
    $_SESSION['page'] = 'product';
    $query = $this->db->get("categories");

    $categories = $query->result();

    $query = $this->db->get("subcategories");

    $sub_categories = $query->result();

    if(isset($_SESSION['user'])){
      $this->form_validation->set_rules('libelle', 'libelle', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));
      $this->form_validation->set_rules('description', 'Description', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));
      $this->form_validation->set_rules('stock', 'Stock', 'required|numeric',
      array(
        'required'      => 'Veuillez remplir le champ %s.',
        'numeric'       => 'Veuillez un nombre.'
      ));
      $this->form_validation->set_rules('reference', 'Réference', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));
      $this->form_validation->set_rules('color', 'Couleur', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));
      $this->form_validation->set_rules('matiere', 'Matière', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));
      $this->form_validation->set_rules('metal', 'Metal', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));
      $this->form_validation->set_rules('pierre', 'Pierre', 'required',
      array(
        'required'      => 'Veuillez remplir le champ %s.'
      ));


      if ($this->form_validation->run() == TRUE)
      {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $_POST['reference'];
        $config['max_width'] = '569';
        $config['max_height'] = '569';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('picture'))
        {
          $this->session->set_flashdata('error', 'Veuillez entrer un fichier image de 569x569 px');

          redirect("products/new", "refresh");
        }
        else
        {

          $data = array(
            'libelle' => $_POST['libelle'],
            'description' => $_POST['description'],
            'reference' => $_POST['reference'],
            'stock' => $_POST['stock'],
            'color' => $_POST['color'],
            'matiere' => $_POST['matiere'],
            'metal' => $_POST['metal'],
            'pierre' => $_POST['pierre'],
            'category_id' => $_POST['category'],
            'subcategory_id' => $_POST['sub_category'],
            'picture' => $this->upload->data('file_name'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
          );
    
          $this->db->insert('products', $data);
    
          $this->session->set_flashdata('success', 'Le produit ajouté avec succès');
    
          redirect("products/new", "refresh");
        }
      }
      else{
        $properties['categories'] = $categories;
        $properties['sub_categories'] = $sub_categories;
        $this->load->view('layouts/_header');
        $this->load->view('layouts/_nav_admin');
        $this->load->view('product/new', $properties);
        $this->load->view('layouts/_footer_admin');
      }
    }else {
      redirect('login');
    }
  }

  public function update($id)
  {
    $_SESSION['page'] = 'product';
    $query = $this->db->get("categories");

    $categories = $query->result();

    $query = $this->db->get("subcategories");

    $sub_categories = $query->result();
    
    if(isset($_SESSION['user'])){

      if(!empty($query->row())){

        $this->load->helper('html');

        $this->form_validation->set_rules('libelle', 'libelle', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));
        $this->form_validation->set_rules('description', 'Description', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric',
        array(
          'required'      => 'Veuillez remplir le champ %s.',
          'numeric'       => 'Veuillez un nombre.'
        ));
        $this->form_validation->set_rules('reference', 'Réference', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));
        $this->form_validation->set_rules('color', 'Couleur', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));
        $this->form_validation->set_rules('matiere', 'Matière', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));
        $this->form_validation->set_rules('metal', 'Metal', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));
        $this->form_validation->set_rules('pierre', 'Pierre', 'required',
        array(
          'required'      => 'Veuillez remplir le champ %s.'
        ));

        $prod = array();
        $this->db->where('id',$id);
        $this->db->from('products');
        $query = $this->db->get();

        $this->db->where('id',$query->row()->category_id);
        $this->db->from('categories');
        $cat = $this->db->get();
        
        $this->db->where('id',$query->row()->subcategory_id);
        $this->db->from('subcategories');
        $sub_cat = $this->db->get();
        
        $prod = array(
          'product' => $query->row(), 
          'category' => $cat->row(), 
          'sub_category' => $sub_cat->row(),
          'categories' => $categories,
          'sub_categories' => $sub_categories
        );

        $product['product'] = $prod;


        if ($this->form_validation->run() == TRUE)
        {

          $data = array(
            'libelle' => $_POST['libelle'],
            'description' => $_POST['description'],
            'reference' => $_POST['reference'],
            'stock' => $_POST['stock'],
            'color' => $_POST['color'],
            'matiere' => $_POST['matiere'],
            'metal' => $_POST['metal'],
            'pierre' => $_POST['pierre'],
            'category_id' => $_POST['category'],
            'subcategory_id' => $_POST['sub_category'],
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
          );
          $this->db->set($data);
          $this->db->where('id',$product['product']->id);
          $this->db->update('products');

          $this->session->set_flashdata('success', 'Produit mise à jour');

          redirect("products/".$product['product']->id, "refresh");
        }
        else{
          $this->load->view('layouts/_header');
          $this->load->view('layouts/_nav_admin');
          $this->load->view('product/update', $product);
          $this->load->view('layouts/_footer_admin');
        }
      }else{
        redirect('login');
      }
    }
  }

  public function destroy($id)
  {
    if(isset($_SESSION['user'])){
      if($_SESSION['user']->role == 1 || $_SESSION['user']->role == 2){
        $this->db->where('id',$id);
        $this->db->from('products');
        $query = $this->db->get();

        if(!empty($query->row())){
          $this->db->where('id',$id);
          $this->db->from('products');
          $this->db->delete();

          $this->session->set_flashdata('success', 'Un produit supprimé avec succès!');
          redirect('products','refresh');
        }
      }
    }
  }

}
