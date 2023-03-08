<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $registrar->nim }}</title>
    <style>
        @media screen {
            body {}
        }
        @media print {
            @page {
                size: A4 potrait;
            }

            @page :left {
                margin-left: 3cm;
            }

            @page :right {
                margin-left: 4cm;
            }

            body {}

            .page {
                page-break-before: always;
            }
            .photo {
                width: 3cm;
                height: 4cm;
            }
        }
    </style>
</head>

<body>

    <section class="page">
        <header>
            <h1>Dokumen pendaftaran wisudawan</h1>
        </header>
        <main>
            <section>
                <h2>Foto</h2>
                <img class="photo" src="{{ $registrar->photo_url  }}" alt="">
            </section>
            <section>
                <h2>Nama</h2>
                <div>{{ $registrar->name }}</div>
            </section>
            <section>
                <h2>NIM</h2>
                <div>{{ $registrar->nim }}</div>
            </section>
            <section>
                <h2>NIK</h2>
                <div>{{ $registrar->nik }}</div>
            </section>
            <section>
                <h2>Tempat Lahir</h2>
                <div>{{ $registrar->pob }}</div>
            </section>
            <section>
                <h2>Tanggal Lahir</h2>
                <div>{{ $registrar->dob }}</div>
            </section>
            <section>
                <h2>Fakultas</h2>
                <div>{{ $registrar->faculty }}</div>
            </section>
            <section>
                <h2>Jurusan</h2>
                <div>{{ $registrar->study_program }}</div>
            </section>
            <section>
                <h2>IPK</h2>
                <div>{{ $registrar->ipk }}</div>
            </section>
            <section>
                <h2>Jenis Kelamin</h2>
                <div>{{ $registrar->gender }}</div>
            </section>
        </main>
        <footer>

        </footer>
    </section>

</body>

</html>
