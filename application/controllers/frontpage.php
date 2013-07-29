<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Default controller for main layout and data requests
 */
class Frontpage extends Main_Controller {
	
   public function index()
   {
      $this->load->helper('url');
      $this->load->library('tank_auth');
      
      if ($this->tank_auth->is_logged_in()) {
	
	$userData['user_id'] = $this->tank_auth->get_user_id();
	$userData['username'] = $this->tank_auth->get_username();
        $this->load->view('include/header');
	$this->load->view('frontpage', $userData);
        $this->load->view('include/footer');
        } else {
            $userData['username'] = "Not Logged In";
            $this->load->view('include/header');
            $this->load->view('frontpage', $userData);
            $this->load->view('include/footer');
        }
   }
   
   /* Get latest news items 
    * @return           JSON
    */
   function outputAjax()
   {
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getLatest();
       $this->output->set_output(json_encode($data));
   }
   
   /* Get latest news items structured for mobile application 
    * @return           JSON
    */
   function mobileAjax()
   {
       $this->load->model('unit_model');
       $jsonData['items'] = $this->unit_model->getLatestMobile();
       $data = json_encode($jsonData);
       header('Content-Length: '. strlen($data).'\r\n');
       header('Content-Type: application/json');
       $this->output->set_output($data);
   }
   
   /* Save user news items 
    * @param            int
    * @return           YES/NO
    */
   function ajaxSave() {
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

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
