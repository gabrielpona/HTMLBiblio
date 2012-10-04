<?php

namespace Html;

class Table extends HtmlTag{

    private $thead;
    private $tbody;
    //private $tfoot;

    public function __construct() {
        parent::__construct(Enum\TagEnum::TABLE);
        $this->thead = new TableSession("thead");
        $this->tbody = new TableSession("tbody");
    }

    public function getThead() {
        return $this->thead;
    }

    public function setThead(TableSession $thead) {
        $this->thead = $thead;
    }

    public function getTbody() {
        return $this->tbody;
    }

    public function setTbody(TableSession $tbody) {
        $this->tbody = $tbody;
    }
        
    public function extrairHtml(){
        
//$html = "<table".$this->extrairAtributosBasicos().$this->extrair">".PHP_EOL;
        $html = $this->extrairAberturaTag().PHP_EOL;
        $html.= "   ".$this->thead->extrairHtml();
        $html.= "   ".$this->tbody->extrairHtml();              
        $html.= $this->extrairFechamentoTag().PHP_EOL;        
        return $html;
    }
    
    
}


?>
