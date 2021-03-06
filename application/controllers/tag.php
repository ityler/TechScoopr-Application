<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* Get news items for category filter requests
 * 
 */
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
   /* Display latest news items for filtered term requests */
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
   
   /* Return news items filtered by source */
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
}

/* End of file tag.php */
/* Location: ./application/controllers/tag.php */

