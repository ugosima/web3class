<?php

namespace App\Services;

class Lessonmap
{
    protected $lessons = [
        1 => 'lesson-1-intro-to-web3',
        2 => 'lesson-2-blockchain',
        3 => 'lesson-3-cryptography-cryptocurrency',
        4 => 'lesson-4-crypto-accepted-money',
        5 => 'lesson-5-crypto-terminology',
        6 => 'lesson-6-bitcoin',
        7 => 'lesson-7-altcoins',
        8 => 'lesson-8-token-dex-listing-liquidity-price',
        9 => 'lesson-9-token-cex-listing',
        10 => 'lesson-10-tokenomics-dynamics',
        11 => 'lesson-11-creating-wallet',
        12 => 'lesson-12-common-mistakes',
        13 => 'lesson-13-decentralized-exchanges',
        14 => 'lesson-14-centralized-exchanges',
        15 => 'lesson-15-placing-orders',
        16 => 'lesson-16-airdrops',
        17 => 'lesson-17-participating-airdrops',
        18 => 'lesson-18-crypto-trading',
        19 => 'lesson-19-degen-trading',
        20 => 'lesson-20-trading-tools',
        21 => 'lesson-21-funding-wallet',
        22 => 'lesson-22-crypto-investing',
        23 => 'lesson-23-trading-candlesticks',
        24 => 'lesson-24-basic-analysis-and-indicators',
        25 => 'lesson-25-hwww-of-trading',
        26 => 'lesson-26-jobs-in-web3'
    ];

    public function lessondir($lesson_cycle)
    {
        return $this->lessons[$lesson_cycle] ?? null;
    }

    public function totalLessons()
    {
        return count($this->lessons);
    }
}