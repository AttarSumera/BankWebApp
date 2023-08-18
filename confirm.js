document.getElementById("confirmpass").addEventListener("blur", function() {
    var a=document.getElementById("confirmpass").value;
    var b=document.getElementById("pass").value;
    if(a==b){
        alert("Confirm Password");
    }
    else
    {
        alert("Confirm Password and Password Wrong");
    }
       
  });