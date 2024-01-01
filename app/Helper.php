<?php
namespace App;
use Config;
use DB;

class Helper{
    public static function DB(){
        Helper::newconnect();
        return DB::connection('newcon');
    }

    public static function newconnect(){

        /*
        Server: 45.122.221.138
User: ebizz2
Pass: 123456abc@
Database: EBIZZ_NEW
        $db = [
          'driver' => 'sqlsrv',
          'host' => 'online.e-biz.com.vn',
          'port' => '2011',
          'database' => 'questek',
          'username' => 'questekview',
          'password' => 'kb@123.vn#$'
        ];



        Data Source= 115.84.182.182,2011;Initial Catalog= questek; uid=questekview201905; password=kb@123.vn#$;
        */
        // $db = [
        //   'driver' => 'sqlsrv',
        //   'host' => '115.84.182.182',
        //   'port' => '2011',
        //   'database' => 'questek',
        //   'username' => 'questekview201905',
        //   'password' => 'kb@123.vn#$'
        // ];

        $db = [
            'driver' => 'sqlsrv',
            'host' => '115.84.182.182',
            'port' => '2011',
            'database' => 'questek',
            'username' => 'questekview201905',
            'password' => 'kb@123.vn#$'
        ];


        config(['database.connections.newcon' =>$db]);
    }

    public static function pushAll($content) {

        $fields = array(
            'app_id' => "5be62bb7-8e7b-4191-9665-9dcc36bf1368",
            'included_segments' => array(
                'All'
            ),
            'data' => array(
                "app" => "kbvmember"
            ),
            'contents' => $content,
        );

        // $fields = json_encode($fields);
        // print("\nJSON sent:\n");
        // print($fields);

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json; charset=utf-8',
        //     'Authorization: Basic YjA1Yjk0ZTQtZTQ3Yy00MWI5LTk1ZDYtNDRhNzFjYTExYmRi'
        // ));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, FALSE);
        // curl_setopt($ch, CURLOPT_POST, TRUE);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}

?>
