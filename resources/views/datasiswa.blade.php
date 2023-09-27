<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD Latihan</title>
</head>

<body>
    <h1 class="text-center mb-5 mt-5">Data Mahasiswa</h1>

    <div class="container">
        <div class="row">
            <div class="col-auto mb-3">
                <a href="/tambahsiswa" class="btn btn-success">Tambah</a>
            </div>
            <div class="col-auto ms-auto">
                <form class="d-flex" action="/siswa" method="GET">
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search">
                </form>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr align="center">
                        <th scope="col">No</th>
                        <th scope="col">Pas Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Ditambahkan Pada</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $datas)
                    <tr align="left">
                        <th scope="row">{{ $index + $data->firstitem() }}</th>
                        <td>
                            <img src="{{ asset('PasFoto/'. $datas->PasFoto) }}" alt="PasFoto" onerror="this.src='{{ asset('default/kosong.jpg') }}'" style="border-radius:50%; width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>{{ $datas->Nama }}</td>
                        <td>{{ $datas->Alamat }}</td>
                        <td>{{ $datas->Prodi }}</td>
                        <td>{{ $datas->created_at->format('D M Y') }}</td>
                        <td>
                            <a href="/editsiswa/{{ $datas->id }}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $datas->id }}" data-nama="{{ $datas->Nama }}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <script>
        $('.delete').click( function(){
    
            var idsiswa = $(this).attr('data-id')
            var namasiswa = $(this).attr('data-nama')
            Swal.fire({
            title: 'Anda Yakin?',
            text: 'Apakah benar anda akan menghapus ' + namasiswa + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Benar!'
            }).then((result) => {
        if (result.isConfirmed) {
            window.location = '/deletesiswa/' + idsiswa + ''
            Swal.fire(
                'Berhasil!',
                'Data Anda Terhapus',
                'success'
                )
            }
        });
        });
    </script>
    
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
</body>
</html>