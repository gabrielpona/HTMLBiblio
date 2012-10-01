<?php

/**
 * Implementação da Tag Button em PHP.
 *
 * @author Gabriel Ponã <sana.gp@gmail.com>
 */
namespace Html;

class Button extends HtmlTag {
    
    //Propriedades específicas da marcação <button>
    private $disabled;
    private $value;
    private $type;
    
    //Conteúdo textual do botão
    private $conteudoTextual;
    
    
    public function __construct() {
        parent::__construct(Enum\TagEnum::BUTTON);
        
        $this->disabled = null;
        $this->value = null;
        $this->conteudoTextual = null;
        $this->type = null;
    }
    
    public function getDisabled() {
        return $this->disabled;
    }
    
    public function desabilitarBotao(){
        $this->disabled = "disabled";
    }
    
    public function habilitarBotao(){
        $this->disabled = null;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getConteudoTextual() {
        return $this->conteudoTextual;
    }

    public function setConteudoTextual($conteudoTextual) {
        $this->conteudoTextual = $conteudoTextual;
    }
    
    public function getType() {
        return $this->type;
    }

    public function setType($buttonTypeEnum) {
        
        switch($buttonTypeEnum){
            case Enum\ButtonTypeEnum::BUTTON:
            case Enum\ButtonTypeEnum::RESET:
            case Enum\ButtonTypeEnum::SUBMIT:
                 $this->type = $buttonTypeEnum;
                 break;
            default :
                throw new \Exception("Tipo de botão não suportado: ".$buttonTypeEnum);
                break;
        }
        
    }  
    
    private function extrairAtributosProprios(){
        $retorno = "";
        if($this->type!==null){
            $retorno.= " type=\"".$this->type."\"";
        }
        return $retorno;
    }


    public function extrairHtml() {
        
        $html = $this->extrairAberturaTag($this->extrairAtributosProprios());
        $html.= "   ".$this->getConteudoTextual().PHP_EOL;
        $html.= $this->extrairFechamentoTag();
        return $html;
    }

}

?>
