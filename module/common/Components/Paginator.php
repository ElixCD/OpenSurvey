<?php

namespace Sysurvey\Modules\Common\Components;

use Sysurvey;

class Paginator extends Sysurvey\ComponentBase
{
    public $CurrentPage = 1;
    public $VisiblePages = 3;
    public $TotalPages;
    public $PreviousText = "Previous";
    public $NextText = "Next";

    private $PreviousPage;
    private $NextPage;
    private $StartCount = 1;

    public function init()
    {
        $this->Dir = __DIR__;
    }

    public function drawComponent()
    {
        $this->PreviousPage = $this->CurrentPage - 1;
        $this->NextPage = $this->CurrentPage + 1;

        $this->startIndex();

        $return = "<nav aria-label='Page navigation example'><ul class='pagination'>";

        $return .= "<li class='page-item " . (($this->PreviousPage == 0) ? "disabled" : " ") . "'><a class='page-link' href='./?page=" . $this->PreviousPage  . "'>" . $this->PreviousText . "</a></li>";

        for ($i = 0; $i < $this->VisiblePages; $i++, $this->StartCount++) {

            if ($this->StartCount > $this->TotalPages) break;

            if ($this->StartCount == $this->CurrentPage) {
                $return .= "<li class='page-item active'>";
                $return .= "<span class='page-link'>" . $this->StartCount . "</span>";
                $return .= "</li>";
            } else {
                $return .= "<li class='page-item'>";
                $return .= "<a class='page-link' href='./?page=" . $this->StartCount . "'>" . $this->StartCount . "</a>";
                $return .= "</li>";
            }
        }

        $return .= "<li class='page-item " . (($this->NextPage > $this->TotalPages) ? "disabled" : "") . "'><a class='page-link' href='./?page=" . $this->NextPage . "'>" . $this->NextText . "</a></li>";
        $return .= "</ul></nav>";

        echo $return;
    }

    private function startIndex()
    {
        if ($this->CurrentPage <= ($this->VisiblePages / 2)) {
            $this->StartCount;
        } else {
            $this->StartCount =  $this->CurrentPage - 1;
        }
    }
}
