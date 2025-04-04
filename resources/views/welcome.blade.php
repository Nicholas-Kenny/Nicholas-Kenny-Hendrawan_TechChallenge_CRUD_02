<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="table-responsive">
        <h1 class="text-center">Daftar Mahasiswa</h1>
        {{-- link yang dapat redirect ke pagi createStudent --}}
        <a href="{{ route('createStudent') }}" class="btn btn-success mb-3">Menambahkan Data</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Email</th>
                    <th>NIM</th>
                    <th>Nomer Telepon</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student) {{--loop supaya dapat menambahkan data secara dinamis--}}
                    <tr>
                        <td>{{$student->nama_mahasiswa}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->NIM}}</td>
                        <td>{{$student->nomor_telepon}}</td>
                        <td>{{$student->gender->gender}}</td>
                        <td>
                            <a href="{{route('editStudent', $student->id)}}" class="btn btn-success">Edit</a> {{-- button edit yang dapat berpindah ke form editStudent --}}
                            <form action="{{route('deleteStudent', $student->id)}}" method="POST"> {{-- button delete yang dapat menghapus list melalui route deleteStudent --}}
                                @csrf               {{-- menambahkan @csrf untuk alasan keamanan --}}
                                @method('DELETE')   {{-- karena mau menghapus, maka menggunakan method delete --}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
