<?php

 require 'desc.php';
 require 'priority.php';
 use inspection_report\ec_desc as desc;
 use inspection_report\priority as p;
?>
<style>
  .section-header1{
        grid-column: 1 / -1;
    padding: 1rem;
  }
  .section-header{
       text-align: center;
  }
</style>

<div class="table-container">

 <!-- Add button -->
 <button class="btn tool-bar__button btn--crud" onclick="addRow()"><i class="fa fa-plus"></i></button>
<!-- Add button end -->
<!-- table -->
 <table id="main-table">
    <tr>
      <th>Actions</th>
      <th>FORM ID</th>
      <th>TYPE</th>
      <th>GRADE</th>
      <th>EQUIPMENT TAG NO</th>
      <th>FACILITY DESCRIPTION</th>
      <th>EQUIPMENT DESCRIPTION</th>
      <th>CERTIFICATE NO</th>
      <th>MANUFACTURER</th>
      <th>MODEL</th>
      <th>SERIAL NO</th>
      <th>PE/ID</th>
      <th>LOOP DRAWING</th>
      <th>AREA Zone</th>
      <th>AREA GROUP</th>
      <th>AREA TEMP CLASS</th>
      <th>AREA IP</th>
      <th>AMB TEMP MIN C</th>
      <th>AMB TEMP MAX C</th>
      <th>EX TECHNIQUE</th>
      <th>GROUP</th>
      <th>TEMP CLASS</th>
      <th>IP</th>
      <th>AMB TEMP MIN C</th>
      <th>AMB TEMP MAX C</th>
      <th>KW</th>
      <th>VOLTAGE</th>
      <th>AMPS</th>
      <th>FREQ<sub>(Hz)</sub></th>
      <th>RPM</th>
      <th>Ia/In</th>
      <th>t<sub>E(sec)</sub></th>
      <th>ISB MODEL</th>
      <th>ISB CERT NO.</th>
      <th>ISB LOOP CALC NO.</th>
      <th>SIMPLE DEVICE</th>
    </tr>
        <?php if(!empty($inspection_report)) : ?>
          <?php foreach($inspection_report as $i => $inspection_report) : ?>
                  <tr id="<?= $i ?>">
                    <td >
                      <a href="<?php echo base_url('/Dash/delete_inspection_report/'.$inspection_report['ID']) ?>" onclick="return confirm('Are you sure you want to delete this item')" class='btn btn--cru'><i class='fa fa-trash'></i></a>
                      <button class="btn btn--crud" onclick="editRow(<?= $i ?>)"><i class="fa fa-pencil"></i></button>
                      
                    </td>
                    <td style="display: none;" class="ID"><?= $inspection_report['ID'] ?></td>
                    <td class="form_id"><?= $inspection_report['form_id'] ?></td>
                    <td class="type"><?= $inspection_report['type'] ?></td>
                    <td class="grade"><?= $inspection_report['grade'] ?></td>
                    <td class="eq_tag"><?= $inspection_report['eq_tag'] ?></td>
                    <td class="facility_desc"><?= $inspection_report['facility_desc'] ?></td>
                    <td class="equipment_desc"><?= $inspection_report['equipment_desc'] ?></td>
                    <td class="certificate_no"><?= $inspection_report['certificate_no'] ?></td>
                    <td class="manufacturer"><?= $inspection_report['manufacturer'] ?></td>
                    <td class="model"><?= $inspection_report['model'] ?></td>
                    <td class="serial_no"><?= $inspection_report['serial_no'] ?></td>
                    <td class="pe_id"><?= $inspection_report['pe/id'] ?></td>
                    <td class="loop_drawing"><?= $inspection_report['loop_drawing'] ?></td>
                    <td class="area_zone"><?= $inspection_report['area_zone'] ?></td>
                    <td class="area_group"><?= $inspection_report['area_group'] ?></td>
                    <td class="area_temp_class"><?= $inspection_report['area_temp_class'] ?></td>
                    <td class="ex_ip"><?= $inspection_report['area_ip'] ?></td>
                    <td class="amb_temp_min_c"><?= $inspection_report['amb_temp_min_c'] ?></td>
                    <td class="amb_temp_max_c"><?= $inspection_report['amb_temp_max_c'] ?></td>
                    <td class="ex_technique"><?= $inspection_report['ex_technique'] ?></td>
                    <td class="ex_group"><?= $inspection_report['ex_group'] ?></td>
                    <td class="ex_temp_class"><?= $inspection_report['ex_temp_class'] ?></td>
                    <td class="ex_ip"><?= $inspection_report['ex_ip'] ?></td>
                    <td class="ex_amb_temp_min_c"><?= $inspection_report['ex_amb_temp_min_c'] ?></td>
                    <td class="ex_amb_temp_max_c"><?= $inspection_report['ex_amb_temp_max_c'] ?></td>
                    <td class="er_kw"><?= $inspection_report['er_kw'] ?></td>
                    <td class="er_voltage"><?= $inspection_report['er_voltage'] ?></td>
                    <td class="er_amps"><?= $inspection_report['er_amps'] ?></td>
                    <td class="er_hz"><?= $inspection_report['er_hz'] ?></td>
                    <td class="er_rpm"><?= $inspection_report['er_rpm'] ?></td>
                    <td class="er_la"><?= $inspection_report['er_la'] ?></td>
                    <td class="er_te"><?= $inspection_report['er_te'] ?></td>
                    <?php
                      for($j=1;$j<=55;$j++)
                      {
                        echo"<td class='ec".$j."_desc' style='display: none;'>".$inspection_report['ec'.$j.'_desc']."</td>
                        <td class='Priority".$j."' style='display: none;'>".$inspection_report['Priority'.$j.'']."</td>
                        <td class='ec".$j."_type' style='display: none;'>".$inspection_report['ec'.$j.'_type']."</td>
                        <td class='ec".$j."_comment'style='display: none;'>".$inspection_report['ec'.$j.'_comment']."</td>";
                      }
                    ?>
                    <td class="isb_model" ><?= $inspection_report['isb_model'] ?></td>
                    <td class="isb_cert" ><?= $inspection_report['isb_cert'] ?></td>
                    <td class="isb_loop" ><?= $inspection_report['isb_loop'] ?></td>
                    <td class="simple_device" ><?= $inspection_report['simple_device'] ?></td>
                  </tr> 
          <?php endforeach ?>
        <?php endif ?>    
  </table>
<!-- table end -->

<!-- Constant -->
<?php

$constant1 = desc\ec1_desc;
$priority1 = p\priority1;
$constant2 = desc\ec2_desc;
$priority2 = p\priority2;
$constant3 = desc\ec3_desc;
$priority3 = p\priority3;
$constant4 = desc\ec4_desc;
$priority4 = p\priority4;
$constant5 = desc\ec5_desc;
$priority5 = p\priority5;
$constant6 = desc\ec6_desc;
$priority6 = p\priority6;
$constant7 = desc\ec7_desc;
$priority7 = p\priority7;
$constant8 = desc\ec8_desc;
$priority8 = p\priority8;
$constant9 = desc\ec9_desc;
$priority9 = p\priority9;
$constant10 = desc\ec10_desc;
$priority10 = p\priority10;
$constant11 = desc\ec11_desc;
$priority11 = p\priority11;
$constant12 = desc\ec12_desc;
$priority12 = p\priority12;
$constant13 = desc\ec13_desc;
$priority13 = p\priority13;
$constant14 = desc\ec14_desc;
$priority14 = p\priority14;
$constant15 = desc\ec15_desc;
$priority15 = p\priority15;
$constant16 = desc\ec16_desc;
$priority16 = p\priority16;
$constant17 = desc\ec17_desc;
$priority17 = p\priority17;
$constant18 = desc\ec18_desc;
$priority18 = p\priority18;
$constant19 = desc\ec19_desc;
$priority19 = p\priority19;
$constant20 = desc\ec20_desc;
$priority20 = p\priority20;
$constant21 = desc\ec21_desc;
$priority21 = p\priority21;
$constant22 = desc\ec22_desc;
$priority22 = p\priority22;
$constant23 = desc\ec23_desc;
$priority23 = p\priority23;
$constant24 = desc\ec24_desc;
$priority24 = p\priority24;
$constant25 = desc\ec25_desc;
$priority25 = p\priority25;
$constant26 = desc\ec26_desc;
$priority26 = p\priority26;
$constant27 = desc\ec27_desc;
$priority27 = p\priority27;
$constant28 = desc\ec28_desc;
$priority28 = p\priority28;
$constant29 = desc\ec29_desc;
$priority29 = p\priority29;
$constant30 = desc\ec30_desc;
$priority30 = p\priority30;
$constant31 = desc\ec31_desc;
$priority31 = p\priority31;
$constant32 = desc\ec32_desc;
$priority32 = p\priority32;
$constant33 = desc\ec33_desc;
$priority33 = p\priority33;
$constant34 = desc\ec34_desc;
$priority34 = p\priority34;
$constant35 = desc\ec35_desc;
$priority35 = p\priority35;
$constant36 = desc\ec36_desc;
$priority36 = p\priority36;
$constant37 = desc\ec37_desc;
$priority37 = p\priority37;
$constant38 = desc\ec38_desc;
$priority38 = p\priority38;
$constant39 = desc\ec39_desc;
$priority39 = p\priority39;
$constant40 = desc\ec40_desc;
$priority40 = p\priority40;
$constant41 = desc\ec41_desc;
$priority41 = p\priority41;
$constant42 = desc\ec42_desc;
$priority42 = p\priority42;
$constant43 = desc\ec43_desc;
$priority43 = p\priority43;
$constant44 = desc\ec44_desc;
$priority44 = p\priority44;
$constant45 = desc\ec45_desc;
$priority45 = p\priority45;
$constant46 = desc\ec46_desc;
$priority46 = p\priority46;
$constant47 = desc\ec47_desc;
$priority47 = p\priority47;
$constant48 = desc\ec48_desc;
$priority48 = p\priority48;
$constant49 = desc\ec49_desc;
$priority49 = p\priority49;
$constant50 = desc\ec50_desc;
$priority50 = p\priority50;
$constant51 = desc\ec51_desc;
$priority51 = p\priority51;
$constant52 = desc\ec52_desc;
$priority52 = p\priority52;
$constant53 = desc\ec53_desc;
$priority53 = p\priority53;
$constant54 = desc\ec54_desc;
$priority54 = p\priority54;
$constant55 = desc\ec55_desc;
$priority55 = p\priority55;
?>
<!-- Constant end -->

<!-- ADDER FORM START -->

