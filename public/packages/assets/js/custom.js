$(document).ready(function(){
window.$ = $;
    // addcart js

    var addCartForm = $("#addcart-form")
    var submitButton = $(".addcart-link")
    var downbasket = $(".qty-down .fa-angle-down")
    var upbasket = $(".qty-up .fa-angle-up")
    var search = $("#filter-search");

    submitButton.on("click",function(e){
        e.preventDefault();
        var qtyval = parseInt($(".detail-qty span").text()) ;
        $('#qty').val(qtyval);
        addCartForm.submit();
    })

});
$(document).ready(function(){ $("#achat").click(function() { window.location=$(this).attr('href'); }); });

$('#tags li').click ( function(){
    window.location=$(this).attr('href'); });
    $('.detail-qty').each(function() {
            var parent = $(this)
        $(this).find('.qty-ups ').on('click', function (event) {
            var qtyval = parseInt($(".detail-qty span").text()) ;
            window.location.replace($(this).attr('href'))
            $(this).attr("href", $(this).attr('href').replace(/b_quantity=[0-10]*/, "b_quantity="+(qtyval+1)))
            parent.find('.qty-down').attr("href", parent.find('.qty-down').attr('href').replace(/b_quantity=[0-9]*/, "b_quantity="+(qtyval-1)))
        })
    });


        var aimeosInputComplete = $(".searchs ");

        if(aimeosInputComplete.length) {
            aimeosInputComplete.autocomplete({
                minLength : 2,
                delay : 100,
                source : function(req, resp) {
                    var nameTerm = {};
                    nameTerm[aimeosInputComplete.attr("name")] = req.term;

                    $.getJSON(aimeosInputComplete.data("url"), nameTerm, function(data) {
                        resp(data);
                    });
                },
                select : function(ev, ui) {
                    aimeosInputComplete.val(ui.item.label);
                    return false;
                }
            }).autocomplete("instance")._renderItem = function(ul, item) {
                return $(item.html).appendTo(ul);
            };
        }
$(".catalog-filter form").on("submit", function(ev) {

    var result = true;
    var form = $(this);

    $("input.value", this).each(function() {

        var input = $(this);

        if(input.val() !== '' && input.val().length < AimeosCatalogFilter.MIN_INPUT_LEN) {

            if($(this).has(".search-hint").length === 0) {

                var node = $('<div class="search-hint">' + input.data("hint") + '</div>');
                $(".catalog-filter-search", form).after(node);

                var pos = node.position();
                node.css("left", pos.left).css("top", pos.top);
                node.delay(3000).fadeOut(1000, function() {
                    node.remove();
                });
            }

            result = false;
        }
    });

    return result;
});


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

