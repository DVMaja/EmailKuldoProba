<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoUtemezettEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-utemezett-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /* $users = User::whereMonth('birthdate', date('m'))
                    ->whereDay('birthdate', date('d'))
                    ->get();
  
        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new BirthDayWish($user));
            }
        }
  
        return 0; */
    }
}
