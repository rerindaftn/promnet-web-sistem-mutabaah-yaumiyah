<?php

require 'function.php';

$id = $_GET["id"];

if( ubahStatusStudentTDLB($id) > 0 ) {
	echo "
		<script>
			document.location.href = '../student-todolist.php';
		</script>
	";
} else {
	echo "
		<script>
			document.location.href = '../student-todolist.php';
		</script>
	";
}

?>