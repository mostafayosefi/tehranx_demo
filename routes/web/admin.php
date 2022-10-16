<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;


use App\Http\Controllers\Eform\FormController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\ComidController;
use App\Http\Controllers\Admin\FetchController;
use App\Http\Controllers\Eform\PlaneController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TextdesController;
use App\Http\Controllers\Admin\SpotliteController;
use App\Http\Controllers\Eform\CurrencyController;
use App\Http\Controllers\Eform\FormDataController;
use App\Http\Controllers\Admin\Exam\ExamController;
use App\Http\Controllers\Eform\FormFieldController;
use App\Http\Controllers\Eform\FormColoumnController;
use App\Http\Controllers\Eform\FormSettingController;
use App\Http\Controllers\Eform\FormCategoryController;
use App\Http\Controllers\Eform\FormDataListController;
use App\Http\Controllers\Eform\FormTemplateController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Admin\GetwaypaymentController;
use App\Http\Controllers\Admin\Course\TeacherController;
use App\Http\Controllers\Eform\FormColoumnMultController;
use App\Http\Controllers\Eform\FormSubcategoryController;
use App\Http\Controllers\Admin\Course\CourseFileController;
use App\Http\Controllers\Admin\Course\CourseTypeController;
use App\Http\Controllers\Admin\PriceFinicalController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Eform\DiscountController;
use App\Http\Controllers\Notification\NotificationListController;
use App\Http\Controllers\Notification\SettingSmsController;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/demo', [AdminController::class, 'admindemo'])->name('demo');
Route::get('/index', [AdminController::class, 'demoindex'])->name('index');



            //profile
            //profile
            //profile
            Route::prefix('profile')->name('profile.')->group(function () {
                Route::get('/', [ProfileController::class, 'index'])->name('index');
                Route::get('/show', [ProfileController::class, 'show'])->name('show');
                Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
                Route::put('/update', [ProfileController::class, 'update'])->name('update');
                Route::get('/secret', [ProfileController::class, 'secret'])->name('secret');
                Route::put('/secret', [ProfileController::class, 'secret_update'])->name('secret.update');
            });






Route::prefix('user')
->name('user.')->group(function () {
    Route::get('/createuser', [UserController::class, 'create'])->name('create');
    Route::put('/create', [UserController::class, 'store'])->name('store');
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{user}/edit/{tab_active?}', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
    Route::put('/{user}/secret', [UserController::class, 'secret'])->name('secret');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::put('/{id}/status/{tab_active?}', [UserController::class, 'status'])->name('status');
    Route::put('/{id}/status_api/api', [UserController::class, 'status_api'])->name('status.api');
    Route::put('/{id}/status_bank_account/bank_account', [UserController::class, 'status_bank_account'])->name('status.bank_account');
    Route::get('/{id}/login', [UserController::class, 'login'])->name('login');




    Route::prefix('authentication')->name('authentication.')->group(function () {

        Route::put('/file_activition/{authentication}/{file}/{activition}', [AuthenticationController::class, 'file_activition'])->name('file_activition');



    });



});






