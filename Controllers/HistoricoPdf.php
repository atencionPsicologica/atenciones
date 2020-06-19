<?php
      require_once('../connection.php');
      include_once('PlantillaHistoricoPdf.php');
      $db=Db::getConnect();
      $sql=$db->prepare('SELECT hc.numero,p.cedula,p.nombres,p.apellidos,p.genero, ap.vsexualactiva, ap.embarazos,ap.abortos,ap.abusoFis,ap.abusoPisco,ap.abandonos, ap.vicios, ap.descripcion as des_ap, af.descripcion as des_af, c.fecha, c.enfactual, c.diagnostico, c.prescripcion as des_s, r.tareas, r.indicaciones
            FROM PACIENTES p, CONSULTAS C, SIGVITALES sv, SISTEMAS s, RECOMENDACIONES r, EXAFISICOS e, exacomplementarios ec, histoclinicas hc, antpersonales ap, antfamiliares af
            WHERE c.paciente=p.id  
            AND r.fecha=c.fecha
            AND hc.paciente=p.id
            AND af.paciente=p.id
            AND ap.paciente=p.id
            AND p.id=:id');
      $sql->bindParam(':id',$_GET['id']);
      $sql->execute();
      $reporte= $sql->fetchAll();
      
      //DATOS HC Y PACIENTE
      $numero_hc=$reporte[0]['numero'];
      $cedula=$reporte[0]['cedula'];
      $nombres=$reporte[0]['nombres'];
      $apellidos=$reporte[0]['apellidos'];
      $genero=$reporte[0]['genero']; 
      $nom_ap=$nombres.' '.$apellidos;

      //DATOS ANTECEDENTES PERSONALES
      $vida_sexual=$reporte[0]['vsexualactiva'];
      $numero_embarazos=$reporte[0]['embarazos'];
      $numero_abortos=$reporte[0]['abortos'];
      $abusoFis=$reporte[0]['abusoFis'];
      $abusoPsico=$reporte[0]['abusoPsico'];
      $abandonos=$reporte[0]['abandonos'];
      $vicios=$reporte[0]['vicios'];
      $des_ap=$reporte[0]['des_ap'];

      //DATOS ANTECEDENTES FAMILIARES 
      $des_af=$reporte[0]['des_af'];

      //pdf
      $pdf = new PlantillaHistoricoPdf();

      $pdf->AddPage();

      //antecedentes personales
      $pdf->detalleHistoria($numero_hc,$cedula, $nom_ap);
     
      $pdf->detallePersonales($genero, $vida_sexual,$numero_embarazos,$numero_abortos,$abusoFis,$abusoPsico,$abandonos,$vicios,$des_ap);
      
      $pdf->detalleFamiliares($des_af);

      $pdf->datosConsulta($reporte);

      //formato de salida para el nombre del archivo
      $nombre='HISTORICO-HC-'.$numero_hc.'-'.date("Y").'-'.date("m").'-'.date("d");
      $pdf->Output('I',$nombre.'.pdf');
      ob_end_flush(); 
?>