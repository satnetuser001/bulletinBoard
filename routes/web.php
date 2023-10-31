<?php

use Illuminate\Support\Facades\Route; //source
use App\Http\Controllers\BbsController; //book
use App\Http\Controllers\HomeController; //book chapter 2.3

//домашняя страница для не аутентифицированного пользователя
Route::get('/', [BbsController::class, 'index'])->name('index');

//Создается при установке UI
Auth::routes();

//домашняя страница для аутентифицированного пользователя
Route::get('/home', [HomeController::class, 'index'])->name('home');

//страница-форма добавления объявления
Route::get('/home/add', [HomeController::class, 'addPage'])->name('addPage');

//добавление в базу данных объявления(из страница-форма добавления объявления)
Route::post('/home', [HomeController::class, 'addToDB'])->name('addToDB');

//страница-форма редоктирования объявления
Route::get('/home/{bbs}/edit', [HomeController::class, 'editPage'])->name('editPage')
->middleware('can:verificationUpdateTupleDB,bbs');

//обновить в базе данных объявление(из страница-форма редактиролвания объявления)
Route::patch('/home/{bbs}', [HomeController::class, 'updateTupleDB'])->name('updateTupleDB')
->middleware('can:verificationUpdateTupleDB,bbs');

//страница-форма удаления объявления
Route::get('home/{bbs}/delete', [HomeController::class, 'deletePage'])->name('deletePage')
->middleware('can:verificationDeleteTupleDB,bbs');

//удалить в базе данных объявление(из страницы-формы удаления объявления)
Route::delete('/home/{bbs}', [HomeController::class, 'deleteTupleDB'])->name('deleteTupleDB')
->middleware('can:verificationDeleteTupleDB,bbs');

//страница режима работы сайта, которую может просматреть только Admin
Route::get('/siteSettings', function () {
    return view('siteSettingsPage');
})->middleware('isAdmin')->name('siteSettings');

//страничка с детальной информации о товаре для не аутентифицированного пользователя
Route::get('/{idItem}', [BbsController::class, 'itemDetails'])->name('detail');