<div class="draggable-container hidden" id="add-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
    <form class="editor-form" action="<?= base_url() ?>/dash/add_inspection_report" method="POST" id="adder-form">
      <h3 class="section-header">INSPECTION DATA</h3>


    <div class="form-group">
        <label class="form-group__label" for="form_id">FORM ID</label>
        <input type="text" id="form_id1" name="form_id" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="type">TYPE</label>
        <select name='type' id="type_1">
            <option value="">Select Option</option>
            <option value='INITIAL'>INITIAL</option>
            <option value='PERIODIC'>PERIODIC</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-group__label" for="grade">GRADE</label>
       <select name='grade' id="grade1" onchange="grade_change()">
            <option value='DETAILED'>DETAILED</option>
            <option value='CLOSE'>CLOSE</option>
            <option value='VISUAL'>VISUAL</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-group__label" for="equipment_tag_no">EQUIPMENT TAG NO</label>
        <input type="text" id="equipment_tag_no1" name="equipment_tag_no" class="form-group__input">
    </div>

    <div class='form-group'>    
      <lable class="form-group__label" for="facility_description">FACILITY/LOCATION</lable>
      <input type='text' class='form-group__input' id="facility_description1" name='facility_description'>
    </div>

    <div class="form-group">
        <label class="form-group__label" for="Equipment_description">EQUIPMENT DESCRIPTION</label>
        <input type="text" id="Equipment_description1" name="Equipment_description" class="form-group__input">
    </div>    

    <div class="form-group">
        <label class="form-group__label" for="description">CERTIFICATE NO</label>
        <input type="text" id="certificate_no1" name="certificate_no" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="manufacturer">MANUFACTURER</label>
        <input type="text" id="manufacturer1" name="manufacturer" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="area">MODEL</label>
        <input type="text" id="model1" name="model" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="location">SERIAL NO</label>
        <input type="text" id="serial_no1" name="serial_no" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="location">P&ID</label>
        <input type="text" id="pe_id1" name="pe_id" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="location">LOOP DRAWING</label>
        <input type="text" id="loop_drawing1" name="loop_drawing" class="form-group__input">
    </div>

    <h3 class="section-header">HAC</h3>

    <div class='form-group'>
      <lable class="form-group__label" for="ex_technique">ZONE/EPL</lable>
        <select name='zone_epl' id="epl">
            <option value="">Select Option</option>
            <option value='0'>0</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='20'>20</option>
            <option value='21'>21</option>
            <option value='22'>22</option>
            <option value='EPZ0'>EPZ0</option>
            <option value='EPZ1'>EPZ1</option>
        </select>
    </div>
    <div class='form-group'>
      <lable class="form-group__label">GROUP</lable>
      <input type="hidden" name="h_group" id="h_group1">
      <select name='area_group' id="a_group">
     <option value="">Select Option</option>
     <option value='I'>I</option>
     <option value='IIA'>IIA</option>
     <option value='IIB'>IIB</option>
     <option value='IIC'>IIC</option>
     <option value='IIIA'>IIIA</option>
     <option value='IIIB'>IIIB</option>
     <option value='IIIC'>IIIC</option>
     </select>
  </div>
  <div class='form-group'>
      <lable class="form-group__label">TEMP CLASS</lable>
      <select name="area_temp_class" id="a_temp_class">
        <option value="">Select Option</option>
        <option value="T1">T1</option>
        <option value="T2">T2</option>
        <option value="T3">T3</option>
        <option value="T4">T4</option>
        <option value="T5">T5</option>
        <option value="T6">T6</option>
      </select>
  </div>
  <div class='form-group'>
      <lable class="form-group__label">IP</lable>
      <input type='text' class='form-group__input' id="area_ip1" name='area_ip' value="">
  </div>
  <div class='form-group'>
      <lable class="form-group__label">AMB TEMP MIN C</lable>
      <input type='text' class='form-group__input' id="amb_temp_min_c1" name='amb_temp_min_c' value="">
  </div>
  <div class='form-group'>
      <lable class="form-group__label">AMB TEMP MAX C</lable>
      <input type='text' class='form-group__input' id="amb_temp_max_c1" name='amb_temp_max_c' value="">
  </div>
    

    <h3 class="section-header">Ex Equipment</h3>

    <div class='form-group'>
      <lable class="form-group__label" for="ex_technique">EX TECHNIQUE</lable>
        <select name='ex_technique' class="form-group__ex_technique" id="e_technique" onchange="zone()">
            <option value="">Select Option</option>
            <option value='EXTRA Ex d CHECKS'>Ex d</option>
            <option value='EXTRA Ex e CHECKS'>Ex e</option>
            <option value='EXTRA Ex n CHECKS'>Ex n</option>
            <option value='EXTRA Ex i CHECKS'>Ex i</option>
        </select>
    </div>
  <div class='form-group'>
      <lable class="form-group__label" for="ex_group">GROUP</lable>
      <select name='ex_group' id="e_group">
       <option value="">Select Option</option>
       <option value='I'>I</option>
       <option value='IIA'>IIA</option>
       <option value='IIB'>IIB</option>
       <option value='IIC'>IIC</option>
       <option value='IIIA'>IIIA</option>
       <option value='IIIB'>IIIB</option>
       <option value='IIIC'>IIIC</option>
     </select>
  </div>
  <div class='form-group'>
      <lable class="form-group__label" for="ex_temp_class">TEMP CLASS</lable>
      <select name="ex_temp_class" id="e_temp_class">
        <option value="">Select Option</option>
        <option value="T1">T1</option>
        <option value="T2">T2</option>
        <option value="T3">T3</option>
        <option value="T4">T4</option>
        <option value="T5">T5</option>
        <option value="T6">T6</option>
      </select>
  </div>
  <div class='form-group'>
      <lable class="form-group__label">IP</lable>
      <input type='text' class='form-group__input' id="ex_ip1" name='ex_ip' value="">
  </div>
  <div class='form-group'>
      <lable class="form-group__label">AMB TEMP MIN C</lable>
      <input type='text' class='form-group__input' id="ex_amb_temp_min_c1" name='ex_amb_temp_min_c' value="">
  </div>
  <div class='form-group'>
      <lable class="form-group__label">AMB TEMP MAX C</lable>
      <input type='text' class='form-group__input' id="ex_amb_temp_max_c1" name='ex_amb_temp_max_c' value="">
  </div>

  <h3 class="section-header">Device Electrical Rating</h3>


    <div class="form-group">
      <label class="form-group__label" for="er_kw">KW</label>
      <input type="text" id="er_kw1" name="er_kw" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_voltage">VOLTAGE</label>
      <input type="text" id="er_voltage1" name="er_voltage" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_amps">AMPS</label>
      <input type="text" id="er_amps1" name="er_amps" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_hz">FREQ<sub>(Hz)</sub></label>
      <input type="text" id="er_hz1" name="er_hz" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_rpm">RPM</label>
      <input type="text" id="er_rpm1" name="er_rpm" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_la">Ia/In</label>
      <input type="text" id="er_la1" name="er_la" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_te">t<sub>E(sec)</sub></label>
      <input type="text" id="er_te1" name="er_te" class="form-group__input">
    </div>


<div class="section-header1">
    <h3 class="section-header">EXTERNAL CHECKS [PART A]</h3>
      <?php
        for($p=1;$p<=16;$p++)
        {
          echo"<div class='form-group'> 
            <lable style='width:30%;'> ".${'constant' . $p}."</lable>
            <textarea id='ec".$p."_desc' name='ec".$p."_desc' style='display: none;'>".${'constant' .$p}."</textarea>
            <textarea id='priority".$p."_a' name='priority".$p."' style='display: none;'>".${'priority' .$p}."</textarea>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_a'  value='3' checked='checked' style='display:none'>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_b'  value='0'>
            <label>OK</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_c'  value='1'>
            <label>NA</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_d' value='2'>
            <label>NC</label>
            <label>Comment</label>
            <textarea class='form-group__input' name='ec".$p."_comment' id='e".$p."_comment'></textarea>
          </div><br>";
        }
      ?>
</div><br>

  <div id="h1" class="section-header1" style="display: none">
    <h3 class="section-header">Ex d</h3>
      <?php
        for($p=17;$p<=21;$p++)
        {
          echo"<div class='form-group'> 
            <lable style='width:30%;'> ".${'constant' . $p}."</lable>
            <textarea id='ec".$p."_desc' name='ec".$p."_desc' style='display: none;'>".${'constant' .$p}."</textarea>
            <textarea id='priority".$p."_a' name='priority".$p."' style='display: none;'>".${'priority' .$p}."</textarea>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_a'  value='3' checked='checked' style='display:none'>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_b'  value='0'>
            <label>OK</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_c'  value='1'>
            <label>NA</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_d' value='2'>
            <label>NC</label>
            <label>Comment</label>
            <textarea class='form-group__input' name='ec".$p."_comment' id='e".$p."_comment'></textarea>
          </div><br>";
        }
        ?>
  </div><br>


  <div id="h2" class="section-header1" style="display: none">
    <h3 class="section-header">Ex e or Ex n</h3>

    <div class='form-group'>
        <lable style="width:30%;"><?php echo $constant22; ?></lable>
      <textarea id="ec22_desc" name="ec22_desc" style="display: none;"><?= $constant22 ?></textarea>
      <textarea id="priority22_a" name="priority22" style="display: none;"><?= $priority22; ?></textarea>
        <input type='radio' name='ec22_type' id="22_type_a" value='3' checked="checked" style="display: none">
        <input type='radio' name='ec22_type' id='22_type_b' value='0'>
        <label>OK</label>
        <input type='radio' name='ec22_type' id='22_type_c' value='1'>
        <label>NA</label>
        <input type='radio' name='ec22_type' id='22_type_d' value='2'>
        <label>NC</label>
    <label>Comment</label>
    <textarea class='form-group__input' name='ec22_comment' id="e22_comment"></textarea>
    </div>
  </div><br>


  <div id="h3" class="section-header1" style="display: none;">
    <h3 class="section-header">Ex i</h3>
    <?php
      for($p=23;$p<=24;$p++)
      {
        echo"<div class='form-group'> 
          <lable style='width:30%;'> ".${'constant' . $p}."</lable>
          <textarea id='ec".$p."_desc' name='ec".$p."_desc' style='display: none;'>".${'constant' .$p}."</textarea>
          <textarea id='priority".$p."_a' name='priority".$p."' style='display: none;'>".${'priority' .$p}."</textarea>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type_a'  value='3' checked='checked' style='display:none'>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type_b'  value='0'>
          <label>OK</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type_c'  value='1'>
          <label>NA</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type_d' value='2'>
          <label>NC</label>
          <label>Comment</label>
          <textarea class='form-group__input' name='ec".$p."_comment' id='e".$p."_comment'></textarea>
        </div><br>";
      }
  ?>
  </div><br>

  
  <div class="section-header1" id="internal">
    <h3 class="section-header">INTERNAL CHECKS (Only to be completed for detailed inspection) [PART B]</h3>
      <?php
        for($p=25;$p<=34;$p++)
        {
          echo"<div class='form-group'> 
            <lable style='width:30%;'> ".${'constant' . $p}."</lable>
            <textarea id='ec".$p."_desc' name='ec".$p."_desc' style='display: none;'>".${'constant' .$p}."</textarea>
            <textarea id='priority".$p."_a' name='priority".$p."' style='display: none;'>".${'priority' .$p}."</textarea>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_a'  value='3' checked='checked' style='display:none'>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_b'  value='0'>
            <label>OK</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_c'  value='1'>
            <label>NA</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_d' value='2'>
            <label>NC</label>
            <label>Comment</label>
            <textarea class='form-group__input' name='ec".$p."_comment' id='e".$p."_comment'></textarea>
          </div><br>";
        }
        ?>
  </div><br>


  <div class="section-header1" id="h4" style="display: none;">
    <h3 class="section-header">Ex d</h3>
      <?php
          for($p=35;$p<=37;$p++)
          {
            echo"<div class='form-group'> 
              <lable style='width:30%;'> ".${'constant' . $p}."</lable>
              <textarea id='ec".$p."_desc' name='ec".$p."_desc' style='display: none;'>".${'constant' .$p}."</textarea>
              <textarea id='priority".$p."_a' name='priority".$p."' style='display: none;'>".${'priority' .$p}."</textarea>
              <input type='radio' name='ec".$p."_type' id='ec".$p."_type_a'  value='3' checked='checked' style='display:none'>
              <input type='radio' name='ec".$p."_type' id='ec".$p."_type_b'  value='0'>
              <label>OK</label>
              <input type='radio' name='ec".$p."_type' id='ec".$p."_type_c'  value='1'>
              <label>NA</label>
              <input type='radio' name='ec".$p."_type' id='ec".$p."_type_d' value='2'>
              <label>NC</label>
              <label>Comment</label>
              <textarea class='form-group__input' name='ec".$p."_comment' id='e".$p."_comment'></textarea>
            </div><br>";
          }
        ?>
  </div><br>


  <div class="section-header1" id="h5" style="display: none;">
    <h3 class="section-header">Ex e</h3>
      <?php
        for($p=38;$p<=44;$p++)
        {
          echo"<div class='form-group'> 
            <lable style='width:30%;'> ".${'constant' . $p}."</lable>
            <textarea id='ec".$p."_desc' name='ec".$p."_desc' style='display: none;'>".${'constant' .$p}."</textarea>
            <textarea id='priority".$p."_a' name='priority".$p."' style='display: none;'>".${'priority' .$p}."</textarea>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_a'  value='3' checked='checked' style='display:none'>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_b'  value='0'>
            <label>OK</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_c'  value='1'>
            <label>NA</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_d' value='2'>
            <label>NC</label>
            <label>Comment</label>
            <textarea class='form-group__input' name='ec".$p."_comment' id='e".$p."_comment'></textarea>
          </div><br>";
        }
      ?>
  </div><br>


  <div class="section-header1" id="h6" style="display: none;">
    <h3 class="section-header">Ex n</h3>
      <?php
        for($p=45;$p<=47;$p++)
        {
          echo"<div class='form-group'> 
            <lable style='width:30%;'> ".${'constant' . $p}."</lable>
            <textarea id='ec".$p."_desc' name='ec".$p."_desc' style='display: none;'>".${'constant' .$p}."</textarea>
            <textarea id='priority".$p."_a' name='priority".$p."' style='display: none;'>".${'priority' .$p}."</textarea>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_a'  value='3' checked='checked' style='display:none'>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_b'  value='0'>
            <label>OK</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_c'  value='1'>
            <label>NA</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_d' value='2'>
            <label>NC</label>
            <label>Comment</label>
            <textarea class='form-group__input' name='ec".$p."_comment' id='e".$p."_comment'></textarea>
          </div><br>";
        }
      ?>
  </div><br>


  <div class="section-header1" id="h7" style="display: none">
     <h3 class="section-header">Ex i</h3>
      <?php
        for($p=48;$p<=55;$p++)
        {
          echo"<div class='form-group'> 
            <lable style='width:30%;'> ".${'constant' . $p}."</lable>
            <textarea id='ec".$p."_desc' name='ec".$p."_desc' style='display: none;'>".${'constant' .$p}."</textarea>
            <textarea id='priority".$p."_a' name='priority".$p."' style='display: none;'>".${'priority' .$p}."</textarea>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_a'  value='3' checked='checked' style='display:none'>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_b'  value='0'>
            <label>OK</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_c'  value='1'>
            <label>NA</label>
            <input type='radio' name='ec".$p."_type' id='ec".$p."_type_d' value='2'>
            <label>NC</label>
            <label>Comment</label>
            <textarea class='form-group__input' name='ec".$p."_comment' id='e".$p."_comment'></textarea>
          </div><br>";
        }
      ?>
        <div class='form-group'>
          <lable class="form-group__label">ISB MODEL</lable>
          <input type='text' class='form-group__input' id="isb_model1" name='ISB_model' value="">
        </div>
        <div class='form-group'>
          <lable class="form-group__label">ISB CERT NO.</lable>
          <input type='text' class='form-group__input' id="isb_cert1" name='ISB_cert' value="">
        </div>
        <div class='form-group'>
          <lable class="form-group__label">ISB LOOP CALC NO.</lable>
          <input type='text' class='form-group__input' id="isb_loop1" name='ISB_LOOP' value="">
        </div>
        <div class='form-group'>
          <lable class="form-group__label">SIMPLE DEVICE [YES/NO]</lable>
          <select id="simple_device1" name='simple_device'>
             <option value="">Select Option</option>
             <option value='YES'>YES</option>
             <option value='NO'>NO</option>
          </select>
        </div>
  </div>

    <button type="submit" class="btn submit-btn section-header">ADD</button>
  </form>
