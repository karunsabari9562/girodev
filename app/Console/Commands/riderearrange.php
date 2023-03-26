<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\unfinished_bookings;
use App\Models\rides_booking;
use App\Models\active_driver;
use Kreait\Firebase\Factory;
use App\Models\ride_booking_history;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\ServiceAccount;

class riderearrange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ride:rearrange';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'rearrange completed & unfinished rides';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $dt=date('Y-m-d');

        $trides=DB::table('rides_bookings')->where('booked_date','<',$dt)->where('status',6)->get();

        foreach ($trides as $tr)
         {
            ride_booking_history::updateOrCreate([

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

            'fare'=>$tr->fare,
            'tax'=>$tr->tax,
            'total_fare'=>$tr->total_fare,
            'service_charge'=>$tr->service_charge,
            'night_ride'=>$tr->night_ride,

            'extra_ride_fee'=>$tr->extra_ride_fee,
            'waiting_charge'=>$tr->waiting_charge,

            'driver_percent'=>$tr->driver_percent,
            'driver_fare'=>$tr->driver_fare,
            'tax_percent'=>$tr->tax_percent,
            'franchise_percent'=>$tr->franchise_percent,
            'franchise_fare'=>$tr->franchise_fare,
            'admin_fare'=>$tr->admin_fare,
            'admin_ride_fare'=>$tr->admin_ride_fare,

            'payment_type'=>$tr->payment_type,
            'payment_status'=>$tr->payment_status,
            'payment_date'=>$tr->payment_date,
            'paid_amount'=>$tr->total_fare,
            'reference_id'=>$tr->reference_id,

            'status'=>6,

            'reason'=>'',
            'star_rating'=>$tr->star_rating,
            'review'=>$tr->review,
            'started_at'=>$tr->started_at,
            'completed_at'=>$tr->completed_at,

       

        ]);


         rides_booking::where('id',$tr->id)->delete();

               $factory = (new Factory)
    ->withServiceAccount('giro-kab-firebase-adminsdk-brdyq-fd547decdf.json')
    ->withDatabaseUri('https://giro-kab-default-rtdb.asia-southeast1.firebasedatabase.app/');
    $database = $factory->createDatabase();
                  
        $tb="new_bookings";  
              
        $key=$tr->id;
    $database->getReference($tb.'/'.$key)->remove();
          //$database->getReference($tb.'/'.$key)->update($postData); 


         }


         $faildrides=DB::table('rides_bookings')
         ->where('booked_date','<',$dt)
         ->where(function($q) {
                $q->where('status', 2)
                ->orWhere('status', 3)
                ->orWhere('status', 4);
            })
         ->get();

         foreach ($faildrides as $fr)
         {
            unfinished_bookings::updateOrCreate([
                                
                 'bid'   => $fr->id,
                                
                ],
                [   
                    'bid'=>$fr->id,
                    'booking_id'=>"GKB". $fr->id,
                                
                    'customer_id'=>$fr->customer_id,
                    'booked_at'=>$fr->booked_at,
                    'booked_date'=>$fr->booked_date,
                                
                    'from_latitude'=>$fr->from_latitude,
                    'from_longitude'=>$fr->from_longitude,
                    'from_location'=>$fr->from_location,
                                
                    'to_latitude'=>$fr->to_latitude,
                    'to_longitude'=>$fr->to_longitude,
                    'to_location'=>$fr->to_location,
                                
                    'vehicle_type'=>$fr->vehicle_type,
                    'driver_id'=>$fr->driver_id,
                    'franchise'=>$fr->franchise,
                                
                    'distance'=>$fr->distance,
                    'time'=>$fr->time,
                    'fare'=>$fr->fare,
                                
                    'status'=>$fr->status,
                                
                    'reason'=>$fr->reason,
                                            
                                
                                        ]);

            rides_booking::where('id',$fr->id)->delete();

            $factory1 = (new Factory)
    ->withServiceAccount('giro-kab-firebase-adminsdk-brdyq-fd547decdf.json')
    ->withDatabaseUri('https://giro-kab-default-rtdb.asia-southeast1.firebasedatabase.app/');
    $database1 = $factory1->createDatabase();
                  
        $tb1="new_bookings";         
        $key1=$fr->id;
    $database1->getReference($tb1.'/'.$key1)->remove();
         }

         ////////////////////////////////////







    }
}
