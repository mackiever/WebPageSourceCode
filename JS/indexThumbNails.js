var display_image = document.getElementById( 'display-image-now' );

var anchor_tags_parent = document.getElementById( 'ul-list' );
var anchor_tags = anchor_tags_parent.getElementsByTagName( 'a' );
var link, image;
var elSib = document.getElementById( 'left-click' );
var elNextSib = elSib.nextElementSibling;


for ( var i = 0; i < anchor_tags.length; i++ ) {
    
    link = anchor_tags[ i ];                                    //Store each anchor element on variable link and set 
                                                                //onclick event. 
    link.onclick = function( e ) {
        
        if( !e ) {                                              //prevent default event of anchor elements directing user on click
            e = window.event;
        }else if( e.preventDefault ){
            e.preventDefault()
        }else {
            e.returnValue = false;
        }
        
        display_image.src = this.getAttribute( 'href' );        //Set current image's src property to thumbnails href attribute in order to change images
        
        switch ( this.getAttribute( 'href' ) ){                             //Run through each link's href attribute and set the anchor tag's href attribute to 
            case "images/USAFlag.jpg":                                      //change it's value to a new page.
                elNextSib.setAttribute( 'href' , 'pages/US.html' );         //Anchor tag is parent of img element displaying current image.
                break;                                                      //Anchor tag will change it's href attribute as soon as current image's source property changes.
            case "images/peruImg.jpg":
                elNextSib.setAttribute( 'href' , 'pages/origin.html' ); 
                break;
            case "images/rutgers.jpg":
                elNextSib.setAttribute( 'href' , 'pages/classes.php' ); 
                break;
            case "images/ComputerScience.jpg":
                elNextSib.setAttribute( 'href' , 'pages/computerScience.html' ); 
                break;
            default:
                alert( 'no such page exists' );
        }
        
    }
    
    image = new Image();                                                //Preload images 
    image.src = link.getAttribute( 'href' );
    
}