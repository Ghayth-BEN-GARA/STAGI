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
    }
?>
