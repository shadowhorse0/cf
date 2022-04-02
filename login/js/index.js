$("#login").click(function (e) {
    let username = $('#username').val();
    let password = $('#password').val();

    let data = { username: username, password: password };
    endpoint(data, "login").then(response => {
        console.log(response);
    })
});