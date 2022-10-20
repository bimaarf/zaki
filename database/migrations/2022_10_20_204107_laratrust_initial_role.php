<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaratrustInitialRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin          =   Role::create([
            'name'          => 'admin',
        ]);
        $user           =   Role::create([
            'name'          => 'user',
        ]);

        $dashboard      = Permission::create([
            'name'          => 'dashboard-admin',
        ]);
        $user_permission     = Permission::create([
            'name'          => 'dashboard-user',
        ]);
        $admin->attachPermissions([$dashboard]);
        $user->attachPermissions([$user_permission]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
