<?php
	$APP_ID    = 0;
	$STAT_CODE = '12345';
	
	$con=mysqli_connect( "123.123.123.123", "DB_NAME", "DB_PASSWORD", "DB_USER" );
	
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
