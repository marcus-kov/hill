<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
*Class handels generating admin view and basic security
*@year 2012
*@author Marko Kovacevic
*@company Alteavision
*/
class Admin extends CI_Controller
{
    //Gets value for admin Log in
    public function get_is_admin()
    {
       return $this->session->userdata('admin');
    }

	public function admin_view()
	{
        $this->guest_rectrict ();

        //check for session activity
		//Get all news for editing

		$data['all_news'] = $this->admin_model->get_all();
		$data['category'] = $this->admin_model->get_category();
		$data['comments'] = $this->admin_model->get_comment_review();

		
		$this->load->view('templates/header_admin');
		$this->load->view('templates/admin_panel',$data);
		$this->load->view('templates/footer');
	}

    public function guest_rectrict ()
    {
        if ( !$this->get_is_admin () ) {
            redirect ( base_url () . "logIn" );
        }
    }

    public function logIn()
	{
        $this->admin_restrict ();
        //check for session activity
       // $this->session_redirect();

		$this->load->view('templates/header_admin');
		$this->load->view('templates/logIn');
		$this->load->view('templates/footer');

	}

    public function admin_restrict ()
    {
        if ( $this->get_is_admin () ) {
            redirect ( base_url () . "admin" );
        }
    }


}