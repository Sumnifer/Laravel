<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TakeOverController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::resource('takeOvers', TakeOverController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'verified')->name('dashboard');

    Route::put('/tickets/{id}/archive', [TicketController::class, 'archive'])->name('tickets.archive');
    Route::get('/tickets/archived', [TicketController::class, 'archived'])->name('tickets.archived');
    Route::put('/tickets/{id}/unarchive', [TicketController::class, 'unarchive'])->name('tickets.unarchive');
    Route::get('/tickets/{id}/duplicate', [TicketController::class, 'duplicate'])->name('tickets.duplicate');
    Route::resource('tickets', TicketController::class);

    Route::get('/tickets/new/{client}', [TicketController::class, 'new'])->name('tickets.new');
    Route::get('/logs/custom', [LogController::class, 'customLog'])->name('logs.custom');
    Route::post('/logs/clear', [LogController::class, 'clear'])->name('logs.clear');
    Route::get('/logs/download', [LogController::class, 'download'])->name('logs.download');

    Route::resource('clients', ClientController::class);
    Route::resource('materials', MaterialController::class);

    Route::get('opportunities/new/{client}', [OpportunityController::class, 'new'])->name('opportunities.new');
    Route::get('opportunities/search', [OpportunityController::class, 'search'])->name('opportunities.search');
    Route::resource('opportunities', OpportunityController::class);

    Route::get('interventions/new/{client}', [InterventionController::class, 'new'])->name('interventions.new');
    Route::get('interventions/new/{client}/{ticket}', [InterventionController::class, 'newTicket'])->name('interventions.ticket');
    Route::get('interventions/search', [InterventionController::class, 'search'])->name('interventions.search');

//    Route::post('takeOvers/store', [TakeOverController::class, 'store'])->name('takeOvers.store');
    Route::get('workshop', [WorkshopController::class, 'index'])->name('workshop.index');
    Route::resource('interventions', InterventionController::class);







});

require __DIR__.'/auth.php';
