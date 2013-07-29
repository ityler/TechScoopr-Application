<?php if (!defined('BASEPATH')) die();
class Stream extends Main_Controller {

   public function index()
   {
      $this->load->helper('url');
      $this->load->library('tank_auth');
      
      if ($this->tank_auth->is_logged_in()) {
	
	$userData['user_id']	= $this->tank_auth->get_user_id();
	$userData['username']	= $this->tank_auth->get_username();
        $this->load->view('include/header_stream');
	$this->load->view('stream', $userData);
        $this->load->view('include/footer');
        } else {
            $userData['username']   = "Not Logged In";
            $this->load->view('include/header_stream');
            $this->load->view('stream', $userData);
            $this->load->view('include/footer');
        }
   }
   
   /*** Display latest articles for AJAX request ***/
   function outputAjax()
   {
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getLatest();
       $this->output->set_output(json_encode($data));
   }
}

/* End of file stream.php */
/* Location: ./application/controllers/stream.php */
