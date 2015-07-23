<?php 

    function get_languages() {
        
        global $db;                                                 //Make $db available inside public functions
        /*                                                          //Once built-in functions such as require/include are called
        $query = "SELECT *                                          //accessing the database file and languages_db.php file will be combined in order
                  FROM programming_language";                       //to regulate Give control to Controller Folder based on MVC
                  
        $languages = $db->query( $query );
         */
        $stmt = $db->prepare( "SELECT *
                                FROM programming_language" );       //prepare query selection all columns from programming_language table
                                
        $stmt->execute();
                                        
        return $stmt;                                               //return query as variable $stmt
    }
    
    function get_language_by_id( $par_id ) {                        //Give function get_language_by_id() a parameter of $par_id
                                                                    //in order to access all columns from programming_language depending on value of $par_id
        global $db;
        $stmt = $db->prepare( "SELECT *
                               FROM programming_language
                               WHERE id =:parameter" );
        
        $stmt->bindValue( ':parameter' , $par_id, PDO::PARAM_INT ); //Set ":parameter" reference to $par_id and only accept data type INT.
        $stmt->execute();
        
        $row = $stmt->fetch( PDO::FETCH_ASSOC );                    //gather column by column name ONLY.
        //$send_back = $row[ 'language_name' ];
        
        return $row;                                                //return query as variable $row
        
    }
    
    function insert_user_input( $language_id, $name ) {             //insert_user_input() function was used to store user names and user's favorite programming language
                                                                    //will no longer be required at this moment.
        global $db;
        $stmt = $db->prepare("INSERT INTO user_favorite_programming_language ( lang_id, user_name )
                  VALUES ( :language_id, :name )");
                  
        $stmt->bindValue( ':language_id', $language_id, PDO::PARAM_INT );
        $stmt->bindValue( ':name', $name, PDO::PARAM_STR );
        $stmt->execute();
        
        $affected_rows = $stmt->rowCount();
        
    }
    
    function get_vote_from_language( &$lang_id ) {                             //Return current sum of votes of a specific programming language through its unique id
        
        global $db;
        $stmt = $db->prepare( "SELECT language_name, SUM(votes) AS total_votes
                               FROM programming_language
                               WHERE id=:lang_id GROUP BY language_name" );    //Select only language_name and set votes column to total_votes from
                                                                               //unique programming language id.
        $stmt->bindValue( ':lang_id' , $lang_id, PDO::PARAM_INT );             //Set ":lang_id" reference to $lang_id and allow data type Int
        $stmt->execute();
        $row = $stmt->fetch( PDO::FETCH_ASSOC );                                //gather column by column name ONLY
        
        return $row; //cannot return a row by its column name
    }
    
    function add_vote( $language_id, $vote ) {                                  //Once total votes are collected according to a specific language,
                                                                                //increase its total vote by 1 ($vote parameter holds sum of votes before
        global $db;                                                             //incrementing total votes by 1).
        
        $stmt = $db->prepare( "UPDATE programming_language
                               SET votes =:vote
                               WHERE id =:id" );                                //update votes and increase by 1 ;
                               
        $stmt->bindValue( ':vote' , $vote , PDO::PARAM_INT );
        $stmt->bindValue( ':id' , $language_id, PDO::PARAM_INT );
        $stmt->execute();
        
    }

 ?>