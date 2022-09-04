var items = $(".search-product-wrapper .search-product-item");
var numItems = items.length;
var perPage = 3;
// $(".search-count-item").append(` 在${perPage}件　/ 全${numItems}件`);

if (numItems < perPage)
    $(".search-count-item").append(` 在${numItems}件　/ 全${numItems}件`)
else
    $(".search-count-item").append(` 在${perPage}件　/ 全${numItems}件`)

items.slice(perPage).hide();

$('#search-product-pagination-container').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "&laquo;",
    nextText: "&raquo;",
    edges: 1,
    onPageClick: function (pageNumber) {
        var showFrom = perPage * (pageNumber - 1);
        var showTo = showFrom + perPage;
        items.hide().slice(showFrom, showTo).show();
    }
});

// brand name to display
var get_url = new URL(location);
var brandName = get_url.searchParams.get('search');
console.log(brandName)
if (brandName === "春用で探す") {
    $(".brand-name").append(`季節 : ${brandName}`);
}
else if (brandName === "夏用で探す") {
    $(".brand-name").append(`季節 : ${brandName}`);
}
else if (brandName === "秋用で探す") {
    $(".brand-name").append(`季節 : ${brandName}`);
}
else if (brandName === "冬用で探す") {
    $(".brand-name").append(`季節 : ${brandName}`);
}
else if (brandName === "探す") {
    location.reload(true);
}
else {
    $(".brand-name").append(`ブランド : ${brandName}`)
}


function goBack() {
    window.history.back();
}

$(document).ready(function () {
    $(".sale-view-detail").click(function () {
        // console.log($(this).parent().parent().parent().parent().html());
        var itemId = $(this).parent().parent().parent().parent().find('.hide-itemId').text();
        var itemName = $(this).parent().parent().parent().parent().find('.hide-itemName').text();
        var mainType = $(this).parent().parent().parent().parent().find('.hide-largeCat').text();
        var subType = $(this).parent().parent().parent().parent().find('.hide-smallCat').text();
        var gender = $(this).parent().parent().parent().parent().find('.hide-gender').text();
        var season = $(this).parent().parent().parent().parent().find('.hide-season').text();
        var brand = $(this).parent().parent().parent().parent().find('.hide-brand').text();
        var size = $(this).parent().parent().parent().parent().find('.hide-size').text();
        var color = $(this).parent().parent().parent().parent().find('.hide-color').text();
        var country = $(this).parent().parent().parent().parent().find('.hide-country').text();
        var stock = $(this).parent().parent().parent().parent().find('.hide-stock').text();
        var description = $(this).parent().parent().parent().parent().find('.hide-description').text();
        var price = $(this).parent().parent().parent().parent().find('.hide-price').text();    
        var old_price = $(this).parent().parent().parent().parent().find('.old').text();       
        var img1 = $(this).parent().parent().parent().parent().find('.hide-img1').text();
        var img2 = $(this).parent().parent().parent().parent().find('.hide-img2').text();
        console.log(itemName, mainType, subType, gender, season, brand, size, color, country, description, price, img1, img2);
        // var r = '&commat;';
        $('.detail-items-stock').html(`<i class="fa fa-check-circle-o"></i> 在庫　( ${stock}個 )`);
        $('.detail-itemName').text(itemName);
        $('.detail-main-sub').text(`${mainType} >> ${subType}`);
        $('.detail-gender').text(gender);
        $('.detail-season').text(season);
        $('.detail-brand').text(brand);
        $('.detail-size').text(size);
        $('.detail-color').text(color);
        $('.detail-country').text(country);
        $('.detail-description').text(description);
        $('.old-price').text(old_price);
        $('.now-price').text(price);
        $('.detail-stock').text(stock);
        $('.img1').html(`<img src="./images/items/${img1}" alt="#">`);
        $('.img2').html(`<img src="./images/items/${img2}" alt="#">`);
        $('#cart_itemId').val(itemId);
        console.log($(".number-of-item").val());
        if (stock == 0) {
            $(".submit-add-to-cart").attr("disabled", true);
        }
        else {
            $(".submit-add-to-cart").removeAttr("disabled");;
        }
    })
})

function input_qty() {
    console.log($(".number-of-item").val());
    var qty = $(".number-of-item").val();
    console.log(qty);
    var stock = $('.detail-stock').text();
    if (parseInt(qty) <= parseInt(stock)) {
        $('#qty').val(qty);
    } else {
        if (parseInt(qty) <= parseInt(stock)) {
            $(".number-of-item").val(qty);
        } else if (qty == "") {
            $(".number-of-item").val('');
        } else {
            alert("在庫が足りません！");
            $(".number-of-item").val('');
        }
    }
}

$("#detailModal").on("hidden.bs.modal", function () {
    $(".number-of-item").val('1');
})