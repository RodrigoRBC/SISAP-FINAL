<?php
App::uses('MYTCPDF', 'Vendor');
class TYPEMEMO extends MYTCPDF {

  public $footer = array();

  public function Header() {
    $headerdata = $this->getHeaderData();
    $this->Image($headerdata['logo'], '', '', $headerdata['logo_width']);
    $this->Cell(0, 0, $headerdata['title'], 0, 1, 'C', 0, '', 0);
    $strings = explode("\n",$headerdata['string']);
    foreach ($strings as $string) {
      $this->Cell(0, 0, $string, 0, 1, 'C', 0, '', 0);
    }
  }

  public function Footer() {
  }
}
?>
