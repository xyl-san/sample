<?php
ob_start();
ini_set('date.timezone','Asia/Manila');
date_default_timezone_set('Asia/Manila');
session_start();

function format_num($number){
	$decimals = 0;
	$num_ex = explode('.',$number);
	$decimals = isset($num_ex[1]) ? strlen($num_ex[1]) : 0 ;
	return number_format($number,$decimals);
}

function journaltable(){
  include 'conn.php';
  $sql = "SELECT journentries.journal_entry_id, journentries.journal_entry_code, journentries.journal_date, journentries.journal_entry_description, journentries.employee_id,emp.employee_id, emp.firstname, emp.lastname FROM journal_entries AS journentries INNER JOIN employees AS emp ON journentries.employee_id = emp.employee_id";

  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){ 
  
    
    ?>
<tr>
    <td class="text-center"><?= date("M d, Y", strtotime($row['journal_date'])) ?></td>
    <td><?php echo  $row['journal_entry_code'];?></td>
    <td class="p-0">
        <div class="d-flex w-100 asd">
            <div class="col-6 border px-2">
                <b><?= $row['journal_entry_description']; ?></b>
            </div>
            <div class="col-3 border dsa"></div>
            <div class="col-3 border sda"></div>
        </div>

        <?php
                $sql2 = "SELECT * FROM journal_items AS journitems INNER JOIN journal_entries AS journentries ON journentries.journal_entry_code = journitems.journal_entry_code INNER JOIN account_list as accntlist ON journitems.account_id = accntlist.account_id INNER JOIN group_list as grouplist ON journitems.group_id = grouplist.group_id WHERE journitems.journal_entry_code = '". $row['journal_entry_code'] ."'";
                $query2 = $conn->query($sql2);
                while ($row2 = $query2->fetch_assoc()){

                    if($row2['amount_type'] == 1){
                        $type1 = "Php: ". format_num($row2['amount']);
                    }else{
                        $type1 = '';
                    }  
                    if($row2['amount_type'] == 2){
                        $type2 = "Php: ". format_num($row2['amount']);
                    }else{
                        $type2 = '';
                    }
                 
        ?>
        <div class="d-flex w-100 fgh">
            <div class="col-6 border text-center">
                <span class="pl-4"><?= $row2['account_name'] ?> </span>
            </div>
            <div class="col-3 border text-end">
                <?= $type1
                ?>
            </div>
            <div class="col-3 border text-end">
                <?= $type2
                ?>
            </div>
        </div>

        <?php 
                }
        ?>


    </td>
    <td><?php echo $row['lastname'].", ". $row['firstname']; ?></td>
    <td>
        <button class="btn btn-warning btn-sm edit btn-flat" data-id="<?php echo $row['journal_entry_id']; ?>"><i
                class="fa-solid fa-file-pen"></i></button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['journal_entry_id']; ?>"><i
                class="fa-solid fa-trash"></i></i></button>
    </td>
</tr>
<?php
  }
  $conn->close(); 
}
function miscTable(){
  include 'conn.php';
  $sql = "SELECT *, ent.journal_entry_id, ent.journal_entry_code, ent.journal_entry_description, ent.employee_id, emp.employee_id, emp.firstname, emp.lastname, gl.group_id, gl.type FROM `journal_items` AS item INNER JOIN journal_entries AS ent on item.journal_entry_code = ent.journal_entry_code INNER JOIN employees AS emp ON ent.employee_id = emp.employee_id INNER JOIN group_list AS gl ON item.group_id = gl.group_id WHERE account_id =51 AND gl.type = 1";

  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){ 
  
    
    ?>
<tr>
    <td class="text-center"><?= date("M d, Y", strtotime($row['journal_date'])) ?></td>
    <td><?php echo  $row['journal_entry_code'];?></td>
    <td class="p-0">
        <div class="d-flex w-100 asd">
            <div class="col-6 border px-2">
                <?= $row['journal_entry_description']; ?>
            </div>
            <div class="col-3 border dsa"></div>
            <div class="col-3 border sda"></div>
        </div>

        <?php
                $sql2 = "SELECT * FROM journal_items AS journitems INNER JOIN journal_entries AS journentries ON journentries.journal_entry_code = journitems.journal_entry_code INNER JOIN account_list as accntlist ON journitems.account_id = accntlist.account_id INNER JOIN group_list as grouplist ON journitems.group_id = grouplist.group_id WHERE journitems.journal_entry_code = '". $row['journal_entry_code'] ."' AND journitems.account_id =51";
                $query2 = $conn->query($sql2);
                while ($row2 = $query2->fetch_assoc()){

                    if($row2['amount_type'] == 1){
                        $type1 = "Php: ". format_num($row2['amount']);
                    }else{
                        $type1 = '';
                    }  
                    if($row2['amount_type'] == 2){
                        $type2 = "Php: ". format_num($row2['amount']);
                    }else{
                        $type2 = '';
                    }
                 
        ?>
        <div class="d-flex w-100 fgh">
            <div class="col-6 border text-center">
                <span class="pl-4"><?= $row2['account_name'] ?> </span>
            </div>
            <div class="col-3 border text-end">
                <?= $type1
                ?>
            </div>
            <div class="col-3 border text-end">
                <?= $type2
                ?>
            </div>
        </div>

        <?php 
                }
        ?>


    </td>
    <td><?php echo $row['lastname'].", ". $row['firstname']; ?></td>
    <td>
        <button class="btn btn-warning btn-sm edit btn-flat" data-id="<?php echo $row['journal_entry_id']; ?>"><i
                class="fa-solid fa-file-pen"></i></button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['journal_entry_id']; ?>"><i
                class="fa-solid fa-trash"></i></i></button>
    </td>
</tr>
<?php
  }
  $conn->close(); 
}

