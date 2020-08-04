<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('/email/resend', "Auth\VerificationController@resend");

    Auth::routes(['verify' => true]);
    Route::group(["prefix" => "dashboard", "middleware" => "verified"], function () {
        Route::get('/', 'HomeController@index')->name('administrator.dashboard');

        Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');

        Route::group(["prefix" => "system-users"], function () {
            Route::get("/", "UserController@index")->name("user.index");
            Route::post("/create", "UserController@store")->name("user.save");
            Route::get("/delete/{email}", "UserController@destroy")->name("user.delete");
            Route::get("/profile/{email}", "UserController@show")->name("user.profile");
            Route::post("/update/{email}", "UserController@update")->name("user.update");
            Route::get("/edit/{email}", "UserController@edit")->name("user.edit");
        });

        Route::group(["prefix" => "uploads"], function () {
            Route::get("/", "EnumeratorDetaController@index")->name("upload.index");
            Route::post("/xml", "EnumeratorDetaController@store")->name("upload.save");
        });

        Route::group(["prefix" => "enumerators"], function () {
            Route::get("data/{enumerator_code}", "EnumeratorDetaController@data")->name("enumerator.index");
        });

        Route::group(["prefix" => "house-hold-assets"], function () {
            Route::get("/appliances", "HouseHoldAssetController@appliances")->name("appliances.index");
            Route::get("/others", "HouseHoldAssetController@others")->name("appliances.other");
            Route::get("/no-computer-owners", "HouseHoldAssetController@computer")->name("computer.index");
            Route::get("/no-generator-owners", "HouseHoldAssetController@generator")->name("generator.index");
            Route::get("/no-washing-machine-owners", "HouseHoldAssetController@washing")->name("washing.index");
            Route::get("/no-bed-owners", "HouseHoldAssetController@bed")->name("bed.index");
            Route::get("/no-mattress-owners", "HouseHoldAssetController@mat")->name("mat.index");
            Route::get("/no-furniture-sofa-owners", "HouseHoldAssetController@sofa")->name("sofa.index");
            Route::get("/no-furniture-table-owners", "HouseHoldAssetController@table")->name("table.index");
            Route::get("/no-fan-owners", "HouseHoldAssetController@fan")->name("fan.index");
            Route::get("/no-air-conditioner-owners", "HouseHoldAssetController@air_conditioner")->name("ac.index");
            Route::get("/no-electric-iron-owners", "HouseHoldAssetController@electricIron")->name("iron.elec");
            Route::get("/no-charcoal-iron-owners", "HouseHoldAssetController@charIron")->name("iron.coal");
            Route::get("/no-freezer-owners", "HouseHoldAssetController@freezer")->name("frezer.index");
            Route::get("/no-refrigerator-owners", "HouseHoldAssetController@refrigerator")->name("refrigerator.index");
            Route::get("/no-radio-owners", "HouseHoldAssetController@radio")->name("radio.index");
            Route::get("/no-television-owners", "HouseHoldAssetController@television")->name("television.index");
        });

    });

