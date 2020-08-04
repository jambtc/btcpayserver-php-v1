<?php
/**
 * @license Copyright 2011-2015 BitPay Inc., MIT License 
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay;

/**
 * Creates an access token for the given client
 *
 * @package Btcpay
 */
interface AccessTokenInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @return boolean
     */
    public function isNonceDisabled();
}
