<?php
App::uses('Component', 'Controller');

class ExcelReaderComponent extends Component {

    protected $PHPExcelReader; //variable to hold reference to the PHPExcel instance
    protected $PHPExcelLoaded = false;
    private $dataArray; // variable to hold data of the excel sheet.

    public function initialize(Controller $controller) {
        parent::initialize($controller);
        App::import('Vendor', 'PHPExcel'
            , array('file' => 'PHPExcel/PHPExcel.php'));
        if (!class_exists('PHPExcel'))
            throw new CakeException('Vendor class PHPExcel not found!');
        $dataArray = array();
    }

    public function loadExcelFile($filename) {
        $this->PHPExcelReader = PHPExcel_IOFactory::createReaderForFile($filename);
        $this->PHPExcelLoaded = true;
        $this->PHPExcelReader->setReadDataOnly(true);
        $excel = $this->PHPExcelReader->load($filename);
        $this->dataArray = $excel->getSheet(0)->toArray();
        return $this->dataArray;
    }

    public function format_date($date){
        return PHPExcel_Style_NumberFormat::toFormattedString($date,'YYYY-MM-DD' );
    }

    function export_excel($data, $bch, $zone, $qu, $pr, $st){
        $objPHPExcel = new PHPExcel();
        $collumn = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O");
        if(!empty($collumn)){
            foreach($collumn as $each_collumn){
                $objPHPExcel->getActiveSheet()->getColumnDimension("$each_collumn")->setAutoSize(true);
            }
        }
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getProperties()->setCreator("NASFAT")
            ->setLastModifiedBy("NASFAT")
            ->setTitle("NASFAT Members")
            ->setSubject("NASFAT Members")
            ->setDescription("NASFAT Members")
            ->setKeywords("NASFAT Members")
            ->setCategory("NASFAT Members");
        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", "Sn")
            ->setCellValue("B1", "Name")
            ->setCellValue("C1", "E-Mail")
            ->setCellValue("D1", "Age")
            ->setCellValue("E1", "Branch")
            ->setCellValue("F1", "Zone")
            ->setCellValue("G1", "Membership No")
            ->setCellValue("H1", "Phone")
            ->setCellValue("I1", "Occupation")
            ->setCellValue("J1", "Qualification")
            ->setCellValue("K1", "Gender")
            ->setCellValue("L1", "Marital Status")
            ->setCellValue("M1", "Membership Status")
            ->setCellValue("N1", "Registration Date")
        ;
        $i = 2;
        $sn=1;
        foreach($data as $each_data){
            $name = $each_data['PersonalProfile']['first_name'].', '.$each_data['PersonalProfile']['last_name'].' '.$each_data['PersonalProfile']['other_name'];
            $email = $each_data['PersonalProfile']['email'];
            $age = $each_data['PersonalProfile']['dob'];
            $brnch = $each_data['PersonalProfile']['branch_id'];
            $reg_no = $each_data['PersonalProfile']['reg_no'];
            $phone = $each_data['PersonalProfile']['phone'];
            if($each_data['PersonalProfile']['qual_id'] == NULL){
                $qual = $each_data['PersonalProfile']['qualification'];
            }else{
                $qual = $qu[$each_data['PersonalProfile']['qual_id']];
            }
            if($each_data['PersonalProfile']['prof_id'] == NULL){
                    $prof = $pr[$each_data['PersonalProfile']['profession']];
                   // $prof = $each_data['PersonalProfile']['profession'];
            }else{
                $prof = $pr[$each_data['PersonalProfile']['prof_id']];
            }
            $mar_stat = $each_data['PersonalProfile']['mar_status'];
            $mem_stat = $each_data['PersonalProfile']['membership_status_id'];
            $reg_date = $each_data['PersonalProfile']['created'];
            $sex = $each_data['PersonalProfile']['sex'];
            $zn = $each_data['PersonalProfile']['zone_id'];
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", "$sn")
                ->setCellValue("B$i", "$name")
                ->setCellValue("C$i", "$email")
                ->setCellValue("D$i", "$age")
                ->setCellValue("E$i", "$bch[$brnch]")
                ->setCellValue("F$i", "$zone[$zn]")
                ->setCellValue("G$i", "$reg_no")
                ->setCellValue("H$i", "$phone")
                ->setCellValue("I$i", "$prof")
                ->setCellValue("J$i", "$qual")
                ->setCellValue("K$i", "$sex")
                ->setCellValue("L$i", "$mar_stat")
                ->setCellValue("M$i", "$st[$mem_stat]")
                ->setCellValue("N$i", "$reg_date")
            ;
            $i++;
            $sn++;
        }
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle("NASFAT Members");

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Rirect output to a client"s web browser (Excel2007)
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=nasfat_members.xlsx");
        header("Cache-Control: max-age=0");

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        $objWriter->save("php://output");
        exit;
    }

}
?>