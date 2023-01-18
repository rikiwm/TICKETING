<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
	}

	// Sitename

	// Alamat
	public function logo()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$logo 	= base_url('assets/upload/image/'.$site->logo);
		return $logo;
	}

	// Alamat
	public function icon()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$icon 	= base_url('assets/upload/image/'.$site->icon);
		return $icon;
	}
}

/* End of file Website.php */
/* Location: ./application/libraries/Website.php */
