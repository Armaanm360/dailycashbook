<!DOCTYPE html>
<html>

<head>
    <title>Gmail Checker</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Gmail Checker</h1>
    <input type="text" id="emailInput" placeholder="Enter Gmail address">
    <button id="checkButton">Check</button>
    <div id="result"></div>

    <script>
        $(document).ready(function() {
            $('#checkButton').click(function() {
                var email = $('#emailInput').val();
                $.get('http://192.168.0.227/restaurant_user_wise/check-gmail', {
                    email: email
                }, function(response) {
                    if (response.error) {
                        $('#result').text('An error occurred');
                    } else {
                        var message = response.exists ? 'Email exists' : 'Email does not exist';
                        $('#result').text(message);
                    }
                });
            });
        });
    </script>
</body>

</html>
