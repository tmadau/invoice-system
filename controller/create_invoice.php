<?php

    session_start();
    include_once('../model/invoice_management.php');
    include_once('../lib/sanitize.php');
   
    if (!empty($_POST['company_name']) && $_POST['company_name']) {
        
        $view_invoice = new InvoiceSystem();
        
        $business = sanitize($_POST['company_name']);
        $address = sanitize($_POST['address']);
        $before_tax = sanitize($_POST['sub_total']);
        $total_tax = sanitize($_POST['tax_rate']);
        $per_tax = sanitize($_POST['tax_amount']);
        $after_tax_total = sanitize($_POST['after_tax_total']);
        $amount_paid = sanitize($_POST['amount_paid']);
        $amount_due sanitize($_POST['amount_due']);
        $note = sanitize($_POST['notes']);
        $view_invoice->save_invoice($business, $address, $before_tax, $total_tax, $per_tax, $after_tax_total, $amount_paid, $amount_due, $note);
        
        $company_name = sanitize($_POST['product_code']);
        $view_invoice->add_invoice_items($company_name)
        header("Location: view_invoices.php");
    }

?>