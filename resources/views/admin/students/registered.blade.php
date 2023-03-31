<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Registration Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        audio, canvas, embed, iframe, img, object, svg, video{
            display: inline !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
 </head>
  <body>
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card border-success">
            <div class="card-header bg-success text-white text-center">
              <h2>User Registration Successful!</h2>
            </div>
            <div class="card-body">
              <h2>{{ $user->name }}</h2>

              <p>Thank you for registering with us.</p>
              <p>Your account has been created successfully.</p>
              <p>You can now log in using your Qr Code. <br>
            Here is your Qr Code through which you can access your data</p>
            <div class="text-center mt-5"><b>Your QR Code Save it With Yourself !</b></div>
            <div class="text-center">
                {{ QrCode::size(150)->generate($user->qr_code) }}
            </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.student.profile', $user) }}" class="btn btn-outline-info">See Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-irsgZbxH0wUcijxKjJwM/H8SVKWpuB7vqtKgX9NU7N2oI5c5GX5Tp5d/1wJ5wXYpYcS7OTRmZP9A7Kj8z3qV4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
