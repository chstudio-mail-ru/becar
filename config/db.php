<?php

return [
    'class' => 'yii\db\Connection',
    //'dsn' => 'pgsql:host=localhost;port=5433;dbname=becar',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=becar',
    'username' => 'postgres',
    'password' => 'admin',
    'charset' => 'utf8',

    
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