function accountListRow(){
    include 'conn.php';
    $sql = "SELECT * FROM `account_list` where delete_flag = 0 and `status` = 1 order by `account_name` asc";
    $query = $conn->query($sql);
    while($arow = $query->fetch_assoc()){
        echo "
        <option value='".$arow['account_name']."'>".$arow['account_name']."</option>
        ";
    }
    $conn->close();


  }
  function groupListRow(){
    include 'conn.php';
    $sql = "SELECT * FROM `group_list` where delete_flag = 0 and `status` = 1 order by `group_name` asc";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['group_name']."'>".$prow['group_name']."</option>
        ";
    }
    $conn->close();
  }
  function journalItemListRow(){
    include 'conn.php';
    $sql = "SELECT j.*,a.account_name as account, g.group_name as `group`, g.type FROM `journal_items` j inner join account_list a on j.account_id = a.account_id inner join group_list g on j.group_id = g.group_id where journal_entry_id = '3'";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
       ?>
<tr>
    <td class="text-center">
        <button class="btn btn-sm btn-outline btn-danger btn-flat delete-row" type="button">
            <i class="fa fa-times"></i>
        </button>
    </td>
    <td><?php echo $prow['account_id']; ?></td>
    <td><?php echo $prow['group_id']; ?></td>
    <td><?php echo $prow['amount']; ?></td>

</tr>
<?php
    }
    $conn->close();
  }
  

  function bankSelection(){
    include 'conn.php';
    $sql = "SELECT bank_id, bank_image, bank_name FROM bank_meta_data";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['bank_id']."'>".$prow['bank_name']."</option>
        ";
    }
    $conn->close();
  }


