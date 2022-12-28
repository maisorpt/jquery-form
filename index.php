<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <script src="form.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <div class="row">
    <div class="col-sm-6 mt-5">

      <div class="text-bg-success p-3 rounded rounded-4">
        <h1>Formulir</h1>
        <form action="process.php" method="POST" id="dahlah">
          <div id="nama-group" class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Full Name" />
          </div>

          <div id="alamat-group" class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
          </div>

          <div id="noHp-group" class="form-group">
            <label for="noHp">Nomor Hp</label>
            <input type="text" class="form-control" id="noHp" name="noHp" placeholder="+62 8.........." />
          </div>

          <div id="jenkel-group" class="form-group mt-3">
            <input class="form-check-input" type="radio" name="jenkel" id="jenkel1" value="Laki-laki" checked />
            <label class="form-check-label" for="jenkel">
              Laki
            </label>
            <input class="form-check-input" type="radio" name="jenkel" id="jenkel2" value="Perempuan" />
            <label class="form-check-label" for="jenkel">
              Perempuan
            </label>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success p-3 px-5 mt-2 text-bg-primary" id="button">
              Submit
            </button>
          </div>

        </form>
      </div>

    </div>

    <div class="col-sm-6 overflow-auto mt-5 " style="height: 600px;">
      <span><button class="btn text-bg-primary p-2 px-4 mb-1" id="button1">Hide</button></span>
      <div class="card text-bg-secondary mb-3 text-center" style="max-width: 50rem;" id="hasile">
        <div class="card-header">Hasil</div>
        <div class="card-body">
          <table class="table table-hover  text-bg-light">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis</th>
                <th>No Hp</th>
                <th>Menu</th>
              </tr>
            </thead>
            <tbody id="munculTabel">

            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div>
  <script>
    $(document).ready(() => {
      const $munculTabel = $('#munculTabel');

      // fungsi untuk memunculkan data
      function reloaddata() {
        $.getJSON('http://localhost/php/jquery-form-validation%20copy/getdata.php', (respon) => {
          const markup = respon
            .map(item => `<tr><td >${item.no}</td><td >${item.nama}</td><td>${item.alamat}</td><td>${item.jenis}</td><td>${item.nohp}</td><td class="no" id="${item.no}"><button class="btn btn-danger">Hapus</button></td></tr>`)
            .join('');

          $munculTabel.html(markup);

          $(".no").click(function () {

            const x = $(this).attr("id");
            $.post("delete.php", { x }, function (a) {

            }).done(function () {
              reloaddata();
            });

          });
        });
      }
      //menampilkan data
      reloaddata();


      // fungsi untuk submit form & menampilkan data
      $("form").submit(function (event) {
        event.preventDefault();

        $.post('process.php', $('#dahlah').serialize(), function (a) {
          console.log(a);
          reloaddata();
        });
      });

      $("#button1").click(function () {
        $("#hasile").toggle();
      });

    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>