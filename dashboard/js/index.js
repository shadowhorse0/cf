let time_rem = null;
let time_flag = false;
let qns_id = null;
time_left(0);

get_question();


// running every secs
let run_time = setInterval(() => {
    if (time_flag) {
        time_rem -= 1;
        console.log(time_rem);
        var mins = parseInt(time_rem / 60);
        var secs = time_rem % 60;
        $("#mins").text(mins + " mins");
        $("#secs").text(secs + " secs");

        time_left(1);
    }
}, 1000);


function time_left(time_ded) {
    let data = { time_ded: time_ded };
    endpoint(data, "time_left").then(response => {
        if (response['status']) {
            time_rem = response['time_left'];
            var mins = parseInt(time_rem / 60);
            var secs = time_rem % 60;

            time_flag = true;

            $("#mins").text(mins + " mins");
            $("#secs").text(secs + " secs");
        } else {
            // show sweet alert
            time_flag = false;
            Swal.fire({
                icon: 'success',
                title: 'Test submitted!',
                showConfirmButton: true,
                timer: 3000
            }).then((result) => {
                window.location.href = "/logout/";
            })

        }

    })
}

function get_question() {
    $("#question").addClass("d-none");
    $("#spinner").removeClass("d-none");
    let data = null;
    endpoint(data, "get_question").then(response => {
        console.log(response);
        if (response['status']) {
            var question = response['question'];
            $("#qns").text(question['question']);
            $("#question").removeClass("d-none");
            qns_id = question['id'];

        } else {
            $("#alert").text(response['msg']);
            $("#alert").removeClass("d-none");
        }
        $("#spinner").addClass("d-none");
        $("#submit").attr("disabled", false);
    })
}


// after submit btn
$("#submit").click(() => {
    var answer = $("#qns_ans").val();
    $("#ans_alert").addClass("d-none");
    $("#ans_spinner").removeClass("d-none");
    let data = { answer: answer, qns_id: qns_id };
    $("#submit").attr("disabled", true);
    endpoint(data, "verify").then(response => {
        console.log(response);
        if (response['status']) {
            $("#ans_alert").removeClass("bg-danger");
            $("#ans_alert").addClass("bg-success");

        } else {
            $("#ans_alert").removeClass("bg-success");
            $("#ans_alert").addClass("bg-danger");
        }
        $("#ans_spinner").addClass("d-none");
        $("#ans_alert").text(response['msg']);
        $("#ans_alert").removeClass("d-none");
        $("#score").text(response['crnt_score']);

        setTimeout(() => {
            $("#ans_alert").addClass("d-none");
            $("#qns_ans").val("");
            get_question();
        }, 2000);
    })
})

// user logout
$("#logout").click(() => {
    Swal.fire({
        icon: 'success',
        title: 'Do you really, want to submit test?!',
        showConfirmButton: true,
        showCancelButton: true,
    }).then((result) => {
        if (result['isConfirmed']) {
            window.location.href = "/logout/";
        }
    })
})
