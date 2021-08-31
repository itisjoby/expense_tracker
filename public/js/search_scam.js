$(document).ready(function () {
  $(document).on("click", ".read_more_link", function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
    $(this).closest(".blog-post").find(".trimmed_content").toggle();
    $(this).closest(".blog-post").find(".read_full_content").toggle();
  });
});
