let check = function() {
    if (document.getElementById('password').value == document.getElementById('passwordcheck').value) 
    {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Wachtwoord komt overeen';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Wachtwoord komt niet overeen';
    }
}

let Wachtwoord = document.getElementById('Wachtwoord');
let Email = document.getElementById('email');

document.getElementById("button").disabled = true;

let off = function(){

    if( Email.value && Wachtwoord.value !== ""){
        document.getElementById("button").disabled = false;
    } else
    {
        document.getElementById("button").disabled = true;
    }
}