//bankaccount
function bankTable(){
    include 'conn.php';
    $sql = "SELECT * FROM bank_account AS bankaccount INNER JOIN bank_meta_data AS bank_meta ON bankaccount.bank_id = bank_meta.bank_id WHERE delete_flag=0";
  
    $query = $conn->query($sql);
    while($row = $query->fetch_assoc()){
      
      ?>
<tr>
    <td><img src="<?php echo (!empty($row['bank_image']))? './images/'.$row['bank_image']:'./images/securitybank.png'; ?>"
            width="80px" height="30px"></td>
    <td><?php echo $row['bank_name']; ?></td>
    <td><?php echo $row['bank_account_number']; ?></td>
    <td><?php echo $row['bank_account_name']; ?></td>
    <td><?php echo $row['bank_company']; ?></td>
    <td><?php echo $row['bank_phone']; ?></td>
    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['bank_account_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['bank_account_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
    }
  }
  

// Add Bank Account
if(isset($_POST['addBank'])){
    addNewBankAccount();
  }
    function addNewBankAccount(){
    include 'conn.php';
    if(isset($_POST['addBank'])){
      $bankId = $_POST['bank_name'];
      $accountNumber = $_POST['bank_account_number'];
      $accountName = $_POST['bank_account_name'];
      $company = $_POST['bank_company'];
      $address = $_POST['bank_address'];
      $email = $_POST['bank_email'];
      $contactInfo = $_POST['bank_phone'];
      $country = $_POST['bank_country'];
      $zipCode = $_POST['bank_zip_code'];
      
  
      $sql = "INSERT INTO `bank_account`(`bank_account_name`, `bank_account_number`, `bank_company`, `bank_email`, `bank_phone`, `bank_zip_code`, `bank_address`, `bank_country`, `bank_id`) VALUES ('$accountName',REPLACE('$accountNumber','-',''),'$company','$email',REPLACE('$contactInfo','-',''),'$zipCode','$address','$country','$bankId')";
    
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
  $conn->close();
  header('location: ../bank_account.php');
  }

//edit bank account
if (isset($_POST['editBankAccount'])) {
  bankAccountEdit();
}
  function bankAccountEdit(){
    include 'conn.php';
    if(isset($_POST['editBankAccount'])){
      $bankAccountId = $_POST['bank_account_id'];
      $bankId = $_POST['bank_name'];
      $accountNumber = $_POST['bank_account_number'];
      $accountName = $_POST['bank_account_name'];
      $company = $_POST['bank_company'];
      $address = $_POST['bank_address'];
      $email = $_POST['bank_email'];
      $contactInfo = $_POST['bank_phone'];
      $country = $_POST['bank_country'];
      $zipCode = $_POST['bank_zip_code'];
     
      $sql = "UPDATE `bank_account` SET `bank_account_name`='$accountName',`bank_account_number`=REPLACE('$accountNumber','-',''),`bank_company`='$company',`bank_email`='$email',`bank_phone`=REPLACE('$contactInfo','-',''),`bank_zip_code`='$zipCode',`bank_address`='$address',`bank_country`='$country',`bank_id`='$bankId' WHERE bank_account_id = '$bankAccountId'";
      if($conn->query($sql)){
        echo "success";
      }
      else{
        echo "error";
      }
    }
    $conn->close();
    header('location: ../bank_account.php');
  }

  //DELETE BANK ACCOUNT
  if(isset($_POST['deleteBankAccount'])){
    bankAccountDelete();
  }
  function bankAccountDelete(){
    include 'conn.php';
    if(isset($_POST['deleteBankAccount'])){
      $bankAccountId = $_POST['bank_account_id'];
      $sql = "UPDATE bank_account SET delete_flag = 1 WHERE bank_account_id = '$bankAccountId'";
    }
    if($conn->query($sql)){
      $_SESSION['success'] = 'Employee deleted successfully';
    }
    else{
      $_SESSION['error'] = $conn->error;
    }
    $conn->close();
    header('location: ../bank_account.php');
  }

  function customerInvoice(){ 
    include 'conn.php';
    $sql = "SELECT customer_id, customer_name FROM customer";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['customer_id']."'>".$prow['customer_name']."</option>
        ";
    }
    $conn->close();
  }

  function salesPersons(){
    include 'conn.php';
    $sql = "SELECT employee_id, firstname, lastname FROM employees";
    $query = $conn->query($sql);
    while($srow = $query->fetch_assoc()){
        echo "  
        <option value='".$srow['employee_id']."'>".$srow['firstname'].", ".$srow['lastname']."</option>
        ";
    }
    $conn->close();
  }

  function productInvoices(){
    include 'conn.php';
    $sql = "SELECT product_id, product_name FROM product";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['product_name']."'>".$prow['product_name']."</option>
        ";
    }
    $conn->close();
  }

  function productDescriptionInvoice(){
    include 'conn.php';
    $sql = "SELECT product_id, product_description FROM product";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['product_id']."'>".$prow['product_description']."</option>
        ";
    } 
    $conn->close();
  }
  function accountListInvoice(){
    include 'conn.php';
    $sql = "SELECT account_id, account_name, description FROM account_list";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['account_id']."'>".$prow['description']."</option>
        ";
    }
    $conn->close();
  }

  function employeeList(){
    include 'conn.php';
    $sql = "SELECT * FROM `employees` WHERE delete_flag =0";
    $query = $conn->query($sql);
    while($prow = $query->fetch_assoc()){
        echo "
        <option value='".$prow['employee_id']."'>".$prow['lastname'].", ".$prow['firstname']."</option>
        ";
    }
    $conn->close();
  }

  function storeCustomer(){
    include 'conn.php';
    $sql = "SELECT * FROM `store_customer` WHERE delete_flag =0";
    $query = $conn->query($sql);
    if($query) {
      while($row = $query->fetch_assoc()) {
          echo '
            <tr>
            <td>'.$row["store_name"].'</td>
              <td>'.$row["store_email"].'</td>
              <td>'.$row["store_contact"].'</td>
              <td><button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal"><a href="#" class=" customer-select"  data-customer-name="'.$row['store_name'].'" data-customer-email="'.$row['store_email'].'" data-customer-phone="'.$row['store_contact'].'" data-customer-address-1="'.$row['store_address'].'">Select</a></button></td>
            </tr>
          ';
      }
  
      
  
    } else {
  
      echo "<p>There are no customers to display.</p>";
  
    }
    $conn->close();
  }

  function salesPerson(){
    include 'conn.php';
    $sql = "SELECT `employee_id`, `firstname`, `lastname`, `address`, `contact_info` FROM `employees` WHERE delete_flag =0";
    $query = $conn->query($sql);
    if($query) {
      while($row = $query->fetch_assoc()) {
          echo '
            <tr>
            <td>'.$row["firstname"].' '.$row["lastname"].'</td>
              
              <td><button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal"><a href="#" class=" select-salesPerson"  data-salesPerson-firstname="'.$row['firstname'].'" data-salesPerson-lastname="'.$row['lastname'].'">Select</a></button></td>
            </tr>
          ';
      }
  
      
  
    } else {
  
      echo "<p>There are no customers to display.</p>";
  
    }
    $conn->close();
  }

  //Create credit note ------------------------------->
  if (isset($_POST['createNewCustomerCredit'])) {
    creditAdd();
  }
  function creditAdd(){
    include 'conn.php';
    if(isset($_POST['createNewCustomerCredit'])){
      //for Invoice table
      $creditId = $_POST['credit_id'];
      $creditDate = $_POST['credit_date'];
      $creditDueDate = $_POST['credit_duedate'];
      $creditTerms = $_POST['credit_terms'];
      $creditSalesPerson = $_POST['credit_sales_person'];
      $creditPaymentReference = $_POST['credit_payment_reference'];
      $creditCurrencyType = $_POST['credit_currency'];
      $creditJournal= $_POST['credit_journal'];
      $creditSubTotal = $_POST['subtotal'];
      $creditDiscount = $_POST['discount'];
      $creditGrandTotal = $_POST['grandtotal'];
    	$creditNotes = $_POST['credit_notes'];
      
      // customer Table
      $customerName = $_POST['customer_name'];
      $customerContact = $_POST['customer_contact'];
      $customerAddress = $_POST['address'];
      $customerEmail = $_POST['customer_email'];

    
      $sql1 = "INSERT INTO `credit_note`(`credit_id`, `credit_date`, `credit_duedate`, `credit_subtotal`, `credit_discount`, `credit_grandtotal`, `credit_notes`, `credit_terms`, `credit_sales_person`, `credit_payment_reference`, `credit_currency`, `credit_journal`) VALUES ('$creditId','$creditDate','$creditDueDate','$creditSubTotal','$creditDiscount','$creditGrandTotal','$creditNotes','$creditTerms','$creditSalesPerson','$creditPaymentReference','$creditCurrencyType','$creditJournal')";
        
      $sql2 = "INSERT INTO `customer`( `customer_name`, `customer_email`, `customer_contact`, `address`, `customer_type`, `credit_id`) VALUES ('$customerName','$customerEmail','$customerContact','$customerAddress','1','$creditId')";

     
      foreach($_POST['credit_product'] as $key => $value) {
        $item_product = $value;
        $label = $_POST['label'][$key];
        $account = $_POST['account'][$key];
        $item_qty = $_POST['credit_product_qty'][$key];
        $item_price = $_POST['credit_product_price'][$key];
        $item_discount = $_POST['credit_product_discount'][$key];
        $item_subtotal = $_POST['credit_product_sub'][$key];

        $sql3 = "INSERT INTO `credit_note_items`(`credit_id`, `credit_product`, `credit_quantity`, `credit_price`, `credit_discount`, `credit_items_subtotal`) VALUES ('$creditId','$item_product','$item_qty','$item_price','$item_discount','$item_subtotal')";
   
        if($conn->query($sql3)){
          echo "success";
        }
        else{
          echo "error";
        }
      }
     
     
      if($conn->query($sql1)){
        echo "success";
      }
      else{
        echo "error";
      }
      if($conn->query($sql2)){
        echo "success";
      }
      else{
        echo "error";
      }
      

      
    }
    $conn->close();
    header('location: ../credit_notes.php');
  }

  //Create Invoice ---------------------->
  if (isset($_POST['createNewCustomerInvoice'])) {
    invoiceAdd();
  }
  function invoiceAdd(){
    include 'conn.php';
    if(isset($_POST['createNewCustomerInvoice'])){
      //for Invoice table
      $invoiceId = $_POST['invoice_id'];
      $invoiceDate = $_POST['invoice_date'];
      $dueDate = $_POST['invoice_duedate'];
      $terms = $_POST['terms'];
      $salesPerson = $_POST['sales_person'];
      $paymentReference = $_POST['payment_reference'];
      $currencyType = $_POST['currency'];
      $journal= $_POST['journal'];
      $invoiceSubTotal = $_POST['subtotal'];
      $invoiceDiscount = $_POST['discount'];
      $grandTotal = $_POST['grandtotal'];
    	$notes = $_POST['notes'];
      
      // customer Table
      $customerName = $_POST['customer_name'];
      $customerContact = $_POST['customer_contact'];
      $customerAddress = $_POST['address'];
      $customerEmail = $_POST['customer_email'];

    
      $sql1 = "INSERT INTO `invoice`( `invoice_id`, `invoice_date`, `invoice_duedate`, `subtotal`, `discount`, `grandtotal`, `notes`, `terms`, `sales_person`, `payment_reference`, `currency`, `journal`) VALUES ('$invoiceId','$invoiceDate','$dueDate','$invoiceSubTotal','$invoiceDiscount','$grandTotal','$notes','$terms','$salesPerson','$paymentReference','$currencyType','$journal')";
        
      $sql2 = "INSERT INTO `customer`( `invoice_id`, `customer_name`, `customer_email`, `customer_contact`, `address`, `customer_type`) VALUES ('$invoiceId','$customerName','$customerEmail','$customerContact','$customerAddress','0')";

     
      foreach($_POST['invoice_product'] as $key => $value) {
        $item_product = $value;
        $label = $_POST['label'][$key];
        $account = $_POST['account'][$key];
        $item_qty = $_POST['invoice_product_qty'][$key];
        $item_price = $_POST['invoice_product_price'][$key];
        $item_discount = $_POST['invoice_product_discount'][$key];
        $item_subtotal = $_POST['invoice_product_sub'][$key];

        $sql3 = "INSERT INTO `invoice_items`(`invoice_id`, `invoice_product`, `quantity`, `price`, `discount`, `items_subtotal`) VALUES ('$invoiceId','$item_product','$item_qty','$item_price','$item_discount','$item_subtotal')";
   
        if($conn->query($sql3)){
          echo "success";
        }
        else{
          echo "error";
        }
      }
     
     
      if($conn->query($sql1)){
        echo "success";
      }
      else{
        echo "error";
      }
      if($conn->query($sql2)){
        echo "success";
      }
      else{
        echo "error";
      }
      

      
    }
    $conn->close();
    header('location: ../invoices.php');
  }

  //SHOW CUSTOMER INVOICE TABLE
