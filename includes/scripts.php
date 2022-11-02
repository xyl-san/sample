<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
    integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>

<!-- DataTables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.js">
</script>

<!-- Moments.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.12.1/sorting/datetime-moment.js"></script>


<!-- Bootstrap -->
<script src="css/bootstrap/js/bootstrap.js"></script>

<!-- Date picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- time picker -->
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<!-- Google chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



<script>
$(document).ready((function() {
    $.fn.dataTable.moment('MMM DD, YYYY');
    ('#example1, #invoiceCustomerList').DataTable();
    $('#employeelist').DataTable();
    $('#empschedule').DataTable();
    $('#accountType').DataTable();
    $('#accountList').DataTable();
    $('#studentList').DataTable();
    $('#journalList').DataTable({bFilter: false, bInfo: false});
}));

$(document).ready((function() {
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
    });
}));

$(document).ready((function() {
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        scrollbar: true,
        dropdown: true,
    });
}));
</script>


<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        <?php include 'includes/conn.php';
            $query = "SELECT e.department_id, department_name, COUNT(*) as employees FROM employees e INNER JOIN department d ON d.department_id=e.department_id GROUP BY e.department_id, department_name;";
                $result = mysqli_query($conn, $query);
                while($chart = mysqli_fetch_assoc($result)){
                    echo "['".$chart['department_name']."', ".$chart['employees']."],";
                }
            $conn->close();
            ?>
    ]);
    var options = {
        title: 'Employees per Department',
        width: 400,
        height: 400,
        is3D: true,
    };
    var chart = new google.visualization.PieChart(document.getElementById('departmentChart'));
    chart.draw(data, options);
}
</script>

<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        <?php include 'includes/conn.php';
            $query = "SELECT e.job_id, job_name, COUNT(*) as employees FROM employees e INNER JOIN job j ON j.job_id=e.job_id GROUP BY e.job_id, job_name";
                $result = mysqli_query($conn, $query);
                while($chart = mysqli_fetch_assoc($result)){
                    echo "['".$chart['job_name']."', ".$chart['employees']."],";
                }
            $conn->close();
            ?>
    ]);
    var options = {
        title: 'Job per employees',
        width: 400,
        height: 240,
        is3D: true,
    };
    var chart = new google.visualization.PieChart(document.getElementById('jobChart'));
    chart.draw(data, options);
}
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawVisualization);

function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
        ['2004/05', 165, 938, 522, 998, 450, 614.6],
        ['2005/06', 135, 1120, 599, 1268, 288, 682],
        ['2006/07', 157, 1167, 587, 807, 397, 623],
        ['2007/08', 139, 1110, 615, 968, 215, 609.4],
        ['2008/09', 136, 691, 629, 1026, 366, 569.6]
    ]);

    var options = {
        title: 'Monthly Coffee Production by Country',
        vAxis: {
            title: 'Cups'
        },
        hAxis: {
            title: 'Month'
        },
        seriesType: 'bars',
        series: {
            5: {
                type: 'line'
            }
        }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>



<!-- debit and credit entry -->
<script>
function add() {
    var debit = document.getElementById("debitAmount").value;
    var credit = document.getElementById("creditAmount").value;
    var amount = debit - credit;
    document.getElementById("amount").value = amount;

}
</script>
<!-- This function generate codes in journal entry -->
<script>
function randomString() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
    var string_length = 12;
    var randomstring = '2022 -';
    for (var i = 0; i < string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum, rnum + 1);
    }
    document.randform.randomfield.value = randomstring;
}
</script>

<script type="text/javascript">
/* This function will add a new row for journal entry */
function addNewRowTableJournal() {
    var table = document.getElementById("dynamicTableJournalEntry");
    var rowCount = table.rows.length;
    var cellCount = table.rows[0].cells.length;
    var row = table.insertRow(rowCount);
    for (var i = 0; i < cellCount; i++) {
        var cell = row.insertCell(i);
        if (i < cellCount - 1) {
            cell.innerHTML = '<input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example">';
        } else {
            cell.innerHTML = '<button class="btn btn-danger btn-sm" onclick="deleteRowJournal(this)" style="border:none;"><i class ="fa fa-trash"></i></button>';
        }
      }
}

