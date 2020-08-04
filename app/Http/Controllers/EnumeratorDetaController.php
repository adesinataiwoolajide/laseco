<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\{EnumeratorData, Log, HouseHoldInfomation, HouseHoldName, HouseHoldLiving, HouseHoldAsset};
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class EnumeratorDetaController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Administrator|Admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $directory = public_path('fresh');
        $files = array_diff(scandir($directory), array('..', '.'));
        foreach($files as $filename) {
            $xml_file = file_get_contents($directory.'/'.$filename, FILE_TEXT);
            $xml = simplexml_load_string($xml_file, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array[] = json_decode($json,TRUE);
            $data = new EnumeratorData ([
                'uuid' => $xml->formhub->uuid,

                'sim_serial' => $xml->simserial,
                'subscriber_id' => $xml->subscriberid,
                'device_id' => $xml->deviceid, 'phone_number' => $xml->phonenumber,
                'enumerator_name'  => $xml->enumeratorname,
                'enumerator_code' => $xml->enumeratorcode,
                'cbt_leader' => $xml->cbtleader, 'cbt_leader_code' => $xml->cbtleadercode,
                'state' => $xml->state,
                'community' => $xml->community,

            ]);
            //Geopoint, Start and End Date
            if(HouseHoldInfomation::where(['geopoint' => $xml->Please_take_geopoint_of_household, 'start_time' => $xml->start, 'end_time' => $xml->end])->exists()){

            }else{
                // CHeck Enumerator Code

                if(EnumeratorData::where(['enumerator_code' => $xml->enumeratorcode])->exists()){
                    // Insert Into Other Tables
                    $details = EnumeratorData::where(['enumerator_code' => $xml->enumeratorcode])->first();
                    $data_id = $details->data_id;
                    $enumerator_code = $xml->enumeratorcode;

                        $houseHold = new HouseHoldInfomation ([
                            'data_id' => $data_id, 'enumerator_code' => $enumerator_code,
                            'urban_rural' => $xml->urbanrural,
                            'hhno' =>  $xml->hhno, 'consent' =>  $xml->consent,
                            'hhh_surname' => $xml->consentee->headofhh->hhh_surname ? $xml->consentee->headofhh->hhh_surname : '',
                            'hhh_firstname'  => $xml->consentee->headofhh->hhh_firstname,
                            'hhh_othername'  => $xml->consentee->headofhh->hhh_othername,
                            'hhh_image' => $xml->consentee->headofhh->hhh_image, 'contact_no' => $xml->consentee->contactno,
                            'altno' => $xml->consentee->altno, 'hhaddress' => $xml->consentee->hhaddress,
                            'interviewdate' => $xml->consentee->interviewdate,'hhsize' => $xml->consentee->hhsize,
                            'HouseholdRoster_count' => $xml->consentee->HouseholdRoster_count,
                            'note_hhroster' => $xml->consentee->HouseholdRoster->note_hhroster,
                            'position' => $xml->consentee->HouseholdRoster->position,
                            'roster_index' => $xml->consentee->HouseholdRoster->head_group->roster_index,
                            'geopoint' =>  $xml->Please_take_geopoint_of_household,
                            'start_time' => $xml->start,
                            'end_time' => $xml->end, 'zone' =>  $xml->zone,
                            'lga' => $xml->lga, 'ward' => $xml->ward,

                        ]);

                        $houseHold->save();

                        if($xml->consentee->HouseholdRoster->head_group->head_hasphonno == 1){
                            $head_telephone_no = $xml->consentee->HouseholdRoster->head_group->head_telephoneno;
                        }else{
                            $head_telephone_no = ' ';
                        }
                        if($xml->consentee->HouseholdRoster->head_group->head_sex == 2){
                            $pregnant = $xml->consentee->HouseholdRoster->head_group->head_health->head_pregnant;
                            $lact = $xml->consentee->HouseholdRoster->head_group->head_health->head_lactating;
                        }else{
                            $pregnant = ' ';
                            $lact = ' ';
                        }
                        $houseHoldName = new HouseHoldName([
                            'data_id'=> $data_id, 'enumerator_code' => $enumerator_code,
                            'name' => $xml->consentee->HouseholdRoster->head_group->name,
                            'head_name' => $xml->consentee->HouseholdRoster->head_group->head_name,
                            'head_sex' => $xml->consentee->HouseholdRoster->head_group->head_sex,
                            'head_dob' =>$xml->consentee->HouseholdRoster->head_group->head_dob,
                            'head_age_hhm' => $xml->consentee->HouseholdRoster->head_group->head_age_hhm,
                            'head_int_age' => $xml->consentee->HouseholdRoster->head_group->head_int_age,
                            'head_a4age' => $xml->consentee->HouseholdRoster->head_group->head_age->head_a4age,
                            'head_agey' => $xml->consentee->HouseholdRoster->head_group->head_age->head_agey,
                            'head_nin' => $xml->consentee->HouseholdRoster->head_group->head_nin,
                            'head_bvn' => $xml->consentee->HouseholdRoster->head_group->head_bvn,
                            'head_relationship' => $xml->consentee->HouseholdRoster->head_group->relationship,
                            'head_marritalstatus' => $xml->consentee->HouseholdRoster->head_group->marritalstatus,
                            'HouseholdRoster_count' => $xml->consentee->HouseholdRoster_count,
                            'head_hasphonno' => $xml->consentee->HouseholdRoster->head_group->head_hasphonno,
                            'head_telephone_no' => $head_telephone_no,
                            'B_Household_head_Labour_rs_5_years_and_above' => $xml->consentee->HouseholdRoster->head_group->B_Household_Labour_rs_5_years_and_above,
                            'head_b2labour' => $xml->consentee->HouseholdRoster->head_group->b2labour,
                            'head_b3labour' => $xml->consentee->HouseholdRoster->head_group->b3labour,
                            'head_b4labour' =>  $xml->consentee->HouseholdRoster->head_group->b4labour,
                            'head_b5labour' => $xml->consentee->HouseholdRoster->head_group->b5labour,
                            'head_disability_information' => $xml->consentee->HouseholdRoster->head_group->C_Household_members_sability_information,
                            'head_educationalqualification' => $xml->consentee->HouseholdRoster->head_group->educationalqualification,
                            'head_currentlyenrolledinschl' => $xml->consentee->HouseholdRoster->head_group->currentlyenrolledinschl,
                            'head_healthintro' => $xml->consentee->HouseholdRoster->head_group->head_health->healthintro,

                            'head_pregnant' => $pregnant,
                            'head_lactating' => $lact,

                            'head_benefitfromhealthcare' => $xml->consentee->HouseholdRoster->head_group->head_health->benefitfromhealthcare,
                            'head_chronicallyill' => $xml->consentee->HouseholdRoster->head_group->head_health->chronicallyill,
                            'head_disability' => $xml->consentee->HouseholdRoster->head_group->head_health->disability,
                            'head_note_socialnetwork' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->head_note_socialnetwork,
                            'head_cooperative' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->cooperative,
                            'head_religiousgroup' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->religiousgroup,
                            'head_businessgroup' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->businessgroup,
                            'head_agegroup' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->agegroup,
                            'head_othergorup' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->othergorup
                        ]);

                        $houseHoldName->save();
                        $houseHoldLiving  =  new HouseHoldLiving([
                            'data_id'=> $data_id, 'enumerator_code' => $enumerator_code,
                            'hh_living' =>$xml->consentee->own_hhitem,
                            'roof_dwelling' =>  $xml->consentee->roof_dwelling, 'floor_dwelling' => $xml->consentee->floor_dwelling,
                            'light_dwelling' => $xml->consentee->light_dwelling, 'cook_dwelling' => $xml->consentee->cook_dwelling,
                            'drink_dwelling' => $xml->consentee->drink_dwelling, 'toilet_dwelling' => $xml->consentee->toilet_dwelling,
                            'num_room' => $xml->consentee->num_room
                        ]);

                        $houseHoldLiving->save();

                        $houseHoldAsset = new HouseHoldAsset([
                            'data_id'=> $data_id,
                            'enumerator_code' => $enumerator_code,
                            'own_hhitem' => $xml->consentee->own_hhitem,
                            'note_hhasset' => $xml->consentee->householdassetgroup->note_hhasset,
                            'radio' => $xml->consentee->householdassetgroup->radio, 'touchlight' =>$xml->consentee->householdassetgroup->touchlight,
                            'kerosenestove' => $xml->consentee->householdassetgroup->kerosenestove, 'television' => $xml->consentee->householdassetgroup->television,
                            'mobilephone' => $xml->consentee->householdassetgroup->mobilephone, 'landphone' => $xml->consentee->householdassetgroup->landphone,
                            'housecurrent' => $xml->consentee->householdassetgroup->housecurrent, 'houseelsewhere' => $xml->consentee->householdassetgroup->houseelsewhere,
                            'landforhousing' =>  $xml->consentee->householdassetgroup->landforhousing, 'farmland' => $xml->consentee->householdassetgroup->farmland,
                            'bird' => $xml->consentee->householdassetgroup->bird, 'goat' => $xml->consentee->householdassetgroup->goat,
                            'cattle' =>  $xml->consentee->householdassetgroup->cattle, 'bicycle' => $xml->consentee->householdassetgroup->bicycle,
                            'motocycle' => $xml->consentee->householdassetgroup->motocycle, 'car' => $xml->consentee->householdassetgroup->car,
                            'canoe' => $xml->consentee->householdassetgroup->canoe,
                            'boat' => $xml->consentee->householdassetgroup->boat, 'video_dvd' => $xml->consentee->householdassetgroup->video_dvd,
                            'generator' => $xml->consentee->householdassetgroup->generator, 'iron_electric' => $xml->consentee->householdassetgroup->iron_electric,
                            'iron_charcoal' =>$xml->consentee->householdassetgroup->iron_charcoal, 'fan' => $xml->consentee->householdassetgroup->fan,
                            'air_conditioner' => $xml->consentee->householdassetgroup->air_conditioner, 'refrigerator' => $xml->consentee->householdassetgroup->refrigerator,
                            'freezer' => $xml->consentee->householdassetgroup->freezer, 'furniture_sofa' => $xml->consentee->householdassetgroup->furniture_sofa,
                            'furniture_table' => $xml->consentee->householdassetgroup->furniture_table, 'hifi' => $xml->consentee->householdassetgroup->hifi,
                            'mattress' => $xml->consentee->householdassetgroup->mattress, 'bed' => $xml->consentee->householdassetgroup->bed,
                            'computer' => $xml->consentee->householdassetgroup->computer, 'wash_machine' =>$xml->consentee->householdassetgroup->wash_machine,
                            'radio_num' => $xml->consentee->radio_num, 'touchlight_num' => $xml->consentee->touchlight_num,
                            'mobilephone_num' => $xml->consentee->mobilephone_num, 'housecurrent_num' => $xml->consentee->housecurrent_num

                        ]);

                        $houseHoldAsset->save();
                }else{
                    if($data->save()){
                        $data_id = $data->data_id;
                        $enumerator_code = $xml->enumeratorcode;

                        $houseHold = new HouseHoldInfomation ([
                            'data_id' => $data_id, 'enumerator_code' => $enumerator_code,
                            'urban_rural' => $xml->urbanrural,
                            'hhno' =>  $xml->hhno, 'consent' =>  $xml->consent,
                            'hhh_surname' => $xml->consentee->headofhh->hhh_surname, 'hhh_firstname'  => $xml->consentee->headofhh->hhh_firstname,
                            'hhh_othername'  => $xml->consentee->headofhh->hhh_othername,
                            'hhh_image' => $xml->consentee->headofhh->hhh_image, 'contact_no' => $xml->consentee->contactno,
                            'altno' => $xml->consentee->altno, 'hhaddress' => $xml->consentee->hhaddress,
                            'interviewdate' => $xml->consentee->interviewdate,'hhsize' => $xml->consentee->hhsize,
                            'HouseholdRoster_count' => $xml->consentee->HouseholdRoster_count,
                            'note_hhroster' => $xml->consentee->HouseholdRoster->note_hhroster,
                            'position' => $xml->consentee->HouseholdRoster->position,
                            'roster_index' => $xml->consentee->HouseholdRoster->head_group->roster_index,
                            'geopoint' =>  $xml->Please_take_geopoint_of_household,
                            'start_time' => $xml->start,
                            'end_time' => $xml->end, 'zone' =>  $xml->zone,
                            'lga' => $xml->lga, 'ward' => $xml->ward,

                        ]);

                        $houseHold->save();

                        if($xml->consentee->HouseholdRoster->head_group->head_hasphonno == 1){
                            $head_telephone_no = $xml->consentee->HouseholdRoster->head_group->head_telephoneno;
                        }else{
                            $head_telephone_no = ' ';
                        }
                        if($xml->consentee->HouseholdRoster->head_group->head_sex == 2){
                            $pregnant = $xml->consentee->HouseholdRoster->head_group->head_health->head_pregnant;
                            $lact = $xml->consentee->HouseholdRoster->head_group->head_health->head_lactating;
                        }else{
                            $pregnant = ' ';
                            $lact = ' ';
                        }
                        $houseHoldName = new HouseHoldName([
                            'data_id'=> $data_id, 'enumerator_code' => $enumerator_code,
                            'name' => $xml->consentee->HouseholdRoster->head_group->name,
                            'head_name' => $xml->consentee->HouseholdRoster->head_group->head_name,
                            'head_sex' => $xml->consentee->HouseholdRoster->head_group->head_sex,
                            'head_dob' =>$xml->consentee->HouseholdRoster->head_group->head_dob,
                            'head_age_hhm' => $xml->consentee->HouseholdRoster->head_group->head_age_hhm,
                            'head_int_age' => $xml->consentee->HouseholdRoster->head_group->head_int_age,
                            'head_a4age' => $xml->consentee->HouseholdRoster->head_group->head_age->head_a4age,
                            'head_agey' => $xml->consentee->HouseholdRoster->head_group->head_age->head_agey,
                            'head_nin' => $xml->consentee->HouseholdRoster->head_group->head_nin,
                            'head_bvn' => $xml->consentee->HouseholdRoster->head_group->head_bvn,
                            'head_relationship' => $xml->consentee->HouseholdRoster->head_group->relationship,
                            'head_marritalstatus' => $xml->consentee->HouseholdRoster->head_group->marritalstatus,
                            'HouseholdRoster_count' => $xml->consentee->HouseholdRoster_count,
                            'head_hasphonno' => $xml->consentee->HouseholdRoster->head_group->head_hasphonno,
                            'head_telephone_no' => $head_telephone_no,
                            'B_Household_head_Labour_rs_5_years_and_above' => $xml->consentee->HouseholdRoster->head_group->B_Household_Labour_rs_5_years_and_above,
                            'head_b2labour' => $xml->consentee->HouseholdRoster->head_group->b2labour,
                            'head_b3labour' => $xml->consentee->HouseholdRoster->head_group->b3labour,
                            'head_b4labour' =>  $xml->consentee->HouseholdRoster->head_group->b4labour,
                            'head_b5labour' => $xml->consentee->HouseholdRoster->head_group->b5labour,
                            'head_disability_information' => $xml->consentee->HouseholdRoster->head_group->C_Household_members_sability_information,
                            'head_educationalqualification' => $xml->consentee->HouseholdRoster->head_group->educationalqualification,
                            'head_currentlyenrolledinschl' => $xml->consentee->HouseholdRoster->head_group->currentlyenrolledinschl,
                            'head_healthintro' => $xml->consentee->HouseholdRoster->head_group->head_health->healthintro,

                            'head_pregnant' => $pregnant,
                            'head_lactating' => $lact,

                            'head_benefitfromhealthcare' => $xml->consentee->HouseholdRoster->head_group->head_health->benefitfromhealthcare,
                            'head_chronicallyill' => $xml->consentee->HouseholdRoster->head_group->head_health->chronicallyill,
                            'head_disability' => $xml->consentee->HouseholdRoster->head_group->head_health->disability,
                            'head_note_socialnetwork' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->head_note_socialnetwork,
                            'head_cooperative' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->cooperative,
                            'head_religiousgroup' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->religiousgroup,
                            'head_businessgroup' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->businessgroup,
                            'head_agegroup' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->agegroup,
                            'head_othergorup' => $xml->consentee->HouseholdRoster->head_group->head_socialnetwork->othergorup
                        ]);

                        $houseHoldName->save();

                        $houseHoldLiving  =  new HouseHoldLiving([
                            'data_id'=> $data_id, 'enumerator_code' => $enumerator_code,
                            'hh_living' =>$xml->consentee->own_hhitem,
                            'roof_dwelling' =>  $xml->consentee->roof_dwelling, 'floor_dwelling' => $xml->consentee->floor_dwelling,
                            'light_dwelling' => $xml->consentee->light_dwelling, 'cook_dwelling' => $xml->consentee->cook_dwelling,
                            'drink_dwelling' => $xml->consentee->drink_dwelling, 'toilet_dwelling' => $xml->consentee->toilet_dwelling,
                            'num_room' => $xml->consentee->num_room
                        ]);

                        $houseHoldLiving->save();

                        $houseHoldAsset = new HouseHoldAsset([
                            'data_id'=> $data_id,
                            'enumerator_code' => $enumerator_code,
                            'own_hhitem' => $xml->consentee->own_hhitem,
                            'note_hhasset' => $xml->consentee->householdassetgroup->note_hhasset,
                            'radio' => $xml->consentee->householdassetgroup->radio, 'touchlight' =>$xml->consentee->householdassetgroup->touchlight,
                            'kerosenestove' => $xml->consentee->householdassetgroup->kerosenestove, 'television' => $xml->consentee->householdassetgroup->television,
                            'mobilephone' => $xml->consentee->householdassetgroup->mobilephone, 'landphone' => $xml->consentee->householdassetgroup->landphone,
                            'housecurrent' => $xml->consentee->householdassetgroup->housecurrent, 'houseelsewhere' => $xml->consentee->householdassetgroup->houseelsewhere,
                            'landforhousing' =>  $xml->consentee->householdassetgroup->landforhousing, 'farmland' => $xml->consentee->householdassetgroup->farmland,
                            'bird' => $xml->consentee->householdassetgroup->bird, 'goat' => $xml->consentee->householdassetgroup->goat,
                            'cattle' =>  $xml->consentee->householdassetgroup->cattle, 'bicycle' => $xml->consentee->householdassetgroup->bicycle,
                            'motocycle' => $xml->consentee->householdassetgroup->motocycle, 'car' => $xml->consentee->householdassetgroup->car,
                            'canoe' => $xml->consentee->householdassetgroup->canoe,
                            'boat' => $xml->consentee->householdassetgroup->boat, 'video_dvd' => $xml->consentee->householdassetgroup->video_dvd,
                            'generator' => $xml->consentee->householdassetgroup->generator, 'iron_electric' => $xml->consentee->householdassetgroup->iron_electric,
                            'iron_charcoal' =>$xml->consentee->householdassetgroup->iron_charcoal, 'fan' => $xml->consentee->householdassetgroup->fan,
                            'air_conditioner' => $xml->consentee->householdassetgroup->air_conditioner, 'refrigerator' => $xml->consentee->householdassetgroup->refrigerator,
                            'freezer' => $xml->consentee->householdassetgroup->freezer, 'furniture_sofa' => $xml->consentee->householdassetgroup->furniture_sofa,
                            'furniture_table' => $xml->consentee->householdassetgroup->furniture_table, 'hifi' => $xml->consentee->householdassetgroup->hifi,
                            'mattress' => $xml->consentee->householdassetgroup->mattress, 'bed' => $xml->consentee->householdassetgroup->bed,
                            'computer' => $xml->consentee->householdassetgroup->computer, 'wash_machine' =>$xml->consentee->householdassetgroup->wash_machine,
                            'radio_num' => $xml->consentee->radio_num, 'touchlight_num' => $xml->consentee->touchlight_num,
                            'mobilephone_num' => $xml->consentee->mobilephone_num, 'housecurrent_num' => $xml->consentee->housecurrent_num

                        ]);

                        $houseHoldAsset->save();

                    }
                }
            }

        }
        // dd($array);
        return view('dashboard.index')->with(['success' => 'File Uploaded Successfully']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data($enumerator_code)
    {
        $houseHoldName =  HouseHoldName::where('enumerator_code', $enumerator_code)->get();
        $houseHoldAsset = HouseHoldAsset::where('enumerator_code', $enumerator_code)->get();
        $houseHoldLiving = HouseHoldLiving::where('enumerator_code', $enumerator_code)->get();
        $houseHoldInfo = HouseHoldInfomation::where('enumerator_code', $enumerator_code)->get();
        $enumerator= EnumeratorData::where('enumerator_code', $enumerator_code)->first();
        $zone=  HouseHoldInfomation::where('enumerator_code', $enumerator_code)->select('zone')->groupBy('zone')->get();
        $lga =   HouseHoldInfomation::where('enumerator_code', $enumerator_code)->select('lga')->groupBy('lga')->get();
        $ward =   HouseHoldInfomation::where('enumerator_code', $enumerator_code)->select('ward')->groupBy('ward')->get();

        return view('dashboard.emumerators.index')->with([
            'houseHoldName' => $houseHoldName, 'houseHoldAsset' => $houseHoldAsset, 'enumerator_code' => $enumerator_code,
            'houseHoldLiving' => $houseHoldLiving, 'houseHoldInfo' => $houseHoldInfo, 'enumerator' => $enumerator, 'zone' => $zone,
            'ward' => $ward, 'lga' => $lga
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('Administrator')) {

            $this->validate($request, [
                'file' => ['required']
            ]);


            if($request->hasFile('file')) {

                $file = $request->file;
                $path = public_path($file);
                $files = scandir($path);
                dd($files);

                // foreach ($file as $files) {
                //     // $filenameWithExt = $files->getClientOriginalName();
                //     // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //     // $extension = $files->getClientOriginalExtension();

                //     dd($files);


                // }

            }

            $directory = public_path('xml');
            $files = array_diff(scandir($directory), array('..', '.'));
            foreach($files as $filename) {
                $xml_file = file_get_contents($directory.'/'.$filename, FILE_TEXT);
                $xml = simplexml_load_string($xml_file, "SimpleXMLElement", LIBXML_NOCDATA);
                $json = json_encode($xml);
                $array[] = json_decode($json,TRUE);

                echo $xml->consentee->hhaddress. '<br>';


            }
            dd($array);

        } else {
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A User",
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EnumeratorDeta  $enumeratorDeta
     * @return \Illuminate\Http\Response
     */
    public function show(EnumeratorDeta $enumeratorDeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EnumeratorDeta  $enumeratorDeta
     * @return \Illuminate\Http\Response
     */
    public function edit(EnumeratorDeta $enumeratorDeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EnumeratorDeta  $enumeratorDeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnumeratorDeta $enumeratorDeta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EnumeratorDeta  $enumeratorDeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnumeratorDeta $enumeratorDeta)
    {
        //
    }
}
