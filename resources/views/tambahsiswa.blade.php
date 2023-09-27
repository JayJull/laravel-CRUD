<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD Latihan</title>
</head>

<body>
    <h1 class="text-center mb-5">Tambah Mahasiswa</h1>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="/insertdatasiswa" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                          <label for="nama" class="form-label">Nama Lengkap</label>
                          <input type="text" name="Nama" class="form-control" id="nama" aria-describedby="namalengkap">
                        </div>
                        <div class="mb-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" name="Alamat" class="form-control" id="alamat">
                        </div>
                        <div class="mb-4">
                            <label for="Prodi" class="form-label">Program Studi</label>
                            <select name="Prodi" class="form-select" aria-label="Default select example">
                                <option selected>-- Pilih Prodi Anda --</option>
                                <option value="Teknologi Rekayasa Perangkat Lunak">Teknologi Rekayasa Perangkat Lunak</option>
                                <option value="Bisnis Digital">Bisnis Digital</option>
                                <option value="Teknologi Rekayasa Komputer">Teknologi Rekayasa Komputer</option>
                              </select>
                          </div>
                          <div class="mb-3">
                            <label for="formFile" class="form-label">Masukkan Pas Foto</label>
                            <input class="form-control" name="PasFoto" type="file" id="formFile">
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>