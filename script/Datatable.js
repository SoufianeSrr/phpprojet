$(document).ready(function(){
    var baseurl = "http://http://localhost/final2/index.php?p=historique";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET",baseurl+"/all",true);
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            var fonction = JSON.parse(xmlhttp.responseText);
            $("#example").DataTable({
                data:fonction,
                "columns":[
                {"data":"id"},
                {"data":"code"},
                {"data":"nom"},

                ]
            });
        }
    }
    xmlhttp.send();


});