function deleteRowJournal(ele) {
    var table = document.getElementById('dynamicTableJournalEntry');    
    var rowCount = table.rows.length;
    if (rowCount <= 1) {
        alert("There is no row available to delete!");
        return;
    }
    if (ele) {
        //delete specific row
        ele.parentNode.parentNode.remove();
    } else {
        //delete last row
        table.deleteRowJournal(rowCount - 1);
    }
}
/* This function for tax table will add a new row */
function addNewRowTableTax() {
    var table = document.getElementById("dynamicTableTax");
    var rowCount = table.rows.length;
    var cellCount = table.rows[0].cells.length;
    var row = table.insertRow(rowCount);
    for (var i = 0; i < cellCount; i++) {
        var cell = row.insertCell(i);
        if (i < cellCount - 1) {
            cell.innerHTML = '  <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example">';
        } else {
            cell.innerHTML =
                '<button class="btn btn-danger btn-sm" onclick="deleteRow(this)" style="border: none;"><i class ="fa fa-trash"></i></button>';
        }
    }
}

function deleteRow(ele) {
    var table = document.getElementById('dynamicTableTax');
    var rowCount = table.rows.length;
    if (rowCount <= 1) {
        alert("There is no row available to delete!");
        return;
    }
    if (ele) {
        //delete specific row
        ele.parentNode.parentNode.remove();
    } else {
        //delete last row
        table.deleteRow(rowCount - 1);
    }
}
// for customer invoices computations
function invoice(){
    var quantity = document.getElementById("quantity").value;
    var price = document.getElementById("price").value;
    var subtotal = quantity * price;
    var tax = subtotal / 1.12 * 0.12;
    document.getElementById("taxes").value = parseFloat(tax).toFixed(2);
    var sub = subtotal - tax;
    document.getElementById("subtotal").value = parseFloat(sub).toFixed(2);
    
    var total_amount = tax + subtotal;
    document.getElementById("total_amount").value = subtotal;
}
function invoices(){
    var quantity = document.getElementById("quantity").value;
    var price = document.getElementById("price").value;
    var subtotal = quantity * price;
    var tax = subtotal / 1.12 * 0.12;
    document.getElementById("taxes").value = parseFloat(tax).toFixed(2);
    var sub = subtotal - tax;
    document.getElementById("subtotal").value = parseFloat(sub).toFixed(2);
    
    var total_amount = tax + subtotal;
    document.getElementById("total_amount").value = subtotal;
}
// for customer credit notes computations
function creditNotes() {
    var quantity = document.getElementById("quantityCreditNotes").value;
    var price = document.getElementById("priceCreditNotes").value;
    var subtotal = quantity * price;
    var tax = subtotal / 1.12 * 0.12;
    document.getElementById("taxesCreditNotes").value = parseFloat(tax).toFixed(2);
    var sub = subtotal - tax;
    document.getElementById("subtotalCreditNotes").value = parseFloat(sub).toFixed(2);

    var total_amount = tax + subtotal;
    document.getElementById("total_amountCreditNotes").value = subtotal;
}

// JOURNAL ENTRY MODAL FUNCTIONS
// calculate journal Debit and Credit
function calcuAmount() {
    var debitAmount = 0;
    var creditAmount = 0;
    $('#tableJourn tbody tr').each(function() {
        if ($(this).find('.debitAmounts').text() != "") {
            debitAmount += parseFloat(($(this).find('.debitAmounts').text()).replace(/,/gi, ''));
        }
        if ($(this).find('.creditAmounts').text() != "") {
            creditAmount += parseFloat(($(this).find('.creditAmounts').text()).replace(/,/gi, ''));
        }
    })
    var totalamount = debitAmount - creditAmount;
    $('#tableJourn').find('.totalDebit').text(parseFloat(debitAmount).toLocaleString('en-US', {
        style: 'decimal'
    }))
    $('#tableJourn').find('.totalCredit').text(parseFloat(creditAmount).toLocaleString('en-US', {
        style: 'decimal'
    }))
    document.getElementById('totalcatch').value = totalamount;

    //for text color only
    if (totalamount >= 0) {
        $('#tableJourn').find('.totalBalanceJourn').text(parseFloat(totalamount).toLocaleString('en-US', {
            style: 'decimal'
        }))
        document.getElementById("totalCol").style.color = "#196811"
    } else if (totalamount < 0) {
        $('#tableJourn').find('.totalBalanceJourn').text(parseFloat(totalamount).toLocaleString('en-US', {
            style: 'decimal'
        }))
        document.getElementById("totalCol").style.color = "#9E1B18"
    }

}

