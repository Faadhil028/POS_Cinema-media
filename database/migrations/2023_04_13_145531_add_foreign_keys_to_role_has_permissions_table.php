<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->foreign(['permission_id'], 'fk_role_has_permissions_permissions1')->references(['id'])->on('permissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['role_id'], 'fk_role_has_permissions_roles1')->references(['id'])->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->dropForeign('fk_role_has_permissions_permissions1');
            $table->dropForeign('fk_role_has_permissions_roles1');
        });
    }
};
