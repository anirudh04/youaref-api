<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Companynotification extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Companynotification_model');
    } 

    /*
     * Listing of companynotifications
     */
    function index()
    {
        $data['companynotifications'] = $this->Companynotification_model->get_all_companynotifications();
        
        $data['_view'] = 'companynotification/index';
        $this->load->view('layouts/main',$data);
    }
}
