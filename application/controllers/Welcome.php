<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		// $data['cnr'] = $this->m_container->getContainer();
		$data = array(
			'data'				=> $this->m_container->getContainer()
		);
		$this->load->view('welcome_message', $data);
	}

	public function tambah()
	{
		$cn_number          = $this->input->post('cn_number');
		$size     			= $this->input->post('size');
		$type				= $this->input->post('type');

		$data = array(
			'cn_number'      	=> $cn_number,
			'size' 				=> $size,
			'type'				=> $type,
			'date'				=> date("Y-m-d H:i:s")
		);

		$this->m_container->tambahdata($data);
		redirect('/');
	}

	public function update($id)
	{

		$cn_number          = $this->input->post('cn_number');
		$size     			= $this->input->post('size');
		$type				= $this->input->post('type');
		$date				= $this->input->post('date');

		$data = array(
			'id' 				=> $id,
			'cn_number'      	=> $cn_number,
			'size' 				=> $size,
			'type'				=> $type,
			'date'				=> $date


		);

		$this->m_container->update($data);
		redirect('/');
	}

	public function delete($id)
	{
		$data = array(
			'id' => $id,
		);
		$this->m_container->deletedata($data);
		redirect('/');
	}
}
