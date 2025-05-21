<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SparePartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spare_parts')->insert([
            [
                'spare_part_id' => 1011,
                'name' => 'Ban Motor',
                'stock' => 20,
                'entry_date' => '2024-05-17',
                'description' => 'Ban motor untuk berbagai jenis motor.', 
                'price' => 250000,
                'picture' => 'ban_motor.jpg'
            ],
            [
                'spare_part_id' => 1012,
                'name' => 'Rantai Motor',
                'stock' => 15,
                'entry_date' => '2024-05-17',
                'description' => 'Rantai motor tahan lama dan kuat.', 
                'price' => 300000,
                'picture' => 'rantai.jpg'
            ],
            [
                'spare_part_id' => 1013,
                'name' => 'Busi',
                'stock' => 30,
                'entry_date' => '2024-05-17',
                'description' => 'Busi untuk mesin motor yang awet.', 
                'price' => 50000,
                'picture' => 'busi.jpeg'
            ],
            [
                'spare_part_id' => 1014,
                'name' => 'Kampas Rem',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Kampas rem berkualitas tinggi.', 
                'price' => 150000,
                'picture' => 'kampas.jpg'
            ],
            [
                'spare_part_id' => 1015,
                'name' => 'footstep underbone CB 150r old cbr150r facelite cbr 150r lokal cb150 new',
                'stock' => 30,
                'entry_date' => '2024-05-17',
                'description' => 'underbone CB 150r old,cbr150r facelite,cbr 150r lokal, cb150 new
brg sesuai diiklan silakan diorder bos', 
                'price' => 215000,
                'picture' => 'footstep.jpeg'
            ],
            [
                'spare_part_id' => 1016,
                'name' => 'Master rem tabung Kaca oval aquarium model RCB Vixion ninja cb',
                'stock' => 15,
                'entry_date' => '2024-05-17',
                'description' => 'Master rem tabung Kaca oval aquarium model RCB Vixion ninja cb dll
barang 100% baru dan sesuai dengan foto di iklan ya bosku harga di iklan untuk 1 set punya ( kiri kanan )
silahkan di order bosku', 
                'price' => 93000,
                'picture' => 'Master_rem.jpeg'
            ],
            [
                'spare_part_id' => 1017,
                'name' => 'Knalpo Raching type long Ori XTHREE',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Knalpot racing  suara bisa di atur original X-Three memiliki keunggulan: bahan fulstainles, garansi jika di pengiriman ada cacat (bisa di tukar), suara bisa request AJA SESUAI SELERA.' ,
                'price' => 399000,
                'picture' => 'KNALPOT_RACING.jpeg'
            ],
            [
                'spare_part_id' => 1018,
                'name' => 'Header original DST Racing blue moon PNP R15 cbr150 Vixion fu GSX dll all motor 155cc ke bawah',
                'stock' => 10,
                'entry_date' => '2024-05-17',
                'description' => 'Header racing original DST Racing blue moon terbuat dari bahan stenlis
Warna tidak luntur karena warna hasil pembakarn, ukuran intel 50mm bisa dipake di semua jenis Dan tipe motor 155cc ke bawah. cth: Vixion,R15,cbr150,cb150,GSX,Fu,Sonic,dan yg lain.', 
                'price' => 195000,
                'picture' => 'Header_original.jpeg'
            ],
            [
                'spare_part_id' => 1019,
                'name' => 'Stang RZR + Raiser Stang CNC CB150R Satria Fu Vixion Sonic Universal',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Harga Di Atas Sudah Termasuk Harga Paketan + Raiser Stang CNC Sepasang 1 Set 2 Pcs
Produk Realpict Sesuai Foto Di Iklan.', 
                'price' => 82000,
                'picture' => 'Stang_RZR.jpeg'
            ],
            [
                'spare_part_id' => 1020,
                'name' => 'Lampu Sein Variasi GMA TST Model Sen Cb150r Kecil universal semua motor',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'MERK GMA TST, Harga 1 set (kiri kanan),nyala lampu kuning.', 
                'price' => 15000,
                'picture' => 'Lampu_Sein.jpg'
            ],
            [
                'spare_part_id' => 1021,
                'name' => 'Vanbelt Vario CBS FI KZR sparepart Takayama',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'HARGA TERJANGKAU, KUALITAS PREMIUM. MERK : TAKAYAMA, MOTOR : VARIO CBS FI, KODE PART : 23100-KZR-601 ', 
                'price' => 50000,
                'picture' => 'VANBELT_VARIO.jpeg'
            ],
            [
                'spare_part_id' => 1022,
                'name' => 'Filter Saringan Udara Karbu mahkota mini Karburator PE Motor universal',
                'stock' => 55,
                'entry_date' => '2024-05-17',
                'description' => 'Filter Saringan Karburator Mahkota mini cocok untuk PE24 PE26 PE28.', 
                'price' => 150000,
                'picture' => 'Filter_Saringan.jpeg'
            ],
            [
                'spare_part_id' => 1023,
                'name' => 'Sparepart Kipas Magnet Vespa Bajaj & Super Original Part Vitalia',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Sparepart Kipas Magnet Vespa Bajaj & Super Original Part Vitalia.', 
                'price' => 145000,
                'picture' => 'Kipas_Magnet.jpeg'
            ],
            [
                'spare_part_id' => 1024,
                'name' => 'cover tutup kipas crome beat Fi beat pop esp scoopy esp crome',
                'stock' => 15,
                'entry_date' => '2024-05-17',
                'description' => 'cover tutup kipas crome beat Fi beat pop esp scoopy esp crome', 
                'price' => 150000,
                'picture' => 'cover_tutup.jpeg'
            ],
            [
                'spare_part_id' => 1025,
                'name' => 'Engine - Mesin 4Tak 110 cc BEBEK E. Starter DOUBLE Clutch',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => '-Merk: NON Merk/ Made in China, Type: Electric Starter & Kick Starter,Basic: Honda Seri C, Displacement: 107cc, Bore x Stroke: 52.5mm x 49.5mm, Klep: 22mm/ 19mm, Transmisi: Bebek/ Semi Otomatis 4 Speed, Double Clutch/ Kopling Belakang', 
                'price' => 215000,
                'picture' => 'Engine_Mesin.jpeg'
            ],
            [
                'spare_part_id' => 1026,
                'name' => 'Kabel body bodi honda astrea grand legenda impressa',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Kabel body bodi honda astrea grand legenda impressa imi Goodquality.', 
                'price' => 188000,
                'picture' => 'Kabel_body.jpeg'
            ],
            [
                'spare_part_id' => 1027,
                'name' => 'Pelek Velg Depan Sepeda Listrik Tromol Depan Sepeda Listrik Ban Sepeda Listrik Rem Drum Depan 14x2.50',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Velg sepeda listrik universal 14, Ukuran untuk ban 14x2.50, Cocok untuk berbagai merk, Terdapat 2 Bentuk tromol rem yang dipakai.', 
                'price' => 158000,
                'picture' => 'Pelek_Velg.jpeg'
            ],
            [
                'spare_part_id' => 1028,
                'name' => 'Universal Oil Cooler Engine Transmission Oil Cooler',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => '100% baru, Cepat panas dan tahan lama. Pendingin oli digunakan untuk memancar mesin dan membuatnya lebih bertenaga. Membantu mengurangi suhu mesin pendingin dan memperpanjang umur mesin.', 
                'price' => 150000,
                'picture' => 'Universal_Oil.jpeg'
            ],
            [
                'spare_part_id' => 1029,
                'name' => 'keramik cylinder kit/blok seher 61mm motor jupiter MX135/merek YSMP',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Kegunaan untuk menambah compresi pada motor jup.mx.135/menaikan stroke motor anda Untuk motor balap atau untuk motor harian juga oke. Bahan nya bagus tidak mudah over het.', 
                'price' => 750000,
                'picture' => 'keramik_cylinder.jpeg'
            ],
            [
                'spare_part_id' => 1030,
                'name' => 'Lampu Tembak Sorot Led/Lampu Tembak',
                'stock' => 25,
                'entry_date' => '2024-05-17',
                'description' => 'Lampu Tembak Sorot Led Laser Cahaya High Low Putih Kuning Super Terang Plus Devil Eye Merah', 
                'price' => 50000,
                'picture' => 'Lampu_Tembak.jpeg'
            ],

        ]);

        // Update data
        DB::table('spare_parts')
            ->where('spare_part_id', 1011)
            ->update(['stock' => 25]);

        // Delete data
        DB::table('spare_parts')
            ->where('spare_part_id', 1014)
            ->delete();

        $source = public_path('spare_part/ride.png');
        $destination = storage_path('app/public/spare_parts/ride.png');
        
        if (File::exists($source)) {
            File::ensureDirectoryExists(storage_path('app/public/spare_parts'));
            File::copy($source, $destination);
        }
    }
}