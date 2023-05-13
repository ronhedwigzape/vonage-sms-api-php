<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <script src="jquery-3.6.4/jquery-3.6.4.min.js"></script>
    <title>Vonage SMS API</title>
    <style>
        h2 {
            text-shadow: 2px 4px 2px #000;
        }
        .input {
            background-color: #212121;
            max-width: 350px;
            height: 40px;
            padding: 10px;
             text-align: center;
            border: 2px solid white;
            border-radius: 5px;
            color: rgb(255, 255, 255);
        }

        .input:focus {
            color: rgb(231, 60, 126);
            background-color: #212121;
            outline-color: rgb(231, 60, 126);
            box-shadow: -3px -3px 15px rgb(231, 60, 126);
            transition: .1s;
            transition-property: box-shadow;
        }

        .form {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

        }

        /* Space Button */
        .btn-space {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 13rem;
            height: 3rem;
            background-size: 300% 300%;
            backdrop-filter: blur(1rem);
            border-radius: 5rem;
            transition: 0.5s;
            animation: gradient_301 5s ease infinite;
            border: double 4px transparent;
            background-image: linear-gradient(#212121, #212121),  linear-gradient(137.48deg, #ffdb3b 10%,#FE53BB 45%, #8F51EA 67%, #0044ff 87%);
            background-origin: border-box;
            background-clip: content-box, border-box;
        }

        #container-stars {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            overflow: hidden;
            transition: 0.5s;
            backdrop-filter: blur(1rem);
            border-radius: 5rem;
        }

        strong {
            z-index: 2;
            font-family: 'Avalors Personal Use';
            font-size: 12px;
            letter-spacing: 5px;
            color: #FFFFFF;
            text-shadow: 0 0 4px white;
        }

        #glow {
            position: absolute;
            display: flex;
            width: 12rem;
        }

        .circle {
            width: 100%;
            height: 30px;
            filter: blur(2rem);
            animation: pulse_3011 4s infinite;
            z-index: -1;
        }

        .circle:nth-of-type(1) {
            background: rgba(254, 83, 186, 0.636);
        }

        .circle:nth-of-type(2) {
            background: rgba(142, 81, 234, 0.704);
        }

        .btn-space:hover #container-stars {
            z-index: 1;
            background-color: #212121;
        }

        .btn-space:hover {
            transform: scale(1.1)
        }

        .btn-space:active {
            border: double 4px #FE53BB;
            background-origin: border-box;
            background-clip: content-box, border-box;
            animation: none;
        }

        .btn-space:active .circle {
            background: #FE53BB;
        }

        #stars {
            position: relative;
            background: transparent;
            width: 200rem;
            height: 200rem;
        }

        #stars::after {
            content: "";
            position: absolute;
            top: -10rem;
            left: -100rem;
            width: 100%;
            height: 100%;
            animation: animStarRotate 90s linear infinite;
        }

        #stars::after {
            background-image: radial-gradient(#ffffff 1px, transparent 1%);
            background-size: 50px 50px;
        }

        #stars::before {
            content: "";
            position: absolute;
            top: 0;
            left: -50%;
            width: 170%;
            height: 500%;
            animation: animStar 60s linear infinite;
        }

        #stars::before {
            background-image: radial-gradient(#ffffff 1px, transparent 1%);
            background-size: 50px 50px;
            opacity: 0.5;
        }

        @keyframes animStar {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-135rem);
            }
        }

        @keyframes animStarRotate {
            from {
                transform: rotate(360deg);
            }

            to {
                transform: rotate(0);
            }
        }

        @keyframes gradient_301 {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes pulse_3011 {
            0% {
                transform: scale(0.75);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
            }

            100% {
                transform: scale(0.75);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
        }
    </style>
</head>
<body class="bg-dark">
<div class="container">

    <div class="form text-center rounded-5 shadow-lg p-5">
        <h2 class="text-white fw-bold">Vonage SMS API</h2>
            <label for="phone" class="form-label text-white mt-3 mb-2"><i class="bi bi-telephone me-2"></i>Phone Number</label>
            <input class="form-control input bg-transparent" name="to" id="phone" >
            <label for="message" class="text-white mt-3 mb-2"><i class="bi bi-chat-left-dots me-2"></i>Message</label>
            <textarea
                name="msg"
                class="form-control input bg-transparent"
                id="message"
                style="width: 40rem; height: 10rem; resize: none;"
            >A text message sent using the Nexmo SMS API.
        </textarea>
            <div class="d-flex justify-content-center mt-3 ">
                <button class="btn-space">
                    <strong>SEND</strong>
                    <div id="container-stars">
                        <div id="stars"></div>
                    </div>
                    <div id="glow">
                        <div class="circle"></div>
                        <div class="circle"></div>
                    </div>
                </button>
            </div>
    </div>

</div>
<script>
    $(function() {
        $('.btn-space').click( (event) => {
            event.preventDefault();
            sendSMS();
        });

        let sendSMS = () => {
            const to = $('input#phone').val();
            const msg = $('textarea#message').val();

            $.ajax({
                url: 'send-sms.php',
                type: 'POST',
                data: {
                    to: to,
                    message: msg
                },
                success: function(response) {
                    let data = JSON.parse(response);
                    console.log(data);
                    console.log(response);

                    alert(response.status === 0
                        ? 'The message was sent successfully'
                        : 'The message failed with status: ' + response.status);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                    alert('Something went wrong. Check the console.');
                }
            });
        }
    });</script>
</body>
</html>