<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\unfinished_bookings;
use App\Models\rides_booking;
use App\Models\active_driver;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\ServiceAccount;

class timeoutrides extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
  
    protected $signature = 'timeout:rides';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel timeout rides';

    /**
     * Execute the console command.
     *
     * @return int
     */
     
    public function handle()
    {
        $dt=date('Y-m-d H:i:s');

        $trides=DB::table('rides_bookings')->where('timeout','<',$dt)->where('status',0)->get();
        foreach ($trides as $tr)
         {
            unfinished_bookings::updateOrCreate([

                'bid'   => $tr->id,
          
              ],
              [ 
                  'bid'=>$tr->id,
                  'booking_id'=>"GKB". $tr->id,
          
                  'customer_id'=>$tr->customer_id,
                  'booked_at'=>$tr->booked_at,
                  'booked_date'=>$tr->booked_date,
          
                  'from_latitude'=>$tr->from_latitude,
                  'from_longitude'=>$tr->from_longitude,
                  'from_location'=>$tr->from_location,
          
                  'to_latitude'=>$tr->to_latitude,
                  'to_longitude'=>$tr->to_longitude,
                  'to_location'=>$tr->to_location,
          
                  'vehicle_type'=>$tr->vehicle_type,
                  'driver_id'=>$tr->driver_id,
                  'franchise'=>$tr->franchise,
          
                  'distance'=>$tr->distance,
                  'time'=>$tr->time,
                  'fare'=>$tr->fare,

                  'night_ride'=>$bookdt->night_ride,
                  'payment_type'=>$bookdt->payment_type,
                  'payment_status'=>$bookdt->payment_status,
                  'payment_date'=>$bookdt->payment_date,
                  'paid_amount'=>$bookdt->total_fare,
                  'reference_id'=>$bookdt->reference_id,
                  'total_fare'=>$bookdt->total_fare,
                  'started_at'=>$bookdt->started_at,
                  'refund_status'=>0,
          
                  'status'=>4,
                  
              ]);
                      
              rides_booking::where('id',$tr->id)->update([
                            
              'status'=>4,                  
          
                ]);
          
                active_driver::where('dr_id',$tr->driver_id)->update([
                             
                  'ride_status'=>0,
                  
                  ]);
                  
       $factory = (new Factory)
    ->withServiceAccount('giro-kab-firebase-adminsdk-brdyq-fd547decdf.json')
    ->withDatabaseUri('https://giro-kab-default-rtdb.asia-southeast1.firebasedatabase.app/');
    $database = $factory->createDatabase();
                  
        $tb="new_bookings";
         $postData=[

          'status'=>4,

        ];
        $key=$tr->id;
    
    $database->getReference($tb.'/'.$key)->update($postData);       
                              
               
        }
    }
}
