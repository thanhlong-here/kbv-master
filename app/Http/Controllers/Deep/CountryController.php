<?php
namespace App\Http\Controllers\Deep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Basic\Sys\Country;
use App\Basic\Sys\City;

class CountryController extends Controller
{
    protected $json = [
      'name'      =>  'http://country.io/names.json',
      'iso'       =>  'http://country.io/iso3.json',
      'capital'   =>  'http://country.io/capital.json',
      'phone'     =>  'http://country.io/phone.json',
      'currency'  =>  'http://country.io/currency.json'
    ];

    public function index(){
        $countries  = Country::all()->sortBy('name');
        return view('deep.country',compact('countries'));
    }
    public function cities(Request $req){
        $country  = Country::where('code',$req->country)->first();
        $cities   = $this->_cities($req->country)->get();
    
        if(!$cities->count()){
            $cities = $this->sync_cities($req->country)->get();
        }
        return view('deep.city',compact('cities','country'));
    }

//POST
    public function sync(Request $req){

        Country::truncate();
        $names  = $this->json( 'name' );
        $isos   = $this->json( 'iso' );

        $caps   = $this->json( 'capital' );
        $phones = $this->json( 'phone' );
        $crs    = $this->json( 'currency' );

        foreach ($names as $key => $value) {
            $ct = new Country;
            $ct->name   = $value;
            $ct->code   = $key;

            $ct->iso         = $isos[ $key ];
            $ct->capital     = $caps[ $key ];
            $ct->phone       = $phones[ $key ];
            $ct->currency    = $crs[ $key ];
            $ct->save();
        };
        return $this->s( 'Đồng bộ thành công!!!' );

    }

    function json( $code )
    {
        $json = file_get_contents($this->json[$code]);

        return json_decode($json,true);
    }

    function json_cities($country){
      $f  = __DIR__.'/json//'.strtolower($country).'_cities.json';
      $json = file_get_contents($f);
      return $json ? json_decode($json, true) : null;
    }
    function _cities($country){
        return City::where('country',$country);
    }
    function sync_cities($country)
    {
        $cs  = $this->json_cities($country);
        if(!$cs) return;
        foreach ($cs as $c) {
            $city = new City;
            $city->postcode = $c['postcode'];
            $city->name = $c['name'];
            $city->country = $c['country'];
            $city->save();
        }
        return $this->_cities( $country );
    }
}
