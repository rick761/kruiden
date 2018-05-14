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


Route::get('/', 'WelcomeController@index')->name('welcome');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/geneeskrachten','GeneeskrachtenController@index')->name('geneeskrachten');
Route::get('/EditKruid','KruidenController@index')->name('EditKruid');
Route::post('/SaveKruid','KruidenController@save')->name('SaveKruid');
Route::get('/removeKoppeling','KruidenController@removeKoppeling')->name('removeKoppeling');
Route::post('/insertGeneeskracht','KruidenController@insertGeneeskracht')->name('insertGeneeskracht');
Route::post('/insertGeneeskrachtBestaand','KruidenController@insertGeneeskrachtBestaand')->name('insertGeneeskrachtBestaand');
Route::get('/removeGeneeskracht','GeneesKrachtenController@removeGeneeskracht')->name('removeGeneeskracht');
Route::get('/RemoveKruid','HomeController@removeKruid')->name('RemoveKruid');
Route::post('/addFoto','KruidenController@addFoto')->name('addFoto');
Route::get('/veranderFotoType','KruidenController@veranderFotoType')->name('veranderFotoType');
Route::get('/removeFoto','KruidenController@removeFoto')->name('removeFoto');
Route::get('/kruid','kruidVisitorController@index')->name('kruidVisit');
Route::post('/zoekOpNaam','welcomeController@search')->name('zoekOpNaam');
Route::get('/zoekOpGeneeskracht','welcomeController@searchGeneeskracht')->name('zoekOpGeneeskracht');
Route::post('/addKruid','HomeController@addKruid')->name('addKruid');





//!!!!!!!!!!!!!!!!!!!!!  new routes
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
//!!!!!!!!!!!!!!!!!!!!!  end new routes
