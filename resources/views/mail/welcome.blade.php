<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to Aplikasi</title>

  <style>
    body {
      background-color: #dddddd;
    }

    table {
      background-color: #ffffff;
      width: 100%;
      max-width: 800px;
      margin: auto;
      padding: 30px;
    }

    h1 {
      margin-top: 0px;
    }

    a.btn {
      background-color:darkcyan;
      text-decoration: none;
      /* top // kiri-kanan */
      padding: 10px 20px;
      font-size: 1.5em;
      color: #ffffff;
      /* border keliling button */
      border-radius: 10px;
      margin-top: 20px;
      /* ada jarak sikit antara button dan text */
      display: inline-block;
    }
  </style>
</head>
<body>
  <table cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td>
        <h1>Selamat Datang {{ $name }}</h1>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis nisi soluta beatae iure ut eligendi natus, harum tempore libero rerum unde assumenda, cumque, omnis repellendus provident inventore culpa. Eos, debitis.</p>

        <a href="http://aplikasi.test/activate/{{ $code }}" class="btn">KLIK DI SINI</a>
      </td>
    </tr>
  </table>
</body>
</html>