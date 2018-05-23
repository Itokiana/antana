<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitrine extends CI_Controller {

	public function index()
	{
    $_SESSION['page'] = 'home';
    $this->load->helper('html');

    $query = $this->db->get('categories');
    $navigation['categories'] = $query->result();
    $query = $this->db->get('subcategories');
    $navigation['sub_categories'] = $query->result();

    $this->db->limit(10);
    $this->db->from('products');
    $query = $this->db->get();

    $products['products'] = $query->result();

    $this->load->view('layouts/_header');
    $this->load->view('layouts/_nav', $navigation);
    $this->load->view('vitrine/index', $products);
    $this->load->view('layouts/_footer');
  }

  public function section($id1, $id2)
	{
    $this->load->helper('html');
    
    $query = $this->db->get('categories');
    $navigation['categories'] = $query->result();
    $query = $this->db->get('subcategories');
    $navigation['sub_categories'] = $query->result();

    $this->db->where('category_id',$id1);
    $this->db->where('subcategory_id',$id2);
    $this->db->from('products');
    $query = $this->db->get();

    $products['products'] = $query->result();

    $this->load->view('layouts/_header');
    $this->load->view('layouts/_nav', $navigation);
    $this->load->view('vitrine/section', $products);
    $this->load->view('layouts/_footer');
  }
  
  public function contact()
  {
    $_SESSION['page'] = 'contact';
    $query = $this->db->get('categories');
    $navigation['categories'] = $query->result();
    $query = $this->db->get('subcategories');
    $navigation['sub_categories'] = $query->result();

    $this->load->view('layouts/_header');
    $this->load->view('layouts/_nav', $navigation);
    $this->load->view('vitrine/contact');
    $this->load->view('layouts/_footer');
  }
}
