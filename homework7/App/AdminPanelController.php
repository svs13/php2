<?php

namespace App;

abstract class AdminPanelController extends Controller
{
    protected function access() : bool
    {
        return true;
    }
}

