<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class N extends Main_Controller
{   
    function index() {
       $this->load->helper('url');
       $this->load->library('tank_auth');
       $this->load->model('unit_model');
       $news_id = $this->uri->segment(3, 0);
       $news_item = $this->unit_model->getById($news_id); 
       if ($news_item > 0)
       {
        foreach ($news_item as $news)
        {
            $userData['news']['id'] = $news->id;
            $userData['news']['Link'] = $news->Link;
            $userData['news']['Title'] = $news->Title;
            $userData['news']['Description'] = $news->Description;
            $userData['news']['Image'] = $news->Image;
        }
       if ($this->tank_auth->is_logged_in()) {
	
            $userData['user_id'] = $this->tank_auth->get_user_id();
            $userData['username'] = $this->tank_auth->get_username();
            $this->load->view('include/header');
            $this->load->view('news', $userData);
            $this->load->view('include/footer');
         } else {
            $userData['username'] = "Not Logged In";
            $this->load->view('include/header');
            $this->load->view('news', $userData);
            $this->load->view('include/footer');
         }
       }
       else
       {
           redirect('', 'refresh');
       }
    }
    
}

/* End of file n.php */
/* Location: ./application/controllers/n.php */
