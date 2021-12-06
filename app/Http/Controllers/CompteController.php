<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use App\Models\Compte;

    class CompteController extends Controller{
        public function VerifierCompte($email){
            $Compte = Compte::where('email', '=', $email)->get();
            
            if($Compte->isEmpty()){
                return ('personne-not-exist');
            }

            else{
                return ('personne-exist');
            }
        }

        public function StoreCompte($email,$password){
            $Compte = new Compte();
            $Compte->setPasswordAttribute($password);
            $Compte->setDateAttribute();
            $Compte->setTempsAttribute();
            $Compte->setEmailAttribute($email);
            $Compte->save();
        }

        public function GetIdCompte($email){
            $Compte = Compte::where('email', '=', $email)->first();
            return ($Compte->getIdAttribute());
        }

        public function CreerSession($email,$request){
            $request->session()->put('email',$email);	
        }
    }
?>
