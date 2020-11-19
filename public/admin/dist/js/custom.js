"use strict";
(function ($) {
	// // Ajax Call loading screen
 //  var loading_area = $(".page-wrap");
 //  $(document).on({
 //    ajaxStart: function () {
 //      $(loading_area).addClass("loading");
 //    },
 //    ajaxStop: function () {
 //      $(loading_area).removeClass("loading");
 //    },
 //  });

	$(document).on('click', '#del_plan', function() {
    let that = $(this);
    let planID = $(that).data('id');
    swal({
        title: "Are you sure?",
        text: "This is an irriversible action",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Cancel", "Yes, delete"],
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url:page_data.routes.destroy_plan,
                type:"POST",
                data: { planID, _token: page_data.csrf_token },
                success: function(data){
                    handleDeletion(that);
                }
            });
        }
    })
})

function handleDeletion(handle)
{
    $(handle).closest('tr').fadeOut(1000, () =>{
        swalSuccessAlert('Plan successfully deleted');
    });
}

function swalSuccessAlert(text) {
    return swal(text, {
        icon: "success",
    });
}
})(jQuery);