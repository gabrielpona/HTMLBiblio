<?php
/**
 * Description of Div
 *
 * @author mgabriel
 */

namespace Html;
class Div extends HtmlTag{
            
    public function __construct() {
        parent::__construct(Enum\TagEnum::DIV);                     
    }    

    public function extrairHtml() {  
        
        $html = $this->extrairAberturaTag();
                
        $html.= $this->extrairHtmlComponentesInternos();
        
        $html.= $this->extrairFechamentoTag();
        
        return $html;
        
    }

}

?>
