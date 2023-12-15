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
            var liste = JSON.parse(xhr.responseText);
            alert("Succes");
        /// recupere la liste des des donnes soit creation du tableau de donnee
            loadData(list);
        }
    });
    xhr.addEventListener('error', function() {
        alert("Insertion Failed");  
    });
    xhr.send(formData);
}

function loadData(liste){
    var byt = ['BTC' , 'BEP' , 'WRP' ];
    for(var i = 0; i < liste.length; i++){
        if(liste[i].nom == 'BTC'){

        }
        
    }
}

function generateTable(){

}
function generateLine(nom){
    
    
    var list = fun(date,nom);
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

function makeAselect(table,condition ,action){
    
}