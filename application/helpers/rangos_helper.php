<?php
function calcularRangos($idUsuario,$nivel = 0,$nivelLimite = 0,$idUsarioPrincipal=0,$bonoUsarioPrincipal=0)
{
  $fila_m = & get_instance();
  $fila_m->load->model('admin/Rangomodel');
  
  $puntos = $fila_m->Rangomodel->puntosUsuario($idUsuario);
  $totalPuntos = $puntos[0]->puntos;
  $bono = valorPuntosRangosUsuario($fila_m,$totalPuntos);
  //echo "nivel ".$nivel." - ".$idUsuario." - ".$nivelLimite." - ".$idUsarioPrincipal."<br>";
  if ($nivel == 0) ///ENTRA POR PRIMERA VEZ PARA OBTENER LOS VALORES DEL USUARIO INICIAL
  {
    echo "PUNTO ".$totalPuntos."<br>";
    $nivel = 1;
    $nivelLimite = $bono;
    $idUsarioPrincipal = $idUsuario;
    $bonoUsarioPrincipal = $bono;
  }
  else
  {
    $nivel++;
  }
  echo "BONO ".$bono." - nivel - ".$nivel." - nivel limite ".$nivelLimite." - idusuario ".$idUsuario." - usuario principal ".$idUsarioPrincipal."<br>";
  if($bono > 0)
  {
    $datos = $fila_m->Rangomodel->usuarioPatrocinador($idUsuario); 
    if($datos)
    {
      //echo "nivel **** ".$nivel." - ".$nivelLimite."<br>";
      if($nivel <= $nivelLimite)
      { 
        echo $nivel." - ".$idUsuario." ---  ".json_encode($datos)."<br><br>";    
        $calculoPorcentajes = calcularPorcentajesGanancias($fila_m,$idUsuario,$bono,$datos,$idUsarioPrincipal,$bonoUsarioPrincipal);  
      }
          
      foreach($datos as $fila)
      {  
        calcularRangos($fila->id_usuario,$nivel,$nivelLimite,$idUsarioPrincipal,$bonoUsarioPrincipal);    
      }
    }    
  } 
}

