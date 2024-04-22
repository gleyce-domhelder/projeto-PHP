<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    public string $defaultGroup = 'default';

    public array $default = [
        'DSN'         => '',
        'hostname'    => 'LAPTOP-06ODSRH6', // Seu servidor SQL Server
        'username'    => 'LAPTOP-06ODSRH6\gleyc', // Nome de usuário do SQL Server
        'password'    => '', // Senha do SQL Server
        'database'    => 'PHP - REACT JS', // Nome do banco de dados do SQL Server
        'DBDriver'    => 'SQLSRV', // Driver do SQL Server
        'DBPrefix'    => '',
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'UTF-8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 1433, // Porta padrão do SQL Server
        'dateFormat'  => 'Y-m-d H:i:s',
        'saveQueries' => true,
    ];

    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'dateFormat'  => 'Y-m-d H:i:s',
        'saveQueries' => true,
    ];
    public function __construct()
    {
        parent::__construct();

        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
