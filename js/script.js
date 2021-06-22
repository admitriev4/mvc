let formAdd = document.getElementById('add');
formAdd.addEventListener('submit', function(event) {
    /*let repeatPassword = this.querySelector('[name="repeat_password"]').value;*/
    let promise = fetch('/user/add/', {
        method: 'POST',
        body: new FormData(this),
    });
    promise.then(
        response => {
            return response.text();
        }
    ).then(
        text => {
            window.location = "/user/";
            console.log(text);
        }
    );
    event.preventDefault();
});

/*
window.location = "http://mysite.com/newlocation.htm"*/
