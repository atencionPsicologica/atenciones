<?php
      require_once('../connection.php');
      include_once('PlantillaRecetaPdf.php');

      $db=Db::getConnect();

      echo $_GET['fecha']." , ".$_GET['indicaciones'];

      //consulta
      $sql= $db->prepare('SELECT *
		FROM recomendaciones
		WHERE fecha=:fecha
		AND consultas_id=:consulta');
      $sql->bindParam(':fecha',$_GET['fecha']);
      $sql->bindParam(':consulta',$_GET['consulta']);
      $sql->execute();

      $receta=$sql->fetchAll();



      $pdf = new PlantillaRecetaPdf();

      $pdf->AddPage();
      $pdf->encabezadoReceta();
      $pdf->cuerpoReceta($receta);
      $numero_hc='001';
      //formato de salida para el nombre del archivo
      $nombre='RECETA-HC-'.$numero_hc.'-'.date("Y").'-'.date("m").'-'.date("d");
      $pdf->Output('I',$nombre.'.pdf');
      ob_end_flush();
  ?>