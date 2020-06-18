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

    function detallePersonales($genero, $edad_menarquia,$edad_menopausia, $vida_sexual,$ciclos,$edad_gestacion,$numero_partos,$numero_abortos,$numero_cesareas,$fecha_ultima_menstruacion,$fecha_ultima_menstruacion,$fecha_ultimo_parto,$hijos_vivos,$mp_familiar,$descripcion)
    {
        //DATOS AP
        $this->SetFont('Arial','B',9);
        $this->SetXY(10, 40);
        $this->Cell(40,10,  utf8_decode('DATOS ANTECEDENTES PERSONALES'));
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(45,10,  utf8_decode('Edad Menarquía: '.$edad_menarquia),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Edad Menopausia: '.$edad_menopausia),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Vida Sexual Activa : '.$vida_sexual),1, 0 , 'L' );        
        $this->Cell(45,10,  utf8_decode('Ciclos Menstruación : '.$ciclos),1, 0 , 'L' );
        $this->Ln();
        $this->Cell(45,10,  utf8_decode('Edad Gesta: '.$edad_gestacion),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Partos: '.$numero_partos),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Abortos: '.$numero_abortos),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Cesáreas: '.$numero_cesareas),1, 0 , 'L' );
        $this->Ln();
        $this->Cell(45,10,  utf8_decode('F. U. M.: '.$fecha_ultima_menstruacion),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('F. U. P.: '.$fecha_ultimo_parto),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('Hijos vivos: '.$hijos_vivos),1, 0 , 'L' );
        $this->Cell(45,10,  utf8_decode('M. P. F.: '.$mp_familiar),1, 0 , 'L' );
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
            $this->Cell(65,15, utf8_decode("RECETA"));
            $this->Ln();
            $this->SetFont('Arial','',10);
            $this->MultiCell(190,5, utf8_decode('Medicamentos: '.$fila['medicamentos']));
            $this->Ln();
            $this->MultiCell(190,5, utf8_decode("Indicaciones: ".$fila['indicaciones']));

            $this->Ln();
        }
    }

}