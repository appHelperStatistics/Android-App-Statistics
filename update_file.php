<?php
	$APP_ID      = 0;
	$STAT_CODE   = '12345';

	$DB_ADDRESS  = '123.123.123.123';
	$DB_USER     = 'TESTUSER';
	$DB_PASSWORD = 'PASSWORD';
	$DB_NAME     = 'TESTDB';
	
	$con=mysqli_connect( $DB_ADDRESS, $DB_USER, $DB_PASSWORD, $DB_NAME );
	
	if ( mysqli_connect_errno( $con ) ) 
	{
		echo "Failed to connect to MySQL. Contact Server-Admin.";
	}

	$code = $_POST['code'];

	if ( $code === $STAT_CODE )
	{		
		$sql_access_insert = "INSERT INTO access( access_name_id ) VALUES ( " . $APP_ID . " )";
		$sql_name_update   = "UPDATE name SET accesses = ( accesses + 1 ) WHERE id = " . $APP_ID;		

		try
		{
			$con->begin_transaction();

			$con->query( $sql_access_insert );
			$con->query( $sql_name_update );

			$con->commit();
		}
		catch( Exception $e )
		{
			$con->rollback();
		}

		$con->close();
	}
?>
