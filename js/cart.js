$(document).ready(function () {

  // console.log($(".price").text());
  var ini_Prices = $(".price").text();
  var single_prices = ini_Prices.split("￥");
  // var item_quantity = $(".item-quantity").val();
  // console.log(item_quantity);
  var qty_Arr = [];
  var qty = document.querySelectorAll(".item-quantity");
  qty.forEach((q) => {
    // console.log(q.value);
    qty_Arr.push(q.value);
  })
  var cal_amount = $(".calculated-amount").text();
  // console.log(cal_amount)
  for (i = 1; i <= cal_amount.length; i++) {
    // console.log(i);
    // var item_quantity = $(".item-quantity").val();
    // console.log(item_quantity);
    // qty_Arr.push(item_quantity);
    // console.log(qty_Arr);
    var single_qty = qty_Arr[i - 1];
    // console.log(typeof(qty_Arr[i-1]), typeof(single_prices[i]))
    // var qty = document.getElementById("cart-table").rows[i].cells[4].value;
    var single_price = single_prices[i];
    var sg_price = single_price.replace(",", "");
    // console.log(parseInt(qty_Arr[i-1]), parseFloat(sg_price));
    var calculate_sub_price = parseFloat(sg_price) * parseInt(qty_Arr[i - 1]);
    // console.log(calculate_sub_price);
    document.getElementById("cart-table").rows[i].cells[5].innerHTML = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'JPY' }).format(`${calculate_sub_price}`);
  }

  var shopping_items = document.getElementById("cart-table").rows.length;
  // console.log(parseInt(shopping_items)-1)
  document.getElementById('shopping_item_count').innerHTML = `${parseInt(shopping_items) - 1} items in cart`;

  var regExpr = /[^a-zA-Z0-9-. ]/g;
  var calculate_Price = 1, quantity = 0;
  $("#order_confirm").click(function () {
    $("order_confirmation").modal('hide');
  })

  // $(".input-group .minus").click(function () {
  //   quantity = parseInt($(this).siblings('.input-number').val());
  //   // quantity--;
  //   // $(this).siblings('.input-number').val(quantity);
  //   var priceStr = $(this).parent().parent().parent().find('.price').text();
  //   var price = priceStr.replace(regExpr, "");
  //   // console.log(parseFloat(price).toFixed(2))
  //   calculate_Price = parseInt(price).toFixed(2) * quantity;
  //   // console.log($(this).parent().parent().parent().find('.total-amount').text())
  //   $(this).parent().parent().parent().find('.calculated-amount').text(`￥${calculate_Price.toFixed(2)}`);
  // })

  // $(".input-group .plus").click(function () {
  //   quantity = parseInt($(this).siblings('.input-number').val());
  //   // quantity++;
  //   // $(this).siblings('.input-number').val(quantity);
  //   // console.log(quantity);
  //   var stock = $(this).siblings('.stock').text();
  //   console.log(parseInt(stock));
  //   if (quantity == parseInt(stock)) {
  //     $('#quantity_warning').modal('show');
  //   }
  //   else {
  //     // $(".plus-btn").css('cursor', 'pointer');
  //     console.log("hide")
  //   }
  //   var priceStr = $(this).parent().parent().parent().find('.price').text();
  //   var price = priceStr.replace(regExpr, "");
  //   // console.log(parseFloat(price).toFixed(2))
  //   calculate_Price = parseInt(price).toFixed(2) * quantity;
  //   // console.log($(this).parent().parent().parent().find('.total-amount').text())
  //   $(this).parent().parent().parent().find('.calculated-amount').text(`￥${calculate_Price.toFixed(2)}`);
  // })

  $(".item-quantity-confirm").click(function () {
    quantity = parseInt($(this).siblings('.item-quantity').val());
    var stock = $(this).siblings('.stock').text();
    if (quantity > parseInt(stock)) {
      $('#quantity_warning').modal('show');
    }
    else {
      // $(".plus-btn").css('cursor', 'pointer');
      var priceStr = $(this).parent().parent().parent().parent().find('.price').text();
      var price = priceStr.replace(regExpr, "");
      console.log(price)
      calculate_Price = parseFloat(price) * quantity;
      console.log(calculate_Price);
      $(this).parent().parent().parent().parent().find('.calculated-amount').text(`￥${calculate_Price.toFixed(2)}`);
      // console.log("hide");
    }
  })

  var discount_rate = $(".discount-rate").text();
  // console.log(discount_rate);
  var discount_value = discount_rate.replace(regExpr, "");

  var shopping_item_count = $("#shopping_item_count").text();
  if (shopping_item_count === "0 items in cart") {
    $(".shopping-summery thead").remove();
    $(".count-area").remove();
  }

  $(".item-quantity-confirm").click (function() {
    $(".cart-stock-quantity").append($(".hidden-stock").val());
  })
  $("#quantity_warning").on("hidden.bs.modal", function () {
    $(".cart-stock-quantity").text("");
  })
})


