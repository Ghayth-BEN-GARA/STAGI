<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Journale extends Model{
        protected $table = 'journales';
        protected $primaryKey = 'id';
        public $timestamps = false;
        public $incrementing = true;
        protected $fillable = [
            'id',
            'password',
            'etat',
            'date',
            'temps',
            'identification',
        ];

        public function getIdAttribute(){
            return ($this->attributes['id']);
        }

        public function getActionAttribute(){
            return ($this->attributes['action']);
        }

        public function setActionAttribute($value){
            $this->attributes['action'] = $value;
        }

        public function getDateAttribute(){
            return ($this->attributes['date']);
        }

        public function setDateAttribute(){
            $this->attributes['date'] = date('Y/m/d');
        }

        public function getTempsAttribute(){
            return ($this->attributes['temps']);
        }

        public function setTempsAttribute(){
            $this->attributes['temps'] = date('H:i:s');
        }

        public function getRegionttribute(){
            return ($this->attributes['region']);
        }

        public function setRegionAttribute($value){
            $this->attributes['region'] = $value;
        }

        public function getIdentificationAttribute(){
            return ($this->attributes['identification']);
        }

        public function setIdentificationAttribute($value){
            $this->attributes['identification'] = $value;
        }
    }
?>
