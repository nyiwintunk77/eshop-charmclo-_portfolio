var get_url = new URL(location);
var conviniName = get_url.searchParams.get('convini');


var n=7; //number of days to add. 
var today=new Date(); //Today's Date
var requiredDate=new Date(today.getFullYear(),today.getMonth(),today.getDate()+n)
var day = requiredDate.getDate();
var month = requiredDate.getMonth() + 1;
var year = requiredDate.getFullYear();
if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var expireDate = year + "/" + month + "/" + day;
console.log(expireDate)

$(".convini-conf-method").append(`( ${conviniName} コンビニ)`);
$(".convini-conf-date").append(expireDate);