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
        CoopUser::factory(100)->create();
        User::factory(100)->create();
        AccountInformation::factory(100)->create();
        DroneType::factory(100)->create();
        CoopDrones::factory(100)->create();
        CoopLocation::factory(100)->create();
        DeliveryLocationImage::factory(100)->create();
        DeliveryRequest::factory(1000)->create();
        Favorite::factory(100)->create();
        LicenseInformation::factory(100)->create();
    }
}
