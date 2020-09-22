<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class ComicSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {

        $data = [
            [
                'title'      => "Naruto",
                'slug'       => "naruto",
                'author'     => "Masashi Kishimoto",
                'publisher'  => "Shonen Jump",
                'cover'      => "naruto.jpg",
                'detail'     => "Cerita dimulai ketika seekor monster rubah ekor sembilan atau disebut Kyuubi menyerang Konoha, sebuah desa shinobi yang terletak di negara Api. Kekacauan terjadi di desa Konoha dan korban banyak berjatuhan. Akhirnya ada seseorang yang berhasil melenyapkan Kyuubi dengan menyegel sebagian chakra Kyuubi itu ke tubuhnya sendiri dan sisanya disegel ke tubuh Naruto, orang yang berhasil menyegel monster rubah ekor sembilan itu dikenal sebagai Yondaime Hokage, Hokage ke-4 atau Minato Namikaze yang tidak lain adalah ayah dari Naruto. Penyegelan itu menggunakan jurus Dewa Kematian sehingga risikonya adalah kematian Hokage ke-4 sendiri.",
                'created_at' => Time::now()
            ],
            [
                'title'      => "Bleach",
                'slug'       => "bleach",
                'author'     => "Tite Kubo",
                'publisher'  => "Shonen Jump",
                'cover'      => "bleach.jpg",
                'detail'     => "Bleach mengisahkan tentang Ichigo kurosaki, seorang pelajar SMA berambut jingga, yang terpaksa menjadi shinigami (dewa kematian versi jepang)pengganti, setelah menyelamatkan Rukia Kuchiki seorang shinigami yang sedang bertugas di dunia manusia untuk mengalahkan roh jahat Hollow.",
                'created_at' => Time::now()
            ],
            [
                'title'      => "One Piece",
                'slug'       => "one-piece",
                'author'     => "Eiichiro Oda",
                'publisher'  => "Shonen Jump",
                'cover'      => "one-piece.jpg",
                'detail'     => "Mengisahkan petualangan Monkey D. Luffy, seorang anak laki-laki yang memiliki kemampuan tubuh elastis seperti karet setelah memakan Buah Iblis secara tidak disengaja. Dengan kru bajak lautnya, yang dinamakan Bajak Laut Topi Jerami, Luffy menjelajahi Grand Line untuk mencari harta karun terbesar di dunia yang dikenal sebagai One Piece dalam rangka untuk menjadi Raja Bajak Laut yang berikutnya.",
                'created_at' => Time::now()
            ],
            [
                'title'      => "Nisekoi",
                'slug'       => "nisekoi",
                'author'     => "Naoshi Komi",
                'publisher'  => "Shonen Jump",
                'cover'      => "nisekoi.jpg",
                'detail'     => "Bercerita tentang Ichijou Raku yang merupakan seorang siswa biasa yang juga merupakan pewaris keluarga Yakuza Shuei-gumi. Raku memiliki sebuah janji 10 tahun yang lalu dengan seorang anak perempuan seusianya untuk menikah jika mereka bertemu kembali dimasa depan. Mereka mengikat janji mereka dengan sebuah gembok yang selalu dibawa raku dan sebuah kunci yang dipegang oleh gadis tersebut. Suatu hari di kehidupan sekolah raku yang damai (biasa aja maksudnya XD), Raku bertemu dengan Kirisaki Chitoge yang tapa sengaja langsung menendangnya. Ternyata Chitoge adalah murid baru pindahan ke kelas Raku, dan saat mereka saling kenal langsung timbul perasaan benci satu sama lain. Sepulang dari sekolah, ayah Raku yang merupakan kepala keluarga Yakuza Shuei-gumi, mengatakan jika keluarga mereka berada diambang peperangan dengan keluarga Gangster Beehive Amerika yang baru pindah ke Jepang. Namun kedua kepala keluarga tersebut sebenarnya tidak minginginkan meletusnya peperangan. Untuk mendamaikan keluarga mereka mereka mengusulkan untuk membuat kedua penerus keluarga mereka berpura-pura pacaran. Namun ternyata penerus keluarga gangster tersebut tidak lain adalah Chitoge yang dbencinya. Raku dan Chitoge yang juga tidak menginginkan hal tersebut denga berat hati akhirnya menyetujuinya. Namun dilain pihak Raku sebenarnya menyukai teman sekelasnya Onodera Kosaki dan sangat berharap bahwa Onodera lah gadis yang memiliki janji dengannya 10 tahun lalu tersebut.",
                'created_at' => Time::now()
            ],
        ];
        $this->db->table('comic')->insertBatch($data);
    }
}
