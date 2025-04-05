<?php
include("conn.php");
$frequenza = $_POST['frequenza'] ?? '';
$eta = $_POST['eta'] ?? '';
$altezza = $_POST['altezza'] ?? '';
$nome = $_POST['nome'] ?? '';
$peso = $_POST['peso'] ?? '';
$sesso = $_POST['sesso'] ?? '';
$id = $_POST['id'] ?? '';


$api_key = 'UW0PEl7IP25RIazBNsK1REDjQdz33EnilDgLGIbP';

$question = "Creami solo una tabella senza commenti aggiuntivi che sia una scheda di allenamento di un $sesso, alto $altezza cm, pesante $peso kg, $eta anni, che si allena $frequenza volte alla settimana";

$url = "https://api.cohere.com/v2/chat";
$data = [
    "model" => "command-r-plus-08-2024",
    "messages" => [
        ["role" => "user", "content" => $question]
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $api_key",
    "Content-Type: application/json",
    "Accept: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$response_data = json_decode($response, true);
$ai_response = $response_data['message']['content'][0]['text'] ?? "Errore nella risposta";


function formattaTabella($testo)
{
    $righe = explode("\n", trim($testo));
    $html = '<div class="table-responsive"><table class="table table-bordered table-striped table-hover">';

    foreach ($righe as $indice => $riga) {
        $celle = explode("|", $riga);
        $html .= "<tr>";
        foreach ($celle as $cella) {
            $tag = $indice === 0 ? 'th' : 'td'; // Prima riga come intestazione
            $html .= "<$tag class='text-center'>" . htmlspecialchars(trim($cella)) . "</$tag>";
        }
        $html .= "</tr>";
    }

    $html .= "</table></div>";
    return $html;
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheda Allenamento: <?php echo htmlspecialchars($nome); ?></title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Scheda di Allenamento per <?php echo htmlspecialchars($nome); ?></h2>
            </div>
            <div class="card-body">
                <?php if (!empty($ai_response)): ?>
                    <?php echo formattaTabella($ai_response); ?>
                <?php else: ?>
                    <p class="text-danger text-center">Errore nella generazione della scheda di allenamento.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card-footer text-center" style="padding:20px">
        <form method="POST" action="salva_scheda.php" target="_blank">
            <input type="hidden" name="scheda" value="<?php echo htmlspecialchars($ai_response ?? ''); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id ?? ''); ?>">
            <button type="submit" class="btn btn-success me-2">⬆️ Salva sul DB</button>
        </form>
        <div class="card-footer text-center" style="padding:20px">
            <form method="POST" action="genera_pdf.php">
            <input type="hidden" name="scheda" value="<?= str_replace(["\\n", "\\r", "\\"], ["\n", "", ""], (htmlspecialchars($ai_response))) ?>">
                <input type="hidden" name="scheda" value="<?php echo htmlspecialchars($ai_response ?? ''); ?>">
                <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome ?? ''); ?>">
                <button type="submit" class="btn btn-danger me-2">📄 Scarica PDF</button>
            </form>
        </div>

        <a href="tables.php" class="btn btn-warning">🔙 Indietro</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>