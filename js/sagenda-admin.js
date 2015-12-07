/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function ValidateToken(token) {
    jQuery.support.cors = true;
    $.ajax({
        protected $apiUrl = 'http://www.sagenda.net/api/'; //Live Server
        //protected $apiUrl = 'http://localhost:49815/api/'; //Live Server
        type: 'POST',   
        dataType: 'html',
        success: function (data) {
            alert(data);
        },
        error: function (x, y, z) {
            alert(x + '\n' + y + '\n' + z);
        }
    });
}

/*$(document).ready(function() {         
    //ValidateToken(token);
   
       
});*/