function customerInvoiceTable(){
  include 'conn.php';
  $sql = "SELECT *, cus.invoice_id, cus.customer_name FROM `invoice` AS inv INNER JOIN customer AS cus ON inv.invoice_id = cus.invoice_id;";

  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){

    
    ?>
<tr>
    <td><?php echo $row['invoice_id']; ?></td>
    <td><?php echo $row['invoice_duedate']; ?></td>
    <td><?php echo $row['terms']; ?></td>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['payment_reference']; ?></td>
    <td><span class="px-2 border rounded-pill border-warning text-bg-warning"><?php echo $row['currency']; ?>:
            <?php echo $row['discount']; ?></span></td>
    <td> <span class="px-2 border rounded-pill border-info text-bg-info"><?php echo $row['currency']; ?>:
            <?php echo $row['grandtotal']; ?></span></td>
    <td><?php echo $row['invoice_date']; ?></td>
    <td><?php echo $row['sales_person']; ?></td>

    <td>
        <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['cus_invoice_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['cus_invoice_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
  $conn->close(); 
}

function creditNotesTable(){
  include 'conn.php';
  $sql = "SELECT *, cus.credit_id, cus.customer_name FROM `credit_note` AS cred INNER JOIN customer AS cus ON cred.credit_id = cus.credit_id";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $status = ($row['status'])?'<span class="badge text-bg-success pull-right px-2">&nbspPaid&nbsp</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?>
<tr>
    <td><?php echo $row['credit_id']; ?></td>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['credit_date']; ?></td>
    <td><?php echo $row['credit_duedate']; ?></td>
    <td><?php echo $row['credit_sales_person'];?></td>
    <td><?php echo $row['credit_currency']; ?></td>
    <td><?php echo $row['credit_grandtotal']; ?></td>
    <td><?php echo $status; ?></td>
    <td> <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['credit_notes_id']; ?>"><i
                class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['credit_notes_id']; ?>"><i
                class="fa fa-trash"></i> Delete</button>
    </td>
</tr>
<?php
  }
}

//for credit note code
function creditNoteCode(){
  include 'conn.php';
  $sql = "SELECT MAX(id)+1 FROM `credit_note`";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){ 
    $num = 1;
    if($row['MAX(id)+1'] == NULL){
      ?><?php echo $num; ?><?php
    }else{
     ?><?php echo $row['MAX(id)+1']; ?><?php
    }
  }
  $conn->close();
}

