const nameValidation = /^[a-z0-9_-]{2,20}$/;
const emailValidation = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
const pwValidation = /^.*(?=^.{8,16}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[~,!,@,#,$,*,(,),=,+,_,.,|]).*$/;

var id_input = document.getElementById("id");

var name_input = document.getElementById("name");
var yy_input = document.getElementById("yy");
var mm_input = document.getElementById("mm");
var dd_input = document.getElementById("dd");
var gender_input = document.getElementById("gender");
var email_input = document.getElementById("email");
var mobile_input = document.getElementById("mobile");

function pw_check() {
    var pw_input = document.getElementById("pw").value;
    var pw_chk_input = document.getElementById("pw_check").value;
    if (pw_input != pw_chk_input) {
        document.getElementById("pw_error").innerHTML = "비밀번호가 일치하지 않습니다.";
    }
    else {
        document.getElementById("pw_error").innerHTML = "";
    }
    if (pw_chk_input == "") {
        document.getElementById("pw_error").innerHTML = "";
    }
    
}
