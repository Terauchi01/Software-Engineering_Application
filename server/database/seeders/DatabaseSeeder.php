<?php

namespace Database\Seeders;

use App\Models\AccountInformation;
use App\Models\AdminInformation;
use App\Models\AdminUser;
use App\Models\ChildAccount;
use App\Models\CoopDrones;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use App\Models\DeliveryLocationImage;
use App\Models\DeliveryRequest;
use App\Models\DroneType;
use App\Models\Favorite;
use App\Models\LicenseInformation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        AccountInformation::factory(10)->create();
        AccountInformation::factory(10)->create();
        AdminUser::factory(10)->create();
        ChildAccount::factory(10)->create();
        CoopDrones::factory(10)->create();
        CoopLocation::factory(10)->create();
        CoopUser::factory(10)->create();
        DeliveryLocationImage::factory(10)->create();
        DeliveryRequest::factory(10)->create();
        DroneType::factory(10)->create();
        Favorite::factory(10)->create();
        LicenseInformation::factory(10)->create();
        User::factory(10)->create();
    }
}
