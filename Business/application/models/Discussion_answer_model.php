<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Discussion_answer_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get discussion_answer by answer_id
     */
    function get_discussion_answer($answer_id)
    {
        return $this->db->get_where('discussion_answers',array('answer_id'=>$answer_id))->row_array();
    }
        
    /*
     * Get all discussion_answers
     */
    function get_all_discussion_answers()
    {
        $this->db->order_by('answer_id', 'desc');
        return $this->db->get('discussion_answers')->result_array();
    }
        
    /*
     * function to add new discussion_answer
     */
    function add_discussion_answer($params)
    {
        $this->db->insert('discussion_answers',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update discussion_answer
     */
    function update_discussion_answer($answer_id,$params)
    {
        $this->db->where('answer_id',$answer_id);
        return $this->db->update('discussion_answers',$params);
    }
    
    /*
     * function to delete discussion_answer
     */
    function delete_discussion_answer($answer_id)
    {
        return $this->db->delete('discussion_answers',array('answer_id'=>$answer_id));
    }
}
