<?php

    include_once('../config/database.php');

    class InvoiceSystem {
        public $link;

        //CONSTRUCT FUNCTION TO CONNECT TO THE DATABASE
        function __construct() {
            try {
                $db_connection = new database();
                $this->link = $db_connection->connect();
                return $this->link;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        // Save invoice
        function save_invoice($business, $address, $before_tax, $total_tax, $per_tax, $after_tax_total, $amount_paid, $amount_due, $note) {
            try {
                $query = $this->link->prepare(" INSERT INTO business(id, business_name, business_address, total_before_tax, total_tax, per_tax, after_tax_total, amount_paid, amount_due, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
                $values = array($business, $address, $before_tax, $total_tax, $per_tax, $after_tax_total, $amount_paid, $amount_due, $note);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function add_invoice_items($business_id, $POST) {
            try {
                for ($counter = 0; $counter < count($POST['product_code']); $counter++) {
                    $query = $this->link->prepare(" INSERT INTO invoice(id, business_name, business_address, total_before_tax, total_tax, per_tax, after_tax_total, amount_paid, amount_due, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
                    $items_counter = array($business_id, $POST['product_code'][$counter], $POST['product_name'][$counter], $POST['quantity'][$counter], $POST['price'][$counter], $POST['total'][$counter]);
                    $query->execute($items_counter);
                }
                catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
        }
        function update_invoice($business_id, $invoice_id, $business, $address, $before_tax, $total_tax, $per_tax, $after_tax_total, $amount_paid, $amount_due, $note) {
            try {
                $query = $this->link->prepare(" UPDATE business SET business_name = ?, business_address = ?, total_before_tax = ?, total_tax = ?, per_tax = ?, after_tax_total = ?, amount_paid = ?, amount_due = ?, note = ? WHERE id = ? AND invoice_id = ? ");
                $values = array($business_id, $invoice_id, $business, $address, $before_tax, $total_tax, $per_tax, $after_tax_total, $amount_paid, $amount_due, $note);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function invoice_item($order_id, $POST) {
            try {
                for ($counter = 0; $counter < count($POST['product_code']); $counter++) {
                    $query = $this->link->prepare(" INSERT INTO invoice(id, invoice_code, invoice_name, quantity, amount, final_amount, after_tax_total, amount_paid, amount_due, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
                    $items_counter = array($business_id, $POST['product_code'][$counter], $POST['product_name'][$counter], $POST['quantity'][$counter], $POST['price'][$counter], $POST['total'][$counter]);
                    $query->execute($items_counter);
                }
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function get_invoice_list($business_id) {
            try {
                $query = $this->link->prepare(" SELECT * FROM business WHERE id = ? ");
                $values = array($business_id);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function get_invoice($business_id) {
            try {
                $query = $this->link->prepare(" SELECT * FROM business WHERE id = ? ");
                $values = array($business_id);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function get_invoice_items($invoice_id) {
            try {
                $query = $this->link->prepare(" SELECT * FROM invoice WHERE id = ? ");
                $values = array($business_id);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function delete_invoice_items($invoice_id) {
            try {
                $query = $this->link->prepare(" SELECT * FROM invoice WHERE id = ? ");
                $values = array($business_id);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function delete_invoice_items($invoice_id) {
            try {
                $query = $this->link->prepare(" DELETE FROM invoice WHERE id = ? ");
                $values = array($business_id);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function delete_invoice($business_id) {
            try {
                $query = $this->link->prepare(" DELETE FROM business WHERE id = ? ");
                $values = array($business_id);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }

?>