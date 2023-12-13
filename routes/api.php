<?php

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'events'], function() {
   Route::get('/', function(Request $request) {
       $startDate = $request->query('start_date');
       $endDate = $request->query('end_date');

       $query = Event::query();

       if($startDate) {
           $startDateCarbon = new Carbon($startDate);
           $query->whereDate('date/time', '>=', $startDateCarbon);
       }
       if($endDate) {
           $endDateCarbon = (new Carbon($endDate))->endOfDay();
           $query->whereDate('date/time', '<=', $endDateCarbon);
       }

       return EventResource::collection($query->get());
   });
});