</div>

<!-- Adder Form End -->

<!-- EDIT FORM START -->

<div class="draggable-container hidden" id="edit-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/update_inspection_report" method="POST" id="editor-form">

    <h3 class="section-header">Inspection Details</h3>

    <div class="form-group">
       <input type="hidden" id="eid-hook" name='ID'>
        <label class="form-group__label" for="form_id">FORM ID</label>
        <input type="text" id="form_id" name="form_id" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="type">TYPE</label>
        <input type="hidden" name="ex_type" id="type">
        <select name='type' id="ex_type">
            <option value="">Select Option</option>
            <option value='INITIAL'>INITIAL</option>
            <option value='PERIODIC'>PERIODIC</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-group__label" for="grade">GRADE</label>
        <input type="hidden" name="ex_grade" id="grade">
        <select name='grade' id="ex_grade" onchange="grade_change1()">
            <option value="">Select Option</option>
            <option value='DETAILED'>DETAILED</option>
            <option value='CLOSE'>CLOSE</option>
            <option value='VISUAL'>VISUAL</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-group__label" for="equipment_tag_no">EQUIPMENT TAG NO</label>
        <input type="text" id="equipment_tag_no" name="equipment_tag_no" class="form-group__input">
    </div>

    <div class='form-group'>    
      <lable class="form-group__label" for="facility_description">FACILITY/LOCATION</lable>
      <input type='text' class='form-group__input' id="facility_description" name='facility_description'>
  </div>

    <div class="form-group">
        <label class="form-group__label" for="Equipment_description">EQUIPMENT DESCRIPTION</label>
        <input type="text" id="Equipment_description" name="Equipment_description" class="form-group__input">
    </div>    

    <div class="form-group">
        <label class="form-group__label" for="description">CERTIFICATE NO</label>
        <input type="text" id="certificate_no" name="certificate_no" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="manufacturer">MANUFACTURER</label>
        <input type="text" id="manufacturer" name="manufacturer" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="area">MODEL</label>
        <input type="text" id="model" name="model" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label">SERIAL NO</label>
        <input type="text" id="serial_no" name="serial_no" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label">P&ID</label>
        <input type="text" id="pe_id" name="pe_id" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label">LOOP DRAWING</label>
        <input type="text" id="loop_drawing" name="loop_drawing" class="form-group__input">
    </div>

    <h3 class="section-header">HAC</h3>

    <div class='form-group'>
      <lable class="form-group__label" for="ex_technique">ZONE/EPL</lable>
        <input type="hidden" name="z_epl" id="z_epl">
        <select name='zone_epl' id="zone_epl">
            <option value="">Select Option</option>
            <option value='0'>0</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='20'>20</option>
            <option value='21'>21</option>
            <option value='22'>22</option>
            <option value='EPZ0'>EPZ0</option>
            <option value='EPZ1'>EPZ1</option>
        </select>
    </div>
    <div class='form-group'>
      <lable class="form-group__label">GROUP</lable>
      <input type="hidden" name="h_group" id="h_group">
      <select name='area_group' id="area_group">
     <option value="">Select Option</option>
     <option value='I'>I</option>
     <option value='IIA'>IIA</option>
     <option value='IIB'>IIB</option>
     <option value='IIC'>IIC</option>
     <option value='IIIA'>IIIA</option>
     <option value='IIIB'>IIIB</option>
     <option value='IIIC'>IIIC</option>
     </select>
  </div>
  <div class='form-group'>
      <lable class="form-group__label">TEMP CLASS</lable>
      <input type='hidden' class='form-group__input' id="h_temp_class" name='h_temp_class'>
      <select name="area_temp_class" id="area_temp_class">
        <option value="">Select Option</option>
        <option value="T1">T1</option>
        <option value="T2">T2</option>
        <option value="T3">T3</option>
        <option value="T4">T4</option>
        <option value="T5">T5</option>
        <option value="T6">T6</option>
      </select>
  </div>
  <div class='form-group'>
      <lable class="form-group__label">IP</lable>
      <input type='text' class='form-group__input' id="area_ip" name='area_ip' value="">
  </div>
  <div class='form-group'>
      <lable class="form-group__label">AMB TEMP MIN C</lable>
      <input type='text' class='form-group__input' id="amb_temp_min_c" name='amb_temp_min_c' value="">
  </div>
  <div class='form-group'>
      <lable class="form-group__label">AMB TEMP MAX C</lable>
      <input type='text' class='form-group__input' id="amb_temp_max_c" name='amb_temp_max_c' value="">
  </div>

    <h3 class="section-header">Ex Equipment</h3>

    <div class='form-group'>
      <lable class="form-group__label" for="ex_technique">EX TECHNIQUE</lable>
        <input type="hidden" name="technique" id="technique">
        <select name='ex_technique' class="form-group__ex_technique" id="ex_technique" onchange="zone1()">
            <option value="">Select Option</option>
            <option value='EXTRA Ex d CHECKS'>Ex d</option>
            <option value='EXTRA Ex e CHECKS'>Ex e</option>
            <option value='EXTRA Ex n CHECKS'>Ex n</option>
            <option value='EXTRA Ex i CHECKS'>Ex i</option>
        </select>
    </div>
  <div class='form-group'>
      <lable class="form-group__label" for="ex_group">GROUP</lable>
      <input type="hidden" name="group" id="group">
      <select name='ex_group' id="ex_group">
     <option value="">Select Option</option>
     <option value='I'>I</option>
     <option value='IIA'>IIA</option>
     <option value='IIB'>IIB</option>
     <option value='IIC'>IIC</option>
     <option value='IIIA'>IIIA</option>
     <option value='IIIB'>IIIB</option>
     <option value='IIIC'>IIIC</option>
     </select>
  </div>
  <div class='form-group'>
      <lable class="form-group__label" for="ex_temp_class">TEMP CLASS</lable>
      <input type='hidden' class='form-group__input' id="temp_class" name='temp_class'>
      <select name="ex_temp_class" id="ex_temp_class">
        <option value="">Select Option</option>
        <option value="T1">T1</option>
        <option value="T2">T2</option>
        <option value="T3">T3</option>
        <option value="T4">T4</option>
        <option value="T5">T5</option>
        <option value="T6">T6</option>
      </select>
  </div>
  <div class='form-group'>
      <lable class="form-group__label">IP</lable>
      <input type='text' class='form-group__input' id="ex_ip" name='ex_ip' value="">
  </div>
  <div class='form-group'>
      <lable class="form-group__label">AMB TEMP MIN C</lable>
      <input type='text' class='form-group__input' id="ex_amb_temp_min_c" name='ex_amb_temp_min_c' value="">
  </div>
  <div class='form-group'>
      <lable class="form-group__label">AMB TEMP MAX C</lable>
      <input type='text' class='form-group__input' id="ex_amb_temp_max_c" name='ex_amb_temp_max_c' value="">
  </div>

  <h3 class="section-header">Device Electrical Rating</h3>


    <div class="form-group">
      <label class="form-group__label" for="er_kw">KW</label>
      <input type="text" id="er_kw" name="er_kw" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_voltage">VOLTAGE</label>
      <input type="text" id="er_voltage" name="er_voltage" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_amps">AMPS</label>
      <input type="text" id="er_amps" name="er_amps" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_hz">FREQ<sub3>(Hz)</sub></label>
      <input type="text" id="er_hz" name="er_hz" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_rpm">RPM</label>
      <input type="text" id="er_rpm" name="er_rpm" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_la">Ia/In</label>
      <input type="text" id="er_la" name="er_la" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_te">t<sub>E(sec)</sub></label>
      <input type="text" id="er_te" name="er_te" class="form-group__input">
    </div>

<?php
  for($i=1;$i<=55;$i++)
  {
    echo"<input type='hidden' class='form-group__input' id='desc".$i."' name='desc".$i."' value=''>
      <input type='hidden' class='form-group__input' id='priority".$i."' name='priority".$i."' value=''>
      <input type='hidden' class='form-group__input' id='type".$i."' name='type".$i."' value=''>
      <input type='hidden' class='form-group__input' id='comment".$i."' name='comment".$i."' value=''>";  
  }
