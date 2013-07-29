<?php if (!defined('BASEPATH')) die();
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
   
   /*** Display latest articles for AJAX request ***/
   function outputAjax()
   {
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getLatest();
       $this->output->set_output(json_encode($data));
   }
   
   /*** Display latest articles for AJAX request ***/
   function mobileAjax()
   {
       $this->load->model('unit_model');
       $jsonData['items'] = $this->unit_model->getLatestMobile();
       $data = json_encode($jsonData);
       header('Content-Length: '. strlen($data).'\r\n');
       header('Content-Type: application/json');
       $this->output->set_output($data);
   }
   
   function outputTagApple()
   {
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getApple();
       $this->output->set_output(json_encode($data));
   }
   
   public function search($term) 
   {
       $term = $this->input->post('SearchTerm');
       $this->load->model('unit_model'); //this is the model to fetch the data
       $dataResult['results'] = $this->unit_model->searchByTerm($term);
       $this->output->set_output(json_encode($dataResult));
       $this->load->view('include/header');
       $this->load->view('frontpage');
       $this->load->view('include/footer');
   }
   
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
