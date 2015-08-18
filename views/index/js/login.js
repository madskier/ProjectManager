var gURL = globalURL;
$(function(){  
    
    $('#fSignUp').submit(function(event)
    {

         if ($('#txtPasswordSignUp').val() === $('#txtConfirmPassword').val())
         {
            var url = $(this).attr('action');
            var data = $(this).serialize();

            $.post(url, data, function(callback){

                alert("Account submitted. Check your email and await authorization.");               
                changeSignUp();
            });
            return false;
         }
         else 
         {            
            alert("Passwords do not match");
            event.preventDefault();
            return false;
         }        
    }); 
    
    $('#btnForgotUser').click(function(){
       
        document.location.href = gURL + "index/forgotUsername";            
    });
    
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
    document.location.href = gURL + 'index/index';
}

function useCSS(filename)
{    
    $('header').append('<link rel="stylesheet" href="'+ gURL + 'styles/' + filename +'" type="text/css" />');    
}





