<?php
//ファイルの場所
//server/database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use App\Models\AccountInformation;
use App\Models\AdminInformation;
use App\Models\AdminUser;
use App\Models\CoopDrones;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use App\Models\DeliveryLocationImage;
use App\Models\DeliveryRequest;
use App\Models\DroneType;
use App\Models\Favorite;
use App\Models\LicenseInformation;
use App\Models\User;
use App\Models\LentRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    private const SEEDERS = [
        MstPrefectureSeeder::class,
        CitiesTableSeeder::class,
    ];
    public function run(): void
    {
        foreach(self::SEEDERS as $seeder) {
            $this->call($seeder);
        }
        AdminUser::factory(1)->create();
        AdminInformation::factory(100)->create();
        AccountInformation::factory(100)->create();
        LicenseInformation::factory(100)->create();
        CoopUser::factory(1)->create();
        CoopUser::factory(99)->create();
        User::factory(1)->create();
        User::factory(99)->create();
        DroneType::factory(100)->create();
        CoopDrones::factory(100)->create();
        for ($i = 0; $i < 100; $i++) {
            CoopLocation::factory(1)->create();
        }
        DeliveryLocationImage::factory(100)->create();
        DeliveryRequest::factory(100)->create();
        Favorite::factory(100)->create();
        // dd(LicenseInformation::factory(1)->create());
        LentRequest::factory(100)->create();
    }
}
