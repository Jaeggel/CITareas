<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_data1()
    {
        $sql='SELECT count(*) as cont FROM tareas_finalizadas,tarea where tarea.id_tarea=tareas_finalizadas.id_tarea and tarea.grupo="Academico"';
        $query=$this->db->  query($sql);
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['cont'];
        return $var;
    }
    function get_data2()
    {
        $sql='select count(tarea.id_tarea)as cont from tarea left JOIN tareas_finalizadas t1 ON tarea.id_tarea = t1.id_tarea WHERE t1.id_tarea IS NULL and tarea.grupo="Academico"';
        $query=$this->db-> query($sql);
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['cont'];
        return $var;
    }
    function get_data3()
    {
        $sql='SELECT count(*) as cont FROM tareas_finalizadas,tarea where tarea.id_tarea=tareas_finalizadas.id_tarea and tarea.grupo="Domestico"';
        $query=$this->db->  query($sql);
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['cont'];
        return $var;
    }
    function get_data4()
    {
        $sql='select count(tarea.id_tarea)as cont from tarea left JOIN tareas_finalizadas t1 ON tarea.id_tarea = t1.id_tarea WHERE t1.id_tarea IS NULL and tarea.grupo="Domestico"';
        $query=$this->db-> query($sql);
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['cont'];
        return $var;
    }
    function get_data5()
    {
        $sql='SELECT count(*) as cont FROM tareas_finalizadas,tarea where tarea.id_tarea=tareas_finalizadas.id_tarea and tarea.grupo="Laboral"';
        $query=$this->db->  query($sql);
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['cont'];
        return $var;
    }
    function get_data6()
    {
        $sql='select count(tarea.id_tarea)as cont from tarea left JOIN tareas_finalizadas t1 ON tarea.id_tarea = t1.id_tarea WHERE t1.id_tarea IS NULL and tarea.grupo="Laboral"';
        $query=$this->db-> query($sql);
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['cont'];
        return $var;
    }
    function get_data7()
    {
        $sql='SELECT count(*) as cont FROM tareas_finalizadas,tarea where tarea.id_tarea=tareas_finalizadas.id_tarea and tarea.grupo="Otros"';
        $query=$this->db->  query($sql);
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['cont'];
        return $var;
    }
    function get_data8()
    {
        $sql='select count(tarea.id_tarea)as cont from tarea left JOIN tareas_finalizadas t1 ON tarea.id_tarea = t1.id_tarea WHERE t1.id_tarea IS NULL and tarea.grupo="Otros"';
        $query=$this->db-> query($sql);
        $temp=$query->result_array();
        $data = array_shift($temp);
        $var=$data['cont'];
        return $var;
    }
}