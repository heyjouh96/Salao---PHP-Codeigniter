<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas extends CI_Controller {
	
	function __construct() {
    	parent::__construct();
    	date_default_timezone_set('America/Sao_Paulo');	
	}

	public function index($data = null)
	{
		// Agendamentos
		$this->load->model('agendamento_model');
		$this->dados['agendamento'] = $this->agendamento_model->consultarAgendamento($data);
		$head['titulo'] = "Painel";
		
		// Data
		$datestring = '%d/%m/%Y';
		if(!empty($data)){
			if($data == date('Y-m-d')){
				$this->dados['data'] = mdate($datestring).' <small>Hoje</small>';
			}
			else{
				$data = str_replace('-', '/', $data);
	            $nova_data = date('d/m/Y', strtotime($data));
				$this->dados['data'] = $nova_data;	
			}
		}
		else{
			$this->dados['data'] = mdate($datestring).' <small>Hoje</small>';
		}
		
		$this->load->view('includes/header', $head);
		$this->load->view('home', $this->dados);
		$this->load->view('includes/footer');
	}
	
	public function agendar()
	{
		$head['titulo'] = "Agendar";
		$this->load->view('includes/header', $head);
		$this->load->view('agendar');
		$this->load->view('includes/footer');
	}
	
	public function financeiro()
	{
		//$this->load->model('agendamento_model');
		//$this->dados['financeiro'] = $this->agendamento_model->mostrarFinanceiro($this->input->post);
		
		
		//if($this->input->post == null)
			
		$head['titulo'] = "Financeiro";
		$this->load->view('includes/header', $head);
		$this->load->view('financeiro', $this->dados);
		$this->load->view('includes/footer');	
	}
	
	public function cadastrar()
	{
		$this->form_validation->set_rules('nome', 'Nome',		'required|max_length[255]');
		$this->form_validation->set_rules('data', 'Data',		'required|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('hora', 'Hora',		'required|max_length[5]|min_length[5]');
		$this->form_validation->set_rules('servico', 'Servico',	'required|max_length[15]');
		$this->form_validation->set_rules('obs', 'Observação',	'max_length[500]');
		
		if($this->form_validation->run() == TRUE){
			$this->load->model('agendamento_model');
			$this->agendamento_model->cadastraAgendamento($this->input->post());
			$this->session->set_flashdata('alert-success', 'Cadastrado com Sucesso!');
		}
		else{
			$this->session->set_flashdata('alert-danger', $this->form_validation->error_string('',''));
		}
		redirect(base_url());
	}
	
	public function confirmar($id)
	{
		$this->form_validation->set_rules('valor', 'Valor', 'required|numeric|max_length[6]');
		$this->load->model('agendamento_model');
		$this->agendamento_model->confirmarAtendimento($id, $this->input->post());
		redirect(base_url());
	}
	
	public function excluir($id)
	{
		$this->load->model('agendamento_model');
        echo $this->agendamento_model->excluirAgendamento($id);
		redirect(base_url());
	}
	
	public function testeJson(){
		$this->load->model('agendamento_model');
		$dados = $this->agendamento_model->getJson();
		print_r(json_encode($dados));
	}
	
	public function pesquisaJson(){
		
		/*print_r($this->input->get());
		exit;*/
		$this->load->model('agendamento_model');
		$dados = $this->agendamento_model->pesqJson($this->input->get('nome'));
		print_r(json_encode($dados));
	}
}
