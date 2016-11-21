<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 11/21/16
 * Time: 9:24 PM
 */

require_once BASEPATH . "../application/libraries/utilities.php";

function getNewsApiSources(){
    global $endpoints;
    $Response = array(
        "result" => 'success',
        "data" => array(),
    );

    try {
        /* initialize curl handle */
        $ch = curl_init();
        /* set url to send request */
        curl_setopt($ch, CURLOPT_URL, $endpoints['newsapi']['sources']['endpoint']);
        /* allow redirects */
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        /* return a response into a variable */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        /* times out after 30s */
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        /* set POST method */
        curl_setopt($ch, CURLOPT_POST, 1);
        /*To activate RC4-SHA which causes the SSL connection error
        //curl_setopt( $ch, CURLOPT_SSL_CIPHER_LIST, 'rsa_rc4_128_sha' );
        /* add POST fields parameters */
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $this->uriParameter);
        /* execute the cURL */
        $Response['data'] = curl_exec($ch);

        if (FALSE === $Response['data']) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }

        curl_close($ch);
    } catch (Exception $exception) {
        $Response['result'] = "failed";
        $Response['data'] = $exception;
        echo 'Exception Message: ' . $exception->getMessage() . '<br/>';
        echo 'Exception Trace: ' . $exception->getTraceAsString();
    }

    return $Response;
}

