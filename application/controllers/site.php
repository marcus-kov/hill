<?php

class Site extends CI_Controller
{
	/**
	*Class handles blounge view
	*
	*
	**/
	

	public function blounge()
	{	
		$data['news'] = $this->admin_model->get_all_cat(1);
		$this->load->view('templates/header');
		$this->load->view('templates/blounge',$data);
		$this->load->view('templates/footer');
	}

	public function dass_hill()
	{	
		$data['news'] = $this->admin_model->get_all_cat(2);
		$this->load->view('templates/header');
		$this->load->view('templates/dass_hill');
		$this->load->view('templates/footer');
	}

	public function catering()
	{
		$data['news'] = $this->admin_model->get_all_cat(3);
		$this->load->view('templates/header');
		$this->load->view('templates/catering');
		$this->load->view('templates/footer');
	}

	public function pat()
	{
		$data['news'] = $this->admin_model->get_all_cat(4);
		$this->load->view('templates/header');
		$this->load->view('templates/pat');
		$this->load->view('templates/footer');
	}
		public function menegerie()
		{
			$data['news'] = $this->admin_model->get_all_cat(5);
		$this->load->view('templates/header');
		$this->load->view('templates/menegerie');
		$this->load->view('templates/footer');
	}
	

}
