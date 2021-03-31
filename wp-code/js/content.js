window.addEventListener('DOMContentLoaded',clickBtn);

function clickBtn () {
    const button = document.getElementById("contentButton");
    button.addEventListener("click",getContent);
}

function getContent () {
    const url = "https://catfact.ninja/fact?max_length=140";
    const thing = document.getElementById("contentContainer");

    fetch(url)
        .then(response => response.json())
        .then(data => {
            // debugger
            thing.innerHTML =
                `<h2>${data.fact}</h2>`;
            localStorage.setItem('catFact',JSON.stringify(data.fact));
        })
        .catch(err => {
            thing.innerHTML = `<strong>An error occurred. Details: </strong> ${err}`;
        })
}