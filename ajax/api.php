<?php

// ON PEUT RECUPERER L'INFO TRANSMISE EN GET PAR fetch
$template = $_GET["template"] ?? "";

if ($template != "")
{
    $fichierTemplate = "php/view/$template.php";
    if (is_file($fichierTemplate)) {
        require_once "$fichierTemplate";
    }
}