<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\Leaves;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pending';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         
      $leaves = Leaves::where('Status', 0)->get();

       if(count($leaves) > 0){
        $email ='stevens.monareng@gmail.com';
        $details = [
       'title' => 'Geekulcha',
       'body' => 'Pending Leaves Request',
       
       ];
  
      \Mail::to($email)->send(new \App\Mail\MyTestMail($details));

       }else{

       }

    }
}
