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
function insertData(form){
    var xhr = getSubBrowser();
    var formData = new FormData(form);
    xhr.open('POST',"inc/insertion.php");
    xhr.addEventListener('load', function() {
        var msg = xhr.responseText;
        if( xhr.status != 200){
            console.log(msg);
            alert("Maybe some probleme")
        }
        else{
            alert(msg);
        /// recupere la liste des des donnes soit creation du tableau de donnee
            loadData();
        }
    });
    xhr.addEventListener('error', function() {
        alert("Insertion Failed");  
    });
    xhr.send(formData);
}

function loadData(){
    console.log("Loading");
}

function reloadPage(){
    var xhr = getSubBrowser();

    xhr.open("GET","inc/reload.php")
    xhr.addEventListener("load" , function(){
        var msg = xhr.responseText;
        if( xhr.status != 200){
            console.log(msg);
            alert("Maybe some probleme")
        }
        else{
            alert(msg);
        }
    });
    xhr.send();
}