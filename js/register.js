var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;


document.getElementById('theDate').value = today;

// if ($('.first-name').val() == "") {
//   document.getElementById("first_name").oninvalid = function () {
//     this.setCustomValidity(this.value ? '' : 'お名前（名）が入力されていません。');
//   }
// }
// if ($('.last-name').val() == "") {
//   document.getElementById("last_name").oninvalid = function () {
//     this.setCustomValidity(this.value ? '' : 'お名前（姓）が入力されていません。');
//   }
// }


// if ($('.lang-first-name').val() == "") {
//   document.getElementById("lang_First_Name").oninvalid = function () {
//     this.setCustomValidity(this.value ? '' : 'There is no data');
//   }
// }
// var str = $(".lang-first-name").val()
//  // 全角文字チェック
//   if (str.match(/^[^\x01-\x7E\xA1-\xDF]+$/)) {
//     //全角文字
//     document.getElementById("lang_First_Name").setCustomValidity(this.value ? '' : 'Please');
//   }
//   else {
//     //全角文字以外
//     console.log("Please Fill japanese")
//     document.getElementById("lang_First_Name").setCustomValidity(this.value ? '' : 'Please Fill Japanese');
//     // document.getElementById("lang_First_Name").oninvalid = function () {
//     //   this.setCustomValidity(this.value ? '' : 'Please Fill Japanese');
//     // }
//   }
// email confirmation
$(document).ready(function () {

  // $("#register").click(function () {
  //   // if ($('.email').val() !== $('.confirm-email').val()) {
  //   //   document.getElementById("confirm_Email").setCustomValidity(this.value ? '' : '同じメールアドレスを入力してください。');
  //   // }
  //   // if ($('.email').val() === $('.confirm-email').val()) {
  //   //   document.getElementById("confirm_Email").setCustomValidity('');
  //   //   document.getElementById("confirm_Email  ").innerHTML = ('');
  //   // }

  //   if ($('.first-name').val() == "") {
  //     document.getElementById("first_name").oninvalid = function () {
  //       this.setCustomValidity(this.value ? '' : 'お名前（名）が入力されていません。');
  //     }
  //   }
  //   if ($('.last-name').val() == "") {
  //     document.getElementById("last_name").oninvalid = function () {
  //       this.setCustomValidity(this.value ? '' : 'お名前（姓）が入力されていません。');
  //     }
  //   }
  //   if ($('.first-name').val() != "" && $('.last-name').val() != "" ) {
  //     $("#register_confirmation").modal('show');
  //     $(".reg-conf-name").append($(".first-name").val() + ' ' + $(".last-name").val());
  //     $(".reg-conf-lang-name").append($(".lang-first-name").val() + ' ' + $(".lang-last-name").val())
  //     $(".reg-conf-post").append($(".post").val())
  //     $(".reg-conf-city").append($(".city").val())
  //     $(".reg-conf-town").append($(".town").val())
  //     $(".reg-conf-location").append($(".location").val())
  //     $(".reg-conf-building").append($(".building").val())
  //     $(".reg-conf-date").append($(".date").val())
  //     $(".reg-conf-time").append($(".time").val())
  //     $(".reg-conf-phone").append($(".phone").val())
  //     $(".reg-conf-fax").append($(".fax").val())
  //     // $(".reg-conf-mail").append($(".email").val())
  //   }
  // })
  // $("#register_confirmation").on("hidden.bs.modal", function () {
  //   $(".reg-conf-name").text('');
  //   $(".reg-conf-lang-name").text('');
  //   $(".reg-conf-post").text('');
  //   $(".reg-conf-city").text('');
  //   $(".reg-conf-town").text('');
  //   $(".reg-conf-location").text('');
  //   $(".reg-conf-building").text('');
  //   $(".reg-conf-date").text('');
  //   $(".reg-conf-time").text('');
  //   $(".reg-conf-phone").text('');
  //   $(".reg-conf-fax").text('');
  //   // $(".reg-conf-mail").text('');
  // })
  // $(".cancel").click(function () {
  //   $(".reg-conf-name").text('');
  //   $(".reg-conf-lang-name").text('');
  //   $(".reg-conf-post").text('');
  //   $(".reg-conf-city").text('');
  //   $(".reg-conf-town").text('');
  //   $(".reg-conf-location").text('');
  //   $(".reg-conf-building").text('');
  //   $(".reg-conf-date").text('');
  //   $(".reg-conf-time").text('');
  //   $(".reg-conf-phone").text('');
  //   $(".reg-conf-fax").text('');
  //   // $(".reg-conf-mail").text('');
  // })
})
$(".link").click(function () {
  window.location.href = "mailto:support@example.org";
})