// for invoice
function invoiceCode(){
  include 'conn.php';
  $sql = "SELECT MAX(id)+1 FROM `invoice`";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){ 
    $num = 1;
    if($row['MAX(id)+1'] == NULL){
      ?><?php echo $num; ?><?php
    }else{
     ?><?php echo $row['MAX(id)+1']; ?><?php
    }
  }
  $conn->close();
}
// for Journal entry
function journalEntryCode(){
  include 'conn.php';
  $sql = "SELECT MAX(journal_entry_id)+1 FROM `journal_entries`";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){ 
    $num = 1;
    if($row['MAX(journal_entry_id)+1'] == NULL){
      ?><?php echo $num; ?><?php
    }else{
     ?><?php echo $row['MAX(journal_entry_id)+1']; ?><?php
    }
  }
  $conn->close();
}


function sumOfcreditNoteUnpaid(){
  include 'conn.php';
  $sql = "SELECT SUM(credit_grandtotal) FROM `credit_note` WHERE status = 0";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
      echo $row['SUM(credit_grandtotal)'];
  }
  $conn->close();
}
function totalOfcreditNoteUnpaid(){
  include 'conn.php';
  $sql = "SELECT COUNT(id) FROM `credit_note` WHERE status=0";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
      echo $row['COUNT(id)'];
  }
  $conn->close();
}
function totalOfcreditNotePaid(){
  include 'conn.php';
  $sql = "SELECT COUNT(id) FROM `credit_note` WHERE status=1";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
      echo $row['COUNT(id)'];
  }
  $conn->close();
}

// sales
function salesInfo(){
  include 'conn.php';
  $sql = "SELECT item.*, ent.journal_entry_id, ent.journal_entry_code, ent.journal_entry_description, ent.journal_date, acc.account_id, gl.group_id, gl.type FROM `journal_items` AS item INNER JOIN journal_entries AS ent ON item.journal_entry_code = ent.journal_entry_code INNER JOIN account_list AS acc ON item.account_id = acc.account_id INNER JOIN group_list AS gl ON item.group_id = gl.group_id WHERE (item.account_id = 1 AND gl.type = 1) OR (gl.group_id = 2 AND gl.type = 2) OR (acc.account_id = 62 AND item.amount_type =2)";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    // $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Paid</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?>
<tr>
    <td class="text-center"><?= date("M d, Y", strtotime($row['journal_date'])) ?></td>
    <td class="text-center"><?php echo $row['journal_entry_code']; ?></td>
    <td class="text-center"><?php echo $row['journal_entry_description']; ?></td>
    <td class="text-center"><?php echo "Php: ". $row['amount']; ?></td>

</tr>
<?php
  }
}
function salesInfoTotal(){
  include 'conn.php';
  $sql = "SELECT SUM(amount),item.*, ent.journal_entry_id, ent.journal_entry_code, ent.journal_entry_description, ent.journal_date, acc.account_id, gl.group_id, gl.type FROM `journal_items` AS item INNER JOIN journal_entries AS ent ON item.journal_entry_code = ent.journal_entry_code INNER JOIN account_list AS acc ON item.account_id = acc.account_id INNER JOIN group_list AS gl ON item.group_id = gl.group_id WHERE (item.account_id = 1 AND gl.type = 1) OR gl.group_id =2";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    // $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Paid</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?><?php echo "<span class='bg-success p-2 text-dark bg-opacity-25 rounded'> Php ". $row['SUM(amount)']. " <span>"; ?><?php
  }
}

//purchase journal
function purchaseInfo(){
  include 'conn.php';
  $sql = "SELECT item.*, ent.journal_entry_id, ent.journal_entry_code, ent.journal_entry_description, ent.journal_date, acc.account_id, gl.group_id, gl.type FROM `journal_items` AS item INNER JOIN journal_entries AS ent ON item.journal_entry_code = ent.journal_entry_code INNER JOIN account_list AS acc ON item.account_id = acc.account_id INNER JOIN group_list AS gl ON item.group_id = gl.group_id WHERE (item.account_id = 7 AND gl.type = 2) OR gl.group_id =3";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    // $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Paid</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?>
<tr>
    <td class=""><?= date("M d, Y", strtotime($row['journal_date'])) ?></td>
    <td><?php echo $row['journal_entry_code']; ?></td>
    <td><?php echo $row['journal_entry_description']; ?></td>
    <td><?php echo "Php: ". $row['amount']; ?></td>

</tr>
<?php
  }
}
//purchase total
function purchaseInfoTotal(){
  include 'conn.php';
  $sql = "SELECT SUM(amount), item.*, ent.journal_entry_id, ent.journal_entry_code, ent.journal_entry_description, ent.journal_date, acc.account_id, gl.group_id, gl.type FROM `journal_items` AS item INNER JOIN journal_entries AS ent ON item.journal_entry_code = ent.journal_entry_code INNER JOIN account_list AS acc ON item.account_id = acc.account_id INNER JOIN group_list AS gl ON item.group_id = gl.group_id WHERE item.account_id = 7 AND gl.type = 2 OR gl.group_id =3";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    // $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Paid</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?><?php echo "Php: ". $row['SUM(amount)']; ?><?php
  }
}

