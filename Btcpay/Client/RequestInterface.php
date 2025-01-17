<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License 
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay\Client;

/**
 *
 * @package Btcpay
 */
interface RequestInterface
{
    const METHOD_POST   = 'POST';
    const METHOD_GET    = 'GET';
    const METHOD_PUT    = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * Returns the method for this request
     *
     * @return string
     */
    public function getMethod();

    /**
     * example of path is `api/invoice` as this is appended to $host
     *
     * @return string
     */
    public function getPath();

    /**
     * Returns $schema://$host:$port/$path
     *
     * @return string
     */
    public function getFullUri();

    /**
     * Checks the request to see if the method matches a known value
     *
     * @param string $method
     *
     * @return boolean
     */
    public function isMethod($method);

    /**
     * Returns the request body
     *
     * @return string
     */
    public function getBody();

    /**
     * Returns a $key => $value array of http headers
     *
     * @return array
     */
    public function getHeaders();
}
