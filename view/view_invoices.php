<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Invoice System</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <script src="../lib/js/invoice.js"></script>
  </head>
  <body class="bg-light">
    <ul class="nav nav-tabs bg-dark">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="../index.php">Create Invoice</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="./view/view_invoices.php">View Invoices</a>
      </li>
    </ul>
    <div class="container-sm">
      <h1 class="pt-3 pb-3">View Invoices</h1>
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Create Date</th>
            <th>Customer Name</th>
            <th>Invoice Total</th>
            <th>Print</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php
          include_once('../model/invoice_management.php');
          $invoice = new InvoiceSystem();
		      $invoiceList = $invoice->get_invoice_list();
          foreach($invoiceList as $invoiceDetails) {
		        $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["date"]));
            echo '
            <tr>
              <td>'.$invoiceDetails["id"].'</td>
              <td>'.$invoiceDate.'</td>
              <td>'.$invoiceDetails["business_name"].'</td>
              <td>'.$invoiceDetails["after_tax_total"].'</td>
              <td><a href="print_invoice.php?invoice_id='.$invoiceDetails["id"].'" title="Print Invoice"><span class="glyphicon glyphicon-print"></span></a></td>
              <td><a href="edit_invoice.php?update_id='.$invoiceDetails["id"].'"  title="Edit Invoice"><span class="glyphicon glyphicon-edit"></span></a></td>
              <td><a href="#" id="'.$invoiceDetails["id"].'" class="deleteInvoice"  title="Delete Invoice"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>';
          }       
        ?>
      </table>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
