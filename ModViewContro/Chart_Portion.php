<?php 

    require 'Model/myDatabase.php';
    
        $stmt = $db->prepare( "SELECT *
                               FROM programming_language" );
                               
        $stmt->execute();
        $rows = $stmt->fetchAll( PDO::FETCH_ASSOC );                                    #Collect all columns from programming_language and store them in $rows array.
        
        
        $table[ 'cols' ] = array(                                                      #Create table array with index 'cols' and store two objects with key => value pairs 
                                array( 'label' => 'language' , 'type' => 'string' ) , 
                                array( 'label' => 'votes' , 'type' => 'number' )
                                );
                       
        $my_rows_array = array();                                                       #Initialize $my_rows_array.
        
        /*
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            
            $temp = array();
            
            $temp[] = array ( 'v' => (string) $row[ 'language_name' ] );
            $temp[] = array ( 'v' => (int) $row[ 'votes' ] );
            
            $my_rows_array[] = array( 'c' => $temp );
            
        }
        */
         
         foreach( $rows as $key ) :                                             #Each value from $rows array will be accessed through $key variable with its corresponding column name as index
                                                                                
             $temp = array();                                                   #Initiliaze $temp array to hold 2 objects with keys set to 'v'.
             $temp[] = array( 'v' => (string) $key[ 'language_name' ]);         #First object will posses a key of 'v' and value of data type (string) from language_name column
             $temp[] = array( 'v' => (int) $key[ 'votes' ] );                   #Second object will posses a key of 'v' and value of data type (int) from votes column
             
             $my_rows_array[] = array( 'c' => $temp );                          #Store array $temp in initialzed array $my_rows_array for each indiviual programming language with its corresponding total votes.
             
         endforeach;
            
        
        $table[ 'rows' ] = $my_rows_array;                                      #Set table array with index 'rows' as key for array $my_rows_array holding objects with corresponding keys and values.
        
        $jason_table = json_encode( $table );                                   #convert array $table[ 'cols ], $table[ 'rows' ] into json.  Google API will need json object to display pie chart on html page.
        
        //var_dump( $jason_table );

?>

    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>                                         <!-- Call google API to access piechar -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>      <!-- call google Jquery library -->
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?php echo $jason_table; ?>);
      var options = {
           title: 'Users Favorite Programming Language',
          is3D: 'true',
          width: 354,
          height: 300
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('show_chart'));
      chart.draw(data, options);
    }
    </script>
        <div id="show_chart"></div>                                                             <!-- Display piechart inside div id "show_chart"  -->
