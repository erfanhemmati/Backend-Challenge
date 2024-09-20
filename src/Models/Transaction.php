<?php

namespace Src\Models;

class Transaction
{
    public $id;
    public $userId;
    public $amount;
    public $date;

    public function __construct($id, $userId, $amount, $date)
    {
        $this->id       = $id;
        $this->userId   = $userId;
        $this->amount   = $amount;
        $this->date     = $date;
    }
}