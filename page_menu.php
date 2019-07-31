<?php
switch ($_GET['page']) {
	case '':
		if(!file_exists ("home.php"))
			die ("File tidak ada");
		include "home.php";
	break;
	case 'tes':
		if(!file_exists ("tes.php"))
			die ("File tidak ada");
		include "tes.php";
	break;
	case 'lap_pendapatan':
		if(!file_exists ("laporan/lap_pendapatan.php"))
			die ("File tidak ada");
		include "laporan/lap_pendapatan.php";
	break;
	// data user
	case 'ubah_profil':
		if(!file_exists ("menu/user/ubah_profil.php"))
			die ("File tidak ada");
		include "menu/user/ubah_profil.php";
	break;
	case 'data_user':
		if(!file_exists ("menu/user/data_user.php"))
			die ("File tidak ada");
		include "menu/user/data_user.php";
	break;
	case 'tambah_user':
		if(!file_exists ("menu/user/tambah_user.php"))
			die ("File tidak ada");
		include "menu/user/tambah_user.php";
	break;
	case 'ubah_user':
		if(!file_exists ("menu/user/ubah_user.php"))
			die ("File tidak ada");
		include "menu/user/ubah_user.php";
	break;
	case 'detail_user':
		if(!file_exists ("menu/user/detail_user.php"))
			die ("File tidak ada");
		include "menu/user/detail_user.php";
	break;
	case 'hapus_user':
		if(!file_exists ("menu/user/hapus_user.php"))
			die ("File tidak ada");
		include "menu/user/hapus_user.php";
	break;
	// data permohonan
	case 'data_permohonan':
		if(!file_exists ("menu/permohonan/data_permohonan.php"))
			die ("File tidak ada");
		include "menu/permohonan/data_permohonan.php";
	break;
	break;
	case 'tambah_permohonan':
		if(!file_exists ("menu/permohonan/tambah_permohonan.php"))
			die ("File tidak ada");
		include "menu/permohonan/tambah_permohonan.php";
	break;
	case 'ubah_permohonan':
		if(!file_exists ("menu/permohonan/ubah_permohonan.php"))
			die ("File tidak ada");
		include "menu/permohonan/ubah_permohonan.php";
	break;
	case 'detail_permohonan':
		if(!file_exists ("menu/permohonan/detail_permohonan.php"))
			die ("File tidak ada");
		include "menu/permohonan/detail_permohonan.php";
	break;
	case 'hapus_permohonan':
		if(!file_exists ("menu/permohonan/hapus_permohonan.php"))
			die ("File tidak ada");
		include "menu/permohonan/hapus_permohonan.php";
	break;
	// data alumni
	case 'data_alumni':
		if(!file_exists ("menu/alumni/data_alumni.php"))
			die ("File tidak ada");
		include "menu/alumni/data_alumni.php";
	break;
	break;
	case 'tambah_alumni':
		if(!file_exists ("menu/alumni/tambah_alumni.php"))
			die ("File tidak ada");
		include "menu/alumni/tambah_alumni.php";
	break;
	case 'ubah_alumni':
		if(!file_exists ("menu/alumni/ubah_alumni.php"))
			die ("File tidak ada");
		include "menu/alumni/ubah_alumni.php";
	break;
	case 'detail_alumni':
		if(!file_exists ("menu/alumni/detail_alumni.php"))
			die ("File tidak ada");
		include "menu/alumni/detail_alumni.php";
	break;
	case 'hapus_alumni':
		if(!file_exists ("menu/user/hapus_alumni.php"))
			die ("File tidak ada");
		include "menu/user/hapus_alumni.php";
	break;
	// data nota
	case 'data_nota':
		if(!file_exists ("menu/nota/data_nota.php"))
			die ("File tidak ada");
		include "menu/nota/data_nota.php";
	break;
	break;
	case 'tambah_nota':
		if(!file_exists ("menu/nota/tambah_nota.php"))
			die ("File tidak ada");
		include "menu/nota/tambah_nota.php";
	break;
	case 'ubah_nota':
		if(!file_exists ("menu/nota/ubah_nota.php"))
			die ("File tidak ada");
		include "menu/nota/ubah_nota.php";
	break;
	case 'detail_nota':
		if(!file_exists ("menu/nota/detail_nota.php"))
			die ("File tidak ada");
		include "menu/nota/detail_nota.php";
	break;
	case 'hapus_nota':
		if(!file_exists ("menu/nota/hapus_nota.php"))
			die ("File tidak ada");
		include "menu/nota/hapus_nota.php";
	break;
	// data pengumuman
	case 'data_pengumuman':
		if(!file_exists ("menu/pengumuman/data_pengumuman.php"))
			die ("File tidak ada");
		include "menu/pengumuman/data_pengumuman.php";
	break;
	break;
	case 'tambah_pengumuman':
		if(!file_exists ("menu/pengumuman/tambah_pengumuman.php"))
			die ("File tidak ada");
		include "menu/pengumuman/tambah_pengumuman.php";
	break;
	case 'ubah_pengumuman':
		if(!file_exists ("menu/pengumuman/ubah_pengumuman.php"))
			die ("File tidak ada");
		include "menu/pengumuman/ubah_pengumuman.php";
	break;
	case 'detail_pengumuman':
		if(!file_exists ("menu/pengumuman/detail_pengumuman.php"))
			die ("File tidak ada");
		include "menu/pengumuman/detail_pengumuman.php";
	break;
	case 'hapus_pengumuman':
		if(!file_exists ("menu/pengumuman/hapus_pengumuman.php"))
			die ("File tidak ada");
		include "menu/pengumuman/hapus_pengumuman.php";
	break;
}
?>