
<?php
require('fpdf/fpdf.php');

$scheda = $_POST['scheda'] ?? '';
$nome = $_POST['nome'] ?? '';

if (empty($scheda)) {
    die('Nessuna scheda da generare.');
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['scheda'])) {
    $scheda = $_POST['scheda'];
    $scheda_formattata = str_replace(["\\n", "\\r", "\\"], ["\n", "", ""], $scheda);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);

    $content =mb_convert_encoding($scheda_formattata, "UTF-8"); // Forza la codifica in UTF-8

    $pdf->MultiCell(0, 8, $content);

    // Salva il PDF come un file singolo
    $pdf->Output("scheda_$nome.pdf", 'D');
} 