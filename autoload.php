<?php

function controller_autoload($clasname)
{
    include 'controllers/' . $clasname . '.php';
}

spl_autoload_register('controller_autoload');
