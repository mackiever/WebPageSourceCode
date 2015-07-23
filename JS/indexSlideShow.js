function $( id ) {                          //create shortcut function in javascript to simulate jquery css-selector
    return document.getElementById( id );
}

var ul_list = document.getElementsByClassName( 'misc' )[ 0 ]; //Get href attribute from each individual link
var linkOfPages = ul_list.getElementsByTagName( 'a' );

var siblingLeftButton = $( 'left-click' );
var nextSib = siblingLeftButton.nextElementSibling;         //store location of current image displaying in variable "nextSib"....previous sibling is sinblingLeftbutton

var imagesArrayPath = [ "images/USAFlag.jpg" , "images/peruImg.jpg" , "images/rutgers.jpg" , "images/ComputerScience.jpg" ];    //store path of all images in array
var arrayTotal = imagesArrayPath.length;

var currentImgDisplaying = $( 'display-image-now' );        //currentImgDisplaying will be used for displaying images according to user when clicking left or right arrow
var index = 0;
var image;
var link;

function slide_picture( parameter ) {
    
    for ( var i = 0; i < imagesArrayPath.length; i++ ) {
                                            //preload images
        link = imagesArrayPath[ i ];
        image = new Image();
        image.src = link;
        
    }
    
    index += parameter;
    
    if ( index < 0 ) {                      //if index -1 is reached, set index to last index in the array in order to display the last image in array
        index = arrayTotal - 1;             //and continue traversing through all the images
    } else if ( index > arrayTotal - 1 ) {  //if current index is greater than last index in array, set index to 0 in order to display the image at
        index = 0;                          // the 0th index position
    }
    
    currentImgDisplaying.src = imagesArrayPath[ index ];
    nextSib.setAttribute( 'href' , linkOfPages[ index ] );      //After user has clicked left/right arrow, call array "linkOfPages" according to index and
                                                                //set a new destination when image is clicked.
}

var leftButton = $( 'left-click' );
var rightButton = $( 'right-click' );                                           //end of slide_picture function


// add eventListeners for each left/right buttons
leftButton.addEventListener( 'click' , function() {
    slide_picture( -1 );
} , false);

rightButton.addEventListener( 'click' , function() {
    slide_picture( 1 );
} , false);
