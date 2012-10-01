<?php

namespace Html\TwitterBootstrap;
use Html\Enum\TagEnum;

/**
 * Description of ContextualAlternative
 *
 * @author mgabriel
 */
class ContextualAlternative extends \Html\Div {

    
    private $texto;
    private $botaoFechar;
    
    //Componentes específicos do Componente Twitter Bootstrap
    private $botao;
    private $titulo;
    
    
    public function __construct($contextualAlternativeEnum,$botaoFechar) {       
        parent::__construct();
        $this->adicionarClasse("alert");
        switch ($contextualAlternativeEnum){
            case Enum\AlternativeEnum::ERROR:
            case Enum\AlternativeEnum::SUCCESS:
            case Enum\AlternativeEnum::INFO:
                $this->adicionarClasse($contextualAlternativeEnum);
                break;            
            default :
                throw new \Exception("Tipo de alerta não suportado :" .$contextualAlternativeEnum);
                break;
        }
        
        
        $this->setBotaoFechar($botaoFechar);
        
        
        $this->botaoFechar = $botaoFechar;  
        
        $this->titulo = $this->criarTitulo("");
    }
    
    public function getTitulo() {
        return $this->titulo->getConteudoTextual();
    }

    public function setTitulo($titulo) {
        $this->titulo->setConteudoTextual($titulo);
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getBotaoFechar() {
        return $this->botaoFechar;
    }

    public function setBotaoFechar($botaoFechar) {
        if($botaoFechar){
           $this->botao = $this->criarBotao(); 
        }else{
            $this->botao = null;
        }
        $this->botaoFechar = $botaoFechar;
    }

    private function criarBotao(){
        $botao = new \Html\Button();
        $botao->adicionarClasse("close");
        $botao->setType(\Html\Enum\ButtonTypeEnum::BUTTON);
        $botao->adicionarAtributoExtra("data-dimiss", "alert");
        $botao->setConteudoTextual('×');
        
        return $botao;
    }
    
    private function criarTitulo($titulo){
        $titulo = new \Html\Heading(\Html\Enum\HeadingEnum::H4,$titulo);        
        return $titulo;
    }
    
    public function extrairHtml() {
        
        $html = $this->extrairAberturaTag().PHP_EOL;
        if($this->botaoFechar){
            $html.=$this->botao->extrairHtml().PHP_EOL;
        }
        if($this->titulo->getConteudoTextual()!==null){
            $html.="    ".$this->titulo->extrairHtml().PHP_EOL;
        }
        $html.= $this->texto.PHP_EOL;
        $html.= $this->extrairFechamentoTag();
        return $html;
    }

}

?>
