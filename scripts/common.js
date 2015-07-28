$(function(){
    $('.navhandle').on('click', function(){
        $('nav ul').toggleClass('showing');
        $('div.maincontent').toggleClass('showingcontent');
    });   
});


