jQuery(function($){
    // scroll abio-a
    var controller = new ScrollMagic.Controller();
    
    // animate lot
    var sections = document.getElementsByClassName('animate');
    for (var i=0; i<sections.length; i++){
        // create a scene for each element
        new ScrollMagic.Scene({
            triggerElement: sections[i], // y value not mmodified so we can use element as trigger as well
            offset: -100,
            reverse: true
        })
        .setClassToggle(sections[i], "slideIn" ) // add ClassToggle
        // .addIndicators({name: "animate-" + (i+1) }) // add Indicators
        .addTo(controller);
    }
    
    });