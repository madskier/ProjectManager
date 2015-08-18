var gURL = globalURL;
$(function(){
    $('#fUsername').submit(function()
    {         
        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url, data, function(callback){
            
            if (callback === "Success")
            {
                alert("An email has been sent with your username.");
            }
            else if (callback === "Fail")
            {
                alert("Invalid email");
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


