function recordingData(text) {
    let dataFromPage = document.querySelectorAll('.user-bottom-list')


    if(text.length == dataFromPage.length) {
        for(let i=0; i<text.length; i++) {
            dataFromPage[i].innerHTML = formingString(text[i]);
            if(dataFromPage[i].style.borderBottom == "medium none") {
                dataFromPage[i].style.borderBottom = null
            }
        }

    } else if (text.length < dataFromPage.length) {
        for(let i=0; i<text.length; i++) {
            dataFromPage[i].innerHTML = formingString(text[i]);
        }
        for (let i=text.length; i < dataFromPage.length; i++) {
            dataFromPage[i].innerHTML = null;
            dataFromPage[i].style.borderBottom = "none";
        }
    }

}
function formingString(user) {
    let userData = "<span>" + user.id +"</span><span>" + user.name +"</span><span>" + user.surname +
        "</span><span>" + user.email +"</span><span>" + user.phone + "</span><span>" + user.address +
        "</span>";
    return userData;
}
function paginate(collectionPage) {
    if (collectionPage.length != 0) {
        for(let elem of collectionPage) {
            elem.addEventListener('click', function (event) {
                let promise = fetch(elem.pathname, {
                    method: 'POST',
                    body: new URLSearchParams(),
                });
                promise.then(
                    response => {
                        return response.json();
                    }
                ).then(
                    text => {
                        recordingData(text)
                    }
                );
                event.preventDefault();
            });
        }
    }
}

let collectionPage = document.querySelectorAll('.paginate a');
paginate(collectionPage);

