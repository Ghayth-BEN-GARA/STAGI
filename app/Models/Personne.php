<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Personne extends Model{
        protected $table = 'personnes';
        protected $primaryKey = 'email';
        public $timestamps = false;
        public $incrementing = false;
        protected $fillable = [
            'email',
            'nom',
            'prenom',
            'genre',
            'numero',
            'naissance',
            'profession',
        ];

        public function getEmailAttribute(){
            return ($this->attributes['email']);
        }

        public function setEmailAttribute($value){
            $this->attributes['email'] = $value;
        }

        public function getNomAttribute(){
            return ($this->attributes['nom']);
        }

        public function setNomAttribute($value){
            $this->attributes['nom'] = $value;
        }

        public function getPrenomAttribute(){
            return ($this->attributes['prenom']);
        }

        public function setPrenomAttribute($value){
            $this->attributes['prenom'] = $value;
        }

        public function getGenreAttribute(){
            return ($this->attributes['genre']);
        }

        public function setGenreAttribute($value){
            $this->attributes['genre'] = $value;
        }

        public function getNumeroAttribute(){
            return ($this->attributes['numero']);
        }

        public function setNumeroAttribute($value){
            $this->attributes['numero'] = $value;
        }

        public function getNaissanceAttribute(){
            return ($this->attributes['naissance']);
        }

        public function setNaissanceAttribute($value){
            $this->attributes['naissance'] = $value;
        }

        public function getProfessionAttribute(){
            return ($this->attributes['profession']);
        }

        public function setProfessionAttribute($value){
            $this->attributes['profession'] = $value;
        }
    }
?>