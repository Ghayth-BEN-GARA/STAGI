<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SiteWebController;
    use App\Http\Controllers\PersonneController;

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
    Route::get('/', [SiteWebController::class, 'OuvrirHome']);
    Route::get('/contact', [SiteWebController::class, 'OuvrirContact']);
    Route::get('/envoyer-email-contact', [SiteWebController::class, 'EnvoyerEmail']);
    Route::get('/signup', [SiteWebController::class, 'OuvrirSignup'])->middleware('login');
    Route::post('/registration', [PersonneController::class, 'Registration']);
    Route::get('/not-found', [SiteWebController::class, 'OuvrirNotFound']);
?>
