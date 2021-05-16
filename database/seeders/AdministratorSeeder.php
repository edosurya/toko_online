<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Models\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "admin@toko.test";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("password");
        $administrator->avatar = "saat-ini-tidak-ada-file.png";
        $administrator->address = "Simatupang, Jakarta Selatan";

        $administrator->save();


        $customer = new \App\Models\User;
        $customer->username = "customer1";
        $customer->name = "CUSTOMER 1";
        $customer->email = "customer1@toko.test";
        $customer->roles = json_encode(["CUSTOMER"]);
        $customer->password = \Hash::make("password");
        $customer->avatar = "saat-ini-tidak-ada-file.png";
        $customer->address = "Simatupang, Jakarta Selatan";

        $customer->save();

        $customer2 = new \App\Models\User;
        $customer2->username = "customer2";
        $customer2->name = "CUSTOMER 2";
        $customer2->email = "customer2@toko.test";
        $customer2->roles = json_encode(["CUSTOMER"]);
        $customer2->password = \Hash::make("password");
        $customer2->avatar = "saat-ini-tidak-ada-file.png";
        $customer2->address = "Simatupang, Jakarta Selatan";

        $customer2->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
