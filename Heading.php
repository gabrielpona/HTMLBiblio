<?php


/**
 * Description of Heading
 *
 * @author mgabriel
 */
namespace Html;
class Heading extends HtmlTag{
    
    private $conteudoTextual;
    
    public function __construct($HeadingEnum,$texto) {
        parent::__construct($HeadingEnum);
        $this->conteudoTextual = $texto;                
    }
    
    public function getConteudoTextual() {
        return $this->conteudoTextual;
    }

    public function setConteudoTextual($conteudoTextual) {
        $this->conteudoTextual = $conteudoTextual;
    }


    public function extrairHtml() {
        
        $html = $this->extrairAberturaTag();
        $html.= "   ".$this->conteudoTextual.PHP_EOL;
        $html.= $this->extrairFechamentoTag();
        return $html; 
        
    }

}

?>
