<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tree extends CI_Controller 
{

 public function index()
 {
  $data = [];
  $parent_key = 'parent_key'; // pass any key of the parent
  $row = $this->db->query('SELECT id, username from user WHERE parent_key="'.$parent_key.'"');
  
  if($row->num_rows() > 0)
  {
   $data = $this->members_tree($parent_key);
  }
  else
  {
   $data=["id"=>"0","name"=>"No Members presnt in list","text"=>"No Members is presnt in list","nodes"=>[]];
  }
  echo json_encode(array_values($data));
 }

 public function members_tree($parent_key)
 {
  $row1 = [];
  $row = $this->db->query('SELECT id, username from user WHERE parent_key="'.$parent_key.'"')->result_array();
  foreach($row as $key => $value)
        {
         $id = $value['id'];
         $row1[$key]['id'] = $value['id'];
         $row1[$key]['name'] = $value['username'];
         $row1[$key]['text'] = $value['username'];
         $row1[$key]['nodes'] = array_values($this->members_tree($value['id']));
        }
        return $row1;
 }

 function test($id_area){
  $paslon = $this->db->query("SELECT * FROM m_paslon where id_area = '$id_area' ")->result();
  $result = $this->db->query("SELECT * FROM (select a.id_area,a.id_parpol,b.kode_parpol,b.alias,b.picture, a.id_paslon ,c.nama_kepala,c.image_ketua,c.nama_wakil,c.image_wakil  from m_pengusung a inner join m_parpol b on a.id_parpol = b.id_parpol inner join m_paslon c on a.id_paslon = c.id_paslon where c.id_area = '$id_area') a inner join m_jumlah_kursi e on a.id_area = e.id_area")->result_array();
    $i=0;
    foreach ($result as $key => $value) {
      $data[$i]['parpol'] = $value['kode_parpol'];
      $j=1;
      foreach ($paslon as $value2) {
        $name = 'paslon'.$j;
        $name2 = 'jum'.$j;
        $id = $value2->id_paslon;

        $data[$i][$name] = $value2->nama_kepala;
        if(($data[$i]['parpol']==$value['kode_parpol']) and ($id==$value['id_paslon'])){
          if(isset($result[0][$value['kode_parpol']])) {
            $data[$i][$name2] = $result[0][$value['kode_parpol']];
          }else{
            $data[$i][$name2] = 0;
          } 
        }else{
          $data[$i][$name2] = 0;
        }
        
        $j++;
      }
      $i++;
    }
  return $data;
 }

}