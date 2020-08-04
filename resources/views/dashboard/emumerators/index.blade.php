<?php $title =' Enumerator Data' ?>
@extends('layouts.app')
@section('content')
<div class="col-lg-12 mb12">

    <div class="row">
        <div class="col-lg-12">
            <h4 class="mb-4"><strong>{{ $enumerator->enumerator_name . "(" .$enumerator_code . ")" ?? 'N/A' }}</strong></h4>
            <div class="mb-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="air__utils__step air__utils__step--success">
                                    <span class="air__utils__stepDigit">{{ count($houseHoldInfo) ?? 0 }}</span>
                                    <div class="air__utils__stepDesc">
                                        <span class="air__utils__stepTitle">House Hold</span>
                                        <p>Information</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="air__utils__step air__utils__step--primary">
                                    <span class="air__utils__stepDigit">{{ count($lga) ?? 0 }}</span>
                                    <div class="air__utils__stepDesc">
                                        <span class="air__utils__stepTitle">House Hold</span>
                                        <p>LGA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="air__utils__step air__utils__step--danger">
                                    <span class="air__utils__stepDigit">{{ count($zone) ?? 0 }}</span>
                                    <div class="air__utils__stepDesc">
                                        <span class="air__utils__stepTitle">House Hold</span>
                                        <p>Zone</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="air__utils__step air__utils__step--warning ">
                                    <span class="air__utils__stepDigit">{{ count($ward) ?? 0 }}</span>
                                    <div class="air__utils__stepDesc">
                                        <span class="air__utils__stepTitle">House Hold</span>
                                        <p>Ward</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-2">
                                      <div
                                        class="nav flex-column nav-pills"
                                        id="v-pills-tab"
                                        role="tablist"
                                        aria-orientation="vertical"
                                      >

                                        <a
                                          class="nav-link active"
                                          id="v-pills-home-tab"
                                          data-toggle="pill"
                                          href="#v-pills-home"
                                          role="tab"
                                          aria-controls="v-pills-home"
                                          aria-selected="true"
                                          >houseHoldAsset</a
                                        >
                                        <a
                                          class="nav-link "
                                          id="v-pills-settings-tab"
                                          data-toggle="pill"
                                          href="#v-pills-settings"
                                          role="tab"
                                          aria-controls="v-pills-settings"
                                          aria-selected="false"
                                          >houseHoldName</a
                                        >
                                        <a
                                          class="nav-link"
                                          id="v-pills-messages-tab"
                                          data-toggle="pill"
                                          href="#v-pills-messages"
                                          role="tab"
                                          aria-controls="v-pills-messages"
                                          aria-selected="false"
                                          >houseHoldLiving</a
                                        >
                                        <a
                                          class="nav-link"
                                          id="v-pills-profile-tab"
                                          data-toggle="pill"
                                          href="#v-pills-profile"
                                          role="tab"
                                          aria-controls="v-pills-profile"
                                          aria-selected="false"
                                          >houseHoldInfo</a
                                        >


                                      </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div
                                            class="tab-pane fade show active"
                                            id="v-pills-home"
                                            role="tabpanel"
                                            aria-labelledby="v-pills-home-tab"
                                            >
                                            <div class="table-responsive mb-5">
                                                <table class="table table-hover nowrap" id="example2">
                                                    <thead>
                                                        <tr>

                                                            <th> # </th>
                                                            <th>own_hhitem</th>
                                                            <th>note_hhasset</th>
                                                            <th>radio</th>
                                                            <th>touchlight</th>
                                                            <th>kerosenestove</th>
                                                            <th>television  </th>
                                                            <th>mobilephone</th>
                                                            <th> landphone </th>

                                                            <th>housecurrent</th>
                                                            <th> houseelsewhere </th>
                                                            <th>landforhousing</th>
                                                            <th> farmland </th>
                                                            <th>goat</th>
                                                            <th>bird</th>
                                                            <th>cattle</th>
                                                            <th> bicycle </th>
                                                            <th>motocycle</th>
                                                            <th > car </th>
                                                            <th> canoe </th>

                                                            <th>boat</th>
                                                            <th> video_dvd </th>

                                                            <th>generator</th>
                                                            <th> iron_electric </th>
                                                            <th>iron_charcoal</th>
                                                            <th> fan </th>
                                                            <th>air_conditioner</th>
                                                            <th> refrigerator </th>
                                                            <th>freezer</th>
                                                            <th> furniture_sofa </th>

                                                            <th>furniture_table</th>
                                                            <th> hifi </th>
                                                            <th>mattress</th>
                                                            <th> bed </th>
                                                            <th>computer</th>
                                                            <th> wash_machine </th>
                                                            <th>radio_num</th>
                                                            <th> touchlight_num </th>
                                                            <th>mobilephone_num</th>
                                                            <th> housecurrent_num </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($houseHoldAsset as $asset)
                                                            <tr>
                                                                <td>
                                                                    <a href="" class="btn btn-sm btn-light mr-2">
                                                                        <i class="fe fe-list mr-2"></i>
                                                                    </a>
                                                                </td>
                                                                <td>{{ $asset->own_hhitem ?? 'dd' }}</td>
                                                                <td>{{ $asset->note_hhasset ?? '' }}</td>
                                                                <td>{{ $asset->radio ?? '' }}</td>
                                                                <td>{{ $asset->touchlight ?? '' }}</td>
                                                                <td>{{ $asset->kerosenestove ?? '' }}</td>
                                                                <td>{{ $asset->television ?? '' }}</td>
                                                                <td>{{ $asset->mobilephone ?? '' }}</td>
                                                                <td>{{ $asset->landphone ?? '' }}</td>

                                                                <td>{{ $asset->housecurrent ?? 'dd' }}</td>
                                                                <td>{{ $asset->houseelsewhere ?? 'dd' }}</td>
                                                                <td>{{ $asset->landforhousing ?? '' }}</td>
                                                                <td>{{ $asset->farmland ?? '' }}</td>
                                                                <td>{{ $asset->goat ?? '' }}</td>
                                                                <td>{{ $asset->bird ?? '' }}</td>
                                                                <td>{{ $asset->cattle ?? '' }}</td>
                                                                <td>{{ $asset->bicycle ?? '' }}</td>
                                                                <td>{{ $asset->motocycle ?? '' }}</td>
                                                                <td>{{ $asset->car ?? '' }}</td>
                                                                <td>{{ $asset->canoe ?? '' }}</td>

                                                                <td>{{ $asset->boat ?? 'dd' }}</td>
                                                                <td>{{ $asset->video_dvd ?? 'dd' }}</td>

                                                                <td>{{ $asset->generator ?? '' }}</td>
                                                                <td>{{ $asset->iron_electric ?? 'dd' }}</td>

                                                                <td>{{ $asset->iron_charcoal ?? '' }}</td>
                                                                <td>{{ $asset->fan ?? '' }}</td>
                                                                <td>{{ $asset->air_conditioner ?? '' }}</td>
                                                                <td>{{ $asset->refrigerator ?? '' }}</td>
                                                                <td>{{ $asset->freezer ?? '' }}</td>
                                                                <td>{{ $asset->furniture_sofa ?? 'dd' }}</td>

                                                                <td>{{ $asset->furniture_table ?? 'dd' }}</td>
                                                                <td>{{ $asset->hifi ?? 'dd' }}</td>
                                                                <td>{{ $asset->mattress ?? '' }}</td>
                                                                <td>{{ $asset->bed ?? '' }}</td>
                                                                <td>{{ $asset->computer ?? '' }}</td>
                                                                <td>{{ $asset->wash_machine ?? '' }}</td>
                                                                <td>{{ $asset->radio_num ?? '' }}</td>
                                                                <td>{{ $asset->touchlight_num ?? '' }}</td>
                                                                <td>{{ $asset->mobilephone_num ?? '' }}</td>
                                                                <td>{{ $asset->housecurrent_num ?? '' }}</td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>

                                                            <th># </th>
                                                            <th>own_hhitem</th>
                                                            <th>note_hhasset</th>
                                                            <th>radio</th>
                                                            <th>touchlight</th>
                                                            <th>kerosenestove</th>
                                                            <th>television  </th>
                                                            <th>mobilephone</th>
                                                            <th> landphone </th>

                                                            <th>housecurrent</th>
                                                            <th> houseelsewhere </th>
                                                            <th>landforhousing</th>
                                                            <th> farmland </th>
                                                            <th>goat</th>
                                                            <th>bird</th>
                                                            <th>cattle</th>
                                                            <th> bicycle </th>
                                                            <th>motocycle</th>
                                                            <th > car </th>
                                                            <th> canoe </th>

                                                            <th>boat</th>
                                                            <th> video_dvd </th>

                                                            <th>generator</th>
                                                            <th> iron_electric </th>
                                                            <th>iron_charcoal</th>
                                                            <th> fan </th>
                                                            <th>air_conditioner</th>
                                                            <th> refrigerator </th>
                                                            <th>freezer</th>
                                                            <th> furniture_sofa </th>

                                                            <th>furniture_table</th>
                                                            <th> hifi </th>
                                                            <th>mattress</th>
                                                            <th> bed </th>
                                                            <th>computer</th>
                                                            <th> wash_machine </th>
                                                            <th>radio_num</th>
                                                            <th> touchlight_num </th>
                                                            <th>mobilephone_num</th>
                                                            <th> housecurrent_num </th>

                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            </div>
                                            <div
                                            class="tab-pane fade"
                                            id="v-pills-profile"
                                            role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab"
                                            >
                                                <div class="table-responsive mb-5">
                                                    <table class="table table-hover nowrap" id="example1">
                                                        <thead>

                                                            <tr>
                                                                <th> # </th>
                                                                <th>Hhno</th>
                                                                <th>Urban_Rural</th>
                                                                <th>HH_Name</th>
                                                                <th>consent </th>
                                                                <th> contact_no </th>
                                                                <th>Attno</th>
                                                                <th> hhaddress </th>
                                                                <th>Interview Date</th>
                                                                <th>HouseholdRoster_count</th>
                                                                <th> hhsize </th>
                                                                <th>note_hhroster</th>
                                                                <th>position</th>
                                                                <th>roster_index</th>
                                                            </tr>

                                                        </thead>
                                                        <tbody> @foreach ($houseHoldInfo as $info)
                                                            <tr>
                                                                <td>
                                                                    <a href="" class="btn btn-sm btn-light mr-2">
                                                                        <i class="fe fe-list mr-2"></i>
                                                                    </a>
                                                                </td>
                                                                <td>{{ $info->hhno ?? '' }}</td>
                                                                <td>{{ $info->urban_rural }}</td>

                                                                <td>{{ $info->hhh_surname . " ". $info->hhh_firstname. " ". $info->hhh_othername }}</td>
                                                                <td>{{ $info->consent }}</td>
                                                                <td>{{ $info->contact_no }}</td>
                                                                <td>{{ $info->altno }}</td>
                                                                <td>{{ $info->hhaddress }}</td>
                                                                <td>{{ $info->interviewdate }}</td>

                                                                <td>{{ $info->HouseholdRoster_count }}</td>
                                                                <td>{{ $info->note_hhroster }}</td>
                                                                <td>{{ $info->hhsize }}</td>
                                                                <td>{{ $info->position }}</td>
                                                                <td>{{ $info->roster_index }}</td>
                                                            </tr>@endforeach

                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th> # </th>
                                                                <th>Hhno</th>
                                                                <th>Urban_Rural</th>
                                                                <th>HH_Name</th>
                                                                <th>consent </th>
                                                                <th> contact_no </th>
                                                                <th>Attno</th>
                                                                <th> hhaddress </th>
                                                                <th>Interview Date</th>
                                                                <th>HouseholdRoster_count</th>
                                                                <th> hhsize </th>
                                                                <th>note_hhroster</th>
                                                                <th>position</th>
                                                                <th>roster_index</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        <div
                                            class="tab-pane fade"
                                            id="v-pills-messages"
                                            role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab"
                                            >
                                                <div class="table-responsive mb-5">
                                                    <table class="table table-hover nowrap" id="example3">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th> hh_living</th>
                                                                <th> roof_dwelling</th>
                                                                <th> light_dwelling</th>
                                                                <th> drink_dwelling</th>
                                                                <th> num_room</th>
                                                                <th> floor_dwelling </th>
                                                                <th> cook_dwelling </th>
                                                                <th> toilet_dwelling </th>

                                                            </tr>
                                                        </thead>
                                                        <tbody><?php $i =1; ?>
                                                            @foreach ($houseHoldLiving as $living)
                                                                <tr>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-light mr-2">
                                                                            <i class="fe fe-list mr-2"></i>
                                                                        </a>
                                                                    </td>
                                                                    <td>{{ $living->hh_living ?? 'dd' }}</td>
                                                                    <td>{{ $living->roof_dwelling ?? '' }}</td>
                                                                    <td>{{ $living->light_dwelling ?? '' }}</td>
                                                                    <td>{{ $living->drink_dwelling ?? '' }}</td>
                                                                    <td>{{ $living->num_room ?? '' }}</td>
                                                                    <td>{{ $living->floor_dwelling ?? '' }}</td>
                                                                    <td>{{ $living->cook_dwelling ?? '' }}</td>
                                                                    <td>{{ $living->toilet_dwelling ?? '' }}</td>

                                                                </tr><?php $i++; ?>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>hh_living</th>
                                                                <th>roof_dwelling</th>
                                                                <th>light_dwelling</th>
                                                                <th>drink_dwelling</th>
                                                                <th>num_room</th>
                                                                <th> floor_dwelling </th>
                                                                <th> cook_dwelling </th>
                                                                <th> toilet_dwelling </th>

                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <div
                                                class="tab-pane fade"
                                                id="v-pills-settings"
                                                role="tabpanel"
                                                aria-labelledby="v-pills-settings-tab"
                                                >
                                                <table class="table table-hover nowrap" id="example4">
                                                    <thead class="thead-default">

                                                        <tr>
                                                            <th>#</th>
                                                            <th>name</th>
                                                            <th>head_name</th>
                                                            <th>head_sex</th>
                                                            <th>head_dob</th>
                                                            <th>head_age_hhm</th>

                                                            <th>head_int_age</th>
                                                            <th>head_a4age</th>
                                                            <th>head_agey</th>
                                                            <th>head_nin</th>
                                                            <th>head_bvn</th>

                                                            <th>head_relationship</th>
                                                            <th>head_marritalstatus</th>
                                                            <th>HouseholdRoster_count</th>
                                                            <th>head_hasphonno</th>
                                                            <th>head_telephone_no</th>

                                                            <th>B_Household_head_Labour_rs_5_years_and_above</th>
                                                            <th>head_b2labour</th>
                                                            <th>head_b3labour</th>
                                                            <th>head_b4labour</th>
                                                            <th>head_b5labour</th>

                                                            <th>head_disability_information</th>
                                                            <th>head_educationalqualification</th>
                                                            <th>head_currentlyenrolledinschl</th>
                                                            <th>head_healthintro</th>
                                                            <th>head_pregnant</th>

                                                            <th>head_lactating</th>
                                                            <th>head_benefitfromhealthcare</th>
                                                            <th>head_chronicallyill</th>
                                                            <th>head_disability</th>
                                                            <th>head_note_socialnetwork</th>

                                                            <th>head_cooperative</th>
                                                            <th>head_religiousgroup</th>
                                                            <th>head_businessgroup</th>
                                                            <th>head_agegroup</th>
                                                            <th>head_othergorup</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $l = 1; ?>
                                                        @foreach ($houseHoldName as $name)

                                                            <tr>
                                                                <td>
                                                                    <a href="" class="btn btn-sm btn-light mr-2">
                                                                        <i class="fe fe-list mr-2"></i>
                                                                    </a>
                                                                </td>
                                                                <td>{{ $name->name ?? '' }}</td>
                                                                <td>{{ $name->head_name ?? '' }}</td>
                                                                <td>{{ $name->head_sex ?? '' }}</td>
                                                                <td>{{ $name->head_dob ?? '' }}</td>
                                                                <td>{{ $name->head_age_hhm ?? '' }}</td>

                                                                <td>{{ $name->head_int_age ?? '' }}</td>
                                                                <td>{{ $name->head_a4age ?? '' }}</td>
                                                                <td>{{ $name->head_agey ?? '' }}</td>
                                                                <td>{{ $name->head_nin ?? '' }}</td>
                                                                <td>{{ $name->head_bvn ?? '' }}</td>

                                                                <td>{{ $name->head_relationship ?? '' }}</td>
                                                                <td>{{ $name->head_marritalstatus ?? '' }}</td>
                                                                <td>{{ $name->HouseholdRoster_count ?? '' }}</td>
                                                                <td>{{ $name->head_hasphonno ?? '' }}</td>
                                                                <td>{{ $name->head_telephone_no ?? '' }}</td>

                                                                <td>{{ $name->B_Household_head_Labour_rs_5_years_and_above ?? '' }}</td>
                                                                <td>{{ $name->head_b2labour ?? '' }}</td>
                                                                <td>{{ $name->head_b3labour ?? '' }}</td>
                                                                <td>{{ $name->head_b4labour ?? '' }}</td>
                                                                <td>{{ $name->head_b5labour ?? '' }}</td>


                                                                <td>{{ $name->head_disability_information ?? '' }}</td>
                                                                <td>{{ $name->head_educationalqualification ?? '' }}</td>
                                                                <td>{{ $name->head_currentlyenrolledinschl ?? '' }}</td>
                                                                <td>{{ $name->head_healthintro ?? '' }}</td>
                                                                <td>{{ $name->head_pregnant ?? '' }}</td>

                                                                <td>{{ $name->head_lactating ?? '' }}</td>
                                                                <td>{{ $name->head_benefitfromhealthcare ?? '' }}</td>
                                                                <td>{{ $name->head_chronicallyill ?? '' }}</td>
                                                                <td>{{ $name->head_disability ?? '' }}</td>
                                                                <td>{{ $name->head_note_socialnetwork ?? '' }}</td>


                                                                <td>{{ $name->head_cooperative ?? '' }}</td>
                                                                <td>{{ $name->head_religiousgroup ?? '' }}</td>
                                                                <td>{{ $name->head_businessgroup ?? '' }}</td>
                                                                <td>{{ $name->head_agegroup ?? '' }}</td>
                                                                <td>{{ $name->head_othergorup ?? '' }}</td>

                                                            </tr><?php $l++; ?>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>name</th>
                                                            <th>head_name</th>
                                                            <th>head_sex</th>
                                                            <th>head_dob</th>
                                                            <th>head_age_hhm</th>

                                                            <th>head_int_age</th>
                                                            <th>head_a4age</th>
                                                            <th>head_agey</th>
                                                            <th>head_nin</th>
                                                            <th>head_bvn</th>

                                                            <th>head_relationship</th>
                                                            <th>head_marritalstatus</th>
                                                            <th>HouseholdRoster_count</th>
                                                            <th>head_hasphonno</th>
                                                            <th>head_telephone_no</th>

                                                            <th>B_Household_head_Labour_rs_5_years_and_above</th>
                                                            <th>head_b2labour</th>
                                                            <th>head_b3labour</th>
                                                            <th>head_b4labour</th>
                                                            <th>head_b5labour</th>

                                                            <th>head_disability_information</th>
                                                            <th>head_educationalqualification</th>
                                                            <th>head_currentlyenrolledinschl</th>
                                                            <th>head_healthintro</th>
                                                            <th>head_pregnant</th>

                                                            <th>head_lactating</th>
                                                            <th>head_benefitfromhealthcare</th>
                                                            <th>head_chronicallyill</th>
                                                            <th>head_disability</th>
                                                            <th>head_note_socialnetwork</th>

                                                            <th>head_cooperative</th>
                                                            <th>head_religiousgroup</th>
                                                            <th>head_businessgroup</th>
                                                            <th>head_agegroup</th>
                                                            <th>head_othergorup</th>

                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
