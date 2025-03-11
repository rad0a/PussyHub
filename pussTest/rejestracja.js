
function checkLogin() {
    let login = document.getElementById('login').value;
//  alert("sigma");
    $.ajax({
        url: "checkUser.php",
        method: "POST",
        data: { login: login },
        success: function(response) {
            
            if(response==true&&login!="") {
                document.getElementById('login').style.borderColor = "rgb(185,0,0)";
                document.getElementById('l2').style.color = "rgb(185,0,0)";
                document.getElementById('l2').innerHTML = "Wpisz nazwę: (nazwa zajęta)";
            } else if(response==false||login=="") {
                document.getElementById('login').style.borderColor = "black";
                document.getElementById('l2').style.color = "#2f4858";
                document.getElementById('l2').innerHTML = "Wpisz nazwę: ";
            }
        }
    });
}

function checkMail() {
    let mail = document.getElementById('mail').value;
    $.ajax({
        url: "checkUser.php",
        method: "POST",
        data: { mail: mail },
        success: function(response) {
            if(response==true&&mail!="") {
                document.getElementById('mail').style.borderColor = "rgb(185,0,0)";
                document.getElementById('l1').style.color = "rgb(185,0,0)";
                document.getElementById('l1').innerHTML = "Wpisz e-mail: (e-mail zajęty)";
            } else if(response==false||mail=="") {
                document.getElementById('mail').style.borderColor = "black";
                document.getElementById('l1').style.color = "#2f4858";
                document.getElementById('l1').innerHTML = "Wpisz e-mail: ";
            }
        }
    });
}

function checkPas() {
    let pas = document.getElementById('pas').value;
    if(pas.length < 8 && pas.length != 0) {
        document.getElementById('pas').style.borderColor = "rgb(185,0,0)";
        document.getElementById('l3').style.color = "rgb(185,0,0)";
        document.getElementById('l3').innerHTML = "Twoje hasło: (min 8 znaków)";
    } else if(pas.length > 8 || pas.length == 0) {
        document.getElementById('pas').style.borderColor = "black";
        document.getElementById('l3').style.color = "#2f4858";
        document.getElementById('l3').innerHTML = "Twoje hasło: ";
    }
}

function checkPasSec() {
    let pas = document.getElementById('pas').value;
    let pasSec = document.getElementById('pasSec').value;
    
    if(pasSec != pas) {
        document.getElementById('pasSec').style.borderColor = "rgb(185,0,0)";
        document.getElementById('l4').style.color = "rgb(185,0,0)";
        document.getElementById('l4').innerHTML = "Powtórz hasło: (hasła nie są takie same)";
    } else if(pas.length > 8 || pas.length == 0) {
        document.getElementById('pasSec').style.borderColor = "black";
        document.getElementById('l4').style.color = "#2f4858";
        document.getElementById('l4').innerHTML = "Powtórz hasło: ";
    }
}


