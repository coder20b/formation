<?php

class Page 
{

    // METHODES
    function __construct ()
    {
        echo "<h1>CODE DU HEADER DE MA PAGE</h1>";
    }

    function __destruct ()
    {
        echo "<h1>CODE DU FOOTER DE MA PAGE</h1>";
    }

    function afficherMain ()
    {
        echo "<h1>CODE DU MAIN DE MA PAGE</h1>";
    }

}

$objetPage = new Page;          // => __construct() => CREER LE CODE DU HEADER
$objetPage->afficherMain();     //                  => CREER LE CODE DU MAIN
                                // => __destruct()  => CREER LE CODE DU FOOTER
