<?php

namespace App\Console\Commands;

use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Models\UserWaitingOnChange;

class DeleteUnArrivedPaymentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:delete_unArrived';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Příkaz na odebrání platby, která nedorazila do termínu zaplacení';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (UserWaitingOnChange::where('created_at', '<=', Carbon::now()->subDays(2)->toDateTimeString())->count() > 0) {

            foreach (UserWaitingOnChange::where('created_at', '<=', Carbon::now()->subDays(2)->toDateTimeString())->get() as $userToDelete) {
                // delete
                $user = $userToDelete->user;
                $userToDelete->delete();
                // send notification to customer
                // info for example
                info("Platba nedorazila, služba nebyla změněna", $user);
            }
        }
    }
}
