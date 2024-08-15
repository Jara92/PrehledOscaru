<?php

/**
 * Prints given output using save methods.
 * @param mixed $data
 * @return string
 */
function printSave(mixed $data): string
{
    if($data != null){
        return htmlspecialchars($data);
    }

    return "";
}