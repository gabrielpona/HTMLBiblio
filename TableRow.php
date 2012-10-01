<?php
namespace Html;


class TableRow extends HtmlTag{
    
    private $colunas;
    
    public function __construct() {
        parent::__construct(Enum\TagEnum::TABLE_ROW);
        $colunas = array();
    }
    
    public function adicionarColuna(TableColumn $coluna){
        $this->colunas[] = $coluna;
    }
    
    public function extrairHtml(){
        $html = "<tr".$this->extrairClasses().">".PHP_EOL;
        
        $coluna = new TableColumn(' ',' ');
        foreach ($this->colunas as $coluna){
            $html.="    ".$coluna->extrairHtml().PHP_EOL;
        }
        $html.= "</tr>".PHP_EOL;
        return $html;
    }
}

?>
