<div class="modal popup-cart popup-primary fade" id="pu-cart">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><i class="icon_close"></i></button>
            <!-- Modal body -->
            <div class="modal-body">
                <h3 class="title-cart">giỏ hàng của bạn <span>(3 sản phẩm)</span></h3>
                <div class="md-cart-tb">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Kích thước</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="md-cart-foot">
                    <div class="top">
                        <span class="total-provision">Tổng tạm tính: <span></span></span>
                        <span class="line">|</span>
                        <span class="transport">Phí vận chuyển: 0đ</span>
                        <span class="line">|</span>
                        <div class="total">
                            <p>Tổng cộng: <strong>0đ</strong></p>
                            <span>(Giá đã bao gồm thuế VAT)</span>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="cell">
                            <a class="smooth ctrl-continue" href="/clothes" title=""><i class="arrow_left"></i> Tiếp tục mua
                                hàng</a>
                        </div>
                        <div class="d-flex hidden" id="group-btn-cart">
                            <div class="cell">
                                <button class="smooth ctrl-continue mx-3" onclick="destroyCart()">Huỷ giỏ hàng</button>
                            </div>
                            <div class="cell">
                                <a class="smooth ctrl-payment" href="/clothes/checkout" title="">Gửi đơn hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>