<?php 
require('fpdf/fpdf.php');
class PlantillaHistoricoPdf extends FPDF
{
    function detalleHistoria($numero_hc, $cedula, $nombres)
    {
        $this->SetFont('Arial','B',15);
        $this->SetXY(70, 10);
        $this->Cell(40,10,  utf8_decode('Histórico Consultas'));
        //linea
        $this->Line( 10,  20,  195,  20);

        //DATOS HC
        $this->SetFont('Arial','B',9);
        $this->SetXY(10, 18);
        $this->Cell(40,10,  utf8_decode('DATOS HISTORIA CLÍNICA'));
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(35,10,  utf8_decode('Número HC: '.$numero_hc),1, 0 , 'L' );
        $this->Cell(55,10,  utf8_decode('Cédula Identidad: '.$cedula),1, 0 , 'L' );
        $this->Cell(67,10,  utf8_decode('Nombres : '.$nombres),1, 0 , 'L' );

    }

    function detallePersonales($genero, $vida_sexual,$numero_embarazos,$numero_abortos, $numero_abufi, $numero_abupsi,$abandono, $vicios, $descripcion)
    {
        //DATOS AP
        $this->SetFont('Arial','B',9);
        $this->SetXY(10, 40);
        $this->Cell(40,10,  utf8_decode('DATOS ANTECEDENTES PERSONALES'));
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(45,10,  utf8_decode('Vida Sexual Activa : '.$vida_sexual),1, 0 , 'L' );        
        $this->Cell(45,10,  utf8_decode('Embarazos: '.$numero_embarazos),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Abortos: '.$numero_abortos),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Abuso físico: '.$numero_abufi),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Abuso Piscológico: '.$numero_abupsi),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Abandonos: '.$abandono),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Vicios: '.$vicios),1, 0 , 'L' );
        $this->Ln();
        $this->Ln();
        $this->MultiCell(190,5,  utf8_decode('Descripción Adicional: '.$descripcion));

    }
    function detalleFamiliares($descripcion)
    {
        //DATOS AF
        //DATOS AF
        $this->SetFont('Arial','B',9);
        $this->SetXY(10, 100);
        $this->Cell(40,10,  utf8_decode('DATOS ANTECEDENTES FAMILIARES'));

        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Ln();
        $this->MultiCell(190,5,  utf8_decode('Descripción Adicional: '.$descripcion));
        

    }

    function datosConsulta($reporte)
    {
           //DATOS CONSULTAS
        $this->SetFont('Arial','B',13);
        $this->SetXY(80, 170);
        $this->Cell(90,10,  utf8_decode('Informe Consultas'));

        
        foreach($reporte as $fila)
        {
            $this->Ln();
            //DATOS CONSULTAS
            $this->SetFont('Arial','B',9);
            $this->Cell(40,10,  utf8_decode('DATOS NUEVA CONSULTA'));
            $this->SetFont('Arial','',10);
            $this->Ln();
            //datos consulta
            $this->Cell(65,15, utf8_decode("Fecha Consulta: ".$fila['fecha']),1, 0 , 'L' );
            $this->MultiCell(190,5,  utf8_decode('Motivo Consulta: '.$fila['enfactual']));
            $this->Ln();
            //final datos consulta
            $this->MultiCell(190,5, utf8_decode("Diagnóstico: ".$fila['diagnostico']));
             $this->Ln();
            $this->MultiCell(190,5, utf8_decode("Prescripción: ".$fila['prescripcion']));
            $this->SetFont('Arial','B',9);
             
            
            //receta
            $this->Ln();
            $this->SetFont('Arial','B',10);
            $this->Cell(65,15, utf8_decode("RECOMENDACIONES"));
            $this->Ln();
            $this->SetFont('Arial','',10);
            $this->MultiCell(190,5, utf8_decode('Tareas: '.$fila['tareas']));
            $this->Ln();
            $this->MultiCell(190,5, utf8_decode("Indicaciones: ".$fila['indicaciones']));

            $this->Ln();
        }
    }

}