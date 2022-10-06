<div class="modal fade" id="createNewCustomerInvoice" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewtax">Create Customer Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered table-hover table-striped"
                                            id="invoice_table">
                                            <thead>
                                                <tr>
                                                    <th width="500">
                                                        <h4><a href="#" class="btn btn-success btn-xs add-row"><span
                                                                    class="glyphicon glyphicon-plus"
                                                                    aria-hidden="true"></span></a> Product
                                                        </h4>
                                                    </th>
                                                    <th>
                                                        <h4>Qty</h4>
                                                    </th>
                                                    <th>
                                                        <h4>Price</h4>
                                                    </th>
                                                    <th width="300">
                                                        <h4>Discount</h4>
                                                    </th>
                                                    <th>
                                                        <h4>Sub Total</h4>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-control form-group form-group-sm  no-margin-bottom">
                                                            <a href="#" class="btn btn-danger btn-xs delete-row"><span
                                                                    class="glyphicon glyphicon-remove"
                                                                    aria-hidden="true"></span></a>
                                                            <input type="text"
                                                                class="form-control form-group-sm item-input invoice_product"
                                                                name="invoice_product[]"
                                                                placeholder="Enter Product Name OR Description">
                                                            <p class="item-select">or <a href="#">select a product</a>
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="form-group form-group-sm no-margin-bottom">
                                                            <input type="number"
                                                                class="form-control invoice_product_qty calculate"
                                                                name="invoice_product_qty[]" value="1">
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="input-group input-group-sm  no-margin-bottom">
                                                            <!-- <span class="input-group-addon"><?php echo CURRENCY ?></span> -->
                                                            <input type="number"
                                                                class="form-control calculate invoice_product_price required"
                                                                name="invoice_product_price[]"
                                                                aria-describedby="sizing-addon1" placeholder="0.00">
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="form-group form-group-sm  no-margin-bottom">
                                                            <input type="text" class="form-control calculate"
                                                                name="invoice_product_discount[]"
                                                                placeholder="Enter % OR value (ex: 10% or 10.50)">
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="input-group input-group-sm">
                                                            <span
                                                                class="input-group-addon"><?php echo CURRENCY ?></span>
                                                            <input type="text" class="form-control calculate-sub"
                                                                name="invoice_product_sub[]" id="invoice_product_sub"
                                                                value="0.00" aria-describedby="sizing-addon1" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

            </div>
        </div>
    </div>
</div>