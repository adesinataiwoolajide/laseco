<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{EnumeratorData, Log, HouseHoldInfomation, HouseHoldName, HouseHoldLiving, HouseHoldAsset};
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataToday = EnumeratorData::whereDate('created_at', date('Y-m-d'))->get();
        $dataMonth = EnumeratorData::whereMonth('created_at', date('m'))->get();
        $lga =  DB::table('house_hold_infomations')->select('lga')->groupBy('lga')->get();
        $ward =  DB::table('house_hold_infomations')->select('ward')->groupBy('ward')->get();
        $zone =  DB::table('house_hold_infomations')->select('zone')->groupBy('zone')->get();
        $houseHold =  DB::table('house_hold_infomations')->select('hhno')->groupBy('hhno')->get();
        $enumerator =  DB::table('enumerator_datas')->select('enumerator_code')->groupBy('enumerator_code')->get();
        $community =  DB::table('enumerator_datas')->select('community')->groupBy('community')->get();
        $data = EnumeratorData::distinct('enumerator_code')->get();
        // $data =DB::table('enumerator_datas')->select('enumerator_code', 'enumerator_name' , 'lga', 'ward', 'state', 'cbt_leader', 'sim_serial', 'subscriber_id', 'community')->groupBy('enumerator_code')->get();
        // dd($data);

        return view('dashboard.index')->with([
            'data' => $data, 'dataMonth' => $dataMonth, 'lga' => $lga, 'community' => $community,
            'dataToday' => $dataToday, 'houseHold' =>$houseHold, 'enumerator' => $enumerator,
            'zone' => $zone, 'ward' => $ward
        ]);
    }
}
