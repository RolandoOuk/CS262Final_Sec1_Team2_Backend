<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Migrations\Migration;

class UpdatePasswordsToBcrypt extends Migration
{
    public function up()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => Hash::make($user->password)]);
        }
    }

    public function down()
    {
        // Implementation for reverting the migration, if necessary
    }
}
