dibagian file model pada "laravolt/indonesia" perlu ditambahkan baris kode berikut ini
protected $primaryKey  = 'code'
agar relasi tabelnya dapat berdasarkan kolom code.
file-file tersebut antara lain :
1. City.php
2. District.php
3. Kabupaten.php
4. Kecamatan.php
5. Kelurahan.php
6. Province.php
7. Provinsi.php
8. Village.php