function processTransaction() {
    $db = Database::getInstance(); 
    $data = $db->sql('SELECT * FROM PayrollRecords WHERE Status = %s', [‘Pending']);
    
    foreach ($data as $item) { 
        $transaction = Transaction::getStatus($item[‘transactionId’]); 
        if ($transaction[‘processed’]) { 
            $recordId = $item[‘id’]; 
            PayrollRecord::markAsAccurate($recordId);
        }
    }
}

Answer : 
* We can join the table payroll and transaction to decrease the number of query calls to the DB so 
we only select transaction that are processed.

function processTransaction() {
    $db = Database::getInstance(); 
    $data = $db->sql('SELECT p.id as id from PayrollRecords p, Transaction t where p.transactionId = t.id and p.Status = %s AND t.status = %s', [‘Pending', 'processed']);
    
    foreach ($data as $item) { 
        $recordId = $item[‘id’]; 
        PayrollRecord::markAsAccurate($recordId);
    }
}

* We can also add a a return value if processing fails or succeed. 

* Adding try, catch then if an exception return/log that error.
