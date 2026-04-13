<?php
$array_student_regtype = array(
0 => '',
1 => 'Siswa Baru',
2 => 'Siswa Pindahan',
);
$array_student_hobby = array(
0 => '',
1 => 'Olahraga',
2 => 'Seni',
3 => 'Membaca',
4 => 'Menulis',
5 => 'Bepergian',
6 => 'Lainnya',
);
$array_student_ambition = array(
0 => '',
1 => 'Petugas militer - Polisi',
2 => 'Guru - Ceramah',
3 => 'Dokter',
4 => 'Politisi',
5 => 'Pengusaha',
6 => 'Artis',
7 => 'Lainnya',
);
$array_student_gender = array(
0 => '',
1 => 'Laki-laki',
2 => 'Perempuan'
);

$array_student_need = array(
0 => '',
1 => 'Tidak',
2 => 'Buta',
3 => 'Tuli',
4 => 'Cacat Mental-ringan',
5 => 'Sedang Cacat Mental',
6 => 'Cacat Fisik-ringan',
7 => 'Sedang Cacat Secara Fisik',
8 => 'Nonaktifkan Secara Emosional',
9 => 'Bungkam',
10 => 'Handicap Ganda atau Handicap Ganda',
11 => 'Hiperaktif',
12 => 'Berbakat',
13 => 'Berbakat',
14 => 'Belajar Lambat',
15 => 'Kecanduan',
16 => 'Autisme',
17 => 'Sindrom Down',
);

$array_student_livwith = array(
0 => '',
1 => 'Orangtua',
2 => 'Penjaga',
3 => 'Rumah Kost',
4 => 'Asrama',
5 => 'Panti Asuhan ',
6 => 'Lainnya',
);

$array_student_transport = array(
0 => '',
1 => 'Jalan',
2 => 'Kendaraan Pribadi',
3 => 'Transportasi Umum',
4 => 'Antar jemput sekolah',
5 => 'Kereta',
6 => 'Taksi Online',
7 => 'Lainnya',
);

$array_student_yesno = array(
0 => '',
1 => 'Ya',
2 => 'Tidak',
);

$array_student_nationality = array(
0 => '',
1 => 'Indonesia',
2 => 'Ekspatriat',
3 => 'Negara Asal',
);

$array_parent_edu = array(
0 => '',
1 => 'Pendidikan nonformal',
2 => 'Keluar',
3 => 'Sekolah Dasar',
4 => 'SMP',
5 => 'SMA',
6 => 'Ijazah 1',
7 => 'Ijazah 2',
8 => 'Ijazah 3',
9 => 'Sarjana',
10 => 'Phd',
);

$array_parent_job = array(
0 => '',
1 => 'Pengangguran',
2 => 'Nelayan',
3 => 'Petani',
4 => 'Peternak',
5 => 'Pejabat Pemerintah/Petugas Militer',
6 => 'Karyawan',
7 => 'Pemilik Usaha Kecil',
8 => 'Pemilik Bisnis Besar',
9 => 'Majikan',
10 => 'Pengusaha',
11 => 'Buruh',
12 => 'Pensiun',
13 => 'Lainnya',
);

$array_parent_income = array(
0 => '',
1 => 'Kurang dari Rp. 500.000 - Rp. 999.999',
2 => 'Rp 1 Juta - Rp 1.999.999',
3 => 'Rp 2 Juta - Rp 4.999.999',
4 => 'Rp 5 Juta - Rp 20 Juta',
5 => 'Lebih dari Rp 20 Juta',
);

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'tahun',
        'm' => 'bulan',
        'w' => 'minggu',
        'd' => 'hari',
        'h' => 'jam',
        'i' => 'menit',
        's' => 'detik',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' lalu' : 'baru saja';
}

 
?>