var get_url = new URL(location);
var creditCardName = get_url.searchParams.get('card_type');
// var creditCardNo = get_url.searchParams.get('card_no');

// var n=7; //number of days to add. 
// var today=new Date(); //Today's Date
// var requiredDate=new Date(today.getFullYear(),today.getMonth(),today.getDate()+n)
// var day = requiredDate.getDate();
// var month = requiredDate.getMonth() + 1;
// var year = requiredDate.getFullYear();
// if (month < 10) month = "0" + month;
// if (day < 10) day = "0" + day;

// var withdrawlDate = year + "/" + month + "/" + day;

$(".credit-withdrawl-method").append(`( ${creditCardName} クレジットカード)`);
// $(".credit-wiithdrawl-date").append(withdrawlDate);
// $(".credit-confーcardNo").append(creditCardNo);