$('#myButton').click(function() {
    var accountId = $('#accountListJourn').val()
    var groupId = $('#groupListJourn').val()
    var amountx = $('#amountJourn').val()
    var type = $('#typeId').val()

    document.getElementById("accountListJourn").value = "";
    document.getElementById("groupListJourn").value = "";
    document.getElementById("amountJourn").value = "";
    document.getElementById("typeId").value = "";

    var rows = $($('noscript#cloneThis').html()).clone().appendTo("tbody#bodys")
    rows.find('input[name="account_ids[]"]').val(accountId) // add to input field
    rows.find('input[name="group_ids[]"]').val(groupId)
    rows.find('input[name="amounts[]"]').val(amountx)
    rows.find('input[name="amountType[]"]').val(type)
    rows.find('.accountsD').text(!!accountId ? accountId : "NO DATA")
    rows.find('.groupsD').text(!!groupId ? groupId : "NO DATA")
    if (type == '1'){
        rows.find('.debitAmounts').text(parseFloat(amountx).toLocaleString('en-US', {
            style: 'decimal'
            
        }))
        
    } if(type == '2') {
        rows.find('.creditAmounts').text(parseFloat(amountx).toLocaleString('en-US', {
            style: 'decimal'
        }))
       
    }if(type== ''){
        alert("NEED AMOUNT TYPE")
        rows.find('.creditAmounts').text("NO VALUE")
        rows.find('.debitAmounts').text("NO VALUE")
        
    }
    calcuAmount()
    $('#tableJourn').append(tr)

})

$('#tableJourn').on('click', ".delRow", function(e) {
    e.preventDefault();
    $(this).closest('tr').remove();
    calcuAmount()
});

//catch 
$('#journAdd').submit(function(e) {
    var total = document.getElementById('totalcatch').value;
    var _this = $(this)
    $('.pop-msg').remove()
    var el = $('<div>')
    el.addClass("pop-msg alert")
    el.hide()
    if ($('#tableJourn tbody tr').length <= 0) {
        el.addClass('alert-danger').text(" Account Table is empty.")
        _this.prepend(el)
        el.show('slow')
        return false;
    }
    if (total != 0) {
        el.addClass('alert-danger').text("Trial Balance is not Equal")
        _this.prepend(el)
        el.show('slow')
        return false;
    }
});
//catch
// JOURNAL ENTRY MODAL FUNCTIONS end

// for Customer Data--> Create Invoice
$(document).ready(function() {

$(document).on('click', ".customer-select", function(e) {

    var customer_name = $(this).attr('data-customer-name');
    var customer_email = $(this).attr('data-customer-email');
    var customer_phone = $(this).attr('data-customer-phone');

    var customer_address_1 = $(this).attr('data-customer-address-1');


    $('#customer_name').val(customer_name);
    $('#customer_email').val(customer_email);
    $('#customer_phone').val(customer_phone);

    $('#customer_address_1').val(customer_address_1);

    $('#selectCustomer').modal('hide');

});
});
// for Sales Person Data--> Create Invoice
$(document).ready(function() {

$(document).on('click', ".select-salesPerson", function(e) {

    var salesPerson_firstname = $(this).attr('data-salesPerson-firstname');
    var salesPerson_lastname = $(this).attr('data-salesPerson-lastname');
    var fullname = salesPerson_firstname.concat(' ' + salesPerson_lastname)
    $('#salesPerson').val(fullname);

    $('#selectCustomer').modal('hide');

});
});
</script>

