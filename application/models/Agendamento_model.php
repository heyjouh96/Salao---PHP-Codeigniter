<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agendamento_model extends CI_MODEL {
    
	function __construct() {
    	parent::__construct();
    	date_default_timezone_set('America/Sao_Paulo');
	}
	
	// CADASTRA UM AGENDAMENTO
	function cadastraAgendamento($dados_agendamento)
	{
	    $this->db->insert('agendamentos', array(
    	        'nome'                  => $dados_agendamento['nome'],
    	        'data'                  => $dados_agendamento['data'],
    	        'hora'                  => $dados_agendamento['hora'],
    	        'servico'               => $dados_agendamento['servico'],
    	        'obs'                   => $dados_agendamento['obs']
    	    ));
	}
	
	// RETORNA AGENDAMENTOS
	function consultarAgendamento($data)
	{
		if(!empty($data)){
			$dt = $data;
		}
		else{
			$dt = date('Y-m-d'); // data atual
		}
		return $this->db->query('SELECT * FROM agendamentos WHERE data="'.$dt.'" ORDER BY hora')->result();
	}
	// CONFIRMA ATENDIMENTO
	function confirmarAtendimento($id, $valor)
	{
		$this->db->set('valor', $valor['valor']);
		$this->db->set('status', '1');
		$this->db->where('id', $id);
		$this->db->update('agendamentos');
		
		$this->session->set_flashdata('alert-success', 'Atendimento Confirmado com Sucesso! Confira em <b>Financeiro</b>');
		
	}
	// EXCLUI AGENDAMENTO
	function excluirAgendamento($ID)
	{
		$excluido = $this->db->delete('agendamentos', array('id' => $ID));
        		
		if ($excluido) {
            $this->session->set_flashdata('alert-success', 'Agendamento cancelado com Sucesso!');
		} else {
            $this->session->set_flashdata('alert-danger', 'Houve algum erro ao tentar cancelar.');
		}
	}
	
	function getJson(){
		return $this->db->get('agendamentos')->result();
	}
	
	function pesqJson($nome){
		return $this->db->query("SELECT * FROM agendamentos WHERE nome LIKE '".$nome."%'")->result();
	}
}

