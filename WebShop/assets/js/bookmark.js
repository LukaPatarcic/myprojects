function getBookmarks() {

    $.ajax({
        url: BASE+'api/bookmarks',
        type: 'get',
        success: function (e) {
            console.log(e);
            displayNumberOfItems(e.items);
        }
    })
}
function displayNumberOfItems(data) {

    const bookmarksDiv = document.querySelector('#cartNumber');
    const modalNumber = document.querySelector('#numInBasket');

    if (data.length === 0) {
        bookmarksDiv.innerHTML = '0';
        return;
    }
    bookmarksDiv.innerHTML = data.length;
    modalNumber.innerHTML = data.length;
}
function addBookmark(auctionId) {

    var amount = $('input[name="amount"]').val();
    console.log(BASE+'api/bookmarks/add');
    $.ajax({
        url : BASE + 'api/bookmarks/add',
        type : 'POST',
        data : 'amount='+amount+'&id='+auctionId,
        success: function (response) {
            console.log(response);
            if(response.error === 0){
                getBookmarks();
            }
        }
    })
}
function clearBookmark(id) {
    fetch(BASE + 'api/bookmark/clear/'+id, { credentials: 'include' })
        .then(result => result.json())
        .then(data => {
            console.log(data);
        });
}

function clearBookmarks() {

    fetch(BASE + 'api/bookmarks/clear', { credentials: 'include' })
        .then(result => result.json())
        .then(data => {
            if (data.error === 0) {
                const bookmarksDiv = $('#cartItems');
                const  totalPrice = $('#totalPrice');

                bookmarksDiv.empty();
                totalPrice.text('Total price is: 0');
                getBookmarks();
            }
        });
}

function displayBookmarks(items) {
    const bookmarksDiv = document.querySelector('#cartNumber');
    bookmarksDiv.innerHTML = '';
    console.log(items);

    if (items.length === 0) {
        bookmarksDiv.innerHTML = '0';
        return;
    }
    bookmarksDiv.innerHTML = items.length;


}
function checkoutBookmarks(){
    var items = [];
    var div = $('li a');
    if(div.length === 0) {
        alert('no items to purchase');
        return;
    }
        div.each(function () {
            if($(this).text() === ''){
                alert('something went wrong!');
                return;
            }
            items.push($(this).text().trim());
        });

    $.ajax({
        url : BASE+'checkout',
        type : 'POST',
        data : {'items':items},
        success: function (response) {
            if(response.message === 'success'){
                clearBookmarks();
                alert('thank you for your purchase');
                return;
            }
            alert('something went wrong');
            return;

        }
    })
}

$('#contact').submit(function (e) {
    $('#message').empty();
    e.preventDefault();
    $.ajax({
        url: BASE+'postContact',
        type: 'POST',
        data: $(this).serialize(),
        beforeSend: function(e){
          $('#message').append(' <i class="fa fa-spinner fa-spin"></i> Loading');
        },
        success: function (e) {
            $('#message').empty();
            $('#message').text(e.message);
            if(e.message === 'sent')
            $('#contact')[0].reset();
        }
    })
})


addEventListener('load', getBookmarks);
