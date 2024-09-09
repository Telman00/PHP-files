<?php
$xml = simplexml_load_file('https://www.cbar.az/currencies/26.07.2024.xml');
$data = json_decode(json_encode($xml), true);

if (isset($data['ValType'][1]['Valute'])) {
    $currency_data = $data['ValType'][1]['Valute']; 
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Xarici Valyutalar - 26-cı gün</title>
        <style>
            table {
                width: 50%;
                margin: 20px auto;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h2>Xarici Valyutalar - 26-cı gün</h2>
        <table>
            <thead>
                <tr>
                    <th>Valyuta</th>
                    <th>Valyuta Adı</th>
                    <th>Valyuta Dəyəri</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currency_data as $valute): ?>
                    <tr>
                        <td><?php echo $valute['@attributes']['Code']; ?></td>
                        <td><?php echo $valute['Name']; ?></td>
                        <td><?php echo $valute['Value']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>
    <?php
} else {
    echo "Xarici valyutalar tapılmadı.";
}
?>
