<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Label - {{ $barang->kode_barang ?? 'INV-'.str_pad($barang->id, 4, '0', STR_PAD_LEFT) }}</title>
    <style>
        @page {
            size: 10cm 5cm;
            margin: 0;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #fff;
        }
        .label-container {
            width: 9cm;
            height: 4cm;
            border: 2px solid #000;
            padding: 0.3cm;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .header {
            text-align: center;
            border-bottom: 1px solid #000;
            padding-bottom: 2px;
            margin-bottom: 4px;
        }
        .header h3 {
            margin: 0;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header p {
            margin: 0;
            font-size: 8px;
        }
        .content {
            display: flex;
            gap: 10px;
        }
        .qr-code {
            width: 2.2cm;
            height: 2.2cm;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            text-align: center;
            background: #f9f9f9;
        }
        .details {
            flex: 1;
            font-size: 10px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details td {
            padding: 1px 0;
            vertical-align: top;
        }
        .details td:first-child {
            width: 60px;
            font-weight: bold;
        }
        .footer {
            text-align: right;
            font-size: 8px;
            margin-top: 4px;
            font-style: italic;
        }
        @media print {
            body {
                height: auto;
                display: block;
            }
            .label-container {
                margin: 0 auto;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="label-container">
        <div class="header">
            <h3>INVENTARIS SMPN 5 PURBALINGGA</h3>
            <p>Milik Negara - Tidak Untuk Diperjualbelikan</p>
        </div>
        
        <div class="content">
            <div class="details">
                <table>
                    <tr>
                        <td>Kode</td>
                        <td>: {{ $barang->kode_barang ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: <strong>{{ substr($barang->nama, 0, 30) }}{{ strlen($barang->nama) > 30 ? '...' : '' }}</strong></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>: {{ $barang->kategori }}</td>
                    </tr>
                    <tr>
                        <td>Perolehan</td>
                        <td>: {{ $barang->tahun_perolehan ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer">
            Sistem Inventaris Digital (Digi Inventa)
        </div>
    </div>

</body>
</html>
