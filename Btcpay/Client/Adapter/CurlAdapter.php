<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License
 * see https://github.com/btcpay/php-btcpay-client/blob/master/LICENSE
 */

namespace Btcpay\Client\Adapter;

use Btcpay\Client\RequestInterface;
use Btcpay\Client\ResponseInterface;
use Btcpay\Client\Response;

/**
 * Adapter that sends Request objects using CURL
 *
 * @TODO add way to configure curl with options
 *
 * @package Btcpay
 */
class CurlAdapter implements AdapterInterface
{
    /**
     * @var array
     */
    protected $curlOptions;

    /**
     * @param array $curlOptions
     */
    public function __construct(array $curlOptions = array())
    {
        $this->curlOptions = $curlOptions;
    }

    /**
     * Returns an array of curl settings to use
     *
     * @return array
     */
    public function getCurlOptions()
    {
        return $this->curlOptions;
    }

    /**
     * @inheritdoc
     */
    public function sendRequest(RequestInterface $request)
    {
        $curl = curl_init();

        $default_curl_options = $this->getCurlDefaultOptions($request);

        foreach ($this->getCurlOptions() as $curl_option_key => $curl_option_value) {
            if (!is_null($curl_option_value)) {
                $default_curl_options[$curl_option_key] = $curl_option_value;
            }
        }

        curl_setopt_array($curl, $default_curl_options);

        if (RequestInterface::METHOD_POST == $request->getMethod()) {
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_POST           => 1,
                    CURLOPT_POSTFIELDS     => $request->getBody(),
                )
            );
        }

        $raw = curl_exec($curl);

        if (false === $raw) {
            $errorMessage = curl_error($curl);
            curl_close($curl);
            throw new \Btcpay\Client\ConnectionException($errorMessage);
        }

        /** @var ResponseInterface */
        $response = Response::createFromRawResponse($raw);

        curl_close($curl);

        return $response;
    }

    /**
     * Returns an array of default curl settings to use
     *
     * @param RequestInterface $request
     * @return array
     */
    private function getCurlDefaultOptions(RequestInterface $request)
    {
        // $AgenziaEntrate = false;
        // foreach ($_SESSION as $item_desc => $item_value){
        //     if (stripos($item_desc, "agenzia_entrate") !== false) {
        //         if ($item_value == 'si')
        //             $AgenziaEntrate = true;
        //     }
        // }
        //
        // if ($AgenziaEntrate){
        if (gethostname() == 'CGF6135T'){
          //MODIFICHE BY SERGIO CASIZZONE X AGENZIA ENTRATE

          include (dirname(__FILE__).'/proxy.php');
          $array = array(
              CURLOPT_URL            => $request->getFullUri(),
              CURLOPT_CUSTOMREQUEST  => $request->getMethod(),
              CURLOPT_HTTPHEADER     => $request->getHeaderFields(),
              CURLOPT_TIMEOUT        => 10,
              CURLOPT_SSL_VERIFYPEER => 1,
              CURLOPT_SSL_VERIFYHOST => 2,
              CURLOPT_CAINFO         => __DIR__.'/ca-bundle.crt',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_FORBID_REUSE   => 1,
              CURLOPT_FRESH_CONNECT  => 1,
              CURLOPT_HEADER         => true,
              //MODIFICHE BY SERGIO CASIZZONE X bypassare PROXY
              CURLOPT_HTTPPROXYTUNNEL => TRUE,
              CURLOPT_PROXY            => $proxy,
              CURLOPT_PROXYUSERPWD  => $proxydata
          );
        }else{
            $array = array(
                CURLOPT_URL            => $request->getFullUri(),
                CURLOPT_CUSTOMREQUEST  => $request->getMethod(),
                CURLOPT_HTTPHEADER     => $request->getHeaderFields(),
                CURLOPT_TIMEOUT        => 10,
                CURLOPT_SSL_VERIFYPEER => 1,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_CAINFO         => __DIR__.'/ca-bundle.crt',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FORBID_REUSE   => 1,
                CURLOPT_FRESH_CONNECT  => 1,
                CURLOPT_HEADER         => true,
            );
        }
        return $array;
    }
}
