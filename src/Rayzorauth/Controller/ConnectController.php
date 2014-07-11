<?php

namespace Rayzorauth\Controller;

use League\OAuth2\Client\Provider\Facebook;
use League\OAuth2\Client\Grant\RefreshToken;
use League\OAuth2\Client\Provider\LinkedIn;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Provider\User as OauthUser;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http\Client;
use Zend\Session\Container;

class ConnectController extends AbstractActionController
{

    public function connectAction()
    {
        $session = new Container('rayzorauth');

        $provider = new Facebook(array(
            'clientId'  =>  '1447356162183107',
            'clientSecret'  =>  'e829e6bb65cf32bf4c1550a0af8ff441',
            'redirectUri'   =>  'http://local-app.carsondemand.com.au/rayzorconnect'
        ));

//        $provider = new LinkedIn(array(
//            'clientId'  =>  '7586loosag69gl',
//            'clientSecret'  =>  'ambC2UCT2FdeQ7bj',
//            'redirectUri'   =>  'http://local-app.carsondemand.com.au/rayzorconnect'
//        ));

        if ( ! isset($_GET['code'])) {

            // If we don't have an authorization code then get one
            header('Location: '.$provider->getAuthorizationUrl());
            exit;

        } else {

            if ($session->socialUser instanceOf OauthUser) {

                $token = $session->socialToken;
                var_dump($session->socialUser);
                die();

            } else {

                // Try to get an access token (using the authorization code grant)
                $token = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);

            }

            // Optional: Now you have a token you can look up a users profile data
            try {

                // We got an access token, let's now get the user's details
                $userDetails = $provider->getUserDetails($token);
                $session->socialUser = $userDetails;
                // Use these details to create a new profile
//                printf('Hello %s!', $userDetails->firstName);
                var_dump($userDetails);

                // Use this to interact with an API on the users behalf
//                var_dump($token->accessToken);

                // Use this to get a new access token if the old one expires
//                var_dump($token->refreshToken);

                // Number of seconds until the access token will expire, and need refreshing
//                var_dump($token->expires);

            } catch (Exception $e) {
                // Failed to get user details
//                exit('Oh dear...');
            }


        }
    }

    public function indexAction()
    {
        $session = new Container('rayzorauth');
        $session->socialUser = NULL;
        $session->socialToken = NULL;
    }

}
