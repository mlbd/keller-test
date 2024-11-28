jQuery(document).ready(function ($) {
  $(document).on("click", ".upload-menu-item-image", function (e) {
    e.preventDefault();

    var button = $(this),
      input = button.siblings(".edit-menu-item-image"),
      preview = button.siblings("img");

    var frame = wp.media({
      title: "Select or Upload Image",
      button: { text: "Use this image" },
      multiple: false,
    });

    frame.on("select", function () {
      var attachment = frame.state().get("selection").first().toJSON();
      input.val(attachment.id);
      preview.attr("src", attachment.sizes.thumbnail.url).show();
    });

    frame.open();
  });
});
