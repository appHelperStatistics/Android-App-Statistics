# Android-App-Statistics
This is a tool that you can implement in your Android app to monitor App accesses.

# Installation

1. Create a database and execute databaseCreator.sql to create the needed tables.
2. Implement java/Stats.java into your Android Project. Change the URL to your server.
3. Change the values in update_file.php.
4. Add Stats.ex( this, "CODE SPECIFIED IN Stats.java", "FILENAME OF YOUR update_file.php WITHOUT .php" );
5. Make sure to have one update_file.php (changed to your desired name) per app.
6. Open your app and test if there are values in your database.

# General Usage

You can use this to build a small website to display your app's views. Just make a php-query on your mysql database and you can see the views of your app and a list of accesses performed to your app.
