function sendMessage(){
    var message = document.getElementById("msg").value;
    var xhttp = new XMLHttpRequest();
    document.getElementById("msg").value = '';
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            message1 = this.responseText;
            var message2 = ''
            //console.log(this.responseText);
            for(var char of message1){
                if(char == '<'){
                    char = '&lt';
                    message2 += char;
                }
                else if(char == '>'){
                    char = '&gt';
                    message2 += char;
                }
                else{
                    message2 += char;
                }
            }
            document.getElementById('chat').innerHTML += "You <br>" + message2 + "<br>";
        } 
    };
    xhttp.open("POST", 'msg.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("message="+message);
}
setInterval(function(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chat").innerHTML += this.responseText;
            //console.log(this.responseText);
        }
    };
    xhttp.open("GET", "msg1.php", true);
    xhttp.send();
},3000);