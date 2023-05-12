<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="jquery-3.6.4/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>
<body>
<section>
    <h2>Vonage SMS API</h2>
    <form id="smsForm">
        <label for="phone">Phone Number</label>
        <input name="to" value="1234567890" id="phone">
        <label for="message">Message</label>
        <textarea name="msg" id="message">Hello, this is a test message from Vonage SMS API!</textarea>
        <span></span>
        <button type="submit">Send SMS</button>
    </form>
</section>
<script>
    $(function() {
        $('#smsForm').on('submit', function(event) {
            event.preventDefault();
            sendSMS();
        });

        function sendSMS() {
            const to = $('input#phone').val();
            const msg = $('textarea#message').val();

            $.ajax({
                url: 'send_sms.php',
                type: 'POST',
                data: {
                    to: to,
                    message: msg
                },
                success: function(response) {
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