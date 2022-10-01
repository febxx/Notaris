<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Notaris;
use App\Models\KategoriAkun;
use App\Models\AktaNotarisJenis;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([ProvincesSeeder::class, CitiesSeeder::class, DistrictsSeeder::class, VillagesSeeder::class,]);

        User::create(['username' => 'admin', 'password' => bcrypt('admin'), 'role' => 'admin']);
        User::create(['username' => 'laras', 'password' => bcrypt('laras'), 'role' => 'notaris', 'status' => '1']);
        Notaris::create(['nama' => 'Larasati', 'email' => 'laras@gmail.com', 'telepon' => '0878889982121', 'user_id' => '2']);

        $akta_notaris_jenis = [
            ['name' => 'Perjanjian Sewa Menyewa','notaris_id' => '1',],
            ['name' => 'Perjanjian Ikatan Jual Beli','notaris_id' => '1',],
            ['name' => 'Perjanjian Kerja Sama','notaris_id' => '1',],
            ['name' => 'Kuasa','notaris_id' => '1',],
            ['name' => 'Fidusia Pendaftaran','notaris_id' => '1',],
            ['name' => 'Fidusia Roya','notaris_id' => '1',],
            ['name' => 'SKMHT','notaris_id' => '1',],
            ['name' => 'Van dading','notaris_id' => '1',],
            ['name' => 'Waris','notaris_id' => '1',],
            ['name' => 'Wasiat','notaris_id' => '1',],
            ['name' => 'Berita Acara','notaris_id' => '1',],
        ];
        foreach ($akta_notaris_jenis as $akta) {
            AktaNotarisJenis::create($akta);
        }

        $kategori_akun = ['Kas & Bank', 'Akun Piutang', 'Aktiva Lancar', 'Aktiva Tetap', 'Akun Hutang', 'Kewajiban Lancar', 'Kewajiban Jangka Panjang', 'Ekuitas', 'Pendapatan Utama', 'Beban', 'Pendapatan Lainnya', 'Beban Lainnya', 'Depresiasi'];
        foreach ($kategori_akun as $value) {
            KategoriAkun::create(['name' => $value]);
        }
    }
}
