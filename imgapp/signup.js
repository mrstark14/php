let patterns={
    phone: /^((\+91\-|91\-|0|\+91|91)?[6-9]{1})\d{9}$/i,
    naam: /^([A-Za-z'\.]+((\s[A-Za-z'\.]+)+)?)$/i,
    umar: /^[1-9]\d{1,2}$/i,
    pass: /^[A-Za-z][\w\.\+@\$\-_]{7,20}$/i,
    sheher: /^([A-Za-z]+((\s[A-Za-z]+)+)?)$/i,
    e_mail: /[a-z\d_\-\.]+@[A-Za-z]+\.[A-Za-z]{2,6}((\.[A-Za-z]{2,6})+)?/i                 //sanjeet_m14.@gmail.com
}
function validateForm(){
    var name=document.getElementById("Name").value;
    //var q=document.getElementById("Qualification").value;
    var mobile=document.getElementById("Mobile").value;
    //var age=document.getElementById("age").value;
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var cpassword=document.getElementById("Cpassword").value;
    //var city=document.getElementById("city").value;
    if(!patterns.naam.test(name)){
        document.getElementById("Name").style.borderColor = "red";
        alert("Enter a valid name")
        return false;
    }
    /*else if(q=="None"){
        document.getElementById("Qualification").style.borderColor = "red";
        alert("Select an educational qualification.")
        return false;
    }*/
    else if(!patterns.phone.test(mobile)){
        document.getElementById("Mobile").style.borderColor = "red";
        alert("Enter a valid mobile no.")
        return false;
    }
    /*else if(!patterns.umar.test(age)){
        document.getElementById("age").style.borderColor = "red";
        alert("Enter a valid age")
        return false;
    }*/
    else if(!patterns.pass.test(password)){
        document.getElementById("password").style.borderColor = "red";
        alert("Enter a valid password")
        return false;
    }
    else if(password!=cpassword){
        document.getElementById("Cpassword").style.borderColor = "red";
        alert("Password and confirm password do not match")
        return false;
    }
    /*else if(!patterns.sheher.test(city)){
        document.getElementById("city").style.borderColor = "red";
        alert("Enter a valid city")
        return false;
    }*/
    else if(!patterns.e_mail.test(email)){
        document.getElementById("email").style.borderColor = "red";
        alert("Enter a valid email address")
        return false;
    }
    else{
        return true;
    }
}
function qualification(){
    var q=document.getElementById("Qualification").value;
    if(q=="None"){
        document.getElementById("Qualification").style.borderColor = "red";
        document.getElementById("qual").innerHTML="Please select a valid qualification!!";
    }
    else{
        document.getElementById("Qualification").style.borderColor = "";
        document.getElementById("qual").innerHTML="";
    }
}
function mobile(){
    var mobile=document.getElementById("Mobile").value;
    if(!patterns.phone.test(mobile)){
        document.getElementById("Mobile").style.borderColor = "red";
        document.getElementById("mob").innerHTML="Please select a valid mobile no.!!";
    }
    else{
        document.getElementById("Mobile").style.borderColor = "";
        document.getElementById("mob").innerHTML="";
    }
}
function ages(){
    var age=document.getElementById("age").value;
    if(!patterns.umar.test(age)){
        document.getElementById("age").style.borderColor = "red";
        document.getElementById("AGE").innerHTML="Please select a valid age!!";
    }
    else{
        document.getElementById("age").style.borderColor = "";
        document.getElementById("AGE").innerHTML="";
    }
}
function mail(){
    var email=document.getElementById("email").value;
    if(!patterns.e_mail.test(email)){
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("EMAIL").innerHTML="Please select a valid email address!!";
    }
    else{
        document.getElementById("email").style.borderColor = "";
        document.getElementById("EMAIL").innerHTML="";
    }
}
function passwords(){
    var password=document.getElementById("password").value;
    if(!patterns.pass.test(password)){
        document.getElementById("password").style.borderColor = "red";
    }
    else{
        document.getElementById("password").style.borderColor = "";
    }
}
function cpass(){
    var password=document.getElementById("password").value;
    var cpassword=document.getElementById("Cpassword").value;
    if(password!=cpassword){
        document.getElementById("Cpassword").style.borderColor = "red";
        document.getElementById("cpass").innerHTML="Password and Confirm Password do not match!!!";
    }
    else{
        document.getElementById("Cpassword").style.borderColor = "";
        document.getElementById("cpass").innerHTML="";
    }
}
function naam(){
    var name=document.getElementById("Name").value;
    if(!patterns.naam.test(name)){
        document.getElementById("Name").style.borderColor = "red";
        document.getElementById("NAME").innerHTML="Please select a valid name!!";
    }
    else{
        document.getElementById("Name").style.borderColor = "";
        document.getElementById("NAME").innerHTML="";
    }
}
function citys(){
    var city=document.getElementById("city").value;
    if(!patterns.sheher.test(city)){
        document.getElementById("city").style.borderColor = "red";
        document.getElementById("CITY").innerHTML="Please select a valid city!!";
    }
    else{
        document.getElementById("city").style.borderColor = "";
        document.getElementById("CITY").innerHTML="";
    }
}
function validateUsername1(){
    var username = document.getElementById("username").value;
    if(username==""){
        document.getElementById("abc").innerHTML="";
    }
    else{
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("abc").innerHTML = this.responseText;
                //console.log(this.responseText);
            }
        };
        xhttp.open("GET", "usernameAjax.php?q="+username, true);
        xhttp.send();
    }
}
function myFunction(){
    document.getElementById('pass').style.display = 'inline';
}
function myFunctions(){
    document.getElementById('pass').style.display = 'none';
}