async function endpoint(data, request_type) {
    var result;
    data = JSON.stringify(data);
    // encrypting request type
    request_type = btoa(btoa(btoa(request_type)));

    var settings = {
        "url": "http://128.199.25.59/endpoints/endpoint.php",
        "method": "POST",
        "dataType": "json",
        "async": true,
        "timeout": 0,
        "data": {
            "data": data,
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
