<?php
class ModalConfirmation
{
    private $id;
    private $title;
    private $bodyText;
    private $jsFunctionOk;

    function __construct($id, $title, $bodyText, $jsFunctionOk)
    {
        $this->id = $id;
        $this->title = $title;
        $this->bodyText = $bodyText;
        $this->jsFunctionOk = $jsFunctionOk;
    }

    function DrawComponent()
    {
        $salida = "<div class='modal fade' id='$this->id' tabindex='-1' role='dialog' aria-labelledby='$this->id' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='$this->id'>$this->title</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                    $this->bodyText
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                    <button type='button' class='btn btn-primary' data-dismiss='modal' onclick='$this->jsFunctionOk'>Aceptar</button>
                </div>
            </div>
        </div>
    </div>";

        echo $salida;
    }
}
?>

<!-- Modal Delete-->
<!-- <div class='modal fade' id='deleteFactorModal' tabindex='-1' role='dialog' aria-labelledby='deleteFactorModal' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='deleteFactorModal'>Factores</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class='row'>
                    <div class='col-md-12'>
                        Se eliminara el factor.
                        <br />
                        ¿Desea continuar?
                    </div>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                <button type='button' class='btn btn-primary' data-dismiss='modal' onclick='SaveFactor()'>Aceptar</button>
            </div>
        </div>
    </div>
</div> -->