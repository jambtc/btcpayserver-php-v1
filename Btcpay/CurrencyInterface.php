<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License 
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay;

/**
 * This is the currency code set for the price setting.  The pricing currencies
 * currently supported are USD, EUR, BTC, and all of the codes listed on this page:
 * https://btcpay.com/bitcoin­exchange­rates
 *
 * @package Btcpay
 */
interface CurrencyInterface
{
    /**
     * @return string
     */
    public function getCode();

    /**
     * @return string
     */
    public function getSymbol();

    /**
     * @return string
     */
    public function getPrecision();

    /**
     * @return string
     */
    public function getExchangePctFee();

    /**
     * @return boolean
     */
    public function isPayoutEnabled();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getPluralName();

    /**
     * @return array
     */
    public function getAlts();

    /**
     * @return array
     */
    public function getPayoutFields();
}
