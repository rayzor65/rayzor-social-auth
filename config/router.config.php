<?php

return array(
    'router' => array(
        'routes' => array(
            'rayzorlogin' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/rayzorlogin',
                    'defaults' => array(
                        'controller' => 'Rayzorauth\Controller\ConnectController',
                        'action' => 'index',
                    ),
                ),
            ),
            'rayzorconnect' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/rayzorconnect',
                    'defaults' => array(
                        'controller' => 'Rayzorauth\Controller\ConnectController',
                        'action' => 'connect',
                    ),
                ),
            ),
        ),
    ),
);
