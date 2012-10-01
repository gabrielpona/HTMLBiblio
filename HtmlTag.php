<?php
namespace Html;

/**
 * 
 */
abstract class HtmlTag {
    
    private $tag;
    
    protected $classes;
    protected $id;
    protected $style;
    protected $title;
    
    private $atributosExtras;
    
    private $componentesInternos;
    
    
    
    
    public function __construct($tag) {
        $this->tag = $tag;
        $this->classe = array();
        $this->id = null;
        $this->style = null;
        
        $this->atributosExtras = array();
        $this->componentesInternos = array();
    }
    
    public final function getTag() {
        return $this->tag;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getStyle() {
        return $this->style;
    }

    public function setStyle($style) {
        $this->style = $style;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }    
        
    public function adicionarClasse($classe) {
        $this->classes[] = $classe;
    }
   
    
    public function removerClasse($classe) {
        if (in_array($classe, $this->classes)) {
            $this->classes = $this->removerElemento($classe, $this->classes);
        }
    }
    
    public function adicionarAtributoExtra($atributo,$valor){
        $this->atributosExtras[$atributo] = $valor;
    }
    
    public function removerAtributoExtra($atributo){
        unset($this->atributosExtras[$atributo]);
    }
    
    public function adicionarComponente(HtmlTag $componente){
        $this->componentesInternos[] = $componente;
    }
    
    public function removerComponente(HtmlTag $componente){
        $this->componentesInternos  = $this->removerElemento($componente,$this->componentesInternos);
    }
    
    protected function extrairClasses(){
        $tam = sizeof($this->classes);
        if($tam > 0){
            $retorno = " class=\"";
            for($i=0;$i<$tam;$i++){
                $retorno.=$this->classes[$i]." ";
            }
            $retorno.="\"";
        }else{
            $retorno = "";
        }
        return $retorno;
    }
    
    protected function extrairId(){
        
        if($this->id !==null){
            $retorno = " id=\"".$this->id."\" ";
        }else{
            $retorno = "";
        }        
        return $retorno;        
    }
    
    protected function extrairStyle(){
        if($this->style!==null){
            $retorno = " style=\"".$this->style."\" ";
        }else{
            $retorno = "";
        }
        return $retorno;
    }
    
    protected function extrairTitle(){
        if($this->title!==null){
            $retorno = " title=\"".$this->title."\" ";
        }else{
            $retorno = "";
        }
        return $retorno;
    }
    
    protected function extrairAtributosBasicos(){
        return $this->extrairId().$this->extrairTitle().$this->extrairClasses().$this->extrairStyle();
    }

    protected function extrairAtributosExtras(){
        $retorno = "";
        foreach ($this->atributosExtras as $atributo=>$valor){
            $retorno.= " ".$atributo."=\"".$valor."\" ";
        }
        return $retorno;
    }
    
    protected function extrairAberturaTag(){
        $numParametros = func_num_args();
        
        if($numParametros > 0){
            $atributosProprios = func_get_arg(0);
        }else{
            $atributosProprios = "";
        }
        
        return "<".$this->tag.$this->extrairAtributosBasicos().$atributosProprios.$this->extrairAtributosExtras().">".PHP_EOL;
    }
    
    protected function extrairFechamentoTag(){
        return "</".$this->tag.">";
    }

    protected function removerElemento($elemento, $array) {        
        $novoArray = array();
        foreach ($array as $valor) {
            if ($valor != $elemento) {
                array_push($novoArray, $valor);
            }
        }
        return $novoArray;
    }
    
    protected final function extrairHtmlComponentesInternos(){
        
        $html = "";
        foreach($this->componentesInternos as $componente){
            
            $html.="    ".$componente->extrairHtml().PHP_EOL;
            
        }
        return $html;
        
    }
    
    public abstract function extrairHtml();


}

?>
