<?php if (!defined('BASEPATH')) die();
class Tag extends Main_Controller {

   function __construct() {
        parent::__construct();
   }
   
   public function index()
   {
      $this->load->view('include/header');
      $this->load->view('frontpage');
      $this->load->view('include/footer');
   }
   
   /*** Display latest articles for AJAX request ***/
   public function apple()
   {
       $term = "Apple";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->searchByTerm($term);
       $this->output->set_output(json_encode($data));
   }
   
   public function google()
   {
       $term = "Google";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->searchByTerm($term);
       $this->output->set_output(json_encode($data));
   }
   
   public function facebook()
   {
       $term = "Facebook";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->searchByTerm($term);
       $this->output->set_output(json_encode($data));
   }
   public function microsoft()
   {
       $term = "Microsoft";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->searchByTerm($term);
       $this->output->set_output(json_encode($data));
   }
   public function mashable()
   {
       $source = "Mashable";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function gizmodo()
   {
       $source = "Gizmodo";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function engadget()
   {
       $source = "Engadget";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function wired()
   {
       $source = "Wired";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function gigaom()
   {
       $source = "GigaOm";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function slashgear()
   {
       $source = "Slashgear";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function venturebeat()
   {
       $source = "VentureBeat";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function theverge()
   {
       $source = "The Verge";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function techcrunch()
   {
       $source = "TechCrunch";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function digitaltrends()
   {
       $source = "Digital Trends";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
   }
   public function geek()
   {
       $source = "Geek";
       $this->load->model('unit_model');
       $data['results'] = $this->unit_model->getBySource($source);
       $this->output->set_output(json_encode($data));
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
       $dataResult['results']= $this->unit_model->searchByTerm($term);
       $this->output->set_output(json_encode($dataResult));
       $this->load->view('include/header');
       $this->load->view('frontpage');
       $this->load->view('include/footer');
   }
   
}

/* End of file tag.php */
/* Location: ./application/controllers/tag.php */

