<?php
/* Write your PHP code here

Step 1: Use and declare php strict types

Step 2:  Create a class for account (with its properties e.g. number, type and balance)

Step 3: Create a PHP constructor with argument types e.g. number, type and balance
If a balance is not given when creating the object, a default value of 0.00 should be used.

Step 4: Create two methods for deposit and withdraw which will update the value
stored in the balance property. They should be given arguments and return type declaration of float.

Step 5: Create two objects to represent a checking account and savings account. 

Step 6:  An HTML skeleton is drawn. The first row should show headings using 
the type property of two objects. To access property use the:
 - Name of the variable that holds the object
 - Object operator
 - Property name

Step 7: In the next table row show the balance property of the objects.

Step 8: In the third row of the table, the balance of each account is updated by calling deposit() or
withdraw() methods. These methods return the new value of balance property and this should be shown in page.
To call a method, you can use
- Name of the variable that holds the object
- Object operator
- Method name with its argument in parantheses

Step 9: In the final row of the table, previous step is repeated using different values. 



*/


class Account {
  protected int $number; 
  public string $type; 
  protected float $balance; 

public  function __construct(int $number, string $type, float $balance = 0.00) {
$this->number = $number; 
$this->type = $type; 
$this->balance = $balance; 
  }

public function deposit(float $deposit_amount): float {
    $this->balance += $deposit_amount; 
    return $this->balance; 
  }

 public function withdraw(float $withdraw_amount): float {
  $this->balance -= $withdraw_amount; 
    return $this->balance; 
  }
}

 $checking = new Account(1000746625, 'checking', 0); 
$saving = new Account(2625264848, 'saving', 0 ); 
?>



<?php include 'includes/header.php'; ?>
<h2>Account Balances</h2>
<table>
  <tr>
    <th>Date</th>
    <th><?= $checking->type?></th>
    <th><?= $saving->type?></th>

  </tr>
  <tr>
    <td>23 June</td>
    <td>$<?= $checking->deposit(32) ?> </td>
    <td>$<?= $saving->deposit(756) ?> </td>
  
  </tr>
  <tr>
  <td>24 June</td>
  <td>$<?= $checking->deposit(12) ?> </td>
    <td>$<?= $saving->withdraw(100) ?> </td>

  </tr>
  <tr>
  <td>25 June</td>
  <td>$<?= $checking->withdraw(5) ?> </td>
    <td>$<?= $saving->deposit(300) ?> </td>

  </tr>
</table>
<?php include 'includes/footer.php'; ?>