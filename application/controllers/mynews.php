<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mynews extends Main_Controller
{   
    function index() 
    {
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('unit_model');
        $this->load->model('users');
        
        if (!$this->tank_auth->is_logged_in()) {
            redirect('');
        }
        
        if ($this->tank_auth->is_logged_in()) {
            $logged_in_id = $this->tank_auth->get_user_id();
            $data['userInfo'] = $this->users->get_user_by_id($logged_in_id, '1');
            $data['userNews'] = $this->unit_model->getStarNews($logged_in_id);
        }
        $this->load->view('include/header-user');
        $this->load->view('user', $data);
        $this->load->view('include/footer');
}
    

    function savedNews() {
        $this->load->library('tank_auth');
        $this->load->model('unit_model');
        $this->load->model('users');
        
        if ($this->tank_auth->is_logged_in()) {
            $logged_in_id = $this->tank_auth->get_user_id();
            $data = $this->unit_model->getStarNews($logged_in_id);
            if ($data == "Error"){
                $this->output->set_output(json_encode($data));
            }
            else
            {
            $this->output->set_output(json_encode($data));
            }
        }
            
    }
    
    function removeSavedNews() {
        $this->load->library('tank_auth');
        $this->load->model('unit_model');
        
        if ($this->tank_auth->is_logged_in()) {
           $news_id = $this->input->post('id');
           $user_id = $this->tank_auth->get_user_id();
           
           $this->unit_model->insertStar($user_id, $news_id);
           $output_string = 'Yes';  
            echo $output_string;
       }
       
       if (!$this->tank_auth->is_logged_in()){
           $output_string = 'No';
           echo $output_string;
       }
    }
}

/* End of file mynews.php */
/* Location: ./application/controllers/mynews.php */