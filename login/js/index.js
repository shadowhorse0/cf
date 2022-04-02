$("#login").click(function (e) {
    let username = $('#username').val();
    let password = $('#password').val();


    $("#login").attr("disabled", true);
    //hiding previous msg
    $("#alert").addClass('d-none');
    $('#spinner').removeClass('d-none');
    $("#login").text('Processing...');

    let data = { username: username, password: password };
    endpoint(data, "login").then(response => {
        $('#spinner').addClass('d-none');
        $("#alert").html(response.msg);

        if (response.status == true) {
            $('#alert').removeClass('bg-danger');
            $('#alert').addClass('bg-success');

            //redirecting user 
            window.location.href = "/dashboard/";

        } else {
            $('#login').text('Login');
            $("#login").attr("disabled", false);
            $('#alert').removeClass('bg-success');
            $('#alert').addClass('bg-danger');
        }
        $('#alert').removeClass('d-none');
    })
});
