<?php
 include('includes/config.php');

	function generateRow($name,$section,$id,$con){
		$contents = '';
        $query = "SELECT * FROM signatory s INNER JOIN sections sec ON sec.section_id = s.section_id INNER JOIN department d ON d.department_id = s.department_id INNER JOIN faculties f ON f.faculty_id = s.faculty_id WHERE s.section_id = '$section' ORDER BY s.date_added ASC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $subject = $row['department_name'];
            $dept_id = $row['department_id'];
            $teacher = $row['first_name'] . ' ' . $row['last_name'];
            $get = mysqli_query($con, "SELECT * from clearances WHERE student_id = '$id' AND department_id = '$dept_id'");
            $get_row = mysqli_fetch_assoc($get);
            if (mysqli_num_rows($get) > 0) {
                $status = $get_row['status'];
            } else {
                $status = "N/A";
            }
                                                        if ($status == "0") {
                                                            $stat = "<span class='badge badge-danger bg-danger'>Not Cleared</span>";
                                                        } elseif ($status == "1") {
                                                            $stat = "<span class='badge badge-success bg-success'>Cleared</span>";
                                                        } else {
                                                            $stat =  "<span class='badge badge-warning bg-warning'>Not set</span>";
                                                        }
			$contents .= '
			<tr>
            <td>'.$subject.'</td>
            <td>'.$teacher.'</td>
            <td>'.$stat.'</td>
            <td>'.date("F d, Y",strtotime($row['date_added'])).'</td>
			</tr>
			';
		}

		return $contents;
	}

	if(isset($_POST['print'])){
		$name = $_POST['name'];
		$section = $_POST['section'];
		$id = $_POST['id'];
		$teacher = $_POST['teacher'];


		require_once('tcpdf/tcpdf.php');  
	    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	    $pdf->SetCreator(PDF_CREATOR);  
	    $pdf->SetTitle('Student Clearance: '.$name);  
	    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    $pdf->SetDefaultMonospacedFont('helvetica');  
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
	    $pdf->setPrintHeader(false);  
	    $pdf->setPrintFooter(false);  
	    $pdf->SetAutoPageBreak(TRUE, 10);  
	    $pdf->SetFont('helvetica', '', 11);  
	    $pdf->AddPage();  
	    $content = '';  
	    $content .= '
	      	<h2 align="center">STUDENT\'S CLEARANCE </h2>
	      	<h4 align="center">Department of Education</h4>
	      	<h4 align="center">Region X</h4>
	      	<h4 align="center">Division of Cagayan De Oro City</h4>
	      	<h4 align="center">CARMEN NATIONAL HIGH SCHOOL</h4>
	      	<h4 align="center">Macanhan, Carmen Cagayan De Oro City</h4>
	      	<h4>Name: '.$name.'</h4>
	      	<table border="1" cellspacing="0" cellpadding="3">  
	           <tr>  
	           		<th width="15%" align="center"><b>SUBJECTS</b></th>
	                <th width="40%" align="center"><b>TEACHER</b></th>
					<th width="20%" align="center"><b>STATUS</b></th>
					<th width="20%" align="center"><b>DATE</b></th>  
	           </tr>  
	      ';  
	    $content .= generateRow($name,$section,$id,$con);  
	    $content .= '</table>';  
	    $content .= '
		<br><br>
		<h4 align="left">'.$teacher.'</h2>
		<h4 align="left">ADVISER </h2><br><br>
		<h4 align="right">JERSON B. HERRERO</h2>
		<h4 align="right">Principal</h2>
		';  
	    $pdf->writeHTML($content);  
		ob_end_clean();
	    $pdf->Output('clearance.pdf', 'I');

	    $pdo->close();

	}
	else{
		header('location: clearance.php');
	}
