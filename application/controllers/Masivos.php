<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masivos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Rangomodel','Rangomodel');
        $this->load->model('masivosmodel','masivosmodel');
    }

    function pagoBinarioDiario()
    {
        $porcen           = $this->masivosmodel->getConfiguraciones();
        $porcentajeDiario = $porcen[0]->porcentagem_dia;
        $fechaActual      = date('Y-m-d H:i:s');
        $datos            = $this->masivosmodel->facturasUsuarios();
        foreach ($datos as $fila)
        {
            $ultimaFactura = $this->masivosmodel->comprasPaqueteFacturaUsuario($fila->id_usuario);
            if($ultimaFactura)
            {
                //$ganancia = $fatura->valor * $porcen ;
                $valorPlanes = $this->masivosmodel->datosPaqueteUsuario($ultimaFactura[0]->id_plano);
                $ganancia = ($valorPlanes[0]->valor * $porcentajeDiario)/100;
                if($ganancia > 0)
                {
                    $gananciaRendimiento = $this->verificarLimiteGananciasPrevio($fila->id_usuario,$ganancia,'REN');
                    //echo " - ".$ganancia." - <br>";
                    if($gananciaRendimiento > 0)
                    {                        
                        $resultado = $this->guardarExtratosGanancias($fila->id_usuario,$gananciaRendimiento,$fechaActual);
                        if($resultado > 0)
                        {
                            $gananciaRendimiento = $this->verificarLimiteGanancias($fila->id_usuario,$gananciaRendimiento,'REN');

                            echo $fila->id_usuario." - ".$fechaActual." - ".$valorPlanes[0]->valor." - ".$gananciaRendimiento."<br>";    
                        }                        
                    }                    
                }
            }            
        }
    }


    function guardarExtratosGanancias($idUsuario,$bono,$fechaRegistro)
    {
        $referencia = 'Career plan bonus - ';        
        $fecha = date('Y-m-d');        
        $data = array(
            'id_usuario'        => $idUsuario,
            'mensagem'          => $referencia,
            'valor'             => $bono,
            'tipo'              => 1,
            'data'              => $fechaRegistro,            
            );

        if(!$this->Rangomodel->getExtratoGananciaCheck($idUsuario,$bono,$fecha))
        {
            $guardarExtratos = $this->Rangomodel->guardarExtractosCarrera($data);       
            return $guardarExtratos;            
        }
        else 
        {
            return 0;
        }
    }
    function verificarLimiteGananciasPrevio($id_usuario,$datoganancia,$tipo)
    {        
        $valorpuntos     = $this->Rangomodel->comprasPaqueteFacturaUsuario($id_usuario); 
        $idPaquete       = $valorpuntos[0]->id_plano;
        $datosPaquete    = $this->Rangomodel->datosPaqueteUsuario($idPaquete);    
        $valorPaquete    = $datosPaquete[0]->valor;
        $valorMaximoGanancia     = $valorPaquete * 2.75;

        $datosUsuarios      = $this->Rangomodel->getUsuarioId($id_usuario);
        $saldo_rendimentos  = $datosUsuarios[0]->saldo_rendimentos;
        $saldo_indicacoes   = $datosUsuarios[0]->saldo_indicacoes;
        $ganancias          = $saldo_rendimentos + $saldo_indicacoes; //$datosUsuarios[0]->ganancias;

        $totalGanancias     = $ganancias + $datoganancia;

        if($totalGanancias <= $valorMaximoGanancia)
        {
          if ($tipo == 'REN' )
          {
              $saldo_rendimentos = $saldo_rendimentos + $datoganancia;
          }
          else
          {
              $saldo_indicacoes = $saldo_indicacoes + $datoganancia;
          }
          $ganancias = $ganancias + $datoganancia;
        }
        else
        {
          $datoganancia = $valorMaximoGanancia - $ganancias;

          if ($tipo == 'REN' )
          {
              $saldo_rendimentos = $saldo_rendimentos + $datoganancia;
          }
          else
          {
              $saldo_indicacoes = $saldo_indicacoes + $datoganancia;
          }
          $ganancias = $ganancias + $datoganancia;     
        }    
        return  $datoganancia;
    }

    function verificarLimiteGanancias($id_usuario, $datoganancia,$tipo)
    {
        $valorpuntos     = $this->Rangomodel->comprasPaqueteFacturaUsuario($id_usuario); 
        $idPaquete       = $valorpuntos[0]->id_plano;
        $datosPaquete    = $this->Rangomodel->datosPaqueteUsuario($idPaquete);    
        $valorPaquete    = $datosPaquete[0]->valor;
        $valorMaximoGanancia = $valorPaquete * 2.75;

        $datosUsuarios      = $this->Rangomodel->getUsuarioId($id_usuario);
        $saldo_rendimentos  = $datosUsuarios[0]->saldo_rendimentos;
        $saldo_indicacoes   = $datosUsuarios[0]->saldo_indicacoes;
        $ganancias          = $saldo_rendimentos + $saldo_indicacoes; //$datosUsuarios[0]->ganancias;

        $totalGanancias     = $ganancias + $datoganancia;

        if($totalGanancias <= $valorMaximoGanancia)
        {
          if ($tipo == 'REN' )
          {
              $saldo_rendimentos = $saldo_rendimentos + $datoganancia;
          }
          else
          {
              $saldo_indicacoes = $saldo_indicacoes + $datoganancia;
          }
          $ganancias = $ganancias + $datoganancia;
        }
        else
        {
          if($valorMaximoGanancia < $ganancias)
          {
            $datoganancia = 0;  
          }
          else
          {
            $datoganancia = $valorMaximoGanancia - $ganancias;
          }

          if ($tipo == 'REN' )
          {
              $saldo_rendimentos = $saldo_rendimentos + $datoganancia;
          }
          else
          {
              $saldo_indicacoes = $saldo_indicacoes + $datoganancia;
          }
          $ganancias = $ganancias + $datoganancia;     
        }
        $data = array(
          'saldo_rendimentos' => $saldo_rendimentos,
          'saldo_indicacoes'  => $saldo_indicacoes,
          'ganancias'         => $ganancias
        );
        $editarGananciaUsuarios = $this->Rangomodel->editarGananciaUsuarios($id_usuario,$data);    
        return  $datoganancia;
    }
    


}