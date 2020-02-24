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
        <p>Hello Sir,</p>
        <p>You have receive following inquiry from DTCP Portal.</p>
        <table class="table table-bordered">
            <tr>
                <td>Name: </td>
                <td>{{ucfirst($user['name'])}}</td>
            </tr>

            <tr>
                <td>email: </td>
                <td>{{ucfirst($user['email'])}}</td>
            </tr>

            <tr>
                <td>Phone: </td>
                <td>{{ucfirst($user['phone'])}}</td>
            </tr>

            <tr>
                <td>Subject: </td>
                <td>{{ucfirst($user['subject'])}}</td>
            </tr>

            <tr>
                <td>Message: </td>
                <td>{{ucfirst($user['message'])}}</td>
            </tr>
          
        </table>
        <p>Thanks,</p>
        <p>DTCP Team</p>

    </body>
</html>