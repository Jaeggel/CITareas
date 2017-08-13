<?php
class Tasks extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('tasks_model');
                $this->load->model('data');
                $this->load->helper('url_helper');
                $this->load->helper('url');     
        }
        public function about()
        {
                $data['title'] = 'Acerca De';
                $this->load->view('templates/header', $data);
                $this->load->view('tasks/about', $data);
                $this->load->view('templates/footer');      
        }
        public function consulta($grupo = NULL)
        {
                $id=$this->input->post('id');
                $data['tasks'] = $this->tasks_model->get_tasks($id);
                $this->load->view('tasks/consulta', $data);

        }
        public function consultatf()
        {

                $data['tasks'] = $this->tasks_model->get_tfin();
                $this->load->view('tasks/consultatf', $data);

        }
        public function consultaAll()
        {

                $data['tasks'] = $this->tasks_model->get_all();
                $this->load->view('tasks/consultaAll', $data);

        }
        public function index()
        {
                
                $data['tasks'] = $this->tasks_model->get_tasks();
                $data['title'] = 'Lista de Tareas';

                $this->load->view('templates/header', $data);
                $this->load->view('tasks/index', $data);
                $this->load->view('templates/footer');      
        }
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Crear Nueva Tarea';

            $this->form_validation->set_rules('nombre_tarea', 'Nombre_tarea', 'required');
            $this->form_validation->set_rules('fecha_tarea', 'Fecha_tarea', 'required');
            $this->form_validation->set_rules('prioridad', 'Prioridad', 'required');
            $this->form_validation->set_rules('grupo', 'Grupo', 'required');
            $this->form_validation->set_rules('detalle_tarea', 'Detalle_Tarea', 'required');


            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('tasks/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->tasks_model->set_tasks();
                //$this->load->view('news/success');
                echo "<script> 
                alert('Tarea Agregada...'); 
                window.location.assign('".site_url("/tasks")."')
                </script>";
            }
        }
        public function data()
        {
            
            $data = $this->data->get_data1();
            $data2 = $this->data->get_data2();
            $data3 = $this->data->get_data3();
            $data4 = $this->data->get_data4();
            $data5 = $this->data->get_data5();
            $data6 = $this->data->get_data6();
            $data7 = $this->data->get_data7();
            $data8 = $this->data->get_data8();

            $series1 = array();
            $series1['name'] = 'Finalizadas';
            
            $series2 = array();
            $series2['name'] = 'Pendientes';
            
            $series1['data'][] = $data;
            $series1['data'][] = $data3;
            $series1['data'][] = $data5;
            $series1['data'][] = $data7;
            $series2['data'][] = $data2;
            $series2['data'][] = $data4;
            $series2['data'][] = $data6;
            $series2['data'][] = $data8;
            
            $result = array();
            array_push($result,$series1);
            array_push($result,$series2);
            //array_push($result,$series3);
            
            print json_encode($result, JSON_NUMERIC_CHECK);
        }
    
   
        public function eliminar(){
            $nom_tarea=$_POST['nombre_tarea'];
            $this->tasks_model->eliminar($nom_tarea);

        }
        public function finalizar(){
            $nom_tarea=$_POST['nombre_tarea'];
            $this->tasks_model->finalizar($nom_tarea);

        }

        public function pdf()//para imprimir reporte PDF
    {
        $datos=$this->tasks_model->getTodos();
        //$html='';
        $html.='<h1>Listado de Tareas</h1><br /><hr />';
        
        $html.=
        '
            <table class="table table-bordered">
    <tr bgcolor="#FF431a5d">
        <td><strong>FECHA</strong></td>
        <td><strong>NOMBRE</strong></td>
        <td><strong>PRIORIDAD</strong></td>
        <td><strong>GRUPO</strong></td>
        
    </tr>
    
        ';
        //construir la estructura dinámica del PDF
        foreach($datos as $dato)
        {
              $html.=
              '
              <tr>
                    <td >'.$dato->fecha_tarea.'</td>
                    <td>'.$dato->nombre_tarea.'</td>
                    <td>'.$dato->prioridad.'</td>
                    <td>'.$dato->grupo.'</td>
              </tr>
              ';          
        }
        
        $html.='</table>';
        $estilos=file_get_contents(base_url("assets/css/bootstrap.css"));
        $this->mpdf->setDisplayMode('fullpage');
        $this->mpdf->WriteHTML($estilos,1);
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output();
        exit;
    }

    public function excel()//para imprimir reporte excel
    {
        $this->phpexcel->getProperties()
                       ->setTitle('Reporte Excel')
                       ->setDescription('Reporte de Tareas');
        $datos=$this->tasks_model->getTodos();
        $sheet=$this->phpexcel->getActiveSheet();
        $sheet->setTitle('Tareas');
        $tituloReporte = "Relación de Tareas por Fecha";               
        
        //generamos la primera fila
        $sheet->setCellValue("B1",$tituloReporte);
        $sheet->setCellValue("A3","FECHA");
        $sheet->setCellValue("B3","NOMBRE");
        $sheet->setCellValue("C3","PRIORIDAD");
        $sheet->setCellValue("D3","GRUPO");
        
        //generamos las demás fila de acuerdo a los registros que tenemos en la tabla de mysql
        $i=4;
        foreach($datos as $dato)
        {
            $sheet->setCellValue("A".$i,$dato->fecha_tarea);
            $sheet->setCellValue("B".$i,$dato->nombre_tarea);
            $sheet->setCellValue("C".$i,$dato->prioridad);
            $sheet->setCellValue("D".$i,$dato->grupo);
            $i++;
        }


        $estiloTituloReporte = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,
                'italic'    => false,
                'strike'    => false,
                'size' =>16,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
            ),
            'fill' => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'FF000080')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_NONE                    
                )
            ), 
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation'   => 0,
                    'wrap'          => TRUE
            )
        );

        $estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Calibri',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'rgb' => 'FFFFFF'
                ),
                'endcolor'   => array(
                    'argb' => 'FFFFFF'
                )
            ),
            'borders' => array(
                'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                )
            ),
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => TRUE
            ));
            
        $estiloInformacion = new PHPExcel_Style();
        $estiloInformacion->applyFromArray(
            array(
                'font' => array(
                'name'      => 'times',               
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                'color'     => array('rgb' => 'FFFFFF')
            ),
            'borders' => array(
                'left'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN ,
                    'color' => array(
                        'rgb' => '000000    '
                    )
                )             
            )
        ));
         
        $sheet->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
        $sheet->getStyle('A3:D3')->applyFromArray($estiloTituloColumnas);       
        $sheet->setSharedStyle($estiloInformacion, "A4:D".($i-1));
                
        for($i = 'A'; $i <= 'D'; $i++){
            $this->phpexcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(TRUE);
        }



        //generar la renderización del documento excel
        header("Content-Type: application/vnd.ms-excel");
        $nombre="ReporteTareas";
        header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
        header("Cache-Control: max-age=0");
        $writer=PHPExcel_IOFactory::createWriter($this->phpexcel,"Excel5");
        ob_end_clean();
        ob_start();
        $writer->save("php://output");  
        exit;
    }

}
        