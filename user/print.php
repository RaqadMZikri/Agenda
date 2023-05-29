<php
    require functions.php;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview</title>
    <style>
        header {
            text-align: center;
            border-bottom: 5px dashed black;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 40px;
            width: 600px;
            margin: auto;
        }
        
        table,
        tr,
        td {
            border: 1px solid black;
            text-align: center;
            width: 600px;
            margin: 50px auto;
            padding: 5px;
        }
    </style>
    <script>
        window.print();
    </script>
</head>

<body>
    <header>
        <img src="../assets/smk6.png" alt="" width="100px">
        <h1>SEKOLAH MENENGAH KEJURUAN NEGERI 6 </h1>

    </header>
    <main>
        <table cellspacing="1">
            <thead>
                <tr>
                    <th colspan="4" style="height: 50px;">Lembar Disposisi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>surat dari :</td>
                    <td><?=$_GET['pengirim'];?></td>
                    <td>Diterima tanggal :</td>
                    <td><?=$_GET['tanggal_terima'];?></td>
                </tr>
                <tr>
                    <td>No. Surat :</td>
                    <td><?=$_GET['no_surat'];?></td>
                    <td>Tanggal Surat :</td>
                    <td><?=$_GET['tanggal_kirim'];?></td>
                </tr>
                <tr>
                    <td colspan="2">Status Surat :</td>
                    <td colspan="2"><?=$_GET['status_surat'];?></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: left;height: 100px;padding-top: -20px;">Perihal :        <?=$_GET['perihal'];?></td>
                </tr>
                <tr>
                    <td colspan="2">Diteruskan Kepada Sdr :</td>
                    <td colspan="2"><?=$_GET['kepada'];?></td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="position: relative;height: 250px;">
                        <p style="position: absolute;top: 10px; left: 50px;">Catatan :</p>
                        <h4 style="right: 50px;;position: absolute;bottom: 0;">Yang Bersangkutan</h4>
                    </td>
                </tr>
            </tfoot>
        </table>
    </main>
</body>

</html>

</html>