?>
  <input type='hidden' class='form-group__input' id='isb_m' name='isb_m' value=''>
  <input type='hidden' class='form-group__input' id='isb_c' name='isb_c' value=''>
  <input type='hidden' class='form-group__input' id='isb_l' name='isb_l' value=''>
  <input type='hidden' class='form-group__input' id='s_d' name='s_d' value=''>


  <div class="section-header1">
    <h3 class="section-header">EXTERNAL CHECKS [PART A]</h3>
      <?php
        for($p=1;$p<=16;$p++)
        {
          echo"<div class='form-group'>
        <lable style='width:30%;' id='e".$p."_desc'></lable>
        <input type='radio' name='ec".$p."_type' id='ec".$p."_type1' value='3' style='display: none'>
        <input type='radio' name='ec".$p."_type' id='ec".$p."_type2' value='0'>
        <label>OK</label>
        <input type='radio' name='ec".$p."_type' id='ec".$p."_type3' value='1'>
        <label>NA</label>
        <input type='radio' name='ec".$p."_type' id='ec".$p."_type4' value='2'>
        <label>NC</label>
    <label>Comment</label>
    <textarea class='form-group__input' name='ec".$p."_comment' id='ec".$p."_comment'></textarea>
    </div><br>";
        }
      ?> 
  </div><br>


  <div id="h8" class="section-header1" style="display: none">
    <h3 class="section-header">Ex d</h3>
      <?php
        for($p=17;$p<=21;$p++)
        {
          echo"<div class='form-group'>
        <lable style='width:30%;' id='e".$p."_desc'></lable>
        <input type='radio' name='ec".$p."_type' id='ec".$p."_type1' value='3' style='display: none'>
        <input type='radio' name='ec".$p."_type' id='ec".$p."_type2' value='0'>
        <label>OK</label>
        <input type='radio' name='ec".$p."_type' id='ec".$p."_type3' value='1'>
        <label>NA</label>
        <input type='radio' name='ec".$p."_type' id='ec".$p."_type4' value='2'>
        <label>NC</label>
    <label>Comment</label>
    <textarea class='form-group__input' name='ec".$p."_comment' id='ec".$p."_comment'></textarea>
    </div><br>";
        }
      ?> 
  </div><br>


  <div id="h9" class="section-header1" style="display: none">
    <h3 class="section-header">Ex e or Ex n</h3>

    <div class='form-group'>     
        <lable style="width:30%;" id="e22_desc"></lable>
        <input type='radio' name='ec22_type' id="ec22_type1" value='3' style="display: none">
        <input type='radio' name='ec22_type' id='ec22_type2' value='0'>
        <label>OK</label>
        <input type='radio' name='ec22_type' id='ec22_type3' value='1'>
        <label>NA</label>
        <input type='radio' name='ec22_type' id='ec22_type4' value='2'>
        <label>NC</label>
    <label>Comment</label>  
    <textarea class='form-group__input' name='ec22_comment' id="ec22_comment"></textarea>
    </div>
  </div><br>


  <div id="h10" class="section-header1" style="display: none;">
     <h3 class="section-header">Ex i</h3>
      <?php
        for($p=23;$p<=24;$p++)
        {
          echo"<div class='form-group'>
          <lable style='width:30%;' id='e".$p."_desc'></lable>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type1' value='3' style='display: none'>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type2' value='0'>
          <label>OK</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type3' value='1'>
          <label>NA</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type4' value='2'>
          <label>NC</label>
          <label>Comment</label>
          <textarea class='form-group__input' name='ec".$p."_comment' id='ec".$p."_comment'></textarea>
          </div><br>";
        }
      ?> 
  </div><br>


  <div class="section-header1" id="internal1">
    <h3 class="section-header">INTERNAL CHECKS (Only to be completed for detailed inspection) [PART B]</h3>
      <?php
        for($p=25;$p<=34;$p++)
        {
          echo"<div class='form-group'>
          <lable style='width:30%;' id='e".$p."_desc'></lable>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type1' value='3' style='display: none'>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type2' value='0'>
          <label>OK</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type3' value='1'>
          <label>NA</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type4' value='2'>
          <label>NC</label>
          <label>Comment</label>
          <textarea class='form-group__input' name='ec".$p."_comment' id='ec".$p."_comment'></textarea>
          </div><br>";
        }
      ?> 
  </div><br>


  <div class="section-header1" id="h11" style="display: none;">
    <h3 class="section-header">Ex d</h3>
      <?php
        for($p=35;$p<=37;$p++)
        {
          echo"<div class='form-group'>
          <lable style='width:30%;' id='e".$p."_desc'></lable>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type1' value='3' style='display: none'>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type2' value='0'>
          <label>OK</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type3' value='1'>
          <label>NA</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type4' value='2'>
          <label>NC</label>
          <label>Comment</label>
          <textarea class='form-group__input' name='ec".$p."_comment' id='ec".$p."_comment'></textarea>
          </div><br>";
        }
      ?> 
  </div><br>


  <div class="section-header1" id="h12" style="display: none;">
    <h3 class="section-header">Ex e</h3>
      <?php
        for($p=38;$p<=44;$p++)
        {
          echo"<div class='form-group'>
          <lable style='width:30%;' id='e".$p."_desc'></lable>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type1' value='3' style='display: none'>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type2' value='0'>
          <label>OK</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type3' value='1'>
          <label>NA</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type4' value='2'>
          <label>NC</label>
          <label>Comment</label>
          <textarea class='form-group__input' name='ec".$p."_comment' id='ec".$p."_comment'></textarea>
          </div><br>";
        }
      ?> 
  </div><br>


  <div class="section-header1" id="h13" style="display: none;">
    <h3 class="section-header">Ex n</h3>
      <?php
        for($p=45;$p<=47;$p++)
        {
          echo"<div class='form-group'>
          <lable style='width:30%;' id='e".$p."_desc'></lable>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type1' value='3' style='display: none'>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type2' value='0'>
          <label>OK</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type3' value='1'>
          <label>NA</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type4' value='2'>
          <label>NC</label>
          <label>Comment</label>
          <textarea class='form-group__input' name='ec".$p."_comment' id='ec".$p."_comment'></textarea>
          </div><br>";
        }
      ?> 
  </div><br>

  <div class="section-header1" id="h14" style="display: none">
     <h3 class="section-header">Ex i</h3>
      <?php
        for($p=48;$p<=55;$p++)
        {
          echo"<div class='form-group'>
          <lable style='width:30%;' id='e".$p."_desc'></lable>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type1' value='3' style='display: none'>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type2' value='0'>
          <label>OK</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type3' value='1'>
          <label>NA</label>
          <input type='radio' name='ec".$p."_type' id='ec".$p."_type4' value='2'>
          <label>NC</label>
          <label>Comment</label>
          <textarea class='form-group__input' name='ec".$p."_comment' id='ec".$p."_comment'></textarea>
          </div><br>";
        }
      ?> 
      <div class='form-group'>
        <lable class="form-group__label">ISB MODEL</lable>
        <input type='text' class='form-group__input' id="isb_model" name='ISB_model' value="">
      </div>
      <div class='form-group'>
        <lable class="form-group__label">ISB CERT NO.</lable>
        <input type='text' class='form-group__input' id="isb_cert" name='ISB_cert' value="">
      </div>
        <div class='form-group'>
          <lable class="form-group__label">ISB LOOP CALC NO.</lable>
          <input type='text' class='form-group__input' id="isb_loop" name='ISB_LOOP' value="">
        </div>
        <div class='form-group'>
          <lable class="form-group__label">SIMPLE DEVICE [YES/NO]</lable>
          <select id="simple_device" name='simple_device'>
             <option value="">Select Option</option>
             <option value='YES'>YES</option>
             <option value='NO'>NO</option>
          </select>
        </div>
  </div><br>

    <button type="submit" class="btn submit-btn section-header">Update</button>
  </form>
</div>
</div>
<!-- <script>
  $('#import_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?= base_url() ?>/dash/add_inspection_report",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   beforeSend:function(){
    $('#import_csv_btn').html('Importing...');
   },
   success:function(data)
   {
    $('#import_csv')[0].reset();
    $('#import_csv_btn').attr('disabled', false);
    $('#import_csv_btn').html('Import Done');
    location.reload(true);
   }
  })
 });
</script> -->
<script>
const table = document.getElementById('main-table');
const addForm = document.getElementById('adder-form');
const editForm = document.getElementById('editor-form');
const editInputElements = editForm.getElementsByTagName('input');
const addInputElements = addForm.getElementsByTagName('input');
const equipmentId = document.getElementById('eid-hook');
const editPopBox = document.getElementById('edit-box');
const addPopBox = document.getElementById('add-box');
const lastModifiedBy = document.getElementById('last_modified_by');
const lastModifiedOn = document.getElementById('last_modified_on');
const closeButtons = document.getElementsByClassName('close');

