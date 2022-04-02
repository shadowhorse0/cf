$("#login").click(function (e) {
    let username = $('#username').val();
    let password = $('#password').val();
    console.log(username, password);

    let data = { username: username };
    endpoint(data, "check_account").then(response => {
        console.log(response);
    })
});