import android.content.Context;
import android.os.AsyncTask;
import android.util.Log;

import java.io.BufferedWriter;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.URL;
import java.net.URLEncoder;

import javax.net.ssl.HttpsURLConnection;

public class Stats extends AsyncTask<String, Void, Void>
{
    private static String stat_url;
    private static Stats statistic;
    private static String code;
    private Context ctx;

    private Stats( Context ctx, String code, String url )
    {
        this.ctx = ctx;
        this.code = code;
        this.stat_url = url;
        this.execute( this.code );
    }

    public static void ex( Context ctx, String code, String php )
    {
        if( statistic == null )
        {
            String url = "https://insert_your_domain.domain/update_file_folder/" + php + ".php";
            Stats.statistic = new Stats( ctx, code, url );
        }
    }

    @Override
    protected Void doInBackground( String... parameters )
    {
        String code = parameters[0];

        try
        {
            URL statistics_url = new URL( stat_url );

            HttpsURLConnection https_con = (HttpsURLConnection)statistics_url.openConnection();
            https_con.setRequestMethod( "POST" );
            https_con.setDoOutput( true );

            OutputStream output_stream = https_con.getOutputStream();
            BufferedWriter buffered_writer = new BufferedWriter( new OutputStreamWriter( output_stream, "UTF-8" ) );

            String send_data = URLEncoder.encode( "code", "UTF-8" ) + "=" + URLEncoder.encode( code, "UTF-8" );
            buffered_writer.write( send_data );

            buffered_writer.flush();
            buffered_writer.close();
            output_stream.close();

            InputStream is = https_con.getInputStream();
            is.close();

            https_con.disconnect();

            return null;
        }
        catch( Exception e )
        {
            return null;
        }
    }
}
