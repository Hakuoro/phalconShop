<?php
return [
    'frontend' => array(
        'className' => 'Multiple\Frontend\Module',
        'path' => APP_PATH.'apps/frontend/Module.php'
    ),
    'backend' => array(
        'className' => 'Multiple\Backend\Module',
        'path' => APP_PATH.'apps/backend/Module.php'
    )
];