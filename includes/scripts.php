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
    $('#example1').DataTable();
    $('#employeelist').DataTable();
    $('#empschedule').DataTable();

}))

$(document).ready((function() {
    $.fn.dataTable.moment('MMM DD, YYYY');
    $('#accounting').DataTable({});

}))

$(document).ready((function() {
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
    });
}))

$(document).ready((function() {
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        scrollbar: true,
        dropdown: true,
    });
}))
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
        height: 240,
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

<!-- debit and credit entry -->
<script>
function add() {
    var debit = document.getElementById("debitAmount").value;
    var credit = document.getElementById("creditAmount").value;
    var amount = debit - credit;
    document.getElementById("amount").value = amount;

}
</script>
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
/* This method will add a new row */
function addNewRowTable() {
    var table = document.getElementById("dynamicTable");
    var rowCount = table.rows.length;
    var cellCount = table.rows[0].cells.length;
    var row = table.insertRow(rowCount);
    for (var i = 0; i < cellCount; i++) {
        var cell = row.insertCell(i);
        if (i < cellCount - 1) {
            cell.innerHTML = '<input type="text" />';
        } else {
            cell.innerHTML = '<button onclick="deleteRow(this)"><i class ="fa fa-trash"></i></button>';
        }
    }
}

/* This method will delete a row */
function deleteRow(ele) {
    var table = document.getElementById('dynamicTable');
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
</script>
