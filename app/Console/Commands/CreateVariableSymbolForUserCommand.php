<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateVariableSymbolForUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create_variable_symbol';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'vytvoření variabilních symbolů pro uživatele';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (User::where('variable_symbol', null)->count() > 0) {
            foreach (User::where('variable_symbol', null)->get() as $user) {
                $user->update([
                    'variable_symbol' => random_int(100, 999999)
                ]);
            }
        }
    }
}
