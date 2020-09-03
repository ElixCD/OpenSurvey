<?php

namespace Sysurvey\Modules\Common\GridList;

use Sysurvey;

class GridList extends Sysurvey\ComponentBase
{
    public $ListColumns = array();
    public $DataCollection = array(array());
    public $TableClass;
    public $SelectColumn = false;
    public $KeyColumn;

    public $ActionColumn = "";

    public function init()
    {
        $this->Dir = __DIR__;
    }

    public function drawComponent()
    {
        $this->Columns = count($this->DataCollection);

        $salida = "";
        $tHead = "";
        $tBody = "";

        $tHead .= "<thead>";
        $tHead .= "<tr>";
        if ($this->SelectColumn) {
            $tHead .= "<th>Selecccionar</th>";
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

        $salida = "<table class='" . $this->TableClass . "'>";
        $salida .= $tHead . $tBody;
        $salida .= "</table>";

        echo $salida;
    }
}
