<?php
$folderPath = "my_pdfs"; // Path to the PDF folder
$pdfFiles = array_diff(scandir($folderPath), array('.', '..')); // List all files excluding '.' and '..'

$pdfList = [];
foreach ($pdfFiles as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') { // Filter PDF files
        $pdfList[] = [
            "name" => pathinfo($file, PATHINFO_FILENAME), // File name without extension
            "url" => "http://localhost/$folderPath/$file" // URL to access the PDF
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($pdfList);
?>
