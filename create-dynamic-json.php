 <?php  
 /****
 -- Table (Exemple):
 --  
 -- Table structure for table `tbl_employee`  
 --  
 CREATE TABLE IF NOT EXISTS `tbl_employee` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `name` varchar(50) NOT NULL,  
  `gender` varchar(10) NOT NULL,  
  `designation` varchar(30) NOT NULL,  
  PRIMARY KEY (`id`)  
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;  
 --  
 -- Dumping data for table `tbl_employee`  
 --  
 INSERT INTO `tbl_employee` (`id`, `name`, `gender`, `designation`) VALUES  
 (1, 'Micheal Bruce', 'Male', 'System Architect'),  
 (5, 'Clara Gilliam', 'Female', 'Programmer');  
 
 */
 function get_data()  
 {  
      $connect        = mysqli_connect("localhost", "root", "", "testing");  
      $query          = "SELECT * FROM tbl_employee";  
      $result         = mysqli_query($connect, $query);  
      $employee_data  = array();  
   
      while($row = mysqli_fetch_array($result))  
      {  
           $employee_data[] = array(  
                'name'            =>     $row["name"],  
                'gender'          =>     $row["gender"],  
                'designation'     =>     $row["designation"]  
           );  
      }  
   
      return json_encode($employee_data);  
   
 }  

//Generate with date
 $file_name = date("d-m-Y") . ".json";  
 if(file_put_contents($file_name, get_data()))  
 {  
      echo $file_name . ' File created';  
 }  
 else  
 {  
      echo 'There is some error';  
 }  

 ?> 
