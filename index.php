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
  </head>
  <body class="bg-light">
    <ul class="nav nav-tabs bg-dark">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php"
          >Create Invoice</a
        >
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view/view_invoices.php">View Invoices</a>
      </li>
    </ul>
    <div class="container-sm">
      <h1 class="pt-3 pb-3">Create Invoice</h1>
      <h2>From:</h2>
      <p>
        d6 Group <br />
        Monument Office Park, Block 6, Suite 101 <br />
        71 Steenbok Avenue, Monument Park <br />
        Pretoria, 0181 <br />
        admin@d6.com
      </p>
      <h2>To:</h2>
      <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <input
          type="text"
          class="form-control"
          name="company_name"
          id="company_name"
          placeholder="Company Name:"
          autocomplete="off"
        />
      </div>
      <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3 mb-3">
        <textarea
          class="form-control"
          placeholder="Your Address:"
          rows="7"
          name="address"
          id="address"
        ></textarea>
      </div>
      <form class="mb-7">
        <table
          class="table table-bordered table-hover table-striped table-default"
          id="invoice_item"
        >
          <tr>
            <th width="2%">
              <input id="checkAll" class="formcontrol" type="checkbox" />
            </th>
            <th width="15%">Item No</th>
            <th width="38%">Item Name</th>
            <th width="15%">Quantity</th>
            <th width="15%">Price</th>
            <th width="15%">Total</th>
          </tr>
          <tr>
            <td><input type="checkbox" /></td>
            <td>
              <input
                type="text"
                name="product_code[]"
                id="product_code_1"
                class="form-control"
                autocomplete="off"
              />
            </td>
            <td>
              <input
                type="text"
                name="product_name[]"
                id="product_name_1"
                class="form-control"
                autocomplete="off"
              />
            </td>
            <td>
              <input
                type="number"
                name="quantity[]"
                id="quantity_1"
                class="form-control"
                autocomplete="off"
              />
            </td>
            <td>
              <input
                type="number"
                name="price[]"
                id="price_1"
                class="form-control"
                autocomplete="off"
              />
            </td>
            <td>
              <input
                type="number"
                name="total[]"
                id="total_1"
                class="form-control"
                autocomplete="off"
              />
            </td>
          </tr>
        </table>
        <div class="row">
          <div class="col-xs-12 col-sm-3 col-md-3 mb-3">
            <button class="btn btn-danger" id="removeRows" type="button">
              - Delete
            </button>
            <button class="btn btn-primary" id="addRows" type="button">
              + Add More
            </button>
          </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-2">
          <input
            value=""
            type="number"
            class="form-control"
            name="sub_total"
            id="sub_total"
            placeholder="R: Sub total"
          />
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-2">
          <input
            value=""
            type="number"
            class="form-control"
            name="tax_rate"
            id="tax_rate"
            placeholder="%: Tax Rate"
          />
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-2">
          <input
            value=""
            type="number"
            class="form-control"
            name="tax_amount"
            id="tax_mount"
            placeholder="R: Tax Amount"
          />
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-2">
          <input
            value=""
            type="number"
            class="form-control"
            name="after_tax_total"
            id="after_tax_total"
            placeholder="R: Total"
          />
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-2">
          <input
            value=""
            type="number"
            class="form-control"
            name="amount_paid"
            id="amount_paid"
            placeholder="R: Amount Paid"
          />
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-2">
          <input
            value=""
            type="number"
            class="form-control"
            name="amount_due"
            id="amount_due"
            placeholder="R: Amount Due"
          />
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 mb-2">
            <h3>Notes:</h3>
            <div class="form-group">
              <textarea
                class="form-control txt"
                rows="5"
                name="notes"
                id="notes"
                placeholder="Your Notes:"
              ></textarea>
            </div>
            <div class="form-group">
              <input
                type="hidden"
                value="<?php echo $_SESSION['id']; ?>"
                class="form-control"
                name="userId"
              />
              <input
                type="hidden"
                value="<?php echo $invoice_values['id']; ?>"
                class="form-control"
                name="invoiceId"
                id="invoiceId"
              />
            </div>
          </div>
          <div class="form-group">
            <input
              type="hidden"
              value="<?php echo $_SESSION['id']; ?>"
              class="form-control"
              name="userId"
            />
            <input
              type="hidden"
              value="<?php echo $invoice_values['id']; ?>"
              class="form-control"
              name="invoiceId"
              id="invoiceId"
            />
            <input
              data-loading-text="Updating Invoice..."
              type="submit"
              name="invoice_btn"
              value="Save Invoice"
              class="btn btn-success submit_btn invoice-save-btm"
            />
          </div>
        </div>
      </form>
      <br /><br /><br /><br />
    </div>
    <footer class="text-white bg-dark text-center">
      All right reserved takalani
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
