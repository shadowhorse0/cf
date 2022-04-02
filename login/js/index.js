$("#login").click(function (e) {
    let username = $('#username').val();
    let password = $('#password').val();
    console.log(username, password);

    $("#searchbtn").attr("disabled", true);

    //hiding previous msg
    $("#alert").addClass('d-none');

    $('#searchsvg').removeClass('d-none');
    $("#searchbtn").text('Searching...');

    let data = { username: username };
    endpoint(data, "check_account").then(response => {
        $('#searchsvg').addClass('d-none');
        $('#searchbtn').text('SEARCH ACCOUNT');
        $("#searchbtn").attr("disabled", false);
        $("#alert").html(response.msg);

        if (response.status == true) {
            $('#alert').removeClass('bg-warning');
            $('#alert').addClass('bg-success');
        } else {
            $('#alert').removeClass('bg-success');
            $('#alert').addClass('bg-warning');
        }
        $('#alert').removeClass('d-none');

        // redirecting
        if (response.status) {
            window.top.location.href = "/autoliker/dashboard/";
        }
    })
});