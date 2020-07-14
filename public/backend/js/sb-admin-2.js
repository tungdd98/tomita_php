(function ($) {
  "use strict"; // Start of use strict
  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $(".sidebar .collapse").collapse("hide");
    }
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function () {
    if ($(window).width() < 768) {
      $(".sidebar .collapse").collapse("hide");
    }

    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $(".sidebar .collapse").collapse("hide");
    }
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function (
    e
  ) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on("scroll", function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $(".scroll-to-top").fadeIn();
    } else {
      $(".scroll-to-top").fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on("click", "a.scroll-to-top", function (e) {
    var $anchor = $(this);
    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $($anchor.attr("href")).offset().top,
        },
        1000,
        "easeInOutExpo"
      );
    e.preventDefault();
  });
})(jQuery); // End of use strict

/**
 * Xác nhận xoá phần tử
 * @param {*} id
 * @param {*} url
 */
const deleteItem = (id, url) => {
  Swal.fire({
    title: "Bạn có chắc chắn muốn xoá?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Huỷ bỏ",
    confirmButtonText: "Xác nhận",
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: `admin/${url}/delete/${id}`,
        type: "delete",
        success: function () {
          Toast.fire({
            icon: "success",
            title: "Xoá bản ghi thành công!!",
          });
          setTimeout(() => {
            window.location.href = `admin/${url}`;
          }, 1000);
        },
      });
    }
  });
};

/**
 * Cập nhật trạng thái đơn hàng
 * @param {*} id
 * @param {*} status
 */
const updateStatus = (id, status) => {
  $.ajax({
    url: `admin.php?controller=order&action=update`,
    type: "get",
    data: {
      status,
      id,
    },
    success: function () {
      Toast.fire({
        icon: "success",
        title: "Cập nhật thành công!!",
      });
      setTimeout(() => {
        window.location.href = `admin/order`;
      }, 1000);
    },
  });
};
/**
 * Thống kê báo cáo
 */
$(document).on("change", "#select-report", function (e) {
  const _this = this;
  $.ajax({
    url: `admin.php?action=filter`,
    type: "GET",
    data: {
      month: $(_this).val(),
    },
    success: function (result) {
      const response = JSON.parse(result);
      $("#total-money").html(
        new Intl.NumberFormat("vi-VI", {
          style: "currency",
          currency: "VND",
        }).format(response.totalMoney)
      );
      $("#total-order").html(response.totalOrder);
      $("#total-user").html(response.totalCustomer);
    },
  });
});
