<?php

namespace Julienbourdeau\DevToolsForLaravel\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class UseSamePasswordForAllUsersCommand extends Command
{
    protected $signature = 'dev:pwd {password?}';

    protected $description = 'Set the same password to all users (only for dev environment). Default: `password`';

    public function handle()
    {
        if ('local' !== App::environment()) {
            $this->warn("Sorry, this command can only run in local environment.");
            return 1;
        }

        $pwd = $this->argument('password') ?? 'password';

        User::whereNotNull('email')->update(['password' => bcrypt($pwd)]);

        $this->line('<info>All users use [<comment>'.$pwd.'</comment>] as their password</info> ');

        return 0;
    }
}
