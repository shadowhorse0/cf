async function endpoint(data, request_type) {
    var result;
    data = JSON.stringify(data);
    // encrypting request type

    var settings = {
        "url": "https://mpulsecodefiesta.me/endpoints/endpoint.php",
        "method": "POST",
        "dataType": "json",
        "async": true,
        "timeout": 0,
        "data": {
            "data": data,
            "request_type": request_type
        },
        success: function (response, textStatus, xhr) {
            if (xhr.status == 200) {
                result = response;
                result['statusCode'] = xhr.status;
            } else {
                result = {
                    "statusCode": xhr.status,
                    "status": false,
                    "msg": "Some error occured!"
                };
            }
        }
    };
    await $.ajax(settings);
    return result;
}
