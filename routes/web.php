<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ContactController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::view('/contacts/create', 'create');
    Route::get('/contacts', [ContactController::class, 'list'])->name('listContacts');
//    Route::get("/contacts/create", [ContactController::class, 'create']);
    Route::post("/contacts", [ContactController::class, 'store'])->name('createContact');
    Route::get("/contacts/{id}", [ContactController::class, 'getUser']);
    Route::get('/contacts/{id}/edit', [ContactController::class, 'editUser']);
    Route::put("/contacts/{id}", [ContactController::class, 'updateUser'])->name('updateContact');
    Route::delete("/contacts/{id}", [ContactController::class, 'delete']);
