<?php
/*
 * Unit_model
 */
class Unit_model extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   public function count_failed_tests($tests)
   {
      $count = 0;

      foreach ($tests as $test)
         if ($test['Result'] == 'Failed') $count++;

      return $count;
   }

   /*
    * Write your tests here, it is done this way
    * because you may need to dynamically generate
    * your data from other models, etc.
    */
   public function retrieve_tests()
   {
      $tests = array();

      /*
       * You should build your tests like the one below.
       *
      $tests[] = array(
         'rv' => $this->sendit_model->validate_email('tacticalazn@gmail.com'),
         'ev' => true,
         't' => 'validate_email("tacticalazn@gmail.com")',
         'n' => 'Checking if email validation works.'
      );
      */

      return $tests;
   }

   
   /* Gets latest Articles sorted by PubDate
    * @param            int
    * @return           object array
    */
    function getLatest()
    {
        $this->db->order_by('PubDate','DESC');
        $query = $this->db->get('Articles', 400);
        
            return $query->result();
    }
   /* Gets latest Articles for mobile sorted by PubDate
    * @param            int
    * @return           object array
    */
    function getLatestMobile()
    {
        $this->db->order_by('PubDate','DESC');
        $query = $this->db->get('Articles', 20);
        
            return $query->result();
    }
    
   /* Gets latest Articles filtered by Source
    * @param            string
    * @return           object array
    */
    function getBySource($source) 
    {
        $this->db->order_by('PubDate', 'DESC');
        $this->db->limit(400);
        $query = $this->db->get_where
                 ('Articles',
                 array('Source' => $source) );
        
        return $query->result();
    }
   /* Gets latest Articles filtered by Term
    * @param            string
    * @return           object array
    */    
    function searchByTerm($term)
    {
        $this->db->order_by('PubDate', 'DESC');
        $this->db->like('Title', $term);
        $query = $this->db->get('Articles', 300);
        
            return $query->result();
        
    }
   /* Gets user saved news items
    * @param            int
    * @return           object array
    */     
    function getStar($user_id) {
        $this->db->select('id');
        $this->db->where('user_id', $user_id);
        $data = $this->db->get('star');
        
            return $data->result();
    }
   /* Gets user saved news items
    * @param            int
    * @return           object array
    */     
    function getStarNews($user_id) {
        $this->db->select('news_id');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('star');
        $q = $query->row();
        $count = count($q);
        if ($count > 0)
        {
            $ids = array();
            foreach ($query->result_array() as $id)
            {
                $ids[] = $id['news_id'];
            }
        
            $this->db->where_in('id', $ids);
            $data = $this->db->get('Articles');

            return $data->result();
        }
        else
        {
            $data = "Error";
            return $data;
        }
    }
    
   /* Inserts saved news item for current user
    * @param            int (news_id)
    * @param            int (user_id)
    * @return           object array
    */ 
    function insertStar($user_id, $news_id) {
        $this->db->select('id'); //select id column
        $this->db->where('user_id', $user_id); //select id column with user_id matching $user_id
        $this->db->where('news_id', $news_id); //also matching news_id to $news_id
        $q = $this->db->get('star'); // run query
        $data = $q->row(); //return only first row of data(return star row as an object)
        $count = count($data); //make sure its not empty
        //If the story has already been star by the user then unstar(remove star from db)
        if ($count > 0)
        {   $star_id = $data->id; //get id from returned data object(star)
            $this->db->where('id', $star_id);
            $this->db->delete('star');
           } else
           {
            //add new star story for user
            $data['news_id'] = $news_id;
            $data['user_id'] = $user_id;
            $this->db->insert('star', $data);
           }
        
    }
   /* Gets news item by id
    * @param            int
    * @return           object array
    */ 
    function getById($news_id) {
        $this->db->where('id', $news_id);
        $query = $this->db->get('Articles');
        
         return $query->result();
    
    
    }
}
