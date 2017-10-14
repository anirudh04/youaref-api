<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Plan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plan_model');
    } 

    /*
     * Listing of plans
     */
    function index()
    {
        $data['plans'] = $this->Plan_model->get_all_plans();
        
        $data['_view'] = 'plan/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new plan
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'company_id' => $this->input->post('company_id'),
				'price_of_product' => $this->input->post('price_of_product'),
				'difficulty' => $this->input->post('difficulty'),
				'name' => $this->input->post('name'),
				'timestamp' => $this->input->post('timestamp'),
				'expiry_date' => $this->input->post('expiry_date'),
				'conversion' => $this->input->post('conversion'),
				'earn_per_conversion' => $this->input->post('earn_per_conversion'),
				'training_kit' => $this->input->post('training_kit'),
				'about' => $this->input->post('about'),
            );
            
            $plan_id = $this->Plan_model->add_plan($params);
            redirect('plan/index');
        }
        else
        {            
            $data['_view'] = 'plan/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a plan
     */
    function edit($plan_id)
    {   
        // check if the plan exists before trying to edit it
        $data['plan'] = $this->Plan_model->get_plan($plan_id);
        
        if(isset($data['plan']['plan_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'company_id' => $this->input->post('company_id'),
					'price_of_product' => $this->input->post('price_of_product'),
					'difficulty' => $this->input->post('difficulty'),
					'name' => $this->input->post('name'),
					'timestamp' => $this->input->post('timestamp'),
					'expiry_date' => $this->input->post('expiry_date'),
					'conversion' => $this->input->post('conversion'),
					'earn_per_conversion' => $this->input->post('earn_per_conversion'),
					'training_kit' => $this->input->post('training_kit'),
					'about' => $this->input->post('about'),
                );

                $this->Plan_model->update_plan($plan_id,$params);            
                redirect('plan/index');
            }
            else
            {
                $data['_view'] = 'plan/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The plan you are trying to edit does not exist.');
    } 

    /*
     * Deleting plan
     */
    function remove($plan_id)
    {
        $plan = $this->Plan_model->get_plan($plan_id);

        // check if the plan exists before trying to delete it
        if(isset($plan['plan_id']))
        {
            $this->Plan_model->delete_plan($plan_id);
            redirect('plan/index');
        }
        else
            show_error('The plan you are trying to delete does not exist.');
    }
    
}