<?php

namespace Julienbourdeau\DevToolsForLaravel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabaseCommand extends Command
{
    protected $signature = 'db:create';

    protected $description = 'Create new MySQL database';

    public function handle()
    {

        $dbName = config("database.connections.mysql.database");
        $charset = config("database.connections.mysql.charset",'utf8mb4');
        $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

        $this->line("Creating a new $dbName database...");

        config(["database.connections.mysql.database" => null]);
        DB::statement("CREATE DATABASE IF NOT EXISTS $dbName CHARACTER SET $charset COLLATE $collation;");

        $this->info("Created $dbName database.");

        return 0;
    }
}
