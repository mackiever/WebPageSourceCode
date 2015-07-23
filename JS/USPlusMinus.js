var parentNode = document.getElementById( 'sectionOne' );           //Get all h2 elements from div node sectionOne
var h2Nodes = parentNode.getElementsByTagName( 'h2' );              //
var link;

function show_hide() {
    
    var currH2 = this;
    //var elSib = currH2.nextSibling;
    
    if( !currH2.hasAttribute( 'class' ) ) {
        
        currH2.setAttribute( 'class' , 'minus' );
        currH2.nextElementSibling.setAttribute( 'class' , 'open' );
        
    } else if ( currH2.getAttribute( 'class' ) == 'minus' ) {
        currH2.removeAttribute( 'class' );
        currH2.nextElementSibling.removeAttribute( 'class' );
    }
    
}

for( var i = 0; i < h2Nodes.length; i++ ) {                         //Add eventListener for all h2 elements.
                                                                    //By default an image with a "plus" sign is attached to all h2 elements and has no class attribute.    
    link = h2Nodes[ i ];                                            //On click, if current h2 element does not have a class attribute, set class attribute to class "minus"
    link.addEventListener( 'click' , show_hide, false );           //and attach "minus" sign next to h2 element.  Also set next article element to open.
                                                                    //By default article elements display properties are set to "none";//article will not be displaying any informatoin
}

//link.addEventListener( 'click' , randomFunc, false );
