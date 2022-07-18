<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cronmodel', 'CronModel');
    }

    public function paga_binario(){

        if($this->input->get('key') && $this->input->get('key') == config_item('security_key_system')){

            $this->CronModel->PagaBinarioDia();

        }
    }

    public function upgrade_plano_carreira(){

        if($this->input->get('key') && $this->input->get('key') == config_item('security_key_system')){

            $this->CronModel->GanhoPlanoCarreira();

        }
    }

    public function paga_bonificacao(){

        if($this->input->get('key') && $this->input->get('key') == config_item('security_key_system')){

            $this->CronModel->PagaBonificacao();

        }
    }
}