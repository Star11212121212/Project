$(() => {
    $(".tab_name").on("click", function () {
        $(".tab").removeClass("active").eq($(this).index()).addClass("active");
    }).first().click();

    $("#show_add_product").on("click", () => {
        $("#dialog_add_product")[0].showModal();
    });

    $(".close_dialog").on("click", function (event) {
        event.preventDefault();
        $(this).closest("dialog")[0].close();
    });

    $(".show_edit_product").on("click", function () {
        let id = $(this).attr("data-id");
        let name = $(this).siblings(".name").text();
        let price = $(this).siblings(".price").text();
        let category = $(this).attr("data-cat-id");
        let is_new = $(this).attr("data-is-new");
        let dialog = $("#dialog_edit_product");
        dialog.find("[name=id]").val(id);
        dialog.find("[name=name]").val(name);
        dialog.find("[name=price]").val(price);
        dialog.find("[name=category]").val(category);
        dialog.find("[name=is_new]")[0].checked = is_new > 0;
        dialog[0].showModal();
    });

    $(".show_delete_product").on("click", function () {
        let id = $(this).attr("data-id");
        let name = $(this).siblings(".name").text();
        let dialog = $("#dialog_delete_product");
        dialog.find("[name=id]").val(id);
        dialog.find("p").text(name);
        dialog[0].showModal();
    });
});