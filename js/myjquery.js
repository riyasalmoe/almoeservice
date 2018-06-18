function notify(msg) {
    toastr.clear();
    var notify = toastr.success(msg);

    var $notifyContainer = jQuery(notify).closest('.toast-top-center');
    if ($notifyContainer) {
        // align center
        var containerWidth = jQuery(notify).width() + 20;
        $notifyContainer.css("margin-left", -containerWidth / 2);
    }
}

toastr.options = {
    timeOut: 0,
    positionClass: "toast-top-center"
    };