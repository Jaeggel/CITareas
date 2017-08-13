<?php
class Tasks_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        parent::__construct();
    }
    public function get_tasks($grupo=FALSE)
	{
        if($grupo=='Seleccionar Grupo...')
        {
            $sql='select * from tarea left JOIN tareas_finalizadas t1 ON tarea.id_tarea = t1.id_tarea WHERE t1.id_tarea IS NULL order by fecha_tarea asc';
        }else
        {
            $sql='select * from tarea left JOIN tareas_finalizadas t1 ON tarea.id_tarea = t1.id_tarea WHERE t1.id_tarea IS NULL and grupo=? order by fecha_tarea asc';    
        }
        
        $query=$this->db->  query($sql, array($grupo));
        return $query->result_array();
	}
    public function get_tfin()
    {
        
        $sql='SELECT tarea.id_tarea,fecha_tarea,nombre_tarea,prioridad,grupo FROM tareas_finalizadas,tarea where tarea.id_tarea=tareas_finalizadas.id_tarea';
        $query=$this->db->  query($sql);
        return $query->result_array();
    }
    ////listar todas las tareas para PDF
    public function getTodos()
    {
        $query=$this->db
                ->select("fecha_tarea,nombre_tarea,prioridad,grupo")
                ->from("tarea")
                ->order_by("fecha_tarea","asc")
                ->get();
        //echo $this->db->last_query();exit;        
        return $query->result();        
    }


    public function get_all()
    {
        
        $sql='select * from tarea left JOIN tareas_finalizadas t1 ON tarea.id_tarea = t1.id_tarea WHERE t1.id_tarea IS NULL order by fecha_tarea asc';
        $query=$this->db->  query($sql);
        return $query->result_array();
    }
	public function set_tasks()
    {
        $this->load->helper('url');

        $data = array(
            'nombre_tarea' => $this->input->post('nombre_tarea'),
            'fecha_tarea' => $this->input->post('fecha_tarea'),
            'prioridad' => $this->input->post('prioridad'),
            'grupo' => $this->input->post('grupo'),
            'detalle_tarea' => $this->input->post('detalle_tarea')
        );
        return $this->db->insert('tarea', $data);

    }
    public function eliminar($nom){
        $this->db->where('nombre_tarea',$nom);
        return $this->db->delete('tarea');

    }
    public function finalizar($nom)
    {
        $sql='SELECT id_tarea from tarea where nombre_tarea=?';
        $query=$this->db->  query($sql, array($nom));
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['id_tarea'];
        $fecha_actual = date("Y-m-d",time());
        $insert = array("fecha_final" => $fecha_actual,
        "id_tarea" => $var);
        return $this->db->insert("tareas_finalizadas",$insert);
    }
}