<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeePresetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ThresholdController;
use App\Http\Controllers\FeePercentageController;

// Route for the home page (default route)
Route::get('/', [FeePercentageController::class, 'index'])->name('home');

// Routes for Fee Presets
Route::resource('fee-presets', FeePresetController::class);

// Routes for Services
Route::resource('services', ServiceController::class);

// Routes for Thresholds
Route::resource('thresholds', ThresholdController::class);

// Routes for Fee Percentages
Route::resource('fee-percentages', FeePercentageController::class);

// Route for calculating fees
Route::get('fees/calculate', [FeePercentageController::class, 'calculateForm'])->name('fee-percentages.calculate');
