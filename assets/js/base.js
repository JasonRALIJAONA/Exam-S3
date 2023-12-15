// FOnctions de base JS
function  getSubBrowser() {
    var xhr; 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
        try {  xhr = new XMLHttpRequest();  }
        catch (e3) {  xhr = false;   }
        }
    }
    return xhr;
}


function insertData(formData){
    var xhr = getSubBrowser();
    var formData = new FormData(formAchat);
    xhr.open('POST',"file.php");
    xhr.addEventListener('load', function() {
        var msg = xhr.responseText;
        if( xhr.status != 200){
            console.log(msg);
        }
        else{
            alert(msg); 
        }
});

    xhr.addEventListener('error', function() {
    alert("Insertion Failed");
});
xhr.send(formData);
}
// Recuperation de formulaire
var formAchat = document.getElementById('formAchat');
formAchat.addEventListener('submit', function(e){
e.preventDefault();
insertAchat();
});