<?php

require 'function.php';

$id = $_GET["id"];

if( ubahStatusAllCheckedS($id) > 0 ) {
	echo "
		<script>
			document.location.href = '../student-listwork.php';
		</script>
	";
} else {
	echo "
		<script>
			document.location.href = '../student-listwork.php';
		</script>
	";
}

?>