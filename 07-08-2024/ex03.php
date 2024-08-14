<?php 
require_once 'crud_functions.php';

$dataEmployee = ['Jane','Doe','50000'];
$dataEmployyeeUpdate = [55000,'Doe'];
$employee = createEmployee($dataEmployee);


if($employee){
   if(updateEmployee($dataEmployyeeUpdate)){
    echo "Cập nhật thông tin lương thành công";
   }else{
    echo 'Cập nhật thông tin không thành công';
   };

}else{
    echo "Tạo nhân viên mới thất bại";
}

?>
