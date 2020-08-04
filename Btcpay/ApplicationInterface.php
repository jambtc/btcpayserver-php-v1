<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License 
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay;

/**
 * Creates an application for a new merchant account
 *
 * @package Btcpay
 */
interface ApplicationInterface
{
    /**
     * @return array
     */
    public function getUsers();

    /**
     * @return array
     */
    public function getOrgs();
}
