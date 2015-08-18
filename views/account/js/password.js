var gURL = globalURL;
$(function(){
   $('#fChangePassword').submit(function() {
         if ($('#txtNew').val() === $('#txtConfirm').val())
         {
            var url = $(this).attr('action');
            var data = $(this).serialize();

            $.post(url, data, function(callback){
                if (callback !== "" && callback !== null)
                {
                    alert(callback);
                }
                else
                {
                    alert("Password Changed Successfully");                
                }
                
                document.location.href = gURL + "account/password";
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
});


