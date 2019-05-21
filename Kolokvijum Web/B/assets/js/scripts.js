var form = document.querySelector('form');
var name1 = document.querySelector('#name');
var description = document.querySelector('#desc');
var nameError = document.querySelector('#nameError');
var descError = document.querySelector('#descError');

form.addEventListener('submit',function (e) {
    e.preventDefault();
    // console.log(e);
    if(!validateForm()) {
        return;
    }

    sendAjaxData();

});
name1.addEventListener('keyup',function (e) {
   validateEventForm(e,nameError);
});

description.addEventListener('keyup',function (e) {
    validateEventForm(e,descError);
});

function validateForm() {

    var response = true;

    if(name1.value.trim() == '') {
        name1.style.borderColor = 'red';
        nameError.innerText = 'Please fill out this field';
        nameError.style.color = 'red';
        response = false;

    }

    if(description.value.trim() == '') {
        description.style.borderColor = 'red';
        descError.innerText = 'Please fill out this field';
        descError.style.color = 'red';
        response = false;
    }

    return response;
}

function validateEventForm(e,error) {

    var value = e.currentTarget.value.trim();
    var target = e.currentTarget;
    if(value != '') {
        error.innerHTML = '';
        target.style.borderColor = '#A9A9A9';
    }
}

function sendAjaxData() {
    var xmlHttp = new XMLHttpRequest();
    var data = {
        "name": name1.value,
        "description": description.value
    }

    xmlHttp.onreadystatechange = function () {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
        }
    }
    xmlHttp.open('POST','insert-breed.php',true);
    xmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xmlHttp.send("data="+JSON.stringify(data));
}