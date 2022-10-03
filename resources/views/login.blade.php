<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{URL::asset('style.css')}}>
    <!-- <script defer src="script.js"></script> -->
    <title>Halaman Utama</title>
  </head>
  <body class="content__body">
      <div class="logo pt-4">
          <p>STOCKUP</p>
      </div>
    <form class="/login" method="POST">
        @csrf
        <div class="kotak">
            <div class="title">
                <p class="pt-2"> <b>Login</b></p>
            </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label" style="color: black;">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" style="border: 1px solid #626262; background-color:transparent;">
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label" style="color: black">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="border: 1px solid #626262; background-color:transparent;">
                </div>
                <div class="d-flex justify-content-center pt-4">
                    <button type="submit" class="btn btn-primary ps-5 pe-5 " style="background-color: #D7CAA0; width: 100%; border: none;font-size: 16px; border-radius: 7px;"><a href="" style="color: black; font-weight: bold;">Login</a> </button>
                </div>
                <div class="daftar pt-4 text-center pb-5">
                 Belum memiliki akun? <a href="/daftar">Daftar sekarang</a>
                </div>
        </div>
    </form>

    <div class="icon">
        <img src="{{URL::asset('maskot.png')}}" alt="">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <div class="foot">
        <div class="copyright text-center" style="margin-top: -55px; margin-bottom: -35px;">
            <p>2022 &#169opy right</p>
        </div>
    </div>

</body>
</html>