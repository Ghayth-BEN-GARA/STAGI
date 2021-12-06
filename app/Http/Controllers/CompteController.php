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

        public function Authentification(Request $request){
            $verifierCompte = $this->VerifierCompte($request->email);

            if($verifierCompte == 'personne-not-exist'){
                return back()->with('personne-not-exist','');
            }

            else{
                try{
                    if(md5($request->password) != $this->GetPassword($request->email)){
                        return back()->with('parametres-incorrecte','');
                    }

                    else{
                        $JournaleController = new JournaleController();
                        $JournaleController->StoreJournal('Connexion',$this->GetIdCompte($request->email));
                        $this->CreerSession($request->email,$request);
                        return view('profile');
                    }
                }

                catch(\Exception $e){
                    return view ('errors.login');
                }
            }
        }

        public function GetPassword($email){
            $Compte = Compte::where('email', '=', $email)->first();
            return $Compte->getPasswordAttribute();
        }

        public function GestionDeconnexion(Request $request){
            $email = $request->session()->get('email');
            $JournaleController = new JournaleController();
            $JournaleController->StoreJournal('Déconnexion',$this->GetIdCompte($email));
            $this->LogOut();
        }

        public function LogOut(){
            Session::pull('email');
            Session::forget('email');
            Session::flush();
        }

        public function RechercherCompte(Request $request){
            $verifierCompte = $this->VerifierCompte($request->email);

            try{
                if($verifierCompte == 'personne-not-exist'){
                    return back()->with('compte-not-exist','');
                }

                else{
                    return view('authentification.forget2');
                }
            }

            catch(\Exception $e){
                return view ('errors.404');
            }
        }
    }
?>
