<?php

// app/Services/Lessonmap.php

namespace App\Services;

class Lessonmap
{
    public function lessondir($lesson_cycle)
    {

    $lessons = [
        1 => 'lesson-1-intro-to-web3',
        2 => 'lesson-2-blockchain',
        3 => 'lesson-3-cryptography-cryptocurrency',
        4 => 'lesson-4-crypto-accepted-money',
        5 => 'lesson-5-crypto-terminology',
        6 => 'lesson-6-bitcoin',
        7 => 'lesson-7-altcoins',
        8 => 'lesson-8-token-creation-liquidity-price',
        9 => 'lesson-9-tokenomics-dynamics',
        10 => 'lesson-10-creating-wallet',
        11 => 'lesson-11-common-mistakes',
        12 => 'lesson-12-decentralized-exchanges',
        13 => 'lesson-13-centralized-exchanges',
        14 => 'lesson-14-placing-orders',
        15 => 'lesson-15-airdrops',
        16 => 'lesson-16-participating-airdrops',
        17 => 'lesson-17-crypto-trading',
        18 => 'lesson-18-trading-tools',
        19 => 'lesson-19-funding-wallet',
        20 => 'lesson-20-crypto-investing',
    ];



    
    // $lessons = [
    //     1 => 'lesson-1-intro-to-web3',
    //     2 => 'lesson-2-blockchain',
    //     3 => 'lesson-3-cryptography-cryptocurrency',
    //     4 => 'lesson-4-crypto-accepted-money',
    //     5 => 'lesson-5-crypto-terminology',
    //     6 => 'lesson-6-bitcoin',
    //     7 => 'lesson-7-altcoins',
    //     8 => 'lesson-8-token-creation-liquidity-price',
    //     9 => 'lesson-9-tokenomics-creation-distribution',
    //     10 => 'lesson-8-creating-wallet',
    //     11 => 'lesson-9-common-mistakes',
    //     12 => 'lesson-10-decentralized-exchanges',
    //     13 => 'lesson-11-centralized-exchanges',
    //     14 => 'lesson-12-placing-orders',
    //     15 => 'lesson-13-airdrops',
    //     16 => 'lesson-14-participating-airdrops',
    //     17 => 'lesson-15-crypto-trading',
    //     18 => 'lesson-16-trading-tools',
    //     19 => 'lesson-17-funding-wallet',
    //     20 => 'lesson-18-crypto-investing',
    // ];
        return $lessons[$lesson_cycle] ?? null;
    }
}