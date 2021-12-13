<?php

namespace OurVoice\Components\GridList;

use OurVoice;

class GridList extends OurVoice\ComponentBase
{
    public $ListColumns = array();
    public $DataCollection = array(array());
    public $TableClass;
    public $HeadClass;
    public $SelectColumn = true;
    public $SelectHeaderText = "Select";

    public $KeyColumn;

    public $ActionColumn = false;
    public $ActionFirst = false;
    public $DataActionColumn = "";

    public function init()
    {
        // $this->Dir = __DIR__;
    }

    public function drawComponent()
    {
        echo $this->Dir;
         $layout = file_get_contents($this->Dir);
        // echo $layout;
        include_once $this->Dir;

        $this->Columns = count($this->DataCollection);

        $return = "";
        $tHead = "";
        $tBody = "";
       

        $tHead .= "<thead class='$this->HeadClass'>";
        $tHead .= "<tr>";
        if ($this->SelectColumn) {
            $tHead .= "<th>" . $this->SelectHeaderText . "</th>";
        }
        foreach ($this->ListColumns as $values) {
            $tHead .= "<th>" . $values . "</th>";
        }
        $tHead .= "</tr>";
        $tHead .= "</thead>";

        $tBody .= "<tbody>";
        foreach ($this->DataCollection as $value) {
            $tBody .= "<tr>";
            if ($this->SelectColumn && $this->KeyColumn != "") {
                $tBody .= "<td><input type='checkbox' id='" . $value[$this->KeyColumn] . "'/></td>";
            }

            foreach ($this->ListColumns as $values) {
                if (array_key_exists($values, $value)) {
                    $tBody .= "<td>" . $value[$values] . "</td>";
                } else {
                    $tBody .= "<td></td>";
                }
            }
            $tBody .= "</tr>";
        }
        $tBody .= "</tbody>";

        $return = "<div class='table-responsive'><table class='" . $this->TableClass . "'>";
        $return .= $tHead . $tBody;
        $return .= "</table></div>";

        echo $return;
    }
}
