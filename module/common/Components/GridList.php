<?php

namespace Sysurvey\Modules\Common\Components;

use DOMDocument;

class GridList
{
    public $ListColumns = array();
    public $DataCollection = array(array());
    public $TableClass;
    public $SelectColumn = false;
    public $SelectColumnHeader = "Select";

    public $KeyColumn;

    public function init()
    {
        $this->Dir = __DIR__;
    }

    public function addRadioButtonGroupComponentColumn($id, int $index, $headerCollection = [], $textCollection = [], $valuesCollection = [])
    {
        array_splice($this->ListColumns, $index, 0, $headerCollection);

        foreach ($this->DataCollection as $key => $value) {         

            $tmpIndex = $index;
            foreach ($valuesCollection as $keyHeader => $valueHeader) {
                $doc = new DOMDocument();
                $element = $doc->createElement('input');
                $element->setAttribute('type', 'radio');
                $element->setAttribute('id', $id . "_" . $value[$this->KeyColumn]);
                $element->setAttribute('name', $id . "_" . $value[$this->KeyColumn]);
    
                $doc->appendChild($element);
                $element->setAttribute('value', $valueHeader);

                array_splice($value, $tmpIndex, 0, $doc->saveHTML().$textCollection[$keyHeader]);
                $list = array_keys($value);
                $list[$tmpIndex] = $keyHeader;
                $value = array_combine($list, $value);
                $this->DataCollection[$key] = $value;
                $tmpIndex++;
            }
        }
    }

    public function addSelectComponentColumn(string $id, int $index, string $header, $optionList = [], string $placeholder = null)
    {
        array_splice($this->ListColumns, $index, 0, $header);

        foreach ($this->DataCollection as $key => $value) {
            $doc = new DOMDocument();
            $element = $doc->createElement('select');
            $element->setAttribute('id', $id);
            $element->setAttribute('name', $id);

            $doc->appendChild($element);

            array_splice($value, $index, 0, $doc->saveHTML());

            $list = array_keys($value);
            $list[$index] = $header;

            $this->DataCollection[$key] = array_combine($list, $value);
        }
    }

    /**
     * @return string
     */
    public function drawComponent()
    {
        $this->Columns = count($this->DataCollection);

        $return = "";
        $tHead = "";
        $tBody = "";

        $tHead .= "<thead>";
        $tHead .= "<tr>";
        if ($this->SelectColumn) {
            $tHead .= "<th>" . $this->SelectColumnHeader . "</th>";
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

        $return = "<table class='" . $this->TableClass . "'>";
        $return .= $tHead . $tBody;
        $return .= "</table>";

        return $return;
    }
}
