<?php

namespace Src\Services;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class ReportService
{
    private $cache;

    public function __construct()
    {
        $this->cache = new FilesystemAdapter();
    }

    public function getDailyUserReport($userId, $date, $transactions)
    {
        return array_reduce($transactions, function ($carry, $transaction) use ($userId, $date) {
            if ($transaction->userId === $userId && $transaction->date === $date) {
                $carry += $transaction->amount;
            }

            return $carry;
        }, 0);
    }

    public function getDailyTotalReport($date, $transactions)
    {
        $cacheItem = $this->cache->getItem('daily_total_' . $date);

        if (! $cacheItem->isHit()) {
            $total = array_reduce($transactions, function ($carry, $transaction) use ($date) {
                if ($transaction->date === $date) {
                    $carry += $transaction->amount;
                }

                return $carry;
            }, 0);

            $cacheItem->set($total);
            $this->cache->save($cacheItem);
        }

        return $cacheItem->get();
    }
}