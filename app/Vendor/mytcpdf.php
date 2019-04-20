<?php
class MYTCPDF extends TCPDF{
  public $footer = array();
  public $url_app = '';
  public $page_number_format = array();

  protected function changeMarks($mark){

    switch ($mark) {
      case ':url-app:':
        return $this->url_app;
        break;
      case ':url:':
        return $this->url;
        break;
      case ':page-number:':
        return $this->pageNumber();
        //$w_page = isset($this->l['w_page']) ? $this->l['w_page'].' ' : '';
        //if (empty($this->pagegroups)) {
        //  $pagenumtxt = $w_page.$this->getAliasNumPage().' / '.$this->getAliasNbPages();
        //} else {
        //  $pagenumtxt = $w_page.$this->getPageNumGroupAlias().' / '.$this->getPageGroupAlias();
        //}
        ////$this->SetY($cur_y);
        ////Print page number
        //if ($this->getRTL()) {
        //  //$this->SetX($this->original_rMargin);
        //  //$this->Cell(0, 0, $pagenumtxt, 'T', 0, 'L');
        //  return $pagenumtxt;
        //} else {
        //  //$this->SetX($this->original_lMargin);
        //  //$this->Cell(0, 0, $this->getAliasRightShift().$pagenumtxt, 'T', 0, 'R');
        //  return $this->getAliasRightShift().$pagenumtxt;
        //}
        break;
    }

    return $mark;
  }

  public function pageNumber(){
    //$page_number = $this->options['pdf']['page_number_format'];
    $page_number = 'Página :page: de :pages:';
    //$w_page = isset($this->l['w_page']) ? $this->l['w_page'].' ' : '';
    if (empty($this->pagegroups)) {
      $page = $this->getAliasNumPage();
      $pages = $this->getAliasNbPages();
    } else {
      $page = $this->getPageNumGroupAlias();
      $pages = $this->getPageGroupAlias();
    }

    $page_number = str_replace(":page:", $page, $page_number);
    $page_number = str_replace(":pages:", $pages, $page_number);

    return $page_number;
  }

}
?>
