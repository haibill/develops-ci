<?php

function buttonModalAction($id, $instruction, $text, $position = 'bottom')
{
    if ($instruction == 'Edit') {
        $icon  = '<i class = "far fa-edit"></i>';
        $class = 'btn btn-sm btn-outline-warning modalEdit';
        $space = '&nbsp;';
    } elseif ($instruction == 'Delete') {
        $icon  = '<i class = "fas fa-trash"></i>';
        $class = 'btn btn-sm btn-outline-danger modalDelete';
        $space = '';
    }
    $button = '<button type="button" data-id="' . $id . '" class="' . $class . '" data-toggle="tooltip" data-placement="' . $position . '" title="' . $instruction . ' ' . $text . '">
                    ' . $icon . '
                </button>' . $space . ' ';
    return $button;
}

function buttonOnclickAction($id, $instruction, $text, $position = 'bottom')
{
    if ($instruction == 'Edit') {
        $icon    = '<i class = "far fa-edit"></i>';
        $class   = 'btn btn-sm btn-outline-warning modalEdit';
        $onclick = 'edit(' . $id . ')';
        $space   = '&nbsp;';
    } elseif ($instruction == 'Delete') {
        $icon    = '<i class = "fas fa-trash"></i>';
        $class   = 'btn btn-sm btn-outline-danger modalDelete';
        $space   = '';
        $onclick = 'destroy(' . $id . ')';
    }
    $button = '<button type="button" class="' . $class . '" data-toggle="tooltip" data-placement="' . $position . '" title="' . $instruction . ' ' . $text . '" onclick="' . $onclick . '">
                    ' . $icon . '
                </button>' . $space . ' ';
    return $button;
}
