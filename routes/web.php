<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ContactController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/contacts/create', function () {
        return view('create');
    });

    Route::get('/contacts', [ContactController::class, 'list'])->name('listContacts');
    Route::post("/contacts", [ContactController::class, 'store'])->name('createContact');
    Route::get("/contacts/{id}", [ContactController::class, 'getUser']);
    Route::get('/contacts/{id}/edit', [ContactController::class, 'editUser']);
    Route::put("/contacts/{id}", [ContactController::class, 'updateUser'])->name('updateContact');
    Route::delete("/contacts/{id}", [ContactController::class, 'delete']);

