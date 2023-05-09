<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FixerController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\CustomerAuthenticate;
use App\Http\Middleware\FixerAuthenticate;
use App\Http\Middleware\AdminAuthenticate;

Route::get('images/{imagePath}', [ImageController::class,'getImage']);    

Route::prefix('client')->group(function(){
    //addClient
    Route::post('/addClient',[ClientController::class,'store']);
});

Route::middleware([CustomerAuthenticate::class])->group(function () {
    Route::post('images/upload-image', [ImageController::class, 'uploadImage']);
    Route::prefix('client')->group(function(){
        Route::get('/{id}',[ClientController::class,'show']);
        Route::get('/',[ClientController::class,'index']);
        Route::put('/updateClient/{id}',[ClientController::class,'update']);
    });
    Route::prefix('report')->group(function(){
        Route::get('/',[ReportController::class,'index']);
        Route::get('/{id}',[ReportController::class,'show']);
        Route::get('/findByFixer/{id}',[ReportController::class,'findByFixer']);
        Route::get('/findByClient/{id}',[ReportController::class,'findByClient']);
        Route::post('/addReport',[ReportController::class,'store']);
        Route::put('/updateReport/{id}',[ReportController::class,'update']);
        Route::delete('/deleteReport/{id}',[ReportController::class,'destroy']);
        });
    
    Route::prefix('job')->group(function(){
        Route::get('/',[JobOfferController::class,'index']);
        Route::get('/{id}',[JobOfferController::class,'show']);
        Route::post('/addJobOffer',[JobOfferController::class,'store']);
        Route::put('/updateJobOffer/{id}',[JobOfferController::class,'update']);
        Route::delete('/deleteJobOffer/{id}',[JobOfferController::class,'destroy']);
        Route::get('/findByFixer/{id}',[JobOfferController::class,'findByFixer']);
        Route::get('/findByClient/{id}',[JobOfferController::class,'findByClient']);
    });

    Route::prefix('fixer')->group(function(){
        Route::get('/',[FixerController::class,'index']);
        Route::get('/{id}',[FixerController::class,'getFixerById']);
    });

});
Route::middleware([FixerAuthenticate::class])->group(function () {

    Route::prefix('fixer')->group(function(){
        
        //addFixer
        Route::post('/addFixer',[FixerController::class,'store']);
        //updateFixer
        Route::put('/updateFixer/{id}',[FixerController::class,'update']);
        //deleteFixer
        });

});
Route::middleware([AdminAuthenticate::class])->group(function () {

    Route::prefix('client')->group(function(){
        Route::delete('/deleteClient/{id}',[ClientController::class,'destroy']);
        });

    Route::prefix('fixer')->group(function(){
        Route::delete('/deleteFixer/{id}',[FixerController::class,'destroy']);
    });

    Route::prefix('admin')->group(function(){
        Route::get('/',[AdminController::class,'index']);
         //getAdminById
         Route::get('/{id}',[AdminController::class,'show']);
         //addAdmin
         Route::post('/addAdmin',[AdminController::class,'store']);
         //updateAdmin
         Route::put('/updateAdmin/{id}',[AdminController::class,'update']);
         //deleteAdmin
         Route::delete('/deleteAdmin/{id}',[AdminController::class,'destroy']);
    });
});





