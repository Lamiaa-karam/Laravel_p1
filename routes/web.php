<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\placeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function(){
    return 'welcome to my first route';
});

Route::get('user/{name}', function($name){
    return 'The user name is '. $name;
});

// Route::get('user/{name}/{age}', function($name, $age){
//     $msg = 'The user name is'. $name;
// });

// Route::get('user/{name}/{age?}', function($name, $age=0){
//     $msg = 'The user name is'. $name;
//     if($age > 0){
//         $msg.= 'and age is:'. $age;
//     }
//     return $msg;    
// })->where(['age' => '[0,9]+']);

Route::get('user/{name}/{age?}', function($name, $age=0){
    $msg = 'The user name is'. $name;
    if($age > 0){
        $msg.= 'and age is:'. $age;
    }
    return $msg;    
})->whereIn('name', ['Lamia', 'lamia']);

Route::get('About', function(){
    return 'Tis is website about page';
});

Route::get('contact_us', function(){
    return 'you can contact us from our wbsite';
});

Route::prefix('support')->group(function(){
    Route::get('/', function(){
        return 'support home page';
    });

    Route::get('Chat', function(){
        return 'chat page';
    });

    Route::get('call', function(){
        return 'call page';
    });

    Route::get('ticket', function(){
        return 'ticket page';
    });
});

Route::prefix('training')->group(function(){
    Route::get('/', function(){
        return 'training home page';
    });

    Route::get('Hr', function(){
        return 'Hr page';
    });

    Route::get('ICT', function(){
        return 'ICT page';
    });

    Route::get('marketing', function(){
        return 'marketing page';
    });

    Route::get('logistics', function(){
        return 'logistics page';
    });
});

// Route::fallback(function($name="lamia"){
//     return redirect('user/'.$name);
// });

Route::get('cv', function(){
    return view('cv');
});

Route::post('home', function(){
    return 'you logged in';
})->name('home');

// Route::get('login', function(){
//     return view('login');
// });

// Route::post('car-data', [ExampleController::class, 'viewCarData'])->name('car-data');
Route::get('test1',[ExampleController::class, 'test1']);
Route::get('showUpload',[ExampleController::class, 'showUpload']);
Route::post('upload',[ExampleController::class,'uploadImage'])->name('upload');

Route::get('addCar', [CarController::class, 'create']);
Route::post('addCar', [CarController::class,'store'])->name('addCar');
Route::get('addNews', [NewsController::class, 'create']);
Route::get('cars', [CarController::class,'index']);
Route::get('editCar/{id}', [CarController::class,'edit']);
Route::put('updateCar/{id}', [CarController::class,'update'])->name('updateCar');
Route::get("showCar/{id}", [CarController::class,"show"]);
Route::get("deleteCar/{id}", [CarController::class,"delete"]);
Route::get("trashedCars", [CarController::class,"trashed"]);
Route::get("restoreCar/{id}", [CarController::class,"restore"]);
Route::get("destroyCar/{id}", [CarController::class,"destroy"]);

Route::get('news', [NewsController::class,'index']);
Route::post('addNews', [NewsController::class, 'store'])->name('addNews');
Route::get('editNews/{id}', [NewsController::class,'edit']);
Route::put('updateNews/{id}', [NewsController::class,'update'])->name('updateNews');
Route::get("showNews/{id}", [NewsController::class,"show"]);
Route::get("deleteNews/{id}", [NewsController::class,"delete"]);
Route::get("trashedNews", [NewsController::class,"trashed"]);
Route::get("restoreNews/{id}", [NewsController::class,"restore"]);
Route::get("destroyNews/{id}", [NewsController::class,"destroy"]);

Route::get("addPlace", [placeController::class,"create"]);
Route::post("addPlace", [placeController::class,"store"])->name('addPlace');
Route::get('place',[placeController::class,'place']);
Route::get('blog',[placeController::class,'blog']);
Route::get('blog1',[placeController::class,'blog1']);
