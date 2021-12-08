<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Journale;

    class JournaleController extends Controller{
        public function StoreJournal($action,$id){
            $Journale = new Journale();
            $Journale->setActionAttribute($action);
            $Journale->setDateAttribute();
            $Journale->setTempsAttribute();
            $Journale->setRegionAttribute($this->SearchRegion());
            $Journale->setIdentificationAttribute($id);
            $Journale->save();
        }

        public function SearchRegion(){
             $ip = geoip()->getLocation(geoip()->getClientIp());
            return ($ip->country);
        }

        public function OuvrirJournaleCompte(Request $request){
            $PersonneController = new PersonneController();
            $email = $PersonneController->GetEmailSessionActive($request);
            $dataP = $PersonneController->GetDataSessionActive($email);
            $CompteController = new CompteController();
            $id = $CompteController->GetIdCompte($email);
            $dataJ = $this->GetListeJournale($id);
            $count = 0;

            if($this->GetCountJournale($id) == 0){
                return view('profils.journal_profil',compact('count','dataP'));
            }

            else{
                $count = 1;
                return view('profils.journal_profil',compact('count','dataP','dataJ'));
            }
        }

        public function GetListeJournale($id){
            $Journale = Journale::where('identification', '=', $id)->paginate(5);
            return $Journale;
        }

        public function GetCountJournale($id){
            $Journal = Journale::where('identification', '=', $id);
            return $Journal->count();
        }

        public function GestionSupprimerJournal(Request $request){
            $PersonneController = new PersonneController();
            $email = $PersonneController->GetEmailSessionActive($request);
            $CompteController = new CompteController();
            $id = $CompteController->GetIdCompte($email);

            if($this->GetCountJournale($id) == 0){
                return back()->with('journal-vide','');
            }

            else{
                return back()->with($this->SupprimerJournal($id),'');
            }
        }

        public function SupprimerJournal($id){
            $Journal = Journale::where('identification',$id)->delete();

            if($Journal){
                return ('journal-deleted');
            }

            else{
                return ('journal-not-deleted');
            }
        }
    }
?>
