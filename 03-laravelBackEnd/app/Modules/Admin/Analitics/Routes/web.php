<?php

Route::group(['prefix' => 'analitics', 'middleware' => []], function () {
    Route::get('/', 'AnaliticsController@index')->name('analitics.index');
    Route::get('/create', 'AnaliticsController@create')->name('analitics.create');
    Route::post('/', 'AnaliticsController@store')->name('analitics.store');
    Route::get('/{analitic}', 'AnaliticsController@show')->name('analitics.read');
    Route::get('/edit/{analitic}', 'AnaliticsController@edit')->name('analitics.edit');
    Route::put('/{analitic}', 'AnaliticsController@update')->name('analitics.update');
    Route::delete('/{analitic}', 'AnaliticsController@destroy')->name('analitics.delete');
});