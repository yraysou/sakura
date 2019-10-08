<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Carbon\Carbon;
use DB;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    //  登録後半年経過ユーザー削除処理
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $today = Carbon::today();
            $users = DB::table('users')
                            ->leftjoin(
                                'manager',
                                'users.manager_id','=','manager.manager_id')
                            ->where('after_half_year','<=',$today)
                            ->get();
            foreach ($users as $user) {
                Storage::deleteDirectory("/public"."/".$user->store_name."/".$user->user_id);
                User::destroy($user->id);
            }
            dump($users);
            })
            
            // 確認用毎分実行    
            ->everyMinute();

        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

