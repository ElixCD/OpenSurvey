<?php

namespace Sysurvey;

class Survey
{

    static function getQuestions(int $numberPage)
    {
        $factores = [];

        $option = "<select>
        <option value=''>Seleccione una opción</option>
        <option value='1'>Opcion 1</option>
        <option value='2'>Opcion 2</option>
        </select>";

        switch ($numberPage) {
            case 1: {
                    $factores =  [
                        ["id" => 1, "value" => "hola 0", "factor" => "Geografía", "rubric" => [
                            ["id" => 1, "description" => "Si", "value" => 0],
                            ["id" => 1, "description" => "Si", "value" => 0]
                        ]],
                        ["id" => 2, "value" => "hola 2", "factor" => "Historia", "rubric" => [
                            ["id" => 1, "description" => "Si", "value" => 0],
                            ["id" => 1, "description" => "Si", "value" => 0]
                        ]]
                    ];
                    break;
                }
            case 2: {
                    $factores =  [
                        ["id" => 1, "value" => "hola 3", "factor" => "bye 2", "none" => "not null", "textbox" => "<input type='text'/>"],
                        ["id" => 2, "value" => "hola 4", "factor" => "bye 3", "none" => "Nothing to see",  "textbox" => $option]
                    ];
                    break;
                }
            case 3: {
                    $factores =  [
                        ["id" => 1, "value" => "hola 5", "factor" => "bye 4", "none" => "not null", "textbox" => "<input type='text'/>"],
                        ["id" => 2, "value" => "hola 6", "factor" => "bye 5", "none" => $_ENV['S3_BUCKET'],  "secret" => $_ENV['SECRET_KEY']]
                    ];
                    break;
                }
            default: {
                    $factores =  [];
                    break;
                }
        }

        return $factores;
    }
}
