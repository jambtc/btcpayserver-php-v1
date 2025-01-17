<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License 
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay\Crypto;

/**
 * All crypto extensions MUST support this interface
 */
interface CryptoInterface
{
    /**
     * If the users system supports the cryto extension, this should return
     * true, otherwise it should return false.
     *
     * @return boolean
     */
    public static function hasSupport();

    /**
     * @return array
     */
    public function getAlgos();
}
