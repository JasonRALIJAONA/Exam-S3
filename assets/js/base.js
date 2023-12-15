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

function loadData(date){
    va
    var list = makeAselect("moyenneCrypto" , `date="${date} && "nom="${nomCry}` , null);
}

function generateTable(){}
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

function makeAselect(table,condition ,action){
    var xhr = getSubBrowser();
    var liste ;

    var url = "selection.php?table="+table;
    if( condition != null) {
        url += "&condition="+condition;
    }
    console.log( url );

    xhr.open('GET',url,false);
    xhr.onreadystatechange = function () {
        var readyState = xhr.readyState;
        if(readyState == 4){
            liste = JSON.parse(xhr.responseText);
            if(action != null){
                action(liste);
            }
        }
    }
    xhr.send(null);
}