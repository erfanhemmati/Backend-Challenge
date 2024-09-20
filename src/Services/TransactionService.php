<?php

namespace Src\Services;

use Src\Models\Transaction;

class TransactionService
{
    public $transactions = [];

    public function performTransaction($user, $amount, $date)
    {
        if ($user->credit < $amount) {
            throw new \Exception("Insufficient credit");
        }

        $user->credit -= $amount;
        $transaction = new Transaction(uniqid(), $user->id, $amount, $date);

        $this->transactions[] = $transaction;
    }

    public function getTransactions()
    {
        return $this->transactions;
    }
}