//cash and bank journal
function cashAndBankInfo(){ 
  include 'conn.php';
  $sql = "SELECT item.*, ent.journal_entry_id, ent.journal_entry_code, ent.journal_entry_description, ent.journal_date, acc.account_id, gl.group_id, gl.type FROM `journal_items` AS item INNER JOIN journal_entries AS ent ON item.journal_entry_code = ent.journal_entry_code INNER JOIN account_list AS acc ON item.account_id = acc.account_id INNER JOIN group_list AS gl ON item.group_id = gl.group_id WHERE ((item.account_id = 1 AND gl.type = 1) AND (gl.group_id =1)) OR (acc.account_id =55 AND gl.type = 1) ORDER BY ent.journal_date ASC";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    // $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Paid</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?>
<tr>
    <td class="text-center"><?= date("M d, Y", strtotime($row['journal_date'])) ?></td>
    <td class="text-center"><?php echo $row['journal_entry_code']; ?></td>
    <td class="text-center"><?php echo $row['journal_entry_description']; ?></td>
    <td class="text-center"><?php echo "Php: ". $row['amount']; ?></td>

</tr>
<?php
  }
}
function cashAndBankInfoTotal(){
  include 'conn.php';
  $sql = "SELECT SUM(amount), item.*, ent.journal_entry_id, ent.journal_entry_code, ent.journal_entry_description, ent.journal_date, acc.account_id, gl.group_id, gl.type FROM `journal_items` AS item INNER JOIN journal_entries AS ent ON item.journal_entry_code = ent.journal_entry_code INNER JOIN account_list AS acc ON item.account_id = acc.account_id INNER JOIN group_list AS gl ON item.group_id = gl.group_id WHERE ((item.account_id = 1 AND gl.type = 1) AND (gl.group_id =1)) OR (acc.account_id =55 AND gl.type = 1)";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    // $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Paid</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?><?php echo "<span class='bg-success p-2 text-dark bg-opacity-25 rounded'> Php ". $row['SUM(amount)']. "</span>"; ?><?php
  }
}

//partner ledger
function partnerTable(){
  include 'conn.php';
  $sql = "SELECT DISTINCT partner FROM `journal_entries`";

  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){ 
  
    
    ?>
<tr>
    <td class="text-center"><b><?= $row['partner']; ?></b></td>

    <td>
        <div class="d-flex w-100 asd">
            <div class="col-2 border "></div>
            <div class="col-2 border "></div>
            <div class="col-4 border "></div>
            <div class="col-2 border dsa"></div>
            <div class="col-2 border sda"></div>
        </div>

        <?php
                $sql2 = "SELECT * FROM journal_items AS journitems INNER JOIN journal_entries AS journentries ON journentries.journal_entry_code = journitems.journal_entry_code INNER JOIN account_list as accntlist ON journitems.account_id = accntlist.account_id INNER JOIN group_list as grouplist ON journitems.group_id = grouplist.group_id WHERE partner = '". $row['partner'] ."' ORDER BY journentries.journal_date ASC ";
                $query2 = $conn->query($sql2);
                while ($row2 = $query2->fetch_assoc()){

                    if($row2['amount_type'] == 1){
                        $type1 = "Php: ". format_num($row2['amount']);
                    }else{
                        $type1 = '';
                    }
                    if($row2['amount_type'] == 2){
                        $type2 = "Php: ". format_num($row2['amount']);
                    }else{
                        $type2 = '';
                    }
             ?>
        <div class="d-flex w-100 fgh">
            <div class="col-2 border text-center">
                <span class="pl-4"><?= date("M d, Y", strtotime($row2['journal_date'])) ?></span>
            </div>
            <div class="col-2 border text-center">
                <span class="pl-4"><?= $row2['journal_entry_code'] ?> </span>
            </div>

            <div class="col-4 border text-center">
                <span class="pl-4"><?= $row2['account_name'] ?> </span>
            </div>
            <div class="col-2 px-2 border text-end">
                <?= $type1
                ?>
            </div>
            <div class="col-2 px-2 border text-end">
                <?= $type2
                ?>
            </div>
        </div>

        <?php 
                }
        ?>
        <div class="d-flex w-100 fgh">
            <div class="col-2 border text-center">

            </div>
            <div class="col-2 border text-center">

            </div>

            <div class="col-4 border text-center">

            </div>
            <div class="col-2 border text-end bg-warning p-2 text-dark bg-opacity-25">
                <?php
              $sql3 = "SELECT SUM(amount) FROM journal_items AS journitems INNER JOIN journal_entries AS journentries ON journentries.journal_entry_code = journitems.journal_entry_code INNER JOIN account_list as accntlist ON journitems.account_id = accntlist.account_id INNER JOIN group_list as grouplist ON journitems.group_id = grouplist.group_id WHERE partner =  '". $row['partner'] ."' AND amount_type =1";
              $query3 = $conn->query($sql3);
              while ($row3 = $query3->fetch_assoc()){
                $typedebit = "Php: ". format_num($row3['SUM(amount)']);
                  ?>
                <b><?= $typedebit?></b>
                <?php 
                  }
                 ?>
            </div>
            <div class="col-2 border text-end bg-warning p-2 text-dark bg-opacity-25">
                <?php
              $sql4 = "SELECT SUM(amount) FROM journal_items AS journitems INNER JOIN journal_entries AS journentries ON journentries.journal_entry_code = journitems.journal_entry_code INNER JOIN account_list as accntlist ON journitems.account_id = accntlist.account_id INNER JOIN group_list as grouplist ON journitems.group_id = grouplist.group_id WHERE partner =  '". $row['partner'] ."' AND amount_type = 2";
              $query4 = $conn->query($sql4);
              while ($row4 = $query4->fetch_assoc()){
                $typecredit = "Php: ". format_num($row4['SUM(amount)']);
                  ?>
                <b> <?= $typecredit?></b>
                <?php 
                  }
                 ?>
            </div>
        </div>
    </td>

</tr>
<?php
  }
  $conn->close(); 
}

