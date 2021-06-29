let mess = "<div> <p class='title-medium'>Обновление данных пользователя</p><p class='title-small'>Успешно выполнено!</p><p><a href='/user/'>Назад</a></p></div>";
let form = document.querySelector('form');
let invisibleElems = ["delete", "update-pass", "user-update-grid-container"];
function recordingErrors (text) {
    let request = document.querySelectorAll('.request');
    for (let item of request) {
        if (text.hasOwnProperty(item.id)) {
            item.innerHTML = text[item.id];
        } else {
            item.innerHTML = "";
        }
    }

}
function actionsForms() {
    if (form != null) {
        if(form.attributes['data-type'].nodeValue == 'noRedirect') {
            if(invisibleElems.includes(form.parentNode.className)) {
                document.querySelector("." + form.parentNode.className).style = "display: none;"
                document.querySelector(".message-request").innerHTML = mess;
            } else if(form.parentNode.className == "update") {
                let p = form.parentNode;
                if(invisibleElems.includes(p.parentNode.className)) {
                    document.querySelector("." + p.parentNode.className).style = "display: none;"
                    document.querySelector(".message-request").innerHTML = mess;
                }
            }
        } else {
            document.location.href = '/user/';
        }
    }
}
function submitForm(actionsForms) {
    if (form != null) {
        form.addEventListener('submit', function (event) {
            let promise = fetch(form.action, {
                method: 'POST',
                body: new FormData(this),
            });
            promise.then(
                response => {
                        return response.json();
                }
            ).then(
                text => {
                    if (text == null) {
                        actionsForms();
                    } else {
                        recordingErrors(text);
                    }
                }
            );
            event.preventDefault();
        });
    }
}
if(form != null) {
    submitForm(actionsForms);
}
