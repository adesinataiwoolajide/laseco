<?php

namespace App\Http\Controllers;

use App\HouseHoldAsset;
use Illuminate\Http\Request;
use DB;
class HouseHoldAssetController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function appliances()
    {
        $haveRadio = HouseHoldAsset::where('radio', 1)->count();
        $noRadio = HouseHoldAsset::where('radio', 0)->count();

        $haveTele = HouseHoldAsset::where('television', 1)->count();
        $noTele = HouseHoldAsset::where('television', 0)->count();

        $fan = HouseHoldAsset::where(['fan' => 0])->count();
        $ac = HouseHoldAsset::where(['air_conditioner' => 0])->count();

        $eIron = HouseHoldAsset::where(['iron_electric' => 0])->count();
        $cIron = HouseHoldAsset::where(['iron_charcoal' => 0])->count();

        $refrigerator = HouseHoldAsset::where(['refrigerator' => 0])->count();
        $freezer = HouseHoldAsset::where(['freezer' => 0])->count();
        $computer = HouseHoldAsset::where(['computer' => 0])->count();
        $washing = HouseHoldAsset::where(['wash_machine' => 0])->count();
        $generator = HouseHoldAsset::where(['generator' => 0])->count();
        $sofa = HouseHoldAsset::where(['furniture_sofa' => 0])->count();
        $table = HouseHoldAsset::where(['furniture_table' => 0])->count();
        $bed = HouseHoldAsset::where(['bed' => 0])->count();
        $mat = HouseHoldAsset::where(['mattress' => 0])->count();
        return view('dashboard.appliances.index')->with([
            'haveRadio' => $haveRadio, 'noRadio' => $noRadio, 'haveTele' => $haveTele, 'noTele' => $noTele,
            'fan' => $fan, 'ac' => $ac, 'eIron' => $eIron, 'cIron' => $cIron, 'refrigerator' => $refrigerator,
            'freezer' => $freezer, 'computer' => $computer, 'washing' => $washing, 'generator' => $generator,
            'sofa' => $sofa , 'table' => $table, 'bed' => $bed, 'mat' => $mat
        ]);
    }

    public function others()
    {
        $car = HouseHoldAsset::where('car', 0)->count();
        $motorcycle = HouseHoldAsset::where('motocycle', 0)->count();
        $canoe = HouseHoldAsset::where('canoe', 0)->count();
        $bicycle = HouseHoldAsset::where('bicycle', 0)->count();
        $boat = HouseHoldAsset::where(['boat' => 0])->count();
        $cattle = HouseHoldAsset::where(['cattle' => 0])->count();
        $goat = HouseHoldAsset::where(['goat' => 0])->count();
        $bird = HouseHoldAsset::where(['bird' => 0])->count();
        $housecurrent = HouseHoldAsset::where(['housecurrent' => 0])->count();
        $houseelsewhere = HouseHoldAsset::where(['houseelsewhere' => 0])->count();
        $landforhousing = HouseHoldAsset::where(['landforhousing' => 0])->count();
        $farmland = HouseHoldAsset::where(['farmland' => 0])->count();
        $landphone = HouseHoldAsset::where(['landphone' => 0])->count();
        $mobilephone = HouseHoldAsset::where(['mobilephone' => 0])->count();

        $kerosene = HouseHoldAsset::where(['kerosenestove' => 0])->count();
        $touchlight = HouseHoldAsset::where(['touchlight' => 0])->count();
        $dvd = HouseHoldAsset::where(['video_dvd' => 0])->count();


        return view('dashboard.appliances.others')->with([
            'car' => $car, 'motorcycle' => $motorcycle, 'canoe' => $canoe, 'bicycle' => $bicycle,
            'boat' => $boat, 'cattle' => $cattle, 'goat' => $goat, 'bird' => $bird, 'housecurrent' => $housecurrent,
            'houseelsewhere' => $houseelsewhere, 'landforhousing' => $landforhousing, 'farmland' => $farmland, 'landphone' => $landphone,
            'mobilephone' => $mobilephone, 'kerosene' => $kerosene , 'touchlight' => $touchlight, 'dvd' => $dvd
        ]);
    }

    public function computer()
    {
        $computer = HouseHoldAsset::where(['computer' => 0])->get();
        if(count($computer) > 0){
            return view('dashboard.data.computer-owners')->with([
                'computer' => $computer,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }


    public function generator()
    {
        $generator = HouseHoldAsset::where(['generator' => 0])->get();
        if(count($generator) > 0){
            return view('dashboard.data.generators')->with([
                'generator' => $generator,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function washing()
    {
        $washing = HouseHoldAsset::where(['wash_machine' => 00])->get();
        if(count($washing) > 0){
            return view('dashboard.data.washing-machine')->with([
                'washing' => $washing,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }


    public function bed()
    {
        $bed = HouseHoldAsset::where(['bed' => 0])->get();
        if(count($bed) > 0){
            return view('dashboard.data.bed')->with([
                'bed' => $bed,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function mat()
    {
        $mat = HouseHoldAsset::where(['mattress' => 0])->get();
        if(count($mat) > 0){
            return view('dashboard.data.mat')->with([
                'mat' => $mat,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function sofa()
    {
        $sofa = HouseHoldAsset::where(['furniture_sofa' => 0])->get();
        if(count($sofa) > 0){
            return view('dashboard.data.sofa')->with([
                'sofa' => $sofa,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function table()
    {
        $table = HouseHoldAsset::where(['furniture_table' => 0])->get();
        if(count($table) > 0){
            return view('dashboard.data.table')->with([
                'table' => $table,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function fan()
    {
        $fan = HouseHoldAsset::where(['fan' =>00])->get();
        if(count($fan) > 0){
            return view('dashboard.data.fan')->with([
                'fan' => $fan,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function air_conditioner()
    {
        $air_conditioner = HouseHoldAsset::where(['air_conditioner' => 0])->get();
        if(count($air_conditioner) > 0){
            return view('dashboard.data.air_conditioner')->with([
                'air_conditioner' => $air_conditioner,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function electricIron()
    {
        $eIron = HouseHoldAsset::where(['iron_electric' => 0])->get();
        if(count($eIron) > 0){
            return view('dashboard.data.eIron')->with([
                'eIron' => $eIron,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function charIron()
    {
        $cIron = HouseHoldAsset::where(['iron_charcoal' => 0])->get();
        if(count($cIron) > 0){
            return view('dashboard.data.eCoal')->with([
                'cIron' => $cIron,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function refrigerator()
    {
        $refrigerator = HouseHoldAsset::where(['refrigerator' => 0])->get();
        if(count($refrigerator) > 0){
            return view('dashboard.data.refrigerator')->with([
                'refrigerator' => $refrigerator,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function freezer()
    {
        $freezer = HouseHoldAsset::where(['freezer' => 0])->get();
        if(count($freezer) > 0){
            return view('dashboard.data.freezer')->with([
                'freezer' => $freezer,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function radio()
    {
        $radio = HouseHoldAsset::where(['radio' => 0])->get();
        if(count($radio) > 0){
            return view('dashboard.data.radio')->with([
                'radio' => $radio,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }

    public function television()
    {
        $freezer = HouseHoldAsset::where(['television' => 0])->get();
        if(count($freezer) > 0){
            return view('dashboard.data.television')->with([
                'television' => $television,
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "The list is empty",
            ]);
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HouseHoldAsset  $houseHoldAsset
     * @return \Illuminate\Http\Response
     */
    public function show(HouseHoldAsset $houseHoldAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HouseHoldAsset  $houseHoldAsset
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseHoldAsset $houseHoldAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HouseHoldAsset  $houseHoldAsset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseHoldAsset $houseHoldAsset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HouseHoldAsset  $houseHoldAsset
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseHoldAsset $houseHoldAsset)
    {
        //
    }
}