function genLedgertable(){
  include 'conn.php';
  $sql = "SELECT DISTINCT account_id, account_name from account_list";

  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
  
  
  ?>
<tr>
    <td class="text-center"><b><?= $row['account_name']; ?></b></td>

    <td>
        <div class="d-flex w-100 asd">
            <div class="col-1 border "></div>
            <div class="col-2 border"></div>
            <div class="col-3 border"></div>
            <div class="col-2 border"></div>
            <div class="col-2 border"></div>
            <div class="col-2 border"></div>
        </div>

        <?php
                  $sql2 = "SELECT * FROM journal_items AS items INNER JOIN account_list AS acc ON acc.account_id = items.account_id INNER JOIN journal_entries AS ent ON items.journal_entry_code = ent.journal_entry_code INNER JOIN group_list AS gl ON items.group_id = gl.group_id WHERE acc.account_id  = '". $row['account_id'] ."' ORDER BY ent.journal_date ASC";
                  $query2 = $conn->query($sql2);
                  while ($row2 = $query2->fetch_assoc()){
  
                      if($row2['amount_type'] == 1){
                          $type1 = "Php: ". format_num($row2['amount']);
                      }else{
                          $type1 = '';
                      }  
                      if($row2['amount_type'] == 2){
                          $type2 = "Php: ". format_num($row2['amount']);
                      }else{
                          $type2 = '';
                      }
                   
          ?>
        <div class="d-flex w-100 fgh">
            <div class="col-1 border text-center">
                <span class="pl-4"><?= date("M d, Y", strtotime($row2['journal_date'])) ?></span>
            </div>
            <div class="col-2 border text-center">
                <span class=""><?= $row2['journal_entry_code'] ?> </span>
            </div>
            <div class="col-3 border text-center">
                <span class=""><?= $row2['journal_entry_description'] ?> </span>
            </div>
            <div class="col-2 px-2 border text-end">
                <?= $type1
                  ?>
            </div>
            <div class="col-2 px-2 border text-end">
                <?= $type2
                  ?>
            </div>
            <div class="col-2 px-2 border text-end">

            </div>
        </div>

        <?php 
                  }
          ?>

        <div class="d-flex w-100 fgh">
            <div class="col-1 border text-center">

            </div>
            <div class="col-2 border text-center">

            </div>

            <div class="col-3 border text-center">

            </div>
            <div class="col-2 border text-end bg-warning p-2 text-dark bg-opacity-10">
                <?php
              $sql3 = "SELECT SUM(amount) FROM journal_items AS items INNER JOIN account_list AS acc ON acc.account_id = items.account_id INNER JOIN journal_entries AS ent ON items.journal_entry_code = ent.journal_entry_code INNER JOIN group_list AS gl ON items.group_id = gl.group_id WHERE acc.account_id =  '". $row['account_id'] ."' AND amount_type = 1";
              $query3 = $conn->query($sql3);
              while ($row3 = $query3->fetch_assoc()){
                $deb = $row3['SUM(amount)'];
                $typedebit = "Php: ". format_num($row3['SUM(amount)']);
                  ?>
                <b><?= $typedebit ?></b>
                <?php 
                  }
                 ?>
            </div>
            <div class="col-2 border text-end bg-warning p-2 text-dark bg-opacity-10">
                <?php
              $sql4 = "SELECT SUM(amount) FROM journal_items AS items INNER JOIN account_list AS acc ON acc.account_id = items.account_id INNER JOIN journal_entries AS ent ON items.journal_entry_code = ent.journal_entry_code INNER JOIN group_list AS gl ON items.group_id = gl.group_id WHERE acc.account_id =  '". $row['account_id'] ."' AND amount_type = 2";
              $query4 = $conn->query($sql4);
              while ($row4 = $query4->fetch_assoc()){
                $cred = $row4['SUM(amount)'];
                $typecredit = "Php: ". format_num($row4['SUM(amount)']);
                  ?>
                <b><?=  $typecredit ?></b>
                <?php 
                  }
                 ?>
            </div>
            <div class="col-2 py-2 border text-end bg-secondary p-2 text-dark bg-opacity-10">
                <?php 
                
                 $floatvar = (float)$cred - (float)$deb;
                 
                 if((float)$deb > (float)$cred){
                  $floatvar = (float)$deb  - (float)$cred;
                  $txt = format_num($floatvar);
                 
                  echo '<b><span style="color:#00802b; ">Php: '. number_format((float)$floatvar, 2, '.', ''). '</span><b>';
                 }
                 if((float)$deb < (float)$cred){
                  $floatvar = (float)$cred - (float)$deb;
                  echo '<b><span style="color:#b30000;">Php: '. number_format((float)$floatvar, 2, '.', ''). '</span><b>';
                 }
                 if((float)$deb == (float)$cred){
                  $floatvar =(float)$deb - (float)$cred;
                  echo '<b><span>Php: '. $floatvar. '</span><b>';
                 }
                ?>

            </div>
        </div>
    </td>

</tr>
<?php
  }
  $conn->close(); 
}

function genLedgerTotalDebit(){
  include 'conn.php';
  $sql = "SELECT SUM(amount) FROM journal_items AS items INNER JOIN account_list AS acc ON acc.account_id = items.account_id INNER JOIN journal_entries AS ent ON items.journal_entry_code = ent.journal_entry_code INNER JOIN group_list AS gl ON items.group_id = gl.group_id WHERE amount_type =1";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    // $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Paid</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?><?php echo "Php: ". format_num($row['SUM(amount)']); ?><?php
    
  }
}
function genLedgerTotalCredit(){
  include 'conn.php';
  $sql = "SELECT SUM(amount) FROM journal_items AS items INNER JOIN account_list AS acc ON acc.account_id = items.account_id INNER JOIN journal_entries AS ent ON items.journal_entry_code = ent.journal_entry_code INNER JOIN group_list AS gl ON items.group_id = gl.group_id WHERE amount_type =2";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    // $status = ($row['status'])?'<span class="badge text-bg-success pull-right">Paid</span>':'<span class="badge text-bg-warning pull-right">Unpaid</span>';
    
    ?><?php echo "Php: ". format_num($row['SUM(amount)']); ?><?php
  }
}

