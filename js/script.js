let mess = "<div> <p class='title-medium'>Обновление данных пользователя</p><p class='title-small'>Успешно выполнено!</p><p><a href='/user/'>Назад</a></p></div>";
let request = document.querySelector('.show-request')
let formAdd = document.getElementById('add');
let formUpdate = document.getElementById('update')
if (formAdd != null) {
    formAdd.addEventListener('submit', function (event) {
        let promise = fetch('/user/add/', {
            method: 'POST',
            body: new FormData(this),
        });
        promise.then(
            response => {
                return response.json();
            }
        ).then(
            text => {
                let requestText = request.innerHTML;
                if(requestText != "") request.innerHTML = "";

                console.log(text)

                if(text == null) {
                    /*window.location.replace('/user/');*/
                }
                else {
                    for (let i = 0; i < text.length; i++) {
                        let t = request.innerHTML;
                        request.innerHTML = t + text[i];
                    }
                }
            }
        );
        event.preventDefault();
    });
}



if (formUpdate != null) {
    formUpdate.addEventListener('submit', function (event) {
        let promise = fetch('/user/update/', {
            method: 'POST',
            body: new FormData(this),
        });
        promise.then(
            response => {
                return response.json();
            }
        ).then(
            text => {
                let requestText = request.innerHTML;
                if(requestText != "") request.innerHTML = "";
                if(text == null) {
                    document.querySelector(".user-update-grid-container").style = "display: none;"
                    document.querySelector(".message-request").innerHTML = mess;
                } else {
                    for (let i = 0; i < text.length; i++) {
                        let t = request.innerHTML;
                        request.innerHTML =  t + text[i];
                    }
                }

            }
        );
        event.preventDefault();
    });
}
