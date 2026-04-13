<?php
$text = '
Registration Type
Former School
Address
Province
City
District
Grade
Reason for moving
Date of admission
Student\'s Number
Test Registration Number 
Graduated from Nursery
Graduated from Kindergarten
SKHUN Number
Graduated Certificate Number
Hobby
Ambition 
Full Name
Gender
NISN
Identification Number 
Place of Birth
Date of Birth
Religion
Special Needs
Address 
RT
RW
Village
Province
City
District
Postal Code
Living With
Transportation
Telephone Number
Mobile Number
Email
KPS/PKH/KIP Recipient
KPS/PKH/KIP Number
Nationality 
Father\\\'s Name
Father\\\'s Identification Number
Father\\\'s Place of Birth
Father\\\'s Date of Birth
Father\\\'s Religion
Father\\\'s Education
Father\\\'s Profession
Father\\\'s Mobile Number
Father\\\'s Monthly Income
Father\\\'s Special Needs ';
$arr = explode(PHP_EOL, $text);


 
foreach($arr as $k => $v)
{
	 echo '$objPHPExcel->setActiveSheetIndex(0)->setCellValue(\'\'.$h.\'1\', \''.trim($v).'\') ; '."\n"; 
	 echo '$h++;';
	 echo  "\n";
	 
}
 
?>