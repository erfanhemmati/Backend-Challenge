<?php

namespace Src\Models;

class User
{

    public $id;
    public $name;
    public $credit;

    public function __construct($id, $name, $credit)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->credit   = $credit;
    }
}