<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author €€€€
 */
class Upload extends CI_Controller{
    //put your code here
     public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
      }
		
      public function index() { 
        //echo "Hello"; 
        $this->load->view('upload_form', array('error' => ' ' )); 
      } 
		
      public function do_upload() { 
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 100; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error); 
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $this->load->view('upload_success', $data); 
         } 
      } 
}
