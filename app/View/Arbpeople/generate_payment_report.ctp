<?php
  $this->Pdf->init();
  $this->Pdf->addPage('', 'USLETTER');
  $this->Pdf->setFont('helvetica', '', 12);
  $this->Pdf->SetTitle('REPORTE DE PAGOS DE ARBITRIOS');
  //debug($arbpeoplepublic);
  //debug($arbpeoplepulicArbrates);
  //debug($arbrates);
  $MCMCOLUMNA = 8; # 8 2 1
  //$CONSTANTECOLUMNA = (int)$ANCHO/$MCMCOLUMNA;
  $FILAS = count($arbrates) + 1;
  $COLUMNAS = count($arbpeopleArbrates[0]['ArbpeopleArbrate']) + 1;

  $header = array('N.°', 'TASA', 'FECHA', 'MONTO', 'DESCRIPCION');
  $data = $report_data;
  //$dni = $arbperson['Arbperson']['dni'];
  //$beneficiario = $arbperson['Arbperson']['first_surname'].' '.$arbperson['Arbperson']['second_surname'].','.$arbperson['Arbperson']['names'];

  $this->Pdf->SetFont('', 'B');
  $this->Pdf->Cell(0, 0, 'REPORTE DE PAGOS EFECTUADOS Y NO EFECTUADOS', 0, 1, 'C', 0, '', 1);
  $this->Pdf->Ln(2);

  $this->Pdf->SetFont('', 'N');
  $this->Pdf->Cell(0, 0, 'N.° D.I.N.: '.$dni, 0, 1, 'L', 0, '', 1);
  $this->Pdf->Cell(0, 0, 'APELLIDOS Y NOMBRES: '.$beneficiario, 0, 1, 'L', 0, '', 1);
  $this->Pdf->Ln(2);
  $this->Pdf->ColoredTable($header,$data);

  $this->Pdf->core->Output();
  //$this->Pdf->core->Output($dni.'-'.$beneficiario, 'D');
?>
