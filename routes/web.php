<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name("home");
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/reports/missing-item', function () {
    return view('reports.missing-item');
})->name('missing-item');
Route::get('/reports/incident', function () {
    return view('reports.incident');
})->name('incident');
Route::get('/shopkeeper/portal', function () {
    return view('shopkeeper.portal');
});
Route::get('/map/index', function () {
    return view('map.index');
})->name('map');
Route::get('/analytics/index', function () {
    return view('analytics.index');
});
Route::get('/profile/settings', function () {
    return view('profile.settings');
});
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');