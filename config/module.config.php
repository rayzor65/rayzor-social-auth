<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Rayzorauth\Controller\ConnectController' => 'Rayzorauth\Controller\ConnectController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view/',
        ),
        'template_map' => array(
//            'form/status' => __DIR__ . '/../view/partial/form/status.phtml',
        )
    ),
);
