var gURL = globalURL;
$(function(){
    $('#fPassword').submit(function()
    {         
        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url, data, function(callback){
            
            if (callback === "Success")
            {
                alert("An email has been sent with your new Password.");
            }
            else if (callback === "Fail")
            {
                alert("Invalid email and/or username");
            }
            else
            {
                alert(callback);
            }              
            document.location.href = gURL + "index/index";
        });
        return false;        
    });
});



