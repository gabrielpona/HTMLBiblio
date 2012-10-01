<?php
namespace Html;

class TableColumn extends HtmlTag{
        
    private $conteudo;
    
    public function __construct($tag,$conteudo) {
        parent::__construct($tag);
        $this->tag = $tag;
        $this->conteudo = $conteudo;
    }        
    
    public function getConteudo() {
        return $this->conteudo;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }
    
    public function extrairHtml(){
        $html ="<".$this->tag.$this->extrairClasses().">".$this->conteudo."</".$this->tag.">".PHP_EOL;
        return $html;
    }


    


    
    
    
    
    
}

?>
