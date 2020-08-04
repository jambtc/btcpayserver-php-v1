<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License 
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay;

/**
 * Used to manage keys
 *
 * @package Bitcore
 */
class KeyManager
{
    /**
     * @var Btcpay\Storage\StorageInterface
     */
    protected $storage;

    /**
     * @param StorageInterface $storage
     */
    public function __construct(\Btcpay\Storage\StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param KeyInterface $key
     */
    public function persist(KeyInterface $key)
    {
        $this->storage->persist($key);
    }

    /**
     * @return KeyInterface
     */
    public function load($id)
    {
        return $this->storage->load($id);
    }
}
