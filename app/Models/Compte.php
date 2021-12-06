<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Compte extends Model{
        protected $table = 'comptes';
        protected $primaryKey = 'id';
        public $timestamps = false;
        public $incrementing = true;
        protected $fillable = [
            'id',
            'password',
            'etat',
            'date',
            'temps',
            'id',
        ];

        public function getIdAttribute(){
            return ($this->attributes['id']);
        }

        public function setIdAttribute($value){
            $this->attributes['id'] = $value;
        }

        public function getPasswordAttribute(){
            return ($this->attributes['password']);
        }

        public function setPasswordAttribute($value){
            $this->attributes['password'] = md5($value);
        }

        public function getEtatAttribute(){
            return ($this->attributes['etat']);
        }

        public function setEtatAttribute($value){
            $this->attributes['etat'] = $value;
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

        public function getEmailAttribute(){
            return ($this->attributes['email']);
        }

        public function setEmailAttribute($value){
            $this->attributes['email'] = $value;
        }
    }
?>
