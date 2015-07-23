function create_Message( m ){
    this.message = m;
}

var firstMsg = new create_Message( "I have received my B.S. degree from Rutgers University and New Jersey Institute of Technology ( NJIT )" );
var secondMsg = new create_Message( "I was part of an internship working with Database system through Amazon Web Services collecting New Jersey's public records." );
var thirdMsg = new create_Message( "I'm currently learning JavaScript and PHP, then I would like to continue working with Java and C++ languages.  I'd like to write my own Applications." );
var fourthMsg = new create_Message( "My email is : max.macavilca@rutgers.edu || my cell-phone number is 973-508-2383" );

var msgArray = new Array( firstMsg, secondMsg, thirdMsg, fourthMsg );


var newNode = document.createElement( 'div' );  //create new element div

function display_window( e, message ) {
    
    if( !e ){
        e = window.event;
    } else if( e.preventDefault ){
        e.preventDefault();
    }else {
        e.returnValue = false;
    }
    
    var msg = '<div class=\"header\" ><a id=\"close\" href="#">close X</a></div>';      //display_window will be activated when user clicks on any of 
    msg += '<div><h2></h2>';                               // "navList" class anchor tags.
    msg += message+'</div>';                     // A new window will be displayed with information related to
                                                                                        // Education, Experience, Future Plans, and Contanct Me.
    newNode.setAttribute( 'id' , 'note' );
    newNode.innerHTML = msg;
    document.body.appendChild( newNode );
    
    if( document.getElementById( 'close' ) ) {
        
        var elClose = document.getElementById( 'close' );
        elClose.addEventListener( 'click' , dismiss_note, false );
        
    }
}

function dismiss_note() {                                                           // remove new window when clicking "close X"
    
    document.body.removeChild( newNode );
        
}

var nodeParent = document.getElementsByClassName( 'navList' )[ 0 ];
var linkNodes = nodeParent.getElementsByTagName( 'a' );
var anchorTag;

    for( var i = 1; i < linkNodes.length; i++ ) {                                    //Activate event listeners for all anchor tags under "navList"
                                                                                     // class and call display_window function when click event occurs               
        anchorTag = linkNodes[ i ];                                                  //to display new window 
        switch( anchorTag.firstChild.nodeValue ){
            case "Education":
                anchorTag.addEventListener( 'click' , function( e ){
                display_window( e , msgArray[ 0 ].message );
                }, false );
                break;
            case "Experience":
                anchorTag.addEventListener( 'click' , function( e ){
                display_window( e , msgArray[ 1 ].message );
                }, false );
                break;
            case "Future Plans":
                anchorTag.addEventListener( 'click' , function( e ){
                display_window( e , msgArray[ 2 ].message );
                }, false );
                break;
            case "Contact Me":
                anchorTag.addEventListener( 'click' , function( e ){
                display_window( e , msgArray[ 3 ].message );
                }, false );
                break;
        }
        
    }
    


/*
var newNode = document.createElement( 'div' );  //create new element div

function display_window() {
    
    var msg = '<div class=\"header\" ><a id=\"close\" href="#">close X</a></div>';      //display_window will be activated when user clicks on any of 
    msg += '<div><h2>'+this.firstChild.nodeValue+'</h2>';                               // "navList" class anchor tags.
    msg += 'this is some random text to be updated soon....</div>';                     // A new window will be displayed with information related to
                                                                                        // Education, Experience, Future Plans, and Contanct Me.
    newNode.setAttribute( 'id' , 'note' );
    newNode.innerHTML = msg;
    document.body.appendChild( newNode );
    
    if( document.getElementById( 'close' ) ) {
        
        var elClose = document.getElementById( 'close' );
        elClose.addEventListener( 'click' , dismiss_note, false );
        
    }
}

function dismiss_note() {                                                           // remove new window when clicking "close X"
    
    document.body.removeChild( newNode );
        
}

var nodeParent = document.getElementsByClassName( 'navList' )[ 0 ];
var linkNodes = nodeParent.getElementsByTagName( 'a' );
var anchorTag;

    for( var i = 0; i < linkNodes.length; i++ ) {                                    //Activate event listeners for all anchor tags under "navList"
                                                                                     // class and call display_window function when click event occurs               
        anchorTag = linkNodes[ i ];                                                  //to display new window 
        anchorTag.addEventListener( 'click' , display_window, false );
        
    } 
*/