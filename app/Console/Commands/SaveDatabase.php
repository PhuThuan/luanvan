<?php

namespace App\Console\Commands;

use App\Models\turnsofusemodel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SaveDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-database';

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
        $today =  Carbon::today();
        $users = User::whereDate('last_accessed',  $today)->get();
        turnsofusemodel::create([
            'turnsofuse' =>  $users,
            'day' => $today,
        ]);
        $this->info('Database saved successfully!');
    }
}
