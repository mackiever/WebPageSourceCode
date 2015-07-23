<?php 

    require '../Model/languages_db.php';
    require '../Model/myDatabase.php';

    if ( isset( $_POST[ 'lang_id' ] ) ){
        
            $lang_id = $_POST[ 'lang_id' ];                     //store lang_id value in $lang_id variable.
            //$user_name = $_POST[ 'name' ];                    //lang_id can hold values from 1 through 7
            
            $lang_by_id = get_language_by_id( $lang_id );       //get all columns from programming_language table according to id
            //$dummy = $my_var[ 'id' ];
            echo "<br /><br />";
            
            $total_votes = get_vote_from_language( $lang_by_id[ 'id' ] ); //Get current sum of votes column for programming language according to id
            $adding_one_vote = $total_votes[ 'total_votes' ];             //Convert votes to total_votes column to see current number of votes before adding vote to a particular language
            $adding_one_vote += 1;                                        //Add 1 to votes total value.
            add_vote( $lang_id, $adding_one_vote );                       //Finally, update programming_language table's votes column
                                                                          //to new votes value, adding 1 to its total votes.          
            //insert_user_input( $lang_id, $user_name );
            
            header( "Location: ../../index.php" );                        //return to index.php "main page"
        
         } else {
            
            header( "Location: ../error.php" );                            //if lang_id not set, go to error.php
            
        }

?>