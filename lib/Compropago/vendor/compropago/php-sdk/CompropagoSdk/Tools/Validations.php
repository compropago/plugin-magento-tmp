<?php

namespace CompropagoSdk\Tools;

use CompropagoSdk\Client;
use CompropagoSdk\Factory\Factory;

class Validations
{
    /**
     * Verify Client Auth
     * 
     * @param Client $client
     * @return CompropagoSdk\Factory\Models\EvalAuthInfo
     * @throws \Exception
     * 
     * @author Eduardo Aguilar <dante.aguilar41@gmail.com>
     */
    public static function evalAuth(Client $client)
    {
        $response = Request::get(
            $client->deployUri."users/auth/",
            ['user' => $client->getUser(), 'pass' => $client->getPass()]
        );

        $info = Factory::getInstanceOf('EvalAuthInfo', $response);

        switch($info->code){
            case '200':
                return $info;
            default:
                throw new \Exception('Error :'.$info->message);
        }
    }

    /**
     * Validate Gateway errors
     * 
     * @param Client $client
     * @return boolean
     * @throws \Exception
     * 
     * @author Eduardo Aguilar <dante.aguilar41@gmail.com>
     */
    public static function validateGateway(Client $client)
    {
        if(empty($client)){
            throw new \Exception("Client object is not valid");
        }

        $clientMode = $client->live;

        $authinfo = self::evalAuth($client);

        if($authinfo->mode_key != $authinfo->livemode){
            throw new \Exception("Keys are diferent of store mode.");
        }

        if($clientMode != $authinfo->livemode){
            throw new \Exception("Client mode is diferent of store mode");
        }

        if($clientMode != $authinfo->mode_key){
            throw new \Exception("Client mode is diferent of keys mode");
        }

        return true;
    }
}