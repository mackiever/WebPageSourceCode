<?php 

    require 'Model/database.php';
    
        $stmt = $db->prepare( "SELECT *
                               FROM programming_language" );
                               
        $stmt->execute();
        $rows = $stmt->fetchAll( PDO::FETCH_ASSOC );
        
        $table[ 'cols' ] = array( 
                                array( 'label' => 'language' , 'type' => 'string' ) , 
                                array( 'label' => 'votes' , 'type' => 'number' )
                                );
                       
        $my_rows_array = array();
        
        /*
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            
            $temp = array();
            
            $temp[] = array ( 'v' => (string) $row[ 'language_name' ] );
            $temp[] = array ( 'v' => (int) $row[ 'votes' ] );
            
            $my_rows_array[] = array( 'c' => $temp );
            
        }
        */
         
         foreach( $rows as $key ) : 
             
             $temp = array();
             $temp[] = array( 'v' => (string) $key[ 'language_name' ]);
             $temp[] = array( 'v' => (int) $key[ 'votes' ] );
             
             $my_rows_array[] = array( 'c' => $temp );
             
         endforeach;
            
        
        $table[ 'rows' ] = $my_rows_array;
        
        $jason_table = json_encode( $table );
        
        var_dump( $jason_table );

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?php echo $jason_table; ?>);
      var options = {
           title: 'My Weekly Plan',
          is3D: 'true',
          width: 400,
          height: 300
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('show_chart'));
      chart.draw(data, options);
    }
    </script>
  </head>
    <body>
        <div id="show_chart"></div>
    </body>
</html>