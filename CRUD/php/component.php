<?php

function inputElement($icon, $placeholder, $name, $value)
{
    $element = "
    <div class=\"input-group mb-2\">
        <div class=\"input-group-prepend\">
            <div class=\"input-group-text bg-warning\">$icon</i></div>
        </div>
            <input type=\"text\" name = \"$name\" value = \"$value\" autocomplete=\"off\" class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"$placeholder\">
       </div>
    ";
    echo $element;
}

function inputButtton($btnid, $text, $class, $name, $attr)
{
    $btn = "<button name='$name''$attr' id='$btnid' class='$class'>$text</button>";
    echo $btn;
}
?>