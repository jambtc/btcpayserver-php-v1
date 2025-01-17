<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License 
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay;

/**
 * @package Btcpay
 */
interface TokenInterface
{
    /**
     * @return string
     */
    public function getToken();

    /**
     * @return string
     */
    public function getResource();

    /**
     * @return string
     */
    public function getFacade();

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @return array
     */
    public function getPolicies();
    
    /**
     * @return string
     */
    public function getPairingCode();

    /**
     * @return \DateTime
     */
    public function getPairingExpiration();
}
