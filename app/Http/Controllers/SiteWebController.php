<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class SiteWebController extends Controller{
        public function OuvrirHome(){
            try{
                return view('errors.404');
            }

            catch(InvalidArgumentException $e){
                return view('404');
            }
        }
    }
?>
