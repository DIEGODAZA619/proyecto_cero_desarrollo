<?php
function calcularRangos($idUsuario)
{
  $fila_m = & get_instance();
  $fila_m->load->model('admin/Rangomodel');
  
  $puntos = $fila_m->Rangomodel->puntosUsuario($idUsuario);
  $totalPuntos = $puntos[0]->puntos;
  $bono = valorPuntosRangosUsuario($fila_m,$totalPuntos);       

  $datos = $fila_m->Rangomodel->usuarioPatrocinador($idUsuario); 
  if($datos)
  {
    echo $idUsuario." ---  ".json_encode($datos)."<br><br>";
    if($bono > 0)
    {
      $calculoPorcentajes = calcularPorcentajesGanancias($fila_m,$idUsuario,$bono,$datos);
    }
    foreach($datos as $fila)
    {  
      calcularRangos($fila->id_usuario);    
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
function calcularPorcentajesGanancias($fila_m,$idUsuario,$bono,$datos)
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
      $porcentaje      = $datosPaquete[0]->ganhos_diarios;
      $gananciaDiaria = ($valorPaquete * $porcentaje ) / 100;
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
  }  
  return 1;
}
?>