<html>
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <style>
            @page {
                margin: 0cm 0cm;
            }
            body {
                margin-top: 3cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 5cm;
            }
            main{
                position: fixed; 
                top: 5cm; 
                
            }
            #footer {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                max-width: 100%;
                max-height: 100%;
            }
            .invoice table {
            margin: 15px;
            }
            .invoice h3 {
                margin-left: 15px;
            }
      </style>
    </head>
    <body>
        Hello,<br/><br>
        You are receiving this email because we received a password reset request for your account.<br/><br/>
        Your new password is: {{ $password }}<br/><br/>
        <p>Thanks,</p>
        <p>DTCP Team</p>

    </body>
</html>