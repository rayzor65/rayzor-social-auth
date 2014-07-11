<?php

return array(
    'zfc_rbac' => array(
        'guards' => array(
            'ZfcRbac\Guard\RouteGuard' => array(
                'rayzorlogin' => ['guest'],
                'rayzorconnect' => ['guest'],
            ),
        ),
    ),
);
