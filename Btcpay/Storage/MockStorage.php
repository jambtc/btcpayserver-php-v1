<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License 
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay\Storage;

/**
 * @codeCoverageIgnore
 * @package Bitcore
 */
class MockStorage implements StorageInterface
{
    public function persist(\Btcpay\KeyInterface $key)
    {
    }

    public function load($id)
    {
        return;
    }
}
