<?php    
    session_start();
    include '../model/invoice_management.php';
    $invoice = new InvoiceSystem();
    if ($_POST['action'] == 'delete_invoice' && $_POST['id']) {
        $invoice->deleteInvoice($_POST['id']);	
        $jsonResponse = array("status" => 1);
        echo json_encode($jsonResponse);
    }
?>
