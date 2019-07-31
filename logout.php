<?php
	session_start();
	session_unregister("SES_USER");
	session_unregister("SES_LEVEL");
  session_unregister("SES_ID");
  session_unregister("SES_STATUS");

	echo"<meta http-equiv='refresh' content='0; url=index.php'>";
?>