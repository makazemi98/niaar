<?php

use App\Http\Controllers\Inquiry\InquiryController;
use App\Http\Controllers\manager\ManagerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
*/

Route::prefix('inquiries')->namespace('Inquiry')->group(function () {

    Route::get('/list', [InquiryController::class, 'inquiriesList'])->name('inquiries.list');
    // ->middleware('CheckRole:manager,');
    Route::get('{inquiry}/log', [InquiryController::class, 'getInquiry'])->name('inquiries.log');
    Route::get('{inquiry}/docs', [InquiryController::class, 'getDocsInquiry'])->name('inquiries.docs');
    Route::get('/download/docs/{file}', [InquiryController::class, 'downloadFileDocs'])->name('inquiries.download.docs');
    Route::get('/download/confidential/{file}', [InquiryController::class, 'downloadFileConfidential'])->name('inquiries.download.confidential');
    Route::post('/add-comment/{inquiry}', [InquiryController::class, 'addComment'])->name('inquiries.add.comment');
    Route::post('/add-question/{inquiry}', [InquiryController::class, 'addQuestion'])->name('inquiries.add.question');

    Route::group(['middleware' => ['role:manager|team-leader']], function () {
        Route::get('/files-delete/{file}', [InquiryController::class, 'deleteFiles'])->name('inquiries.files.delete');
        Route::post('/change-to-open/{inquiry}', [InquiryController::class, 'chnageStatusToOpen'])->name('inquiries.change.to.open');

        Route::post('/confirmReassign/{inquiry}', [InquiryController::class, 'confirmReassign'])->name('inquiries.confirm.reassign');
    });

    Route::group(['middleware' => ['role:manager|team-leader|client']], function () {
        Route::post('/store', [InquiryController::class, 'storeInquiries'])->name('inquiries.store');
        Route::get('/create', [InquiryController::class, 'createInquiries'])->name('inquiries.create');
        Route::post('/change-to-cancel/{inquiry}', [InquiryController::class, 'inquiriesCancel'])->name('inquiries.cancel');

    });

    Route::group(['middleware' => ['role:manager|team-leader|accountant|procurement']], function () {
        Route::get('{inquiry}/confidential', [InquiryController::class, 'getConfidentialInquiry'])->name('inquiries.confidential');

        Route::post('/reminder/{inquiry}', [InquiryController::class, 'addReminder'])->name('inquiries.add.reminder');
        Route::post('/uploud-files/{inquiry}', [InquiryController::class, 'uploadDoc'])->name('inquiries.upload.files');
        Route::post('/change-status/{inquiry}', [InquiryController::class, 'changeStatus'])->name('inquiries.change.status');

        Route::post('/add-confidential-comment/{inquiry}', [InquiryController::class, 'addConfidential'])->name('inquiries.add.confidential.comment');
        Route::get('{inquiry}/calculation', [InquiryController::class, 'getCalculationInquiry'])->name('inquiries.calculation');

        Route::get('/reminder/{inquiry}', [InquiryController::class, 'getReminderInquiry'])->name('inquiries.reminder');
        Route::delete('/reminder-delete/{reminder}', [InquiryController::class, 'deleteReminder'])->name('inquiries.reminder.delete');
    });


    Route::group(['middleware' => ['role:manager|team-leader|accountant']], function () {
        Route::post('{inquiry}/calculation', [InquiryController::class, 'storeCalculation'])->name('inquiries.calculation.store');
        Route::get('{inquiry}/calculation', [InquiryController::class, 'getCalculationInquiry'])->name('inquiries.calculation');

        Route::post('{inquiry}/futureDues', [InquiryController::class, 'storeFutureDues'])->name('inquiries.future.dues.store');
    });

    Route::group(['middleware' => ['role:procurement']], function () {
        Route::post('/start-by-procurement/{inquiry}', [InquiryController::class, 'start'])->name('inquiries.change.status.start');
    
    });

    Route::group(['middleware' => ['role:manager|team-leader|procurement']], function () {
        Route::post('/add/suppliers/{inquiry}', [InquiryController::class, 'addSuppliers'])->name('inquiries.add.suppliers');
        Route::post('/quoted-or-rejected-status/{inquiry}', [InquiryController::class, 'quotedOrRejected'])->name('inquiries.change.status.quoted.or.rejected');
        Route::post('/reassign/{inquiry}', [InquiryController::class, 'confirmReassign'])->name('inquiries.reassign');
        Route::post('/assign/{inquiry}', [InquiryController::class, 'assign'])->name('inquiries.assign');

    });




    // Route::prefix('team-members')->group(function () {
    //     Route::get('/', [UserController::class, 'teamMembers'])->name('manager.team.members');
    //     Route::get('/create', [UserController::class, 'createTeamMembers'])->name('manager.team.members.create');
    //     Route::post('/store', [UserController::class, 'store'])->name('manager.team.members.store');
    // });

    // Route::prefix('clients')->group(function () {
    //     Route::get('/', [UserController::class, 'getClient'])->name('manager.clients');
    //     Route::get('/create', [ManagerController::class, 'createClients'])->name('manager.clients.create');
    //     Route::post('/store', [UserController::class, 'storeCustomer'])->name('manager.clients.store');
    // });




    // Route::prefix('profile')->group(function () {
    //     Route::get('/{user}', [ManagerController::class, 'profile'])->name('manager.profile');
    //     Route::get('/edit', [ManagerController::class, 'editProfile'])->name('manager.profile.edit');
    // });
});


// Route::prefix('inquiries')->group(function () {

//     Route::get('/', [InquiryController::class, 'inquiriesList'])->name('manager.inquiries');
//     Route::get('/create', [InquiryController::class, 'createInquiries'])->name('manager.inquiries.create');
//     Route::post('/store', [InquiryController::class, 'storeInquiries'])->name('manager.inquiries.store');
//     Route::get('{inquiry}/log', [InquiryController::class, 'getInquiry'])->name('manager.ticket');
//     Route::get('{inquiry}/docs', [InquiryController::class, 'getDocsInquiry'])->name('manager.ticket.docs');
//     Route::get('{inquiry}/confidential', [InquiryController::class, 'getConfidentialInquiry'])->name('manager.ticket.confidential');
//     Route::get('/download/{file}', [InquiryController::class, 'downloadFile'])->name('manager.ticket.downloadFile');

//     
//     Route::post('/start-by-procurement/{inquiry}', [InquiryController::class, 'start'])->name('manager.ticket.status.start');
//     Route::post('/add-comment/{inquiry}', [InquiryController::class, 'addComment'])->name('manager.ticket.add_comment');
//     Route::post('/add-question/{inquiry}', [InquiryController::class, 'addQuestion'])->name('manager.ticket.add_question');
//     Route::post('/add-confidential-comment/{inquiry}', [InquiryController::class, 'addConfidential'])->name('manager.ticket.add.confidential.comment');
//     Route::post('/change-status/{inquiry}', [InquiryController::class, 'changeStatus'])->name('manager.ticket.change.status');
//     Route::post('/uploud-files/{inquiry}', [InquiryController::class, 'uploadDoc'])->name('manager.ticket.upload.files');
//     Route::post('/reminder/{inquiry}', [InquiryController::class, 'addReminder'])->name('manager.ticket.add.reminder');
// });
