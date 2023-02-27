<?php

namespace App\Console\Commands;

use App\Models\WaitingOnDelete;
use Illuminate\Console\Command;
use App\Actions\Api\Customer\ApiDestroyCustomerAction;

class DeleteUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete users from system';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (WaitingOnDelete::count() != 0) {

            foreach (WaitingOnDelete::get() as $userWatingOnDelete) {
                (new ApiDestroyCustomerAction())->execute($userWatingOnDelete->user);
            }
        }
    }
}
