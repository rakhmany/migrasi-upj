<?php
$array_student_regtype =  array(
		0 => 'Choose Registration Type',
		1 => 'New Student',
		2 => 'Transferred Student',
);
$array_student_hobby =  array(
		0 => 'Choose Hobby',
		1 => 'Sports',
		2 => 'Arts',
		3 => 'Reading',
		4 => 'Wrtiting',
		5 => 'Travelling',
		6 => 'Others',
);
$array_student_ambition =  array(
		0 => '',
		1 => 'Military officer - Policeman',
		2 => 'Teacher - Lecture',
		3 => 'Doctor',
		4 => 'Politician',
		5 => 'Enterpreneur',
		6 => 'Artists',
		7 => 'Others',
); 
$array_student_gender =  array(
	0 => '',
	1 => 'Male',
	2 => 'Female' 
);

$array_student_need =  array(
		0 => '',
		1 => 'No',
		2 => 'Blind',
		3 => 'Deaf',
		4 => 'Mentally Disable-mild',
		5 => 'Mentally Disable-medium',
		6 => 'Physically Disable-mild',
		7 => 'Physically Disable-medium',
		8 => 'Emotionally Disable',
		9 => 'Mute',
		10 => 'Double Handicap or Multiple Handicap ',
		11 => 'Hyperactive  ',
		12 => 'Gifted',
		13 => 'Talented',
		14 => 'Slow Learner',
		15 => 'Addiction',
		16 => 'Autism',
		17 => 'Down Syndrome',
);

$array_student_livwith =  array(
		0 => '',
		1 => 'Parents ',
		2 => 'Guardian',
		3 => 'Boarding House',
		4 => 'Hostel',
		5 => 'Orphanage ',
		6 => 'Others',
);

$array_student_transport =  array(
		0 => '',
		1 => 'Walk ',
		2 => 'Personal Vehicle ',
		3 => 'Public Transportation',
		4 => 'School pick-up',
		5 => 'Train',
		6 => 'Online Taxi',
		7 => 'Others',
);

$array_student_yesno =  array(
		0 => '',
		1 => 'Yes ',
		2 => 'No',
);

$array_student_nationality =  array(
		0 => '',
		1 => 'Indonesian',
		2 => 'Expatriate',
		3 => 'Country of Origins',
);

$array_parent_edu =  array(
		0 => '',
		1 => 'Non formal education',
		2 => 'Drop Out',
		3 => 'Grade School',
		4 => 'Middle School',
		5 => 'High School',
		6 => 'Diploma 1',
		7 => 'Diploma 2',
		8 => 'Diploma 3',
		9 => 'Bachelor Degree',
		10 => 'Phd',
);

$array_parent_job =  array(
		0 => '',
		1 => 'Unemployed',
		2 => 'Fisherman',
		3 => 'Farmer',
		4 => 'Breeder',
		5 => 'Government Officer/Military Officer',
		6 => 'Employee',
		7 => 'Small Business Owner',
		8 => 'Large Business Owner',
		9 => 'Employer',
		10 => 'Entrepreneur',
		11 => 'Laborer',
		12 => 'Retired',
		13 => 'Others',
);

$array_parent_income =  array(
		0 => '',
		1 => 'Less than Rp. 500.000 - Rp. 999.999',
		2 => 'Rp 1 Million - Rp 1.999.999',
		3 => 'Rp 2 Million - Rp 4.999.999',
		4 => 'Rp 5 Million - Rp 20 Million',
		5 => 'More than Rp 20 Million',
);
  
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
 
?>