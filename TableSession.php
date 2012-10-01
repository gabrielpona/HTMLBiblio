<?php
namespace Html;

class TableSession extends HtmlTag{
        
    private $linhas;
    
    public function __construct($tag) {
        parent::__construct($tag);        
        $this->linhas = array();
    }
    
    public function adicionarLinha(TableRow $linha){
        $this->linhas[] = $linha;
    }
    
    public function removerLinha(TableRow $linha){
        if (in_array($linha, $this->linhas)) {
            $this->linhas = $this->removerElemento($linha, $this->linhas);
        }
    }
    
    public function extrairHtml() {
        $tam = sizeof($this->linhas);
        
        if($tam>0){
            $html = $this->extrairAberturaTag();
            
            $linha  = new TableRow();
            foreach ($this->linhas as $linha){
                $html.="    ".$linha->extrairHtml().PHP_EOL;
            }
            
            $html.=$this->extrairFechamentoTag();           
            
        }else{
            $html = "";
        }        
        return $html;
    }

    
}

?>
