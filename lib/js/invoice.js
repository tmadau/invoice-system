$(document).ready(function () {
  $(document).on("click", "#checkAll", function () {
    $(".itemRow").prop("checked", this.checked);
  });
  $(document).on("click", ".itemRow", function () {
    if ($(".itemRow:checked").length == $(".itemRow").length) {
      $("#checkAll").prop("checked", true);
    } else {
      $("#checkAll").prop("checked", false);
    }
  });
  var count = $(".itemRow").length;
  $(document).on("click", "#addRows", function () {
    count++;
    var htmlRows = "";
    htmlRows += "<tr>";
    htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
    htmlRows +=
      '<td><input type="text" name="product_code[]" id="product_code_' +
      count +
      '" class="form-control" autocomplete="off"></td>';
    htmlRows +=
      '<td><input type="text" name="product_name[]" id="product_name_' +
      count +
      '" class="form-control" autocomplete="off"></td>';
    htmlRows +=
      '<td><input type="number" name="quantity[]" id="quantity_' +
      count +
      '" class="form-control quantity" autocomplete="off"></td>';
    htmlRows +=
      '<td><input type="number" name="price[]" id="price_' +
      count +
      '" class="form-control price" autocomplete="off"></td>';
    htmlRows +=
      '<td><input type="number" name="total[]" id="total_' +
      count +
      '" class="form-control total" autocomplete="off"></td>';
    htmlRows += "</tr>";
    $("#invoice_item").append(htmlRows);
  });
  $(document).on("click", "#removeRows", function () {
    $(".itemRow:checked").each(function () {
      $(this).closest("tr").remove();
    });
    $("#checkAll").prop("checked", false);
    calculateTotal();
  });
  $(document).on("blur", "[id^=quantity_]", function () {
    calculateTotal();
  });
  $(document).on("blur", "[id^=price_]", function () {
    calculateTotal();
  });
  $(document).on("blur", "#tax_rate", function () {
    calculateTotal();
  });
  $(document).on("blur", "#amount_paid", function () {
    var amount_paid = $(this).val();
    var total_aftertax = $("#after_tax_total").val();
    if (amount_paid && total_aftertax) {
      total_aftertax = total_aftertax - amount_paid;
      $("#amount_due").val(total_aftertax);
    } else {
      $("#amount_due").val(total_aftertax);
    }
  });
  $(document).on("click", ".deleteInvoice", function () {
    var id = $(this).attr("id");
    if (confirm("Are you sure you want to remove this?")) {
      $.ajax({
        url: "action.php",
        method: "POST",
        dataType: "json",
        data: { id: id, action: "delete_invoice" },
        success: function (response) {
          if (response.status == 1) {
            $("#" + id)
              .closest("tr")
              .remove();
          }
        },
      });
    } else {
      return false;
    }
  });
});
function calculateTotal() {
  var total_amount = 0;
  $("[id^='price_']").each(function () {
    var id = $(this).attr("id");
    id = id.replace("price_", "");
    var price = $("#price_" + id).val();
    var quantity = $("#quantity_" + id).val();
    if (!quantity) {
      quantity = 1;
    }
    var total = price * quantity;
    $("#total_" + id).val(parseFloat(total));
    total_amount += total;
  });
  $("#subTotal").val(parseFloat(total_amount));
  var tax_rate = $("#taxRate").val();
  var sub_total = $("#subTotal").val();
  if (sub_total) {
    var tax_amount = (sub_total * tax_rate) / 100;
    $("#tax_amount").val(tax_amount);
    sub_total = parseFloat(sub_total) + parseFloat(tax_amount);
    $("#after_tax_total").val(sub_total);
    var amount_paid = $("#amount_paid").val();
    var total_aftertax = $("#after_tax_total").val();
    if (amount_paid && total_aftertax) {
      total_aftertax = total_aftertax - amount_paid;
      $("#amountDue").val(total_aftertax);
    } else {
      $("#amountDue").val(sub_total);
    }
  }
}
