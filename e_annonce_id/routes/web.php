<?php

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
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});


//List Types
Route::get('types','TypeController@index');
//List single Type
Route::get('types/{id}','TypeController@show');
//Add Type
Route::post('types','TypeController@store');
//delete Type
Route::put('types','TypeController@store');
//delete Type
Route::delete('types/{id}','TypeController@destroy');
//////
//////
///////
////////
Route::group(['prefix' => "categories"], function () {
        Route::get('/','CategorieController@index');
        Route::get('/{id}','CategorieController@show');
        Route::post('/','CategorieController@store');
        Route::put('/','CategorieController@store');
        Route::delete('/{id}','CategorieController@destroy');
});

Route::group(['prefix' => "reseravtions"], function () {
        Route::get('/','ReserverController@index');
        Route::get('/mesreservations','ReserverController@mesreservation');
        Route::get('/{id}','ReserverController@show');
        Route::post('/','ReserverController@store');
        Route::put('/','ReserverController@store');
        Route::delete('/{id}','ReserverController@destroy');
});

Route::get('listreservationall/{id}','ReserverController@listreservationall');
Route::get('listreservationall_clube','ReserverController@listreservationall_clube');

Route::group(['prefix' => "users"], function (){
        Route::get('/','UserController@index');
        Route::get('/{id}','UserController@show');
        Route::post('/','UserController@store');
        Route::put('/','UserController@store');
        Route::delete('/{id}','UserController@destroy');
});

Route::group(['prefix' => "clubs"], function (){
        Route::get('/','UserController@indexclub');
        Route::get('/{id}','UserController@showclub');
});

Route::group(['prefix' => "terrains"], function (){
        Route::get('/','TerrainController@index');
        Route::get('/images/{id}','ImageController@index_terrain');
        Route::post('/','TerrainController@store');
        Route::get('/{id}','TerrainController@showterrains');
        Route::get('/detail/{id}','TerrainController@detailterrain');
        Route::get('/detail2/{id}','TerrainController@detailterrain2');
});

Route::get('ter/{id}','TerrainController@show');

Route::post('imageterrain/','ImageController@storeimg');
Route::get('imageterrainadd/{ter}/{url}','ImageController@storeimgadd');
Route::get('imageusers','ImageController@imageusers');
Route::get('imageusers_edite/{id}','ImageController@imageusers_edite');


Route::group(['prefix' => "packs"], function () {
        Route::get('/','PackController@index');
        Route::get('/clube','PackController@indexclube');
        Route::get('/{id}','PackController@show');
        Route::get('/terrain/{id}','PackController@showterrain');
        Route::post('/','PackController@store');
        Route::put('/','PackController@store');
        Route::delete('/{id}','PackController@destroy');
});

Route::group(['prefix' => "heures"], function () {
        Route::get('/','HeureController@index');
        Route::get('/{id}','HeureController@show');
        Route::post('/','HeureController@store');
        Route::put('/','HeureController@store');
        Route::delete('/{id}','HeureController@destroy');
});

Route::group(['prefix' => "publication"], function (){
        Route::get('/','PublicationController@index');
        Route::get('/all','PublicationController@indexall');
        Route::get('/{id}','PublicationController@show');
        Route::post('/','PublicationController@store');
        Route::put('/','PublicationController@store');
        Route::delete('/{id}','PublicationController@destroy');
});

Route::get('publication_edite/{id}','PublicationController@publication_edite');

Route::group(['prefix' => "pubimage"], function () {

        // Route::get('/','ImageController@index');
        // Route::get('/{id}','ImageController@show');
        Route::post('/','ImageController@store_img_pub_1');
        // Route::put('/','ImageController@store');
        // Route::delete('/{id}','ImageController@destroy');
});

Route::get('/indexall','UserController@indexall');
Route::get('/indexall_edite/{id}','UserController@indexall_edite');
Route::get('/friendlist','UserController@friendlist');
Route::get('/notfriend','UserController@notfriend');

    Route::get('/logine', function () {
        return view('login');
    });
    Route::get('/registerclube', function () {
        return view('register_clube');
    });
    Route::get('/maps', function () {
        return view('mapsapi');
    });

        Route::post('storeUser','UserController@storeClient');
        Route::post('storeClube','UserController@storeClube');
        Route::get('lougout','UserController@lougout');
        Route::post('loginValUser','UserController@loginValideUser');
//auth
Route::get('clientauth','ImageController@authclient');

Route::get('userauth','UserController@authuser');

Route::get('IdNow/{id}','UserController@IdValideUser');


/////////////////////////////////New

Route::group(['prefix' => "acp"], function (){
        Route::get('/{pub}','AcceptPubController@acpstore');
        Route::get('/delete/{id}','AcceptPubController@delacp');
});



Route::group(['prefix' => "mesinteress"], function (){
        Route::get('/{id}','AcceptPubController@acpshow');
});
Route::group(['prefix' => "acpinteress"], function (){
        Route::get('/{iduser}/{idpup}','AcceptPubController@interesseacp');
});
Route::group(['prefix' => "delacpinteress"], function (){
        Route::get('/{iduser}/{idpup}','AcceptPubController@delinteresseacp');
});
Route::group(['prefix' => "mesinteressall"], function (){
        Route::get('/','AcceptPubController@allpub');
});
Route::group(['prefix' => "mesinteressall/val"], function (){
        Route::get('/','AcceptPubController@allpubval');
});
Route::group(['prefix' => "mesinteressall/pas_val"], function (){
        Route::get('/','AcceptPubController@allpubpasval');
});




Route::get('charts/data', 'ApController@index');
