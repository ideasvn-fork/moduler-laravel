<?php
Route::group(array('Module'=>'Test','namespace' => '\App\Modules\Test\Controller'), function() {

    Route::get('test',function(){
      return view("Test::index");
    });

    Route::get('controller', 'TestController@show');
});
