<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
	        if(filter_var($client, FILTER_VALIDATE_IP))
		        {
		            $ip = $client;
		        }
	        elseif(filter_var($forward, FILTER_VALIDATE_IP))
		        {
		            $ip = $forward;
		        }
	        else
		        {
		            $ip = $remote;
		        }
	        return $ip;
    }

    public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required',
			array('required' => '%s harus diisi'));

		$this->form_validation->set_rules('password', 'Password', 'required',
			array('required' => '%s harus diisi'));

		if($this->form_validation->run())
		{
			$username	= $this->input->post('username');
			$password 	= $this->input->post('password');

			//proses ke simple login
			$this->simple_login->login($username,$password);
		}

		$data['title'] = "Login";
		$data['ipaddres'] = $this->getUserIP();
		$this->load->view('login/list', $data, FALSE);
	}

	public function logout()
	{
		$this->simple_login->logout();
	}

}