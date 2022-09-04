function goBack() {
  window.history.back();
}
$('.credit-payment-submit').click(function() {
  const get_cardName = $(".cards").val();
  if ($(".card-no").val() != "" && get_cardName != "" && $(".card-expired-month").val() != "month" && $(".card-expired-year").val() != "year" && $(".card-username").val() != ""){
    location.href = `creditPaymentConfirm.php?card_type=${get_cardName}`;
  }else {
    alert("必要な情報をご記入してください！");
  }
  
});

$('.reg-credit-payment-submit').click(function() {
  const get_cardName = $(".cards").val();
  if ($(".card-no").val() != "" && get_cardName != "" && $(".card-expired-month").val() != "month" && $(".card-expired-year").val() != "year" && $(".card-username").val() != ""){
    location.href = `reg_creditPaymentConfirm.php?card_type=${get_cardName}`;
  }else {
    alert("必要な情報をご記入してください！");
  }
  
});