Route::prefix('bank')->name('bank.')->group(function () {

    Route::get('/indexbank', [BankController::class, 'index'])->name('index');
    Route::get('/createbank', [BankController::class, 'create'])->name('create');
    Route::post('/', [BankController::class, 'store'])->name('store');
    Route::get('/{id}', [BankController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [BankController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BankController::class, 'update'])->name('update');
    Route::delete('/{id}', [BankController::class, 'destroy'])->name('destroy');

});


Route::prefix('task')->name('task.')->group(function () {

    Route::get('/indextimeline/{type?}', [TaskController::class, 'index'])->name('index');
    Route::get('/{id}', [TaskController::class, 'show'])->name('show');

});




/*
Verb          Path                        Action  Route Name
GET           /users                      index   users.index
GET           /users/create               create  users.create
POST          /users                      store   users.store
GET           /users/{user}               show    users.show
GET           /users/{user}/edit          edit    users.edit
PUT|PATCH     /users/{user}               update  users.update
DELETE        /users/{user}               destroy users.destroy

 */
Route::prefix('faq')
->name('faq.')->group(function () {
    Route::get('/indexfaq', [FaqController::class, 'index'])->name('index');
    Route::get('/createfaq', [FaqController::class, 'create'])->name('create');
    Route::post('/', [FaqController::class, 'store'])->name('store');
    Route::get('/{id}', [FaqController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [FaqController::class, 'edit'])->name('edit');
    Route::put('/{id}', [FaqController::class, 'update'])->name('update');
    Route::delete('/{id}', [FaqController::class, 'destroy'])->name('destroy');
});



Route::prefix('page')
->name('page.')->group(function () {
    Route::get('/indexpage', [PageController::class, 'index'])->name('index');
    Route::get('/createpage', [PageController::class, 'create'])->name('create');
    Route::post('/', [PageController::class, 'store'])->name('store');
    Route::get('/{id}', [PageController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PageController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PageController::class, 'update'])->name('update');
    Route::delete('/{id}', [PageController::class, 'destroy'])->name('destroy');
});


Route::prefix('setting')
->name('setting.')->group(function () {
    Route::get('/logo_management', [SettingController::class, 'logo_management'])->name('logo_management');
    Route::put('/logo_management', [SettingController::class, 'update_logo'])->name('update_logo');

    Route::get('/all_management', [SettingController::class, 'all_management'])->name('all_management');
    Route::put('/all_management', [SettingController::class, 'update_management'])->name('update_management');

    Route::get('/txtdes_management', [TextdesController::class, 'index'])->name('txtdes_management');
    Route::get('/txtdes_management/{id}/edit', [TextdesController::class, 'edit'])->name('txtdes_management_edit');
    Route::put('/txtdes_management/{id}', [TextdesController::class, 'update'])->name('txtdes_management_update');

    Route::get('/finical', [SettingController::class, 'finical'])->name('finical');
    Route::put('/finical', [SettingController::class, 'update_finical'])->name('update_finical');

    Route::get('/api_token', [SettingController::class, 'api'])->name('api');
    Route::put('/api_token', [SettingController::class, 'update_api'])->name('update_api');


    Route::get('/laws', [SettingController::class, 'laws'])->name('laws');
    Route::put('/laws', [SettingController::class, 'update_laws'])->name('update_laws');


    Route::get('/getway_payment', [GetwaypaymentController::class, 'index'])->name('getway_payment');
    Route::get('/getway_payment/{id}/edit', [GetwaypaymentController::class, 'edit'])->name('getway_payment_edit');
    Route::put('/getway_payment/{id}', [GetwaypaymentController::class, 'update'])->name('getway_payment_update');
    Route::put('/getway_payment/statuse/{status}/{id}', [GetwaypaymentController::class, 'status'])->name('getway_payment_status');
});




Route::prefix('manegement')
->name('manegement.')->group(function () {


    Route::get('/spotlites', [SpotliteController::class, 'index'])->name('spotlites');
    Route::get('/spotlites/{id}/edit', [SpotliteController::class, 'edit'])->name('spotlites_edit');
    Route::put('/spotlites/{id}', [SpotliteController::class, 'update'])->name('spotlites_update');


    Route::get('/comid/{status}'  , [ComidController::class, 'index'])->name('comid_index');
    Route::put('/comid/{status}'  , [ComidController::class, 'store'])->name('comid_store');
    Route::get('/comid/{status}/{id}/edit'  , [ComidController::class, 'edit'])->name('comid_edit');
    Route::put('/comid/{status}/{id}', [ComidController::class, 'update'])->name('comid_update');
    Route::delete('/comid/{status}/delete/{id}', [ComidController::class, 'destroy'])->name('comid_destroy');

});






Route::prefix('wallet')
->name('wallet.')->group(function () {

    Route::get('/', [WalletController::class, 'index'])->name('index');
    Route::get('/create_charge', [WalletController::class, 'create'])->name('create');
    Route::post('/', [WalletController::class, 'store'])->name('store');
    Route::get('/{id}/showwallet', [WalletController::class, 'show'])->name('show');
    Route::put('/{id}/{status}/change_status', [WalletController::class, 'status'])->name('status');

});







Route::prefix('ticket')
->name('ticket.')->group(function () {
    Route::get('/indexticket', [TicketController::class, 'index'])->name('index');
    Route::get('/{ticket}/chating', [TicketController::class, 'show'])->name('show');
    Route::put('/{ticket}', [TicketController::class, 'update'])->name('update');
    Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('destroy');
    Route::get('/close/{ticket}', [TicketController::class, 'status'])->name('close');
});




// START ROUTE PROJECT


Route::prefix('form')->name('form.')->group(function () {


    Route::prefix('form_seting')
        ->name('form_seting.')->group(function () {
            Route::get('/confirm_setting', [FormSettingController::class, 'index'])->name('index');
            Route::post('/', [FormSettingController::class, 'store'])->name('store');
        });


    Route::prefix('form_category')
    ->name('form_category.')->group(function () {
        Route::get('/indexformcategory', [FormCategoryController::class, 'index'])->name('index');
        Route::get('/createformcategory', [FormCategoryController::class, 'create'])->name('create');
        Route::post('/', [FormCategoryController::class, 'store'])->name('store');
        Route::get('/{id}/show', [FormCategoryController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FormCategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FormCategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [FormCategoryController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [FormCategoryController::class, 'status'])->name('status');
    });


    Route::prefix('form_subcategory')
    ->name('form_subcategory.')->group(function () {
        Route::get('/indexformsubcategory', [FormSubcategoryController::class, 'index'])->name('index');
        Route::get('/createformsubcategory', [FormSubcategoryController::class, 'create'])->name('create');
        Route::post('/', [FormSubcategoryController::class, 'store'])->name('store');
        Route::get('/{id}/show', [FormSubcategoryController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FormSubcategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FormSubcategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [FormSubcategoryController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [FormSubcategoryController::class, 'status'])->name('status');
    });





    Route::prefix('form_field')
    ->name('form_field.')->group(function () {
        Route::get('/indexformfield', [FormFieldController::class, 'index'])->name('index');
        Route::get('/createformfield', [FormFieldController::class, 'create'])->name('create');
        Route::post('/', [FormFieldController::class, 'store'])->name('store');
        Route::get('/{id}/show', [FormFieldController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FormFieldController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FormFieldController::class, 'update'])->name('update');
        Route::delete('/{id}', [FormFieldController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [FormFieldController::class, 'status'])->name('status');
    });

    Route::prefix('form')
    ->name('form.')->group(function () {
        Route::get('/indexform', [FormController::class, 'index'])->name('index');
        Route::get('/createform', [FormController::class, 'create'])->name('create');
        Route::post('/', [FormController::class, 'store'])->name('store');
        Route::get('/{id}/show', [FormController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FormController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FormController::class, 'update'])->name('update');
        Route::delete('/{id}', [FormController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [FormController::class, 'status'])->name('status');
    });


    Route::prefix('form_coloumn')
    ->name('form_coloumn.')->group(function () {
        Route::get('/index/{id?}/indexformcoloumn', [FormColoumnController::class, 'index'])->name('index');
        Route::get('/createformcoloumn', [FormColoumnController::class, 'create'])->name('create');
        Route::post('/', [FormColoumnController::class, 'store'])->name('store');
        Route::get('/{id}/show', [FormColoumnController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FormColoumnController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FormColoumnController::class, 'update'])->name('update');
        Route::delete('/{id}', [FormColoumnController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [FormColoumnController::class, 'status'])->name('status');
        Route::get('/{id}/priority/{up_down}', [FormColoumnController::class, 'priority'])->name('priority');
    });


    Route::prefix('form_coloumn_mult')
    ->name('form_coloumn_mult.')->group(function () {
        Route::get('/index/{id?}/indexformcoloumnmult', [FormColoumnMultController::class, 'index'])->name('index');
        Route::get('/createformcoloumnmult', [FormColoumnMultController::class, 'create'])->name('create');
        Route::post('/', [FormColoumnMultController::class, 'store'])->name('store');
        Route::get('/{id}/show', [FormColoumnMultController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FormColoumnMultController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FormColoumnMultController::class, 'update'])->name('update');
        Route::delete('/{id}', [FormColoumnMultController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [FormColoumnMultController::class, 'status'])->name('status');
        Route::get('/{id}/priority/{up_down}', [FormColoumnMultController::class, 'priority'])->name('priority');
    });


    Route::prefix('form_data_list')
    ->name('form_data_list.')->group(function () {
        Route::get('/indexformdatalist', [FormDataListController::class, 'index'])->name('index');
        Route::get('/createformdatalist', [FormDataListController::class, 'create'])->name('create');
        Route::post('/', [FormDataListController::class, 'store'])->name('store');
        Route::get('/{id}/show', [FormDataListController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FormDataListController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FormDataListController::class, 'update'])->name('update');
        Route::delete('/{id}', [FormDataListController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [FormDataListController::class, 'status'])->name('status');
    });


    Route::prefix('form_data')
    ->name('form_data.')->group(function () {
        Route::get('/indexformdataexamp', [FormDataController::class, 'index'])->name('index');
        Route::get('/createformdataexamp', [FormDataController::class, 'create'])->name('create');
        Route::post('/', [FormDataController::class, 'store'])->name('store');
        Route::get('/{id}/show', [FormDataController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FormDataController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FormDataController::class, 'update'])->name('update');
        Route::delete('/{id}', [FormDataController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [FormDataController::class, 'status'])->name('status');
    });


    Route::prefix('form_template')
        ->name('form_template.')->group(function () {
            Route::get('/indexform_template', [FormTemplateController::class, 'index'])->name('index');
            Route::get('/createform_template', [FormTemplateController::class, 'create'])->name('create');
            Route::post('/', [FormTemplateController::class, 'store'])->name('store');
            Route::get('/{id}', [FormTemplateController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [FormTemplateController::class, 'edit'])->name('edit');
            Route::put('/{id}', [FormTemplateController::class, 'update'])->name('update');
            Route::delete('/{id}', [FormTemplateController::class, 'destroy'])->name('destroy');
        });



Route::prefix('currency')
->name('currency.')->group(function () {
    Route::get('/indexcurrency', [CurrencyController::class, 'index'])->name('index');
    Route::get('/createcurrency', [CurrencyController::class, 'create'])->name('create');
    Route::post('/', [CurrencyController::class, 'store'])->name('store');
    Route::get('/{id}', [CurrencyController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [CurrencyController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CurrencyController::class, 'update'])->name('update');
    Route::put('/{id}/status', [CurrencyController::class, 'status'])->name('status');
    Route::delete('/{id}', [CurrencyController::class, 'destroy'])->name('destroy');
});

Route::prefix('discount')
->name('discount.')->group(function () {
    Route::get('/indexdiscount', [DiscountController::class, 'index'])->name('index');
    Route::get('/creatediscount', [DiscountController::class, 'create'])->name('create');
    Route::post('/', [DiscountController::class, 'store'])->name('store');
    Route::get('/{id}', [DiscountController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [DiscountController::class, 'edit'])->name('edit');
    Route::put('/{id}', [DiscountController::class, 'update'])->name('update');
    Route::put('/{id}/status', [DiscountController::class, 'status'])->name('status');
    Route::delete('/{id}', [DiscountController::class, 'destroy'])->name('destroy');
});




Route::prefix('plane')
->name('plane.')->group(function () {
    Route::get('/indexplane/{link_cat}', [PlaneController::class, 'index'])->name('index');
    Route::get('/indexplane/{link_cat}/{link_subcat}', [PlaneController::class, 'index_subcat'])->name('index_subcat');
    Route::get('/indexplane/{link_cat}/{link_subcat}/{link_form}/edit', [PlaneController::class, 'edit'])->name('edit');
    Route::get('/createplane', [PlaneController::class, 'create'])->name('create');
    Route::post('/', [PlaneController::class, 'store'])->name('store');
    Route::get('/{id}/show', [PlaneController::class, 'show'])->name('show');
     Route::put('/{id}', [PlaneController::class, 'update'])->name('update');
    Route::delete('/{id}', [PlaneController::class, 'destroy'])->name('destroy');
    Route::put('/{id}/status', [PlaneController::class, 'status'])->name('status');
});


Route::prefix('price')
->name('price.')->group(function () {
    Route::get('/fee', [PriceFinicalController::class, 'fee'])->name('fee');
    Route::put('/update_fee', [PriceFinicalController::class, 'update_fee'])->name('update_fee');
});



});





Route::prefix('notification')->name('notification.')->group(function () {

    Route::prefix('settingsms')
    ->name('settingsms.')->group(function () {
        Route::get('/smssetting', [SettingSmsController::class, 'index'])->name('index');
        Route::get('/smssetting/{id}/edit', [SettingSmsController::class, 'edit'])->name('edit');
        Route::put('/smssetting/{id}', [SettingSmsController::class, 'update'])->name('update');
        Route::put('/smssetting/statuse/{status}/{id}', [SettingSmsController::class, 'status'])->name('status');
    });


    Route::prefix('list')
    ->name('list.')->group(function () {
        Route::get('/index', [NotificationListController::class, 'index'])->name('index');
        Route::get('/{id}/type', [NotificationListController::class, 'type'])->name('type');
        Route::get('/{id}/type/edit', [NotificationListController::class, 'edit'])->name('edit');
        Route::put('/{id}/type/update', [NotificationListController::class, 'update'])->name('update');
        Route::put('/{id}/status', [NotificationListController::class, 'status'])->name('status');

     });



});



Route::prefix('fetch')
->name('fetch.')->group(function () {

    Route::get('/form_subcategory/{value}', [FetchController::class, 'form_subcategory'])->name('form_subcategory');
    Route::get('/form/{value}/{multi?}', [FetchController::class, 'form'])->name('form');
    Route::get('/form_coloumn/{value}', [FetchController::class, 'form_coloumn'])->name('form_coloumn');
    Route::get('/form_fetch/{value}', [FetchController::class, 'form_fetch'])->name('form_fetch');
    Route::get('/form_currency/{value}', [FetchController::class, 'form_currency'])->name('form_currency');
    Route::get('/form_fetch_price/{value}', [FetchController::class, 'form_fetch_price'])->name('form_fetch_price');

    // Route::get('/view_js_form/{value}/{guard}', [FetchController::class, 'view_js_form'])->name('view_js_form');

});





