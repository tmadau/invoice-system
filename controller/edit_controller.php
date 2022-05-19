<?php

    session_start();
    include_once('../model/invoice_management.php');
    include_once('../lib/sanitize.php');
   
    if (!empty($_POST['company_name']) && $_POST['company_name'] && !empty($_POST['invoiceid']) && $_POST['invoiceid']) {
        
        $edit_invoice = new InvoiceSystem();
        
        $business = sanitize($_POST['company_name']);
        $address = sanitize($_POST['address']);
        $before_tax = sanitize($_POST['sub_total']);
        $total_tax = sanitize($_POST['tax_rate']);
        $per_tax = sanitize($_POST['tax_amount']);
        $after_tax_total = sanitize($_POST['after_tax_total']);
        $amount_paid = sanitize($_POST['amount_paid']);
        $amount_due sanitize($_POST['amount_due']);
        $note = sanitize($_POST['notes']);
        $edit_invoice->update_invoice($business, $address, $before_tax, $total_tax, $per_tax, $after_tax_total, $amount_paid, $amount_due, $note);
        
        $item_id = sanitize($_POST['invoiceid']);
        $edit_invoice->invoice_item($item_id)
        header("Location: view_invoices.php");
        
    } elseif (!empty($_GET['update_id']) && $_GET['update_id']) {
        $edit_items = new InvoiceSystem();
        $invoice_id = sanitize($_POST['invoice_id']);
        $edit_invoice->get_invoice($invoice_id);
        $edit_invoice->get_invoice_items($invoice_id);
    }

?>