function employeeSelection(){
  include 'conn.php';
  $sql = "SELECT employee_id, firstname, lastname FROM employees";
  $query = $conn->query($sql);
  while($prow = $query->fetch_assoc()){
      echo "
      <option value='".$prow['employee_id']."'>".$prow['firstname'].' ' .$prow['lastname']."</option>
      ";
  }
  $conn->close();
}

//Create Journal ENTRY  ------------------------------->
if (isset($_POST['journAddnewEntry'])) {
  journEntryAdd();
}
function journEntryAdd(){
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  include 'conn.php';
  if(isset($_POST['journAddnewEntry'])){
    //for Invoice table
    $code = $_POST['code'];
    $journDate = $_POST['journal_date'];
    $description = $_POST['journal_entry_description'];
    $partner = $_POST['partner'];
    $employee = $_POST['employee_id'];

  
    $sql1 = "INSERT INTO `journal_entries`(`journal_entry_code`, `journal_date`, `journal_entry_description`, `employee_id`, `partner`) VALUES ('$code','$journDate','$description','$employee','$partner')";


   
      

   
      foreach($_POST['account_ids'] as $key => $value){
      $accountName = $value;
      $name = $_POST['account_ids'][$key];
      $groupName = $_POST['group_ids'][$key];
      $amount = $_POST['amounts'][$key];
      $amountType = $_POST['amountType'][$key];

      $sql5 = "SELECT * FROM `account_list` WHERE account_name = '$name'";
          $query5 = $conn->query($sql5);
          $row5 = $query5->fetch_assoc();
          $accountId = $row5['account_id'];
      
        $sql4 = "SELECT * FROM `group_list` WHERE group_name = '$groupName'";
          $query4 = $conn->query($sql4);
          $row4 = $query4->fetch_assoc();
          $groupId = $row4['group_id'];
        
        

        
        

      $sql3 = "INSERT INTO `journal_items`(`journal_entry_code`, `account_id`, `group_id`, `amount`, `amount_type`, `account_name`, `group_name`) VALUES ('$code','$accountId','$groupId','$amount', '$amountType', '$accountName','$groupName')";
 
      if($conn->query($sql3)){
        echo "success";
      }
      else{
        echo "error";
      }
      if($conn->query($sql4)){
        echo "success";
      }
      else{
        echo "error";
      }
      if($conn->query($sql5)){
        echo "success";
      }
      else{
        echo "error";
      }
    }

    if($conn->query($sql1)){
      echo "success";
    }
    else{
      echo "error";
    }
    if($conn->query($sql2)){
      echo "success";
    }
    else{
      echo "error";
    }
    

    
  }
  $conn->close();
  header('location: ../journal_entry.php');
}

//ADD NEW JOURNAL

?>







<!-- sample config.php for invoice setup -->
<?php
// Debugging
ini_set('error_reporting', E_ALL);

// DATABASE INFORMATION
define('DATABASE_HOST', getenv('IP'));
define('DATABASE_NAME', 'invoicemgsys');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');

// COMPANY INFORMATION
define('COMPANY_LOGO', 'images/logo.png');
define('COMPANY_LOGO_WIDTH', '300');
define('COMPANY_LOGO_HEIGHT', '90');
define('COMPANY_NAME','Invoice Mg System');
define('COMPANY_ADDRESS_1','123 Something Street');
define('COMPANY_ADDRESS_2','Collierville, 3590 Lords Way');
define('COMPANY_ADDRESS_3','Paekinta');
define('COMPANY_COUNTY','US');
define('COMPANY_POSTCODE','10100');

define('COMPANY_NUMBER','Company No: 699400000'); // Company registration number
define('COMPANY_VAT', 'Company VAT: 690000007'); // Company TAX/VAT number

// EMAIL DETAILS
define('EMAIL_FROM', 'sales@inms.ccc'); // Email address invoice emails will be sent from
define('EMAIL_NAME', 'Invoice Mg System'); // Email from address
define('EMAIL_SUBJECT', 'Invoice default email subject'); // Invoice email subject
define('EMAIL_BODY_INVOICE', 'Invoice default body'); // Invoice email body
define('EMAIL_BODY_QUOTE', 'Quote default body'); // Invoice email body
define('EMAIL_BODY_RECEIPT', 'Receipt default body'); // Invoice email body

// OTHER SETTINFS
define('INVOICE_PREFIX', 'MD'); // Prefix at start of invoice - leave empty '' for no prefix
define('INVOICE_INITIAL_VALUE', '1'); // Initial invoice order number (start of increment)
define('INVOICE_THEME', '#222222'); // Theme colour, this sets a colour theme for the PDF generate invoice
define('TIMEZONE', 'America/Los_Angeles'); // Timezone - See for list of Timezone's http://php.net/manual/en/function.date-default-timezone-set.php
define('DATE_FORMAT', 'DD/MM/YYYY'); // DD/MM/YYYY or MM/DD/YYYY
define('CURRENCY', 'Php'); // Currency symbol
define('ENABLE_VAT', true); // Enable TAX/VAT
define('VAT_INCLUDED', false); // Is VAT included or excluded?
define('VAT_RATE', '10'); // This is the percentage value

define('PAYMENT_DETAILS', 'Invoice Mg System.<br>Sort Code: 00-00-00<br>Account Number: 12345678'); // Payment information
define('FOOTER_NOTE', 'Invoice Management System');

// CONNECT TO THE DATABASE
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);


?>

<!-- sample config.php for invoice setup -->