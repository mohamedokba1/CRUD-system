<?php 
require_once('php/db.php');
require_once('php/component.php');

$con =createDatabase();

// create button
if(isset($_POST['create'])){
    createData();
}
// update button 
if(isset($_POST['update'])){
    updateData();
}
// delete button 
if(isset($_POST['delete'])){
    deleteRecord();
}
// delete all button 
if(isset($_POST['deleteall'])){
    deleteAll();
}


function createData(){

   $bookname =dataValidation('book_name');
   $bookpublisher = dataValidation('book_publisher');
   $bookprice = dataValidation('book_price');

   if($bookname && $bookpublisher && $bookprice)
   {
       $sql = "
            INSERT INTO books (book_name, publisher, price)
            VALUES('$bookname', '$bookpublisher', '$bookprice');
       ";
       if(mysqli_query($GLOBALS['con'], $sql))
         {
             hintText('success', 'record created successfully');
         }
         else {
             echo "Error to create the record";
         }
   }else 
   {
       hintText('error', 'Enter a valid values in the required fields');
   }
}

function dataValidation($data)
{
    $textvalue = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$data]));

    if(empty($textvalue)){
        return false;
    }else {
        return $textvalue;
    }
}

//messages 
function hintText($classname, $msg)
{
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from the database 
function getData()
{
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($result)){
        return $result;
    } 
}

//update data 
function updateData()
{
   $id = dataValidation('book_id');
   $bookname = dataValidation('book_name');
   $bookpublisher = dataValidation('book_publisher');
   $bookprice = dataValidation('book_price');

   if($bookname && $bookpublisher && $bookprice)
   {
      $sql = "
                UPDATE books SET book_name='$bookname', publisher='$bookpublisher', price='$bookprice' WHERE id='$id';
      ";
      if(mysqli_query($GLOBALS['con'], $sql))
      {
          hintText("success", "Data successfully updated.!");
      }else 
      {
        hintText("error", "Failed to update the new data.!");
      }     
          
   }else 
   {
       hintText("error", "Select data using edit icon");
   }
}

// delete record 
function deleteRecord()
{
   $id = (int)dataValidation('book_id');
   $sql = "DELETE FROM books where id='$id'";

   if(mysqli_query($GLOBALS['con'], $sql))
   {
      echo hintText("success", "Record deleted successfully.!");
   }else
   {
      echo hintText("error", "Failed to delete the required record");
   }
}
// create delete all button after 3 records added in the database
function deleteBtn()
{
    $result = getData();
    $i=0;
    if($result)
    {
        while($row = mysqli_fetch_assoc($result)){
            $i++;
        }
        if($i>3)
         {
             inputButtton("btn-deleteall","<i class='fas fa-trash'></i> Delete All", "btn btn-danger","deleteall","");
              return;
            }
    }
}

// function to delete all records from the data base 
function deleteAll()
{
    $sql= "DROP Table books";

    if(mysqli_query($GLOBALS['con'], $sql))
    {
       hintText("success", "All records deleted successfully.!");
       createDatabase();
    }else 
    {
       hintText("error", "Failed to delete all records");
    }
}

// set the id to the textbox
function setId()
{
    $getid = getData();
    $id = 0;
    while($row =mysqli_fetch_assoc($getid)){
        $id = $row['id'];
    }
    return ($id+1);
} 