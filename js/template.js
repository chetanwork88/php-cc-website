function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

// <!-- ----enable tooltip------ -->
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on("click", ".copy-action-btn", function() {
    var trigger = $(this);
    $(".copy-action-btn").removeClass("text-success");
    var $tempElement = $("<input>");
    $("body").append($tempElement);
    var copyType = $(this).data("value");
    $tempElement.val(copyType).select();
    document.execCommand("Copy");
    $tempElement.remove();
    $(trigger).addClass("text-success");

    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "Copied";

});