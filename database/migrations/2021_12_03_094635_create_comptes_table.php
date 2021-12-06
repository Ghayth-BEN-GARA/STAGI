<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateComptesTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::create('comptes', function (Blueprint $table) {
                $table->collation = 'utf8_general_ci';
                $table->charset = 'utf8';
                $table->id();
                $table->string('password',999);
                $table->string('etat',50)->default('Active');
                $table->date('date');
                $table->time('temps');
                $table->string('email',200);
                $table->foreign('email')->references('email')->on('personnes')->onUpdate('cascade')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('comptes');
        }
    }
?>
