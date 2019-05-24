$(document).ready(function(){
window.$ = $;
    // addcart js

    var addCartForm = $("#addcart-form")
    var submitButton = $(".addcart-link")
    var downbasket = $(".qty-down .fa-angle-down")
    var upbasket = $(".qty-up .fa-angle-up")
    downbasket.on("click")
    submitButton.on("click",function(e){
        e.preventDefault();
        var qtyval = parseInt($(".detail-qty span").text()) ;
        $('#qty').val(qtyval);
        addCartForm.submit();
    })


    $('.detail-qty').each(function() {
            var parent = $(this)
        $(this).find('.qty-up').on('click', function (event) {
            var qtyval = parseInt($(".detail-qty span").text()) ;
            window.location.replace($(this).attr('href'))
            $(this).attr("href", $(this).attr('href').replace(/b_quantity=[0-9]*/, "b_quantity="+(qtyval+1)))
            parent.find('.qty-down').attr("href", parent.find('.qty-down').attr('href').replace(/b_quantity=[0-9]*/, "b_quantity="+(qtyval-1)))
        })
    })
/*
    createSpinners: function() {

        var spinner = $(document.createElement("div"));
        spinner.addClass("myloader");
        $("body").append(spinner);
    },

    setupUpdateChange: function() {

        $("body").on("click", ".basket-standard a.change", function(ev) {

            $.createSpinners();
            $.get($(this).attr("href"), function(data) {
                $(".basket-standard").html(AimeosBasketStandard.updateBasket(data).html());
            }).always(function() {
                Aimeos.removeSpinner();
            });

            return false;
        });
    }
*/
});
