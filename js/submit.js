
function form() {
        var name = document.forms["Form"]["Name"];
        var email = document.forms["Form"]["Email"];
        var phone = document.forms["Form"]["Telephone"];

	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

        if (name.value == "") {
            window.alert("Please enter your name.");
            name.focus();
            return false;
        }
  
  
        if (email.value == "" || !re.test(email.value)) {
            window.alert(
              "Please enter a valid e-mail address.");
            email.focus();
            return false;
        }
  
        if (phone.value == "") {
            window.alert(
              "Please enter your telephone number.");
            phone.focus();
            return false;
        }
  
        return true;
    }