function valorPuntosRangosUsuario($fila_m,$totalPuntos)
{
  $valorBonos = $fila_m->Rangomodel->puntosRangosUsuario();
  $tamanho = count($valorBonos);
  $bono = 0;
  for($i = 0; $i < $tamanho; $i++)
  { 
    if($valorBonos[$i]->pontos <= $totalPuntos)
    {        
        $bono = $valorBonos[$i]->bono;               
    }
  }
  return $bono;
}
function calcularPorcentajesGanancias($fila_m,$idUsuario,$bono,$datos,$idUsarioPrincipal,$bonoUsarioPrincipal)
{
  $sumaGanancias = 0;
  $gananciaBono  = 0;
  $fechaCalculo = date('Y-m-d');
  $fechaRegistro = date('Y-m-d H:i:s');
  $datoscorrelativo = $fila_m->Rangomodel->correlativoMaximoGanancias();
  $correlativo      = $datoscorrelativo[0]->correlativo + 1;
  $id_rango_guardados = "";
  $tipo_ganancia = 2;
  //REGISTRO DE GANANCIAS POR PAQUETES
  
  foreach ($datos as $patrocinados)  
  {
    $valorpuntos = $fila_m->Rangomodel->comprasPaqueteFacturaUsuario($patrocinados->id_usuario);    
    foreach($valorpuntos as $puntos)
    {
      $idPaquete       = $puntos->id_plano;
      $idFactura       = $puntos->id;
      $datosPaquete    = $fila_m->Rangomodel->datosPaqueteUsuario($idPaquete);
      $valorPaquete    = $datosPaquete[0]->valor;
      //$porcentaje      = $datosPaquete[0]->ganhos_diarios;
      $gananciaDiaria  = $datosPaquete[0]->ganhos_diarios; //$valorPaquete * $porcentaje ) / 100;
      $sumaGanancias   = $sumaGanancias + $gananciaDiaria;     
      if($gananciaDiaria > 0)
      {
        $verificar = $fila_m->Rangomodel->checkGananciasRangos($patrocinados->id_usuario,$idUsuario,$idFactura,$idPaquete,$fechaCalculo);
        if(!$verificar)
        {
          $data = array(
              'id_usuario'      => $patrocinados->id_usuario,
              'id_patrocinador' => $idUsuario,
              'id_factura'      => $idFactura,
              'id_plan'         => $idPaquete,
              'valor_plan'      => $valorPaquete,
              'porcentaje'      => $porcentaje,
              'ganancia_diaria' => $gananciaDiaria,
              'correlativo'     => $correlativo,
              'tipo_ganancia'   => $tipo_ganancia,
              'fecha_calculo'   => $fechaCalculo,
              'fecha_registro'  => $fechaRegistro
          );
          $guardarGanancia = $fila_m->Rangomodel->guardarGananciaRango($data);
          if($guardarGanancia)
          {
            $id_rango_guardados = $id_rango_guardados.$guardarGanancia."|";
          }          
        }
        else
        {
          $idRegistro = $verificar[0]->id;
          $data = array(
              'id_usuario'      => $patrocinados->id_usuario,
              'id_patrocinador' => $idUsuario,
              'id_factura'      => $idFactura,
              'id_plan'         => $idPaquete,
              'valor_plan'      => $valorPaquete,
              'porcentaje'      => $porcentaje,
              'ganancia_diaria' => $gananciaDiaria,
              'correlativo'     => $correlativo,
              'tipo_ganancia'   => $tipo_ganancia,
              'fecha_calculo'   => $fechaCalculo,
              'fecha_recalculo'  => $fechaRegistro
          );
          $editarGanancia = $fila_m->Rangomodel->editarGananciaRango($idRegistro,$data);
          $id_rango_guardados = $id_rango_guardados.$idRegistro."|";

        }
      }
    }
  }
  //REGISTRO DE GANANCIAS POR BONOS
  if($sumaGanancias > 0)
  {
    //echo $sumaGanancias."*-*-*-*<br>";   
    $gananciaBono = ($sumaGanancias * $bono ) / 100;
    $tipo_ganancia = 1;
    $verificar = $fila_m->Rangomodel->checkGananciasRangosDirecto($idUsuario,$fechaCalculo,$tipo_ganancia);
    if(!$verificar)
    {
      $data = array(
          'id_usuario'            => $idUsuario,              
          'porcentaje'            => $bono,
          'valor_plan'            => $sumaGanancias,
          'ganancia_diaria'       => $gananciaBono,
          'tipo_ganancia'         => $tipo_ganancia,
          'correlativo_ganancia'  => $correlativo,
          'id_rangos'             => $id_rango_guardados,
          'fecha_calculo'         => $fechaCalculo,
          'fecha_registro'        => $fechaRegistro
      );
      $guardarGanancia = $fila_m->Rangomodel->guardarGananciaRango($data);      
    }
    else
    {
      $idRegistro = $verificar[0]->id;
      $data = array(
          'id_usuario'            => $idUsuario,              
          'porcentaje'            => $bono,
          'valor_plan'            => $sumaGanancias,
          'ganancia_diaria'       => $gananciaBono,
          'tipo_ganancia'         => $tipo_ganancia,
          'correlativo_ganancia'  => $correlativo,
          'id_rangos'             => $id_rango_guardados,
          'fecha_calculo'         => $fechaCalculo,
          'fecha_recalculo'       => $fechaRegistro
      );
      $editarGanancia = $fila_m->Rangomodel->editarGananciaRango($idRegistro,$data);
    }
    if($idUsuario != $idUsarioPrincipal)
    {      
      $tipo_ganancia = 3;
      $gananciaBono = ($sumaGanancias * $bonoUsarioPrincipal ) / 100;
      $verificar = $fila_m->Rangomodel->checkGananciasRangosDirecto($idUsarioPrincipal,$fechaCalculo,$tipo_ganancia);
      if(!$verificar)
      {
        $data = array(
            'id_usuario'            => $idUsarioPrincipal,              
            'porcentaje'            => $bonoUsarioPrincipal,
            'valor_plan'            => $sumaGanancias,
            'ganancia_diaria'       => $gananciaBono,
            'tipo_ganancia'         => $tipo_ganancia,
            'correlativo_ganancia'  => $correlativo,
            'id_rangos'             => $id_rango_guardados,
            'fecha_calculo'         => $fechaCalculo,
            'fecha_registro'        => $fechaRegistro
        );
        $guardarGanancia = $fila_m->Rangomodel->guardarGananciaRango($data);      
      }
      else
      {
        $idRegistro = $verificar[0]->id;
        $data = array(
            'id_usuario'            => $idUsarioPrincipal,              
            'porcentaje'            => $bonoUsarioPrincipal,
            'valor_plan'            => $sumaGanancias,
            'ganancia_diaria'       => $gananciaBono,
            'tipo_ganancia'         => $tipo_ganancia,
            'correlativo_ganancia'  => $correlativo,
            'id_rangos'             => $id_rango_guardados,
            'fecha_calculo'         => $fechaCalculo,
            'fecha_recalculo'       => $fechaRegistro
        );
        $editarGanancia = $fila_m->Rangomodel->editarGananciaRango($idRegistro,$data);
      }
    }
  }  
  return 1;
}
?>