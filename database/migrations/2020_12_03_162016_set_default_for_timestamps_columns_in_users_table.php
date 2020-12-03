<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SetDefaultForTimestampsColumnsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE users ALTER COLUMN created_at SET DEFAULT CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE users ALTER COLUMN updated_at SET DEFAULT CURRENT_TIMESTAMP');
        DB::statement('CREATE TRIGGER touch_before_update BEFORE UPDATE ON users FOR EACH ROW EXECUTE FUNCTION touch();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TRIGGER touch_before_update ON users;');
        DB::statement('ALTER TABLE users ALTER COLUMN updated_at DROP DEFAULT');
        DB::statement('ALTER TABLE users ALTER COLUMN created_at DROP DEFAULT');
    }
}