function editRow(rowId) {
  const r = document.getElementById(rowId);
  const row = Array.from(r.children);
    let data = [];
    editPopBox.classList.remove('hidden');
    for (let element of row.slice(1,260)) {
       data.push(element.textContent)
    } 
    for (let [i, val] of data.entries()) {
        editInputElements[i].value = val;
    }
    const aZone = document.getElementById('zone_epl');
    const hac_t_class = document.getElementById('area_temp_class');
    const aGroup = document.getElementById('area_group');
    const type = document.getElementById('ex_type');
    const grade = document.getElementById('ex_grade');
    const exTech = document.getElementById('ex_technique');
    const exGroup = document.getElementById('ex_group');
    const ex_t_class = document.getElementById('ex_temp_class');
    const desc1 = document.getElementById('e1_desc');
    const e1_type1 = document.getElementById('ec1_type1');
    const e1_type2 = document.getElementById('ec1_type2');
    const e1_type3 = document.getElementById('ec1_type3');
    const e1_type4 = document.getElementById('ec1_type4');
    const e1_comment = document.getElementById('ec1_comment');
    const desc2 = document.getElementById('e2_desc');
    const e2_type1 = document.getElementById('ec2_type1');
    const e2_type2 = document.getElementById('ec2_type2');
    const e2_type3 = document.getElementById('ec2_type3');
    const e2_type4 = document.getElementById('ec2_type4');
    const e2_comment = document.getElementById('ec2_comment');
    const desc3 = document.getElementById('e3_desc');
    const e3_type1 = document.getElementById('ec3_type1');
    const e3_type2 = document.getElementById('ec3_type2');
    const e3_type3 = document.getElementById('ec3_type3');
    const e3_type4 = document.getElementById('ec3_type4');
    const e3_comment = document.getElementById('ec3_comment');
    const desc4 = document.getElementById('e4_desc');
    const e4_type1 = document.getElementById('ec4_type1');
    const e4_type2 = document.getElementById('ec4_type2');
    const e4_type3 = document.getElementById('ec4_type3');
    const e4_type4 = document.getElementById('ec4_type4');
    const e4_comment = document.getElementById('ec4_comment');
    const desc5 = document.getElementById('e5_desc');
    const e5_type1 = document.getElementById('ec5_type1');
    const e5_type2 = document.getElementById('ec5_type2');
    const e5_type3 = document.getElementById('ec5_type3');
    const e5_type4 = document.getElementById('ec5_type4');
    const e5_comment = document.getElementById('ec5_comment');
    const desc6 = document.getElementById('e6_desc');
    const e6_type1 = document.getElementById('ec6_type1');
    const e6_type2 = document.getElementById('ec6_type2');
    const e6_type3 = document.getElementById('ec6_type3');
    const e6_type4 = document.getElementById('ec6_type4');
    const e6_comment = document.getElementById('ec6_comment');
    const desc7 = document.getElementById('e7_desc');
    const e7_type1 = document.getElementById('ec7_type1');
    const e7_type2 = document.getElementById('ec7_type2');
    const e7_type3 = document.getElementById('ec7_type3');
    const e7_type4 = document.getElementById('ec7_type4');
    const e7_comment = document.getElementById('ec7_comment');
    const desc8 = document.getElementById('e8_desc');
    const e8_type1 = document.getElementById('ec8_type1');
    const e8_type2 = document.getElementById('ec8_type2');
    const e8_type3 = document.getElementById('ec8_type3');
    const e8_type4 = document.getElementById('ec8_type4');
    const e8_comment = document.getElementById('ec8_comment');
    const desc9 = document.getElementById('e9_desc');
    const e9_type1 = document.getElementById('ec9_type1');
    const e9_type2 = document.getElementById('ec9_type2');
    const e9_type3 = document.getElementById('ec9_type3');
    const e9_type4 = document.getElementById('ec9_type4');
    const e9_comment = document.getElementById('ec9_comment');
    const desc10 = document.getElementById('e10_desc');
    const e10_type1 = document.getElementById('ec10_type1');
    const e10_type2 = document.getElementById('ec10_type2');
    const e10_type3 = document.getElementById('ec10_type3');
    const e10_type4 = document.getElementById('ec10_type4');
    const e10_comment = document.getElementById('ec10_comment');
    const desc11 = document.getElementById('e11_desc');
    const e11_type1 = document.getElementById('ec11_type1');
    const e11_type2 = document.getElementById('ec11_type2');
    const e11_type3 = document.getElementById('ec11_type3');
    const e11_type4 = document.getElementById('ec11_type4');
    const e11_comment = document.getElementById('ec11_comment');
    const desc12 = document.getElementById('e12_desc');
    const e12_type1 = document.getElementById('ec12_type1');
    const e12_type2 = document.getElementById('ec12_type2');
    const e12_type3 = document.getElementById('ec12_type3');
    const e12_type4 = document.getElementById('ec12_type4');
    const e12_comment = document.getElementById('ec12_comment');
    const desc13 = document.getElementById('e13_desc');
    const e13_type1 = document.getElementById('ec13_type1');
    const e13_type2 = document.getElementById('ec13_type2');
    const e13_type3 = document.getElementById('ec13_type3');
    const e13_type4 = document.getElementById('ec13_type4');
    const e13_comment = document.getElementById('ec13_comment');
    const desc14 = document.getElementById('e14_desc');
    const e14_type1 = document.getElementById('ec14_type1');
    const e14_type2 = document.getElementById('ec14_type2');
    const e14_type3 = document.getElementById('ec14_type3');
    const e14_type4 = document.getElementById('ec14_type4');
    const e14_comment = document.getElementById('ec14_comment');
    const desc15 = document.getElementById('e15_desc');
    const e15_type1 = document.getElementById('ec15_type1');
    const e15_type2 = document.getElementById('ec15_type2');
    const e15_type3 = document.getElementById('ec15_type3');
    const e15_type4 = document.getElementById('ec15_type4');
    const e15_comment = document.getElementById('ec15_comment');
    const desc16 = document.getElementById('e16_desc');
    const e16_type1 = document.getElementById('ec16_type1');
    const e16_type2 = document.getElementById('ec16_type2');
    const e16_type3 = document.getElementById('ec16_type3');
    const e16_type4 = document.getElementById('ec16_type4');
    const e16_comment = document.getElementById('ec16_comment');
    const desc17 = document.getElementById('e17_desc');
    const e17_type1 = document.getElementById('ec17_type1');
    const e17_type2 = document.getElementById('ec17_type2');
    const e17_type3 = document.getElementById('ec17_type3');
    const e17_type4 = document.getElementById('ec17_type4');
    const e17_comment = document.getElementById('ec17_comment');
    const desc18 = document.getElementById('e18_desc');
    const e18_type1 = document.getElementById('ec18_type1');
    const e18_type2 = document.getElementById('ec18_type2');
    const e18_type3 = document.getElementById('ec18_type3');
    const e18_type4 = document.getElementById('ec18_type4');
    const e18_comment = document.getElementById('ec18_comment');
    const desc19 = document.getElementById('e19_desc');
    const e19_type1 = document.getElementById('ec19_type1');
    const e19_type2 = document.getElementById('ec19_type2');
    const e19_type3 = document.getElementById('ec19_type3');
    const e19_type4 = document.getElementById('ec19_type4');
    const e19_comment = document.getElementById('ec19_comment');
    const desc20 = document.getElementById('e20_desc');
    const e20_type1 = document.getElementById('ec20_type1');
    const e20_type2 = document.getElementById('ec20_type2');
    const e20_type3 = document.getElementById('ec20_type3');
    const e20_type4 = document.getElementById('ec20_type4');
    const e20_comment = document.getElementById('ec20_comment');
    const desc21 = document.getElementById('e21_desc');
    const e21_type1 = document.getElementById('ec21_type1');
    const e21_type2 = document.getElementById('ec21_type2');
    const e21_type3 = document.getElementById('ec21_type3');
    const e21_type4 = document.getElementById('ec21_type4');
    const e21_comment = document.getElementById('ec21_comment');
    const desc22 = document.getElementById('e22_desc');
    const e22_type1 = document.getElementById('ec22_type1');
    const e22_type2 = document.getElementById('ec22_type2');
    const e22_type3 = document.getElementById('ec22_type3');
    const e22_type4 = document.getElementById('ec22_type4');
    const e22_comment = document.getElementById('ec22_comment');
    const desc23 = document.getElementById('e23_desc');
    const e23_type1 = document.getElementById('ec23_type1');
    const e23_type2 = document.getElementById('ec23_type2');
    const e23_type3 = document.getElementById('ec23_type3');
    const e23_type4 = document.getElementById('ec23_type4');
    const e23_comment = document.getElementById('ec23_comment');
    const desc24 = document.getElementById('e24_desc');
    const e24_type1 = document.getElementById('ec24_type1');
    const e24_type2 = document.getElementById('ec24_type2');
    const e24_type3 = document.getElementById('ec24_type3');
    const e24_type4 = document.getElementById('ec24_type4');
    const e24_comment = document.getElementById('ec24_comment');
    const desc25 = document.getElementById('e25_desc');
    const e25_type1 = document.getElementById('ec25_type1');
    const e25_type2 = document.getElementById('ec25_type2');
    const e25_type3 = document.getElementById('ec25_type3');
    const e25_type4 = document.getElementById('ec25_type4');
    const e25_comment = document.getElementById('ec25_comment');
    const desc26 = document.getElementById('e26_desc');
    const e26_type1 = document.getElementById('ec26_type1');
    const e26_type2 = document.getElementById('ec26_type2');
    const e26_type3 = document.getElementById('ec26_type3');
    const e26_type4 = document.getElementById('ec26_type4');
    const e26_comment = document.getElementById('ec26_comment');
    const desc27 = document.getElementById('e27_desc');
    const e27_type1 = document.getElementById('ec27_type1');
    const e27_type2 = document.getElementById('ec27_type2');
    const e27_type3 = document.getElementById('ec27_type3');
    const e27_type4 = document.getElementById('ec27_type4');
    const e27_comment = document.getElementById('ec27_comment');
    const desc28 = document.getElementById('e28_desc');
    const e28_type1 = document.getElementById('ec28_type1');
    const e28_type2 = document.getElementById('ec28_type2');
    const e28_type3 = document.getElementById('ec28_type3');
    const e28_type4 = document.getElementById('ec28_type4');
    const e28_comment = document.getElementById('ec28_comment');
    const desc29 = document.getElementById('e29_desc');
    const e29_type1 = document.getElementById('ec29_type1');
    const e29_type2 = document.getElementById('ec29_type2');
    const e29_type3 = document.getElementById('ec29_type3');
    const e29_type4 = document.getElementById('ec29_type4');
    const e29_comment = document.getElementById('ec29_comment');
    const desc30 = document.getElementById('e30_desc');
    const e30_type1 = document.getElementById('ec30_type1');
    const e30_type2 = document.getElementById('ec30_type2');
    const e30_type3 = document.getElementById('ec30_type3');
    const e30_type4 = document.getElementById('ec30_type4');
    const e30_comment = document.getElementById('ec30_comment');
    const desc31 = document.getElementById('e31_desc');
    const e31_type1 = document.getElementById('ec31_type1');
    const e31_type2 = document.getElementById('ec31_type2');
    const e31_type3 = document.getElementById('ec31_type3');
    const e31_type4 = document.getElementById('ec31_type4');
    const e31_comment = document.getElementById('ec31_comment');
    const desc32 = document.getElementById('e32_desc');
    const e32_type1 = document.getElementById('ec32_type1');
    const e32_type2 = document.getElementById('ec32_type2');
    const e32_type3 = document.getElementById('ec32_type3');
    const e32_type4 = document.getElementById('ec32_type4');
    const e32_comment = document.getElementById('ec32_comment');
    const desc33 = document.getElementById('e33_desc');
    const e33_type1 = document.getElementById('ec33_type1');
    const e33_type2 = document.getElementById('ec33_type2');
    const e33_type3 = document.getElementById('ec33_type3');
    const e33_type4 = document.getElementById('ec33_type4');
    const e33_comment = document.getElementById('ec33_comment');
    const desc34 = document.getElementById('e34_desc');
    const e34_type1 = document.getElementById('ec34_type1');
    const e34_type2 = document.getElementById('ec34_type2');
    const e34_type3 = document.getElementById('ec34_type3');
    const e34_type4 = document.getElementById('ec34_type4');
    const e34_comment = document.getElementById('ec34_comment');
    const desc35 = document.getElementById('e35_desc');
    const e35_type1 = document.getElementById('ec35_type1');
    const e35_type2 = document.getElementById('ec35_type2');
    const e35_type3 = document.getElementById('ec35_type3');
    const e35_type4 = document.getElementById('ec35_type4');
    const e35_comment = document.getElementById('ec35_comment');
    const desc36 = document.getElementById('e36_desc');
    const e36_type1 = document.getElementById('ec36_type1');
    const e36_type2 = document.getElementById('ec36_type2');
    const e36_type3 = document.getElementById('ec36_type3');
    const e36_type4 = document.getElementById('ec36_type4');
    const e36_comment = document.getElementById('ec36_comment');
    const desc37 = document.getElementById('e37_desc');
    const e37_type1 = document.getElementById('ec37_type1');
    const e37_type2 = document.getElementById('ec37_type2');
    const e37_type3 = document.getElementById('ec37_type3');
    const e37_type4 = document.getElementById('ec37_type4');
    const e37_comment = document.getElementById('ec37_comment');
    const desc38 = document.getElementById('e38_desc');
    const e38_type1 = document.getElementById('ec38_type1');
    const e38_type2 = document.getElementById('ec38_type2');
    const e38_type3 = document.getElementById('ec38_type3');
    const e38_type4 = document.getElementById('ec38_type4');
    const e38_comment = document.getElementById('ec38_comment');
    const desc39 = document.getElementById('e39_desc');
    const e39_type1 = document.getElementById('ec39_type1');
    const e39_type2 = document.getElementById('ec39_type2');
    const e39_type3 = document.getElementById('ec39_type3');
    const e39_type4 = document.getElementById('ec39_type4');
    const e39_comment = document.getElementById('ec39_comment');
    const desc40 = document.getElementById('e40_desc');
    const e40_type1 = document.getElementById('ec40_type1');
    const e40_type2 = document.getElementById('ec40_type2');
    const e40_type3 = document.getElementById('ec40_type3');
    const e40_type4 = document.getElementById('ec40_type4');
    const e40_comment = document.getElementById('ec40_comment');
    const desc41 = document.getElementById('e41_desc');
    const e41_type1 = document.getElementById('ec41_type1');
    const e41_type2 = document.getElementById('ec41_type2');
    const e41_type3 = document.getElementById('ec41_type3');
    const e41_type4 = document.getElementById('ec41_type4');
    const e41_comment = document.getElementById('ec41_comment');
    const desc42 = document.getElementById('e42_desc');
    const e42_type1 = document.getElementById('ec42_type1');
    const e42_type2 = document.getElementById('ec42_type2');
    const e42_type3 = document.getElementById('ec42_type3');
    const e42_type4 = document.getElementById('ec42_type4');
    const e42_comment = document.getElementById('ec42_comment');
    const desc43 = document.getElementById('e43_desc');
    const e43_type1 = document.getElementById('ec43_type1');
    const e43_type2 = document.getElementById('ec43_type2');
    const e43_type3 = document.getElementById('ec43_type3');
    const e43_type4 = document.getElementById('ec43_type4');
    const e43_comment = document.getElementById('ec43_comment');
    const desc44 = document.getElementById('e44_desc');
    const e44_type1 = document.getElementById('ec44_type1');
    const e44_type2 = document.getElementById('ec44_type2');
    const e44_type3 = document.getElementById('ec44_type3');
    const e44_type4 = document.getElementById('ec44_type4');
    const e44_comment = document.getElementById('ec44_comment');
    const desc45 = document.getElementById('e45_desc');
    const e45_type1 = document.getElementById('ec45_type1');
    const e45_type2 = document.getElementById('ec45_type2');
    const e45_type3 = document.getElementById('ec45_type3');
    const e45_type4 = document.getElementById('ec45_type4');
    const e45_comment = document.getElementById('ec45_comment');
    const desc46 = document.getElementById('e46_desc');
    const e46_type1 = document.getElementById('ec46_type1');
    const e46_type2 = document.getElementById('ec46_type2');
    const e46_type3 = document.getElementById('ec46_type3');
    const e46_type4 = document.getElementById('ec46_type4');
    const e46_comment = document.getElementById('ec46_comment');
    const desc47 = document.getElementById('e47_desc');
    const e47_type1 = document.getElementById('ec47_type1');
    const e47_type2 = document.getElementById('ec47_type2');
    const e47_type3 = document.getElementById('ec47_type3');
    const e47_type4 = document.getElementById('ec47_type4');
    const e47_comment = document.getElementById('ec47_comment');
    const desc48 = document.getElementById('e48_desc');
    const e48_type1 = document.getElementById('ec48_type1');
    const e48_type2 = document.getElementById('ec48_type2');
    const e48_type3 = document.getElementById('ec48_type3');
    const e48_type4 = document.getElementById('ec48_type4');
    const e48_comment = document.getElementById('ec48_comment');
    const desc49 = document.getElementById('e49_desc');
    const e49_type1 = document.getElementById('ec49_type1');
    const e49_type2 = document.getElementById('ec49_type2');
    const e49_type3 = document.getElementById('ec49_type3');
    const e49_type4 = document.getElementById('ec49_type4');
    const e49_comment = document.getElementById('ec49_comment');
    const desc50 = document.getElementById('e50_desc');
    const e50_type1 = document.getElementById('ec50_type1');
    const e50_type2 = document.getElementById('ec50_type2');
    const e50_type3 = document.getElementById('ec50_type3');
    const e50_type4 = document.getElementById('ec50_type4');
    const e50_comment = document.getElementById('ec50_comment');
    const desc51 = document.getElementById('e51_desc');
    const e51_type1 = document.getElementById('ec51_type1');
    const e51_type2 = document.getElementById('ec51_type2');
    const e51_type3 = document.getElementById('ec51_type3');
    const e51_type4 = document.getElementById('ec51_type4');
    const e51_comment = document.getElementById('ec51_comment');
    const desc52 = document.getElementById('e52_desc');
    const e52_type1 = document.getElementById('ec52_type1');
    const e52_type2 = document.getElementById('ec52_type2');
    const e52_type3 = document.getElementById('ec52_type3');
    const e52_type4 = document.getElementById('ec52_type4');
    const e52_comment = document.getElementById('ec52_comment');
    const desc53 = document.getElementById('e53_desc');
    const e53_type1 = document.getElementById('ec53_type1');
    const e53_type2 = document.getElementById('ec53_type2');
    const e53_type3 = document.getElementById('ec53_type3');
    const e53_type4 = document.getElementById('ec53_type4');
    const e53_comment = document.getElementById('ec53_comment');
    const desc54 = document.getElementById('e54_desc');
    const e54_type1 = document.getElementById('ec54_type1');
    const e54_type2 = document.getElementById('ec54_type2');
    const e54_type3 = document.getElementById('ec54_type3');
    const e54_type4 = document.getElementById('ec54_type4');
    const e54_comment = document.getElementById('ec54_comment');
    const desc55 = document.getElementById('e55_desc');
    const e55_type1 = document.getElementById('ec55_type1');
    const e55_type2 = document.getElementById('ec55_type2');
    const e55_type3 = document.getElementById('ec55_type3');
    const e55_type4 = document.getElementById('ec55_type4');
    const e55_comment = document.getElementById('ec55_comment');
    const b_model = document.getElementById('isb_model');
    const b_cert = document.getElementById('isb_cert');
    const b_loop = document.getElementById('isb_loop');
    const s_device = document.getElementById('simple_device');
    aZone.value = r.getElementsByClassName('area_zone')[0].textContent;
    hac_t_class.value = r.getElementsByClassName('area_temp_class')[0].textContent;
    aGroup.value = r.getElementsByClassName('area_group')[0].textContent;
    type.value = r.getElementsByClassName('type')[0].textContent;
    grade.value = r.getElementsByClassName('grade')[0].textContent;
    exTech.value = r.getElementsByClassName('ex_technique')[0].textContent;
    exGroup.value = r.getElementsByClassName('ex_group')[0].textContent;
    ex_t_class.value = r.getElementsByClassName('ex_temp_class')[0].textContent;
    desc1.innerHTML = r.getElementsByClassName('ec1_desc')[0].textContent;
    desc2.innerHTML = r.getElementsByClassName('ec2_desc')[0].textContent;
    desc3.innerHTML = r.getElementsByClassName('ec3_desc')[0].textContent;
    desc4.innerHTML = r.getElementsByClassName('ec4_desc')[0].textContent;
    desc5.innerHTML = r.getElementsByClassName('ec5_desc')[0].textContent;
    desc6.innerHTML = r.getElementsByClassName('ec6_desc')[0].textContent;
    desc7.innerHTML = r.getElementsByClassName('ec7_desc')[0].textContent;
    desc8.innerHTML = r.getElementsByClassName('ec8_desc')[0].textContent;
    desc9.innerHTML = r.getElementsByClassName('ec9_desc')[0].textContent;
    desc10.innerHTML = r.getElementsByClassName('ec10_desc')[0].textContent;
    desc11.innerHTML = r.getElementsByClassName('ec11_desc')[0].textContent;
    desc12.innerHTML = r.getElementsByClassName('ec12_desc')[0].textContent;
    desc13.innerHTML = r.getElementsByClassName('ec13_desc')[0].textContent;
    desc14.innerHTML = r.getElementsByClassName('ec14_desc')[0].textContent;
    desc15.innerHTML = r.getElementsByClassName('ec15_desc')[0].textContent;
    desc16.innerHTML = r.getElementsByClassName('ec16_desc')[0].textContent;
    desc17.innerHTML = r.getElementsByClassName('ec17_desc')[0].textContent;
    desc18.innerHTML = r.getElementsByClassName('ec18_desc')[0].textContent;
    desc19.innerHTML = r.getElementsByClassName('ec19_desc')[0].textContent;
    desc20.innerHTML = r.getElementsByClassName('ec20_desc')[0].textContent;
    desc21.innerHTML = r.getElementsByClassName('ec21_desc')[0].textContent;
    desc22.innerHTML = r.getElementsByClassName('ec22_desc')[0].textContent;
    desc23.innerHTML = r.getElementsByClassName('ec23_desc')[0].textContent;
    desc24.innerHTML = r.getElementsByClassName('ec24_desc')[0].textContent;
    desc25.innerHTML = r.getElementsByClassName('ec25_desc')[0].textContent;
    desc26.innerHTML = r.getElementsByClassName('ec26_desc')[0].textContent;
    desc27.innerHTML = r.getElementsByClassName('ec27_desc')[0].textContent;
    desc28.innerHTML = r.getElementsByClassName('ec28_desc')[0].textContent;
    desc29.innerHTML = r.getElementsByClassName('ec29_desc')[0].textContent;
    desc30.innerHTML = r.getElementsByClassName('ec30_desc')[0].textContent;
    desc31.innerHTML = r.getElementsByClassName('ec31_desc')[0].textContent;
    desc32.innerHTML = r.getElementsByClassName('ec32_desc')[0].textContent;
    desc33.innerHTML = r.getElementsByClassName('ec33_desc')[0].textContent;
    desc34.innerHTML = r.getElementsByClassName('ec34_desc')[0].textContent;
    desc35.innerHTML = r.getElementsByClassName('ec35_desc')[0].textContent;
    desc36.innerHTML = r.getElementsByClassName('ec36_desc')[0].textContent;
    desc37.innerHTML = r.getElementsByClassName('ec37_desc')[0].textContent;
    desc38.innerHTML = r.getElementsByClassName('ec38_desc')[0].textContent;
    desc39.innerHTML = r.getElementsByClassName('ec39_desc')[0].textContent;
    desc40.innerHTML = r.getElementsByClassName('ec40_desc')[0].textContent;
    desc41.innerHTML = r.getElementsByClassName('ec41_desc')[0].textContent;
    desc42.innerHTML = r.getElementsByClassName('ec42_desc')[0].textContent;
    desc43.innerHTML = r.getElementsByClassName('ec43_desc')[0].textContent;
    desc44.innerHTML = r.getElementsByClassName('ec44_desc')[0].textContent;
    desc45.innerHTML = r.getElementsByClassName('ec45_desc')[0].textContent;
    desc46.innerHTML = r.getElementsByClassName('ec46_desc')[0].textContent;
    desc47.innerHTML = r.getElementsByClassName('ec47_desc')[0].textContent;
    desc48.innerHTML = r.getElementsByClassName('ec48_desc')[0].textContent;
    desc49.innerHTML = r.getElementsByClassName('ec49_desc')[0].textContent;
    desc50.innerHTML = r.getElementsByClassName('ec50_desc')[0].textContent;
    desc51.innerHTML = r.getElementsByClassName('ec51_desc')[0].textContent;
    desc52.innerHTML = r.getElementsByClassName('ec52_desc')[0].textContent;
    desc53.innerHTML = r.getElementsByClassName('ec53_desc')[0].textContent;
    desc54.innerHTML = r.getElementsByClassName('ec54_desc')[0].textContent;
    desc55.innerHTML = r.getElementsByClassName('ec55_desc')[0].textContent;
    if(r.getElementsByClassName('ec1_type')[0].textContent == "3")
    {
      e1_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec1_type')[0].textContent == "0")
    {
      e1_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec1_type')[0].textContent == "1")
    {
      e1_type3.checked =true;
    }
    else
    {
      e1_type4.checked =true;
    }

    if(r.getElementsByClassName('ec2_type')[0].textContent == "3")
    {
      e2_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec2_type')[0].textContent == "0")
    {
      e2_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec2_type')[0].textContent == "1")
    {
      e2_type3.checked =true;
    }
    else
    {
      e2_type4.checked =true;
    }

    if(r.getElementsByClassName('ec3_type')[0].textContent == "3")
    {
      e3_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec3_type')[0].textContent == "0")
    {
      e3_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec3_type')[0].textContent == "1")
    {
      e3_type3.checked =true;
    }
    else
    {
      e3_type4.checked =true;
    }

    if(r.getElementsByClassName('ec4_type')[0].textContent == "3")
    {
      e4_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec4_type')[0].textContent == "0")
    {
      e4_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec4_type')[0].textContent == "1")
    {
      e4_type3.checked =true;
    }
    else
    {
      e4_type4.checked =true;
    }

    if(r.getElementsByClassName('ec5_type')[0].textContent == "3")
    {
      e5_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec5_type')[0].textContent == "0")
    {
      e5_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec5_type')[0].textContent == "1")
    {
      e5_type3.checked =true;
    }
    else
    {
      e5_type4.checked =true;
    }

    if(r.getElementsByClassName('ec6_type')[0].textContent == "3")
    {
      e6_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec6_type')[0].textContent == "0")
    {
      e6_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec6_type')[0].textContent == "1")
    {
      e6_type3.checked =true;
    }
    else
    {
      e6_type4.checked =true;
    }

    if(r.getElementsByClassName('ec7_type')[0].textContent == "3")
    {
      e7_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec7_type')[0].textContent == "0")
    {
      e7_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec7_type')[0].textContent == "1")
    {
      e7_type3.checked =true;
    }
    else
    {
      e7_type4.checked =true;
    }

    if(r.getElementsByClassName('ec8_type')[0].textContent == "3")
    {
      e8_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec8_type')[0].textContent == "0")
    {
      e8_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec8_type')[0].textContent == "1")
    {
      e8_type3.checked =true;
    }
    else
    {
      e8_type4.checked =true;
    }

    if(r.getElementsByClassName('ec9_type')[0].textContent == "3")
    {
      e9_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec9_type')[0].textContent == "0")
    {
      e9_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec9_type')[0].textContent == "1")
    {
      e9_type3.checked =true;
    }
    else
    {
      e9_type4.checked =true;
    }

    if(r.getElementsByClassName('ec10_type')[0].textContent == "3")
    {
      e10_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec10_type')[0].textContent == "0")
    {
      e10_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec10_type')[0].textContent == "1")
    {
      e10_type3.checked =true;
    }
    else
    {
      e10_type4.checked =true;
    }

    if(r.getElementsByClassName('ec11_type')[0].textContent == "3")
    {
      e11_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec11_type')[0].textContent == "0")
    {
      e11_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec11_type')[0].textContent == "1")
    {
      e11_type3.checked =true;
    }
    else
    {
      e11_type4.checked =true;
    }

    if(r.getElementsByClassName('ec12_type')[0].textContent == "3")
    {
      e12_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec12_type')[0].textContent == "0")
    {
      e12_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec12_type')[0].textContent == "1")
    {
      e12_type3.checked =true;
    }
    else
    {
      e12_type4.checked =true;
    }

    if(r.getElementsByClassName('ec13_type')[0].textContent == "3")
    {
      e13_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec13_type')[0].textContent == "0")
    {
      e13_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec13_type')[0].textContent == "1")
    {
      e13_type3.checked =true;
    }
    else
    {
      e13_type4.checked =true;
    }

    if(r.getElementsByClassName('ec14_type')[0].textContent == "3")
    {
      e14_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec14_type')[0].textContent == "0")
    {
      e14_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec14_type')[0].textContent == "1")
    {
      e14_type3.checked =true;
    }
    else
    {
      e14_type4.checked =true;
    }

    if(r.getElementsByClassName('ec15_type')[0].textContent == "3")
    {
      e15_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec15_type')[0].textContent == "0")
    {
      e15_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec15_type')[0].textContent == "1")
    {
      e15_type3.checked =true;
    }
    else
    {
      e15_type4.checked =true;
    }

    if(r.getElementsByClassName('ec16_type')[0].textContent == "3")
    {
      e16_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec16_type')[0].textContent == "0")
    {
      e16_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec16_type')[0].textContent == "1")
    {
      e16_type3.checked =true;
    }
    else
    {
      e16_type4.checked =true;
    }

    if(r.getElementsByClassName('ec17_type')[0].textContent == "3")
    {
      e17_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec17_type')[0].textContent == "0")
    {
      e17_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec17_type')[0].textContent == "1")
    {
      e17_type3.checked =true;
    }
    else
    {
      e17_type4.checked =true;
    }

    if(r.getElementsByClassName('ec18_type')[0].textContent == "3")
    {
      e18_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec18_type')[0].textContent == "0")
    {
      e18_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec18_type')[0].textContent == "1")
    {
      e18_type3.checked =true;
    }
    else
    {
      e18_type4.checked =true;
    }

    if(r.getElementsByClassName('ec19_type')[0].textContent == "3")
    {
      e19_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec19_type')[0].textContent == "0")
    {
      e19_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec19_type')[0].textContent == "1")
    {
      e19_type3.checked =true;
    }
    else
    {
      e19_type4.checked =true;
    }

    if(r.getElementsByClassName('ec20_type')[0].textContent == "3")
    {
      e20_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec20_type')[0].textContent == "0")
    {
      e20_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec20_type')[0].textContent == "1")
    {
      e20_type3.checked =true;
    }
    else
    {
      e20_type4.checked =true;
    }

    if(r.getElementsByClassName('ec21_type')[0].textContent == "3")
    {
      e21_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec21_type')[0].textContent == "0")
    {
      e21_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec21_type')[0].textContent == "1")
    {
      e21_type3.checked =true;
    }
    else
    {
      e21_type4.checked =true;
    }

    if(r.getElementsByClassName('ec22_type')[0].textContent == "3")
    {
      e22_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec22_type')[0].textContent == "0")
    {
      e22_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec22_type')[0].textContent == "1")
    {
      e22_type3.checked =true;
    }
    else
    {
      e22_type4.checked =true;
    }

    if(r.getElementsByClassName('ec23_type')[0].textContent == "3")
    {
      e23_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec23_type')[0].textContent == "0")
    {
      e23_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec23_type')[0].textContent == "1")
    {
      e23_type3.checked =true;
    }
    else
    {
      e23_type4.checked =true;
    }

    if(r.getElementsByClassName('ec24_type')[0].textContent == "3")
    {
      e24_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec24_type')[0].textContent == "0")
    {
      e24_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec24_type')[0].textContent == "1")
    {
      e24_type3.checked =true;
    }
    else
    {
      e24_type4.checked =true;
    }

    if(r.getElementsByClassName('ec25_type')[0].textContent == "3")
    {
      e25_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec25_type')[0].textContent == "0")
    {
      e25_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec25_type')[0].textContent == "1")
    {
      e25_type3.checked =true;
    }
    else
    {
      e25_type4.checked =true;
    }

    if(r.getElementsByClassName('ec26_type')[0].textContent == "3")
    {
      e26_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec26_type')[0].textContent == "0")
    {
      e26_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec26_type')[0].textContent == "1")
    {
      e26_type3.checked =true;
    }
    else
    {
      e26_type4.checked =true;
    }

    if(r.getElementsByClassName('ec27_type')[0].textContent == "3")
    {
      e27_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec27_type')[0].textContent == "0")
    {
      e27_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec27_type')[0].textContent == "1")
    {
      e27_type3.checked =true;
    }
    else
    {
      e27_type4.checked =true;
    }

    if(r.getElementsByClassName('ec28_type')[0].textContent == "3")
    {
      e28_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec28_type')[0].textContent == "0")
    {
      e28_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec28_type')[0].textContent == "1")
    {
      e28_type3.checked =true;
    }
    else
    {
      e28_type4.checked =true;
    }

    if(r.getElementsByClassName('ec29_type')[0].textContent == "3")
    {
      e29_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec29_type')[0].textContent == "0")
    {
      e29_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec29_type')[0].textContent == "1")
    {
      e29_type3.checked =true;
    }
    else
    {
      e29_type4.checked =true;
    }

    if(r.getElementsByClassName('ec30_type')[0].textContent == "3")
    {
      e30_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec30_type')[0].textContent == "0")
    {
      e30_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec30_type')[0].textContent == "1")
    {
      e30_type3.checked =true;
    }
    else
    {
      e30_type4.checked =true;
    }

    if(r.getElementsByClassName('ec31_type')[0].textContent == "3")
    {
      e31_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec31_type')[0].textContent == "0")
    {
      e31_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec31_type')[0].textContent == "1")
    {
      e31_type3.checked =true;
    }
    else
    {
      e31_type4.checked =true;
    }

    if(r.getElementsByClassName('ec32_type')[0].textContent == "3")
    {
      e32_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec32_type')[0].textContent == "0")
    {
      e32_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec32_type')[0].textContent == "1")
    {
      e32_type3.checked =true;
    }
    else
    {
      e32_type4.checked =true;
    }

    if(r.getElementsByClassName('ec33_type')[0].textContent == "3")
    {
      e33_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec33_type')[0].textContent == "0")
    {
      e33_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec33_type')[0].textContent == "1")
    {
      e33_type3.checked =true;
    }
    else
    {
      e33_type4.checked =true;
    }

    if(r.getElementsByClassName('ec34_type')[0].textContent == "3")
    {
      e34_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec34_type')[0].textContent == "0")
    {
      e34_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec34_type')[0].textContent == "1")
    {
      e34_type3.checked =true;
    }
    else
    {
      e34_type4.checked =true;
    }

    if(r.getElementsByClassName('ec35_type')[0].textContent == "3")
    {
      e35_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec35_type')[0].textContent == "0")
    {
      e35_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec35_type')[0].textContent == "1")
    {
      e35_type3.checked =true;
    }
    else
    {
      e35_type4.checked =true;
    }

    if(r.getElementsByClassName('ec36_type')[0].textContent == "3")
    {
      e36_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec36_type')[0].textContent == "0")
    {
      e36_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec36_type')[0].textContent == "1")
    {
      e36_type3.checked =true;
    }
    else
    {
      e36_type4.checked =true;
    }

    if(r.getElementsByClassName('ec37_type')[0].textContent == "3")
    {
      e37_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec37_type')[0].textContent == "0")
    {
      e37_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec37_type')[0].textContent == "1")
    {
      e37_type3.checked =true;
    }
    else
    {
      e37_type4.checked =true;
    }

    if(r.getElementsByClassName('ec38_type')[0].textContent == "3")
    {
      e38_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec38_type')[0].textContent == "0")
    {
      e38_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec38_type')[0].textContent == "1")
    {
      e38_type3.checked =true;
    }
    else
    {
      e38_type4.checked =true;
    }

    if(r.getElementsByClassName('ec39_type')[0].textContent == "3")
    {
      e39_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec39_type')[0].textContent == "0")
    {
      e39_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec39_type')[0].textContent == "1")
    {
      e39_type3.checked =true;
    }
    else
    {
      e39_type4.checked =true;
    }

    if(r.getElementsByClassName('ec40_type')[0].textContent == "3")
    {
      e40_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec40_type')[0].textContent == "0")
    {
      e40_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec40_type')[0].textContent == "1")
    {
      e40_type3.checked =true;
    }
    else
    {
      e40_type4.checked =true;
    }

    if(r.getElementsByClassName('ec41_type')[0].textContent == "3")
    {
      e41_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec41_type')[0].textContent == "0")
    {
      e41_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec41_type')[0].textContent == "1")
    {
      e41_type3.checked =true;
    }
    else
    {
      e41_type4.checked =true;
    }

    if(r.getElementsByClassName('ec42_type')[0].textContent == "3")
    {
      e42_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec42_type')[0].textContent == "0")
    {
      e42_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec42_type')[0].textContent == "1")
    {
      e42_type3.checked =true;
    }
    else
    {
      e42_type4.checked =true;
    }

    if(r.getElementsByClassName('ec43_type')[0].textContent == "3")
    {
      e43_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec43_type')[0].textContent == "0")
    {
      e43_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec43_type')[0].textContent == "1")
    {
      e43_type3.checked =true;
    }
    else
    {
      e43_type4.checked =true;
    }

    if(r.getElementsByClassName('ec44_type')[0].textContent == "3")
    {
      e44_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec44_type')[0].textContent == "0")
    {
      e44_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec44_type')[0].textContent == "1")
    {
      e44_type3.checked =true;
    }
    else
    {
      e44_type4.checked =true;
    }

    if(r.getElementsByClassName('ec45_type')[0].textContent == "3")
    {
      e45_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec45_type')[0].textContent == "0")
    {
      e45_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec45_type')[0].textContent == "1")
    {
      e45_type3.checked =true;
    }
    else
    {
      e45_type4.checked =true;
    }

    if(r.getElementsByClassName('ec46_type')[0].textContent == "3")
    {
      e46_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec46_type')[0].textContent == "0")
    {
      e46_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec46_type')[0].textContent == "1")
    {
      e46_type3.checked =true;
    }
    else
    {
      e46_type4.checked =true;
    }

    if(r.getElementsByClassName('ec47_type')[0].textContent == "3")
    {
      e47_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec47_type')[0].textContent == "0")
    {
      e47_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec47_type')[0].textContent == "1")
    {
      e47_type3.checked =true;
    }
    else
    {
      e47_type4.checked =true;
    }

    if(r.getElementsByClassName('ec48_type')[0].textContent == "3")
    {
      e48_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec48_type')[0].textContent == "0")
    {
      e48_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec48_type')[0].textContent == "1")
    {
      e48_type3.checked =true;
    }
    else
    {
      e48_type4.checked =true;
    }

    if(r.getElementsByClassName('ec49_type')[0].textContent == "3")
    {
      e49_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec49_type')[0].textContent == "0")
    {
      e49_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec49_type')[0].textContent == "1")
    {
      e49_type3.checked =true;
    }
    else
    {
      e49_type4.checked =true;
    }

    if(r.getElementsByClassName('ec50_type')[0].textContent == "3")
    {
      e50_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec50_type')[0].textContent == "0")
    {
      e50_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec50_type')[0].textContent == "1")
    {
      e50_type3.checked =true;
    }
    else
    {
      e50_type4.checked =true;
    }

    if(r.getElementsByClassName('ec51_type')[0].textContent == "3")
    {
      e51_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec51_type')[0].textContent == "0")
    {
      e51_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec51_type')[0].textContent == "1")
    {
      e51_type3.checked =true;
    }
    else
    {
      e51_type4.checked =true;
    }

    if(r.getElementsByClassName('ec52_type')[0].textContent == "3")
    {
      e52_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec52_type')[0].textContent == "0")
    {
      e52_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec52_type')[0].textContent == "1")
    {
      e52_type3.checked =true;
    }
    else
    {
      e52_type4.checked =true;
    }

    if(r.getElementsByClassName('ec53_type')[0].textContent == "3")
    {
      e53_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec53_type')[0].textContent == "0")
    {
      e53_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec53_type')[0].textContent == "1")
    {
      e53_type3.checked =true;
    }
    else
    {
      e53_type4.checked =true;
    }

    if(r.getElementsByClassName('ec54_type')[0].textContent == "3")
    {
      e54_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec54_type')[0].textContent == "0")
    {
      e54_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec54_type')[0].textContent == "1")
    {
      e54_type3.checked =true;
    }
    else
    {
      e54_type4.checked =true;
    }

    if(r.getElementsByClassName('ec55_type')[0].textContent == "3")
    {
      e55_type1.checked =true;
    }
    else
    if(r.getElementsByClassName('ec55_type')[0].textContent == "0")
    {
      e55_type2.checked =true;
    }
    else
    if(r.getElementsByClassName('ec55_type')[0].textContent == "1")
    {
      e55_type3.checked =true;
    }
    else
    {
      e55_type4.checked =true;
    }
    e1_comment.value = r.getElementsByClassName('ec1_comment')[0].textContent;
    e2_comment.value = r.getElementsByClassName('ec2_comment')[0].textContent;
    e3_comment.value = r.getElementsByClassName('ec3_comment')[0].textContent;
    e4_comment.value = r.getElementsByClassName('ec4_comment')[0].textContent;
    e5_comment.value = r.getElementsByClassName('ec5_comment')[0].textContent;
    e6_comment.value = r.getElementsByClassName('ec6_comment')[0].textContent;
    e7_comment.value = r.getElementsByClassName('ec7_comment')[0].textContent;
    e8_comment.value = r.getElementsByClassName('ec8_comment')[0].textContent;
    e9_comment.value = r.getElementsByClassName('ec9_comment')[0].textContent;
    e10_comment.value = r.getElementsByClassName('ec10_comment')[0].textContent;
    e11_comment.value = r.getElementsByClassName('ec11_comment')[0].textContent;
    e12_comment.value = r.getElementsByClassName('ec12_comment')[0].textContent;
    e13_comment.value = r.getElementsByClassName('ec13_comment')[0].textContent;
    e14_comment.value = r.getElementsByClassName('ec14_comment')[0].textContent;
    e15_comment.value = r.getElementsByClassName('ec15_comment')[0].textContent;
    e16_comment.value = r.getElementsByClassName('ec16_comment')[0].textContent;
    e17_comment.value = r.getElementsByClassName('ec17_comment')[0].textContent;
    e18_comment.value = r.getElementsByClassName('ec18_comment')[0].textContent;
    e19_comment.value = r.getElementsByClassName('ec19_comment')[0].textContent;
    e20_comment.value = r.getElementsByClassName('ec20_comment')[0].textContent;
    e21_comment.value = r.getElementsByClassName('ec21_comment')[0].textContent;
    e22_comment.value = r.getElementsByClassName('ec22_comment')[0].textContent;
    e23_comment.value = r.getElementsByClassName('ec23_comment')[0].textContent;
    e24_comment.value = r.getElementsByClassName('ec24_comment')[0].textContent;
    e25_comment.value = r.getElementsByClassName('ec25_comment')[0].textContent;
    e26_comment.value = r.getElementsByClassName('ec26_comment')[0].textContent;
    e27_comment.value = r.getElementsByClassName('ec27_comment')[0].textContent;
    e28_comment.value = r.getElementsByClassName('ec28_comment')[0].textContent;
    e29_comment.value = r.getElementsByClassName('ec29_comment')[0].textContent;
    e30_comment.value = r.getElementsByClassName('ec30_comment')[0].textContent;
    e31_comment.value = r.getElementsByClassName('ec31_comment')[0].textContent;
    e32_comment.value = r.getElementsByClassName('ec32_comment')[0].textContent;
    e33_comment.value = r.getElementsByClassName('ec33_comment')[0].textContent;
    e34_comment.value = r.getElementsByClassName('ec34_comment')[0].textContent;
    e35_comment.value = r.getElementsByClassName('ec35_comment')[0].textContent;
    e36_comment.value = r.getElementsByClassName('ec36_comment')[0].textContent;
    e37_comment.value = r.getElementsByClassName('ec37_comment')[0].textContent;
    e38_comment.value = r.getElementsByClassName('ec38_comment')[0].textContent;
    e39_comment.value = r.getElementsByClassName('ec39_comment')[0].textContent;
    e40_comment.value = r.getElementsByClassName('ec40_comment')[0].textContent;
    e41_comment.value = r.getElementsByClassName('ec41_comment')[0].textContent;
    e42_comment.value = r.getElementsByClassName('ec42_comment')[0].textContent;
    e43_comment.value = r.getElementsByClassName('ec43_comment')[0].textContent;
    e44_comment.value = r.getElementsByClassName('ec44_comment')[0].textContent;
    e45_comment.value = r.getElementsByClassName('ec45_comment')[0].textContent;
    e46_comment.value = r.getElementsByClassName('ec46_comment')[0].textContent;
    e47_comment.value = r.getElementsByClassName('ec47_comment')[0].textContent;
    e48_comment.value = r.getElementsByClassName('ec48_comment')[0].textContent;
    e49_comment.value = r.getElementsByClassName('ec49_comment')[0].textContent;
    e50_comment.value = r.getElementsByClassName('ec50_comment')[0].textContent;
    e51_comment.value = r.getElementsByClassName('ec51_comment')[0].textContent;
    e52_comment.value = r.getElementsByClassName('ec52_comment')[0].textContent;
    e53_comment.value = r.getElementsByClassName('ec53_comment')[0].textContent;
    e54_comment.value = r.getElementsByClassName('ec54_comment')[0].textContent;
    e55_comment.value = r.getElementsByClassName('ec55_comment')[0].textContent;
    b_model.value = r.getElementsByClassName('isb_model')[0].textContent;
    b_cert.value = r.getElementsByClassName('isb_cert')[0].textContent;
    b_loop.value = r.getElementsByClassName('isb_loop')[0].textContent;
    s_device.value = r.getElementsByClassName('simple_device')[0].textContent;

    var edit_grade = document.getElementById("ex_grade").value;
    var select = document.getElementById("ex_technique").value; 
    if(select == "EXTRA Ex d CHECKS" && edit_grade == "DETAILED")
    {
      document.getElementById("h8").style.display = "block";
      document.getElementById("h11").style.display = "block";
    }
    else
    if(select == "EXTRA Ex d CHECKS" && edit_grade == "CLOSE")
    {
      document.getElementById("h8").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h11").style.display = "none";
    }
    else
    if(select == "EXTRA Ex d CHECKS" && edit_grade == "VISUAL")
    {
      document.getElementById("h8").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h11").style.display = "none";
    }
    else 
    if(select == "EXTRA Ex e CHECKS" && edit_grade == "DETAILED")
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("h12").style.display = "block";
    }
    else
    if(select == "EXTRA Ex e CHECKS" && edit_grade == "CLOSE")
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h12").style.display = "none";
    }
    else
    if(select == "EXTRA Ex e CHECKS" && edit_grade == "VISUAL")
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h12").style.display = "none";
    }
    else 
    if(select == "EXTRA Ex n CHECKS" && edit_grade == "DETAILED")
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("h13").style.display = "block";
    }
    else
    if(select == "EXTRA Ex n CHECKS" && edit_grade == "CLOSE")
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h13").style.display = "none";
    }
    else
    if(select == "EXTRA Ex n CHECKS" && edit_grade == "VISUAL")
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h13").style.display = "none";
    }
    else 
    if(select == "EXTRA Ex i CHECKS" && edit_grade == "DETAILED")
    {
      document.getElementById("h10").style.display = "block";
      document.getElementById("h14").style.display = "block";
    } 
    else
    if(select == "EXTRA Ex i CHECKS" && edit_grade == "CLOSE")
    {
      document.getElementById("h10").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else
    if(select == "EXTRA Ex i CHECKS" && edit_grade == "VISUAL")
    {
      document.getElementById("h10").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
}

function hide(e) {
    e.classList.add('hidden')
}

function addRow() {
 addPopBox.classList.remove('hidden');
}

function grade_change()
{
  var grade = document.getElementById("grade1").value;
  var select = document.getElementById("e_technique").value;
  if(grade == "CLOSE" || grade == "VISUAL")
  {
    document.getElementById("internal").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else
  {
    document.getElementById("internal").style.display = "block";
    if(select == "EXTRA Ex d CHECKS")
    {
      document.getElementById("h4").style.display = "block";
    }
    else
    if(select == "EXTRA Ex e CHECKS") 
    {
      document.getElementById("h5").style.display = "block";
    }
    else
    if(select == "EXTRA Ex n CHECKS") 
    {
      document.getElementById("h6").style.display = "block";
    }
    else
    if(select == "EXTRA Ex i CHECKS") 
    {
      document.getElementById("h7").style.display = "block";
    }
  }
}

function grade_change1()
{
  var grade = document.getElementById("ex_grade").value;
  var select = document.getElementById("ex_technique").value;
  if(grade == "CLOSE" || grade == "VISUAL")
  {
    document.getElementById("internal1").style.display = "none";
    document.getElementById("h11").style.display = "none";
    document.getElementById("h12").style.display = "none";
    document.getElementById("h13").style.display = "none";
    document.getElementById("h14").style.display = "none";
  }
  else
  {
    document.getElementById("internal1").style.display = "block";
    if(select == "EXTRA Ex d CHECKS")
    {
      document.getElementById("h11").style.display = "block";
    }
    else
    if(select == "EXTRA Ex e CHECKS") 
    {
      document.getElementById("h12").style.display = "block";
    }
    else
    if(select == "EXTRA Ex n CHECKS") 
    {
      document.getElementById("h13").style.display = "block";
    }
    else
    if(select == "EXTRA Ex i CHECKS") 
    {
      document.getElementById("h14").style.display = "block";
    }
  }
}

function zone()
{
  var select = document.getElementById("e_technique").value;
  var grade = document.getElementById("grade1").value;
  if(select == "EXTRA Ex d CHECKS" && grade == "DETAILED")
  {
    document.getElementById("h1").style.display = "block";
    document.getElementById("h4").style.display = "block";
    document.getElementById("h2").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else
  if(select == "EXTRA Ex d CHECKS" && grade == "CLOSE") 
  {
    document.getElementById("h1").style.display = "block";
    document.getElementById("internal").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h2").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else
  if(select == "EXTRA Ex d CHECKS" && grade == "VISUAL" ) 
  {
    document.getElementById("h1").style.display = "block";
    document.getElementById("internal").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h2").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else 
  if(select == "EXTRA Ex e CHECKS" && grade == "DETAILED")
  {
    document.getElementById("h2").style.display = "block";
    document.getElementById("h5").style.display = "block";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else
  if(select == "EXTRA Ex e CHECKS" && grade == "CLOSE") 
  {
    document.getElementById("h2").style.display = "block";
    document.getElementById("internal").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else
  if(select == "EXTRA Ex e CHECKS" && grade == "VISUAL" ) 
  {
    document.getElementById("h2").style.display = "block";
    document.getElementById("internal").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else 
  if(select == "EXTRA Ex n CHECKS" && grade == "DETAILED")
  {
    document.getElementById("h2").style.display = "block";
    document.getElementById("h6").style.display = "block";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else
  if(select == "EXTRA Ex n CHECKS" && grade == "CLOSE") 
  {
    document.getElementById("h2").style.display = "block";
    document.getElementById("internal").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else
  if(select == "EXTRA Ex n CHECKS" && grade == "VISUAL") 
  {
    document.getElementById("h2").style.display = "block";
    document.getElementById("internal").style.display = "none";
    document.getElementById("h6").style.display = "none";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h3").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h7").style.display = "none";
  }
  else 
  if(select == "EXTRA Ex i CHECKS" && grade == "DETAILED")
  {
    document.getElementById("h3").style.display = "block";
    document.getElementById("h7").style.display = "block";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h2").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h6").style.display = "none";
  }
  else
  if(select == "EXTRA Ex i CHECKS" && grade == "CLOSE") 
  {
    document.getElementById("h3").style.display = "block";
    document.getElementById("internal").style.display = "none";
    document.getElementById("h7").style.display = "none";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h2").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h6").style.display = "none";
  }
  else
  if(select == "EXTRA Ex i CHECKS" && grade == "VISUAL" ) 
  {
    document.getElementById("h3").style.display = "block";
    document.getElementById("internal").style.display = "none";
    document.getElementById("h7").style.display = "none";
    document.getElementById("h1").style.display = "none";
    document.getElementById("h2").style.display = "none";
    document.getElementById("h4").style.display = "none";
    document.getElementById("h5").style.display = "none";
    document.getElementById("h6").style.display = "none";
  }
}

  function zone1()
{
  var select = document.getElementById("ex_technique").value;
  var grade = document.getElementById("ex_grade").value;
  if(select == "EXTRA Ex d CHECKS" && grade == "DETAILED")
    {
      document.getElementById("h8").style.display = "block";
      document.getElementById("h11").style.display = "block";
      document.getElementById("h9").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h13").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else
    if(select == "EXTRA Ex d CHECKS" && grade == "CLOSE") 
    {
      document.getElementById("h8").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h9").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h13").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else
    if(select == "EXTRA Ex d CHECKS" && grade == "VISUAL" ) 
    {
      document.getElementById("h8").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h9").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h13").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else 
    if(select == "EXTRA Ex e CHECKS" && grade == "DETAILED")
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("h12").style.display = "block";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h13").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else
    if(select == "EXTRA Ex e CHECKS" && grade == "CLOSE") 
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h13").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else
    if(select == "EXTRA Ex e CHECKS" && grade == "VISUAL" ) 
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h13").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else 
    if(select == "EXTRA Ex n CHECKS" && grade == "DETAILED")
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("h13").style.display = "block";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else
    if(select == "EXTRA Ex n CHECKS" && grade == "CLOSE") 
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h13").style.display = "none";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else
    if(select == "EXTRA Ex n CHECKS" && grade == "VISUAL" ) 
    {
      document.getElementById("h9").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h13").style.display = "none";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h10").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h14").style.display = "none";
    }
    else 
    if(select == "EXTRA Ex i CHECKS" && grade == "DETAILED")
    {
      document.getElementById("h10").style.display = "block";
      document.getElementById("h14").style.display = "block";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h9").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h13").style.display = "none";
    } 
    else
    if(select == "EXTRA Ex i CHECKS" && grade == "CLOSE") 
    {
      document.getElementById("h10").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h14").style.display = "none";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h9").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h13").style.display = "none";
    }
    else
    if(select == "EXTRA Ex i CHECKS" && grade == "VISUAL" ) 
    {
      document.getElementById("h10").style.display = "block";
      document.getElementById("internal1").style.display = "none";
      document.getElementById("h14").style.display = "none";
      document.getElementById("h8").style.display = "none";
      document.getElementById("h9").style.display = "none";
      document.getElementById("h11").style.display = "none";
      document.getElementById("h12").style.display = "none";
      document.getElementById("h13").style.display = "none";
    }
}
</script>