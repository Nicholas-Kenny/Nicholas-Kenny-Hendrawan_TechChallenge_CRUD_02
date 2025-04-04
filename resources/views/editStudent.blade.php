<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mengedit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div>
        <h1>Mengedit Data Mahasiswa</h1>
        {{-- mengarahkan route '/updateProduct' pada view editStudent --}}
        <form action="{{route('updateStudent', $student->id)}}" method="POST" enctype="">
            @csrf  {{-- untuk alasan keamanan data --}}
            @method('PATCH'){{-- untuk dapat melakukan aksi edit sebagian data --}}

            <div>
                <label for="" class="">Nama Mahasiswa</label>
                <input value="{{$student->nama_mahasiswa}}" type="text" class="" id="" name="nama_mahasiswa">
            </div>

            <div>
                <label for="" class="">Email</label>
                <input value="{{$student->email}}" type="text" class="" id="" name="email">
            </div>

            <div>
                <label for="" class="">NIM</label>
                <input value="{{$student->NIM}}" type="text" class="" id="" name="NIM">
            </div>

            <div>
                <label for="" class="">Nomor Telepon</label>
                <input value="{{$student->nomor_telepon}}" type="text" class="" id="" name="nomor_telepon">
            </div>

            <div>
                <label for="" class="">Gender</label>
                <select class = "form-select" name="gender" id="">
                    @foreach ($genders as $gender)
                        <option value="{{$gender->id}}" {{$student->gender_id == $gender->id ? 'selected' : ''}}>
                            {{$gender->gender}}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
