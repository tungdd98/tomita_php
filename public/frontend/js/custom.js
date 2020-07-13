const $ = jQuery;
/**
 * Format giá tiền
 * @param {*} number
 */
const formarMoney = (number) => {
  return new Intl.NumberFormat("vi-VI", {
    style: "currency",
    currency: "VND",
  }).format(number);
};

/**
 * Cấu hình thông báo
 */
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 1000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener("mouseenter", Swal.stopTimer);
    toast.addEventListener("mouseleave", Swal.resumeTimer);
  },
});

/**
 * Cập nhật thông tin người dùng
 */
$("#update-user").on("submit", function (e) {
  e.preventDefault();
  const data = {
    email: this["email"].value.trim(),
    name: this["name"].value.trim(),
    phone: this["phone"].value.trim(),
    address: this["address"].value.trim(),
  };
  const _this = this;
  $.ajax({
    url: "admin.php?controller=user&action=update",
    type: "get",
    data,
    success: function (result) {
      Toast.fire({
        icon: "success",
        title: "Cập nhật thông tin thành công!!",
      });
      const response = JSON.parse(result);
      _this["email"].value = response.email;
      _this["name"].value = response.name;
      _this["phone"].value = response.phone;
      _this["address"].value = response.address;
    },
  });
});

/**
 * Hiển thị loading
 */
const setLoading = () => {
  $(".v-loading-home").addClass("show");
  setTimeout(() => {
    $(".v-loading-home").removeClass("show");
  }, 1000);
};

//=========================== Giỏ hàng ================================
/**
 * Thêm mới giỏ hàng
 * @param {*} id
 * @param {*} number
 * @param {*} isNoti
 */
const addCart = (id, number = 1, isNoti = false) => {
  $.ajax({
    url: `/clothes/?controller=cart&action=add`,
    type: "GET",
    data: {
      id,
      number,
    },
    success: function (result) {
      if (isNoti) {
        Toast.fire({
          icon: "success",
          title: "Thêm sản phẩm thành công!!",
        });
      }
      renderCart(Object.values(JSON.parse(result)));
    },
  });
};

/**
 * Huỷ giỏ hàng
 */
const destroyCart = () => {
  Swal.fire({
    title: "Bạn có chắc chắn muốn xoá giỏ hàng?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Huỷ bỏ",
    confirmButtonText: "Xác nhận",
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: `/clothes/?controller=cart&action=destroy`,
        type: "GET",
        success: function (result) {
          Toast.fire({
            icon: "success",
            title: "Xoá giỏ hàng thành công!!",
          });
          renderCart(Object.values(JSON.parse(result)));
        },
      });
    }
  });
};

/**
 * Huỷ sản phẩm trong giỏ
 * @param {*} id
 */
const deleteItemCart = (id) => {
  $.ajax({
    url: "/clothes/?controller=cart&action=delete",
    type: "get",
    data: {
      id,
    },
    success: function (result) {
      Toast.fire({
        icon: "success",
        title: "Bỏ sản phẩm thành công!!",
      });
      renderCart(Object.values(JSON.parse(result)));
    },
  });
};
/**
 * Hiển thị giỏ hàng
 */
const loadCart = () => {
  $.ajax({
    url: `/clothes/?controller=cart`,
    type: "GET",
    success: function (result) {
      const data = result ? JSON.parse(result) : [];
      renderCart(Object.values(data));
    },
  });
};

/**
 * Hiển thị dữ liệu giỏ hàng
 * @param {*} data
 */
const renderCart = (data) => {
  let template = ``;
  let sizes = ``
  for(const option of selectSizes) {
    sizes += `<option value="${option.id}">${option.size}</option>`
  }
  if (data.length) {
    data.forEach((row) => {
      const thumbnail = row.thumbnail
        ? `public/upload/product/${row.thumbnail}`
        : `public/upload/no-image.jpg`;
      template += `
        <tr>
          <td>
            <div class="if-pro-cart">
              <a class="img" href="#" title="">
                  <img src="${thumbnail}" alt="" title="" style="width: 80px">
              </a>
              <div class="ct">
                <a class="smooth title" href="#" title="">${row.title}</a>
                <a class="smooth remove" href="#" title="" data-id='${
                  row.id
                }'><i class="icon_close"></i> Bỏ sản
                    phẩm</a>
              </div>
            </div>
          </td>
          <td>
            ${formarMoney(row.priceSale)}
            <del>${formarMoney(row.price)}</del>
          </td>
          <td>
            <div class="i-number">
                <button class="n-ctrl down smooth" data-id="${row.id}"></button>
                <input type="text" class="numberic" min="1" max="1000" value="${
                  row.number
                }">
                <button class="n-ctrl up smooth" data-id="${row.id}"></button>
            </div>
          </td>
          <td>
            <select class="form-control form-control-sm js-size">
              ${sizes}
            </select>
          </td>
          <td>${formarMoney(row.priceSale * row.number)}</td>
        </tr>
      `;
    });
    $("#group-btn-cart").removeClass("hidden");
  } else {
    template += `<tr class="text-center"><td colspan="4">Không có sản phẩm trong giỏ hàng!!</td></tr>`;
    $("#group-btn-cart").addClass("hidden");
  }

  $("#pu-cart tbody").html(template);

  const totalMoney = formarMoney(getTotalMoney(data));
  const totalNumber = getTotalNumber(data);
  $(".md-cart-foot .total-provision span").html(totalMoney);
  $(".md-cart-foot .total strong").html(totalMoney);
  $(".title-cart span").html(totalNumber);
  $("#open-cart span").html(totalNumber);
  $("#checkout-subtotal .info").html(totalMoney);
  $("#checkout-total .info").html(totalMoney);
};

/**
 * Tính tổng tiền
 * @param {*} data
 */
const getTotalMoney = (data) => {
  return data.reduce((act, cur) => {
    return (act += parseInt(cur.priceSale * cur.number));
  }, 0);
};

/**
 * Tính tổng sản phẩm
 * @param {*} data
 */
const getTotalNumber = (data) => {
  return data.reduce((act, cur) => {
    return (act += parseInt(cur.number));
  }, 0);
};

/**
 * Thêm sản phẩm trang detail
 */
const addCartDetail = (id) => {
  const number = parseInt($("#input-detail").val());
  addCart(id, number, true);
}

/**
 * Thanh toán
 */
const checkout = () => {
  $.ajax({
    url: `/clothes/?controller=checkout&action=checkout`,
    type: "get",
    data: {
      total: $("#checkout-subtotal .info").text(),
    },
    success: function (result) {
      Toast.fire({
        icon: "success",
        title: "Thanh toán thành công!!",
      });
      setTimeout(() => {
        window.location.href = "/clothes";
      }, 1000);
    },
  });
};

/**
 * Cập nhật số lượng giỏ hàng
 */
$(document).on("click", ".n-ctrl.down", function () {
  const id = $(this).data("id");
  addCart(id, -1);
});
$(document).on("click", ".n-ctrl.up", function () {
  const id = $(this).data("id");
  addCart(id, 1);
});
$(document).on("click", "a.remove", function (e) {
  e.preventDefault();
  const id = $(this).data("id");
  deleteItemCart(id);
});
$(document).on("change", ".js-size", function (e) {
  console.log($(this).val())
});
$(document).ready(function () {
  setLoading();
  loadCart();
});
