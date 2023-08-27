<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Building 360 By M360 ICT</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        body {
            background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: "Open Sans", sans-serif;
            color: #333333;
        }

        .box-form {
            margin: 0 auto;
            width: 80%;
            background: #FFFFFF;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex: 1 1 100%;
            align-items: stretch;
            justify-content: space-between;
            box-shadow: 0 0 20px 6px #090b6f85;
        }

        @media (max-width: 980px) {
            .box-form {
                flex-flow: wrap;
                text-align: center;
                align-content: center;
                align-items: center;
            }
        }

        .box-form div {
            height: auto;
        }

        .box-form .left {
            color: #FFFFFF;
            background-size: cover;
            background-repeat: no-repeat;
            /* background-image: url("building360.png"); */
            overflow: hidden;
        }

        .box-form .left .overlay {
            padding: 30px;
            width: 100%;
            height: 100%;
            /* background: #5961f9ad; */
            background: #fff;
            overflow: hidden;
            box-sizing: border-box;
        }

        .box-form .left .overlay h1 {
            font-size: 10vmax;
            line-height: 1;
            font-weight: 900;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .box-form .left .overlay span p {
            margin-top: 30px;
            font-weight: 900;
        }

        .box-form .left .overlay span a {
            background: #3b5998;
            color: #FFFFFF;
            margin-top: 10px;
            padding: 14px 50px;
            border-radius: 100px;
            display: inline-block;
            box-shadow: 0 3px 6px 1px #042d4657;
        }

        .box-form .left .overlay span a:last-child {
            background: #1dcaff;
            margin-left: 30px;
        }

        .box-form .right {
            padding: 40px;
            overflow: hidden;
            margin: 0 auto;
        }

        @media (max-width: 980px) {
            .box-form .right {
                width: 100%;
            }
        }

        .box-form .right h5 {
            font-size: 6vmax;
            line-height: 0;
        }

        .box-form .right p {
            font-size: 14px;
            color: #B0B3B9;
        }

        .box-form .right .inputs {
            overflow: hidden;
        }

        .box-form .right input {
            width: 100%;
            padding: 10px;
            margin-top: 25px;
            font-size: 16px;
            border: none;
            outline: none;
            border-bottom: 2px solid #B0B3B9;
        }

        .box-form .right .remember-me--forget-password {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .box-form .right .remember-me--forget-password input {
            margin: 0;
            margin-right: 7px;
            width: auto;
        }

        .box-form .right button {
            float: right;
            color: #fff;
            font-size: 16px;
            padding: 12px 35px;
            border-radius: 50px;
            display: inline-block;
            border: 0;
            outline: 0;
            box-shadow: 0px 4px 20px 0px #49c628a6;
            background-image: linear-gradient(135deg, #70F570 10%, #49C628 100%);
        }

        label {
            display: block;
            position: relative;
            margin-left: 30px;
        }

        label::before {
            content: ' \f00c';
            position: absolute;
            font-family: FontAwesome;
            background: transparent;
            border: 3px solid #70F570;
            border-radius: 4px;
            color: transparent;
            left: -30px;
            transition: all 0.2s linear;
        }

        label:hover::before {
            font-family: FontAwesome;
            content: ' \f00c';
            color: #fff;
            cursor: pointer;
            background: #70F570;
        }

        label:hover::before .text-checkbox {
            background: #70F570;
        }

        label span.text-checkbox {
            display: inline-block;
            height: auto;
            position: relative;
            cursor: pointer;
            transition: all 0.2s linear;
        }

        label input[type="checkbox"] {
            display: none;
        }
    </style>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <img src="{{ url('/') }}/public/images/restlogo.png" alt="">
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_9Jbc9SbbyR.json"
                    background="transparent" speed="1" style="width: 758px; height: 457px;" loop autoplay>
                </lottie-player>
            </div>
        </div>


        <div class="right">
            <h5>Login</h5>
            <br><br>

            <div class="inputs city" id="restlogin">
                <h3>Staff Login</h3>
                <form action="{{ route('staff-signin') }}" method="post">
                    @csrf
                    <input type="email" id="login-username" name="email" placeholder="User Email"
                        value="madchef@gmail.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <input type="password" id="login-password" name="password" placeholder="password" value="12345678">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br><br>

                    <br>
                    <button type="submit">Login</button>
                </form>
            </div>





        </div>

    </div>
    <!-- partial -->
    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
        }
    </script>
</body>

</html>
