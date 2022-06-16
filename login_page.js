function transition2(){
    document.getElementById("d2").style.display="none";
    document.getElementById("d1").style.display="block"; 
} 

function transition1(){
    document.getElementById("d1").style.display="none";
    document.getElementById("d2").style.display="block";
}
function validation(){
    var x=document.forms["register"]["pass1"].value;
    var y=document.forms["register"]["retype_password"].value;
    if(x!=y)
        alert("Password Mismatch...Try again");
    else 
        document.forms["register"].submit();
}