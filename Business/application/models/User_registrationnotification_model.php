<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User_registrationnotification_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user_registrationnotification by ur_id
     */
    function get_user_registrationnotification($ur_id)
    {
        return $this->db->get_where('user_registrationnotification',array('ur_id'=>$ur_id))->row_array();
    }
        
    /*
     * Get all user_registrationnotification
     */
    function get_all_user_registrationnotification()
    {
        $this->db->order_by('ur_id', 'desc');
        return $this->db->get('user_registrationnotification')->result_array();
    }
        
    /*
     * function to add new user_registrationnotification
     */
    function add_user_registrationnotification($params)
    {
        $this->db->insert('user_registrationnotification',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user_registrationnotification
     */
    function update_user_registrationnotification($ur_id,$params)
    {
        $this->db->where('ur_id',$ur_id);
        return $this->db->update('user_registrationnotification',$params);
    }
    
    /*
     * function to delete user_registrationnotification
     */
    function delete_user_registrationnotification($ur_id)
    {
        return $this->db->delete('user_registrationnotification',array('ur_id'=>$ur_id));
    }
}