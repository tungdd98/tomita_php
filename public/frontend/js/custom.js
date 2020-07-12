const $ = jQuery;
const formarMoney = (number) => {
  return new Intl.NumberFormat("vi-VI", {
    style: "currency",
    currency: "VND",
  }).format(number);
};

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

const setLoading = () => {
  $(".v-loading-home").addClass("show");
  setTimeout(() => {
    $(".v-loading-home").removeClass("show");
  }, 1000);
};

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

const addCart = (id, number = 1, isNoti = false) => {
  console.log("add");
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

const renderCart = (data) => {
  let template = ``;
  if (data.length) {
    data.forEach((row) => {
      const price =
        row.sale === 0 ? row.price : row.price - (row.sale * row.price) / 100;
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
                <a class="smooth remove" href="#" title=""><i class="icon_close"></i> Bỏ sản
                    phẩm</a>
              </div>
            </div>
          </td>
          <td>${formarMoney(price)}<del>${
        row.sale > 0 ? formarMoney(row.price) : ""
      }</del></td>
          <td>
            <div class="i-number">
                <button class="n-ctrl down smooth" data-id="${row.id}"></button>
                <input type="text" class="numberic" min="1" max="1000" value="${
                  row.number
                }">
                <button class="n-ctrl up smooth" data-id="${row.id}"></button>
            </div>
          </td>
          <td>${formarMoney(price * row.number)}</td>
        </tr>
      `;
    });
  } else {
    template += `<tr class="text-center"><td colspan="4">Không có sản phẩm trong giỏ hàng!!</td></tr>`;
  }

  $("#pu-cart tbody").html(template);
  const totalMoney = formarMoney(getTotalMoney(data));
  const totalNumber = getTotalNumber(data);
  $(".md-cart-foot .total-provision span").html(totalMoney);
  $(".md-cart-foot .total strong").html(totalMoney);
  $(".title-cart span").html(totalNumber);
  $("#open-cart span").html(totalNumber);
};

const getTotalMoney = (data) => {
  return data.reduce((act, cur) => {
    return (act += cur.price * cur.number);
  }, 0);
};

const getTotalNumber = (data) => {
  return data.reduce((act, cur) => {
    return (act += cur.number);
  }, 0);
};

$(document).on("click", ".n-ctrl.down", function () {
  const id = $(this).data("id");
  addCart(id, -1);
});
$(document).on("click", ".n-ctrl.up", function () {
  const id = $(this).data("id");
  addCart(id, 1);
});
$(document).ready(function () {
  setLoading();
  loadCart();
});
