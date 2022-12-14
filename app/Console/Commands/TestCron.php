<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data['data']  =  'Testing Cron Job';
        //     Mail::send('cronjobs.mail',$data, function($mail){
        //     $mail->to('ahirwarurmila44@gmail.com')
        //     ->subject('Testing Mail.');
        // });
      //  return Command::SUCCESS;
       //return view('cronjobs.mail');
       \Log::info("Cron is working fine!"); 
    }
}