<!-- function for dynamic inputfields -->
<script type="text/javascript">
$(document).ready(function() {

    $(".add-more").click(function() {
        var html = $(".copy").html();
        $(".after-add-more").after(html);
    });

    $("body").on("click", ".remove", function() {
        $(this).parents(".control-group").remove();
    });

});
// remove product row
$('#invoice_table').on('click', ".delete-row", function(e) {
    e.preventDefault();
    $(this).closest('tr').remove();
    calculateTotal();
});

// add new product row on invoice
var cloned = $('#invoice_table tr:last').clone();
$(".add-row-invoice").click(function(e) {
    e.preventDefault();
    cloned.clone().appendTo('#invoice_table');
});
//calculations of data
calculateTotal();

$('#invoice_table').on('input', '.calculate', function() {
    updateTotals(this);
    calculateTotal();
});

$('#invoice_totals').on('input', '.calculate', function() {
    calculateTotal();
});

$('#invoice_product').on('input', '.calculate', function() {
    calculateTotal();
});

$('.remove_vat').on('change', function() {
    calculateTotal();
});

function updateTotals(elem) {

    var tr = $(elem).closest('tr'),
        quantity = $('[name="invoice_product_qty[]"]', tr).val(),
        price = $('[name="invoice_product_price[]"]', tr).val(),
        isPercent = $('[name="invoice_product_discount[]"]', tr).val().indexOf('%') > -1,
        percent = $.trim($('[name="invoice_product_discount[]"]', tr).val().replace('%', '')),
        subtotal = parseInt(quantity) * parseFloat(price);

    if (percent && $.isNumeric(percent) && percent !== 0) {
        if (isPercent) {
            subtotal = subtotal - ((parseFloat(percent) / 100) * subtotal);
        } else {
            subtotal = subtotal - parseFloat(percent);
        }
    } else {
        $('[name="invoice_product_discount[]"]', tr).val('');
    }
    if (subtotal < 0) {
        subtotal = 0;
    }
    $('.calculate-sub', tr).val(subtotal.toFixed(2));
}

function calculateTotal() {

    var grandTotal = 0,
        disc = 0,
        c_ship = parseInt($('.calculate.shipping').val()) || 0;

    $('#invoice_table tbody tr').each(function() {
        var c_sbt = $('.calculate-sub', this).val(),
            quantity = $('[name="invoice_product_qty[]"]', this).val(),
            price = $('[name="invoice_product_price[]"]', this).val() || 0,
            subtotal = parseInt(quantity) * parseFloat(price);

        grandTotal += parseFloat(c_sbt);
        disc += subtotal - parseFloat(c_sbt);

    });

    // VAT, DISCOUNT, SHIPPING, TOTAL, SUBTOTAL:
    var subT = parseFloat(grandTotal),
        finalTotal = parseFloat(grandTotal + c_ship),
        vat = parseInt($('.invoice-vat').attr('data-vat-rate'));

    $('.invoice-sub-total').text(subT.toFixed(2));
    $('#invoice_subtotal').val(subT.toFixed(2));
    $('.invoice-discount').text(disc.toFixed(2));
    $('#invoice_discount').val(disc.toFixed(2));

    if ($('.invoice-vat').attr('data-enable-vat') === '1') {

        if ($('.invoice-vat').attr('data-vat-method') === '1') {
            $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
            $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
            $('.invoice-total').text((finalTotal).toFixed(2));
            $('#invoice_total').val((finalTotal).toFixed(2));
        } else {
            $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
            $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
            $('.invoice-total').text((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
            $('#invoice_total').val((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
        }
    } else {
        $('.invoice-total').text((finalTotal).toFixed(2));
        $('#invoice_total').val((finalTotal).toFixed(2));
    }

    // remove vat
    if ($('input.remove_vat').is(':checked')) {
        $('.invoice-vat').text("0.00");
        $('#invoice_vat').val("0.00");
        $('.invoice-total').text((finalTotal).toFixed(2));
        $('#invoice_total').val((finalTotal).toFixed(2));
    }

}
</script>

<!--end function for dynamic inputfields -->