<?php

switch ($_GET['page_lap']) {
	
//laporan 
	case 'menulaporan':
		if(!file_exists ("laporan/laporanMenu.php"))
			die ("File tidak ada");
		include "laporan/laporanMenu.php";
	break;
	
	case 'lap_penerimaan_spdp':
		if(!file_exists ("laporan/lap_penerimaan_spdp.php"))
			die ("File tidak ada");
		include "laporan/lap_penerimaan_spdp.php";
	break;
	
	case 'lap_prapenuntutan':
		if(!file_exists ("laporan/lap_prapenuntutan.php"))
			die ("File tidak ada");
		include "laporan/lap_prapenuntutan.php";
	break;
	
	case 'lap_penuntutan':
		if(!file_exists ("laporan/lap_penuntutan.php"))
			die ("File tidak ada");
		include "laporan/lap_penuntutan.php";
	break;
	
	case 'lap_pelimpahan':
		if(!file_exists ("laporan/lap_pelimpahan.php"))
			die ("File tidak ada");
		include "laporan/lap_pelimpahan.php";
	break;
	
	case 'lap_eksekusi':
		if(!file_exists ("laporan/lap_eksekusi.php"))
			die ("File tidak ada");
		include "laporan/lap_eksekusi.php";
	break;

	
	
}
?>