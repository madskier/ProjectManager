$(function(){
    $('#fSignUp').hide();       
});

function changeLogin()
{
    $('#fLogin').hide(); 
    $('#fSignUp').show();   
}

function changeSignUp()
{
    $('#fLogin').show(); 
    $('#fSignUp').hide();    
}

function navToLogin()
{
    window.location.href = 'http://localhost:80/ProjectManager/index/index';
}



