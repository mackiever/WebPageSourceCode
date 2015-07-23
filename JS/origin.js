 var xhr = new XMLHttpRequest();

xhr.onload = function() {
    
    if ( true ) {
        
        var ref = xhr.responseXML;                                                      //create var ref to reference xml object
        var eventOne = ref.getElementsByTagName('event');                               //get all event elements from xml object
        var loc = eventOne[0].getElementsByTagName('location')[0].firstChild.nodeValue; //get location node child inside the first event node
        var box = document.createElement('b');                                          //create bold element
        box.setAttribute('id', 'testBox');                                              //set id attribute to testBox
        box.appendChild(document.createTextNode( loc ) );                               //attach location text node inside bold element
        
        var section = document.getElementById('sectionOne');                            
        var firstChild = section.firstChild.nextSibling;                                //get article element
        section.insertBefore( box , firstChild );                                       //insert location text node before article node with bold attribute
        
        var childSection = section.childNodes[ 0 ].nextSibling;                         //h1 has new sibling "b element" created with location text node: 2nd child of sectionONe
        
        var img = document.createElement('img');
        setAttr( img , {'id' : 'peruPic' } );
        img.setAttribute( 'src' , getTagNode( eventOne[ 0 ] , 'image' ) );
        //img.appendChild( document.createTextNode( 'this is an image' ) );
        section.insertBefore( img, childSection );                                      //insert new img node before "b element"
                                                                                        //sectionOne will have new children as follows: h1, img, b, article
    }// end if loop
    
    function getTagNode( fileRef , tag ){
        return fileRef.getElementsByTagName( tag )[ 0 ].firstChild.nodeValue;
    }
    
    function setAttr( obj , attr ) {
        for ( var i in attr ) {
            obj.setAttribute( i , attr[ i ] );
        }
    }
};//end browser repsonse/ onload function 

xhr.open('GET' , '../XML/myXML.xml', true);
xhr.send(null);


