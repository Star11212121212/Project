$(window).on("load", () => {
    $(".fuck_tilda_products").each(function(){
        if (window.innerWidth > 700) {
            $(this).css("max-height", $(this).find(".product").outerHeight() - 32 + "px")
        }
        else {
            let height = 0;
            $(this).find(".product").slice(0, 4).each(function () {
                height += $(this).outerHeight() + 48;
            })
            $(this).css("max-height", height - 48 + "px")
        }
    })
    .next(".show_more").on("click", function () {
        $(this).toggleClass("expanded");
        if (!$(this).hasClass("expanded")) {
            $(this).text("Загрузить ещё");
            if (window.innerWidth > 700) {
                $(this).prev().css("max-height", $(this).prev().find(".product").outerHeight() - 32 + "px")
            }
            else {
                let height = 0;
                $(this).prev().find(".product").slice(0, 4).each(function () {
                    height += $(this).outerHeight() + 48;
                })
                $(this).prev().css("max-height", height - 48 + "px")
            }
        }
        else {
            $(this).text("Скрыть");
            $(this).prev().css("max-height", $(this).prev()[0].scrollHeight + "px");
        }
    });

    $("#cart_button").on("click", () => {
        $("#dialog_cart")[0].showModal();
    });

    $(".cancel").on("click", function (event) {
        event.preventDefault();
        $(this).closest("dialog")[0].close();
    });

    $(".like").on("click", function () {
        $(this).toggleClass("active");
    });

    $("#show_dialog_user").on("click", () => {
        $("#dialog_user")[0].showModal();
    });
});