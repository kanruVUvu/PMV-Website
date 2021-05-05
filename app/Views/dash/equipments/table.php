<div class="table-container">
  <table id="main-table">
    <tr>
      <th>Action</th>
      <th>Tag Number</th>
      <th>Site</th>
      <th>Manufacturer</th>
      <th>Model</th>
      <th>Serial Number</th>
      <th>Description</th>
      <th>Service</th>
      <th>Area</th>
      <th>Location</th>
      <th>Installation Date</th>
      <th>Inspection Date</th>
      <th>ZONE</th>
      <th>EPL</th>
      <th>GROUP</th>
      <th>T CLASS</th>
      <th>IP</th>
      <th>AMB MIN °C</th>
      <th>AMB MAX °C</th>
      <th>CERTIFICATE OF CONFORMITY</th>
      <th>PROTECTION</th>
      <th>EPL</th>
      <th>GROUP</th>
      <th>T CLASS</th>
      <th>IP</th>
      <th>AMB MIN °C</th>
      <th>AMB MAX °C</th>
      <th>KW</th>
      <th>VOLTAGE</th>
      <th>AMPS</th>
      <th>FREQ<sub>(Hz)</sub></th>
      <th>RPM</th>
      <th>Ia/In</th>
      <th>t<sub>E(sec)</sub></th>
    </tr>
    <?php foreach ($equipments as $i => $equipment) : ?>
      <tr id="<?= $i ?>">
        <td>
          <form class="update_form-btn-container" action="<?php echo base_url() . '/dash/deleteEquipment/' . $equipment['equipment_id'] ?>">
            <button type="submit" class="btn btn--crud"><i class="fa fa-trash"></i></button>
          </form>
          
          <!-- <button class="btn btn--crud" onclick="editRow(<?= $i ?>)"><i class="fa fa-pencil"></i></button>
        </td> -->
        <?php foreach ($equipment as $i => $val) : ?>
          <td class="<?= $i ?>"><?= $val ?></td>
        <?php endforeach ?> 
      </tr>
    <?php endforeach ?>
  </table>
</div>

<div class="draggable-container hidden" id="add-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/addEquipment" method="POST" id="adder-form">


    <h3 class="section-header">Device</h3>


    <div class="form-group">
        <label class="form-group__label" for="tag_number">Tag Number</label>
        <input type="text"  name="tag_number" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="site">Site</label>
        <input type="text"  name="site" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="manufacturer">Manufacturer</label>
        <input type="text"  name="manufacturer" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="model">Model</label>
        <input type="text"  name="model" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="serial_number">Serial Number</label>
        <input type="text"  name="serial_number" class="form-group__input">
    </div>    

    <div class="form-group">
        <label class="form-group__label" for="description">Description</label>
        <input type="text"  name="description" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="service">Service</label>
        <input type="text"  name="service" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="area">Area</label>
        <input type="text"  name="area" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="location">Location</label>
        <input type="text"  name="location" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="installation_date">Installation Date</label>
      <input type="date"  name="installation_date" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="inspection_date">Inspection Date</label>
      <input type="date"  name="inspection_date" class="form-group__input">
    </div>


    <h3 class="section-header">Area Classification</h3>


    <div class="form-group">
      <label class="form-group__label">EPL</label>
      <select name="ac_epl" id="a_epl" onchange="zone()">
        <option value=" ">Select Option</option>
        <option value="Ga">Ga</option>
        <option value="Gb">Gb</option>
        <option value="Gc">Gc</option>
        <option value="Ma">Ma</option>
        <option value="Mb">Mb</option>
        <option value="Da">Da</option>
        <option value="Db">Db</option>
        <option value="Dc">Dc</option>
        <option value="Safe Tree">Safe Tree</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_epl">ZONE</label>
      <input type="text"  name="ac_zone" id="a_zone" class="form-group__input" readonly>
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_group">GROUP</label>
      <select name="ac_group" id="a_group" class="form_group">
        <option value="">Select Option</option>
        <option value="I">I</option>
        <option value="IIA">IIA</option>
        <option value="IIB">IIB</option>
        <option value="IIC">IIC</option>
        <option value="IIIA">IIIA</option>
        <option value="IIIB">IIIB</option>
        <option value="IIIC">IIIC</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_t_class">T CLASS</label>
     <select name="ac_t_class" id="t_class" class="form_group">
        <option value="">Select Option</option>
        <option value="T1">T1</option>
        <option value="T2">T2</option>
        <option value="T3">T3</option>
        <option value="T4">T4</option>
        <option value="T5">T5</option>
        <option value="T6">T6</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_ip">IP</label>
      <input type="text"  name="ac_ip" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_amb_min">AMB MIN °C</label>
      <input type="text"  name="ac_amb_min" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_amb_max">AMB MAX °C</label>
      <input type="text"  name="ac_amb_max" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="certificate">CERTIFICATE OF CONFORMITY</label>
      <input type="text"  name="certificate" class="form-group__input">
    </div>  

    <h3 class="section-header">Device Ex Rating</h3>
    
    <div class="form-group">
      <label class="form-group__label" for="xr_protection">PROTECTION</label>
      <input type="text"  name="xr_protection" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_epl">EPL</label>
      <input type="text"  name="xr_epl" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_group">GROUP</label>
      <input type="text"  name="xr_group" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_t_class">T CLASS</label>
      <input type="text"  name="xr_t_class" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_ip">IP</label>
      <input type="text"  name="xr_ip" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_amb_min">AMB MIN °C</label>
      <input type="text"  name="xr_amb_min" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_amb_max">AMB MAX °C</label>
      <input type="text"  name="xr_amb_max" class="form-group__input">
    </div>


    <h3 class="section-header">Device Electrical Rating</h3>


    <div class="form-group">
      <label class="form-group__label" for="er_kw">KW</label>
      <input type="text"  name="er_kw" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_voltage">VOLTAGE</label>
      <input type="text"  name="er_voltage" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_amps">AMPS</label>
      <input type="text"  name="er_amps" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_hz">FREQ<sub>(Hz)</sub></label>
      <input type="text"  name="er_hz" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_rpm">RPM</label>
      <input type="text"  name="er_rpm" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_la">Ia/In</label>
      <input type="text"  name="er_la" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="er_te">t<sub>E(sec)</sub></label>
      <input type="text"  name="er_te" class="form-group__input">
    </div><br>
    <button type="submit" class="btn submit-btn">Add</button>
  </form>
</div>



<div class="draggable-container hidden" id="edit-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/updateEquipment" method="POST" id="editor-form">
      
      <input type="hidden" id="eid-hook" name='equipment_id'>

    <lable>Last Modified By</lable>
      <input type="text" id="last_modified_by" name="last_modified_by" class="form-group__input" readonly>

    <lable>Last Modified On</lable>
      <input type="text" id="last_modified_on" name="last_modified_on" class="form-group__input" readonly>
    
    <lable>Created_By</lable>
      <input type="text" id="created_by" name="created_by" class="form-group__input" readonly>
    
    <lable>Created_On</lable>
      <input type="text" id="created_on" name="created_on" class="form-group__input" readonly>
    

    <h3 class="section-header">Device</h3>


    <div class="form-group">
        <label class="form-group__label" for="tag_number">Tag Number</label>
        <input type="text" id="tag_number" name="tag_number" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="site">Site</label>
        <input type="text" id="site" name="site" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="manufacturer">Manufacturer</label>
        <input type="text" id="manufacturer" name="manufacturer" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="model">Model</label>
        <input type="text" id="model" name="model" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="serial_number">Serial Number</label>
        <input type="text" id="serial_number" name="serial_number" class="form-group__input">
    </div>    

    <div class="form-group">
        <label class="form-group__label" for="description">Description</label>
        <input type="text" id="description" name="description" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="service">Service</label>
        <input type="text" id="service" name="service" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="area">Area</label>
        <input type="text" id="area" name="area" class="form-group__input">
    </div>

    <div class="form-group">
        <label class="form-group__label" for="location">Location</label>
        <input type="text" id="location" name="location" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="installation_date">Installation Date</label>
      <input type="date" id="installation_date" name="installation_date" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="inspection_date">Inspection Date</label>
      <input type="date" id="inspection_date" name="inspection_date" class="form-group__input">
    </div>


    <h3 class="section-header">Area Classification</h3>
 

    <div class="form-group">
      <label class="form-group__label">EPL</label>
      <input type="hidden" id="epl" name="epl" class="form-group__input">
      <select name="ac_epl" id="ac_epl" onchange="xone()">
        <option value=" ">Select Option</option>
        <option value="Ga">Ga</option>
        <option value="Gb">Gb</option>
        <option value="Gc">Gc</option>
        <option value="Ma">Ma</option>
        <option value="Mb">Mb</option>
        <option value="Da">Da</option>
        <option value="Db">Db</option>
        <option value="Dc">Dc</option>
        <option value="Safe">Safe</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-group__label">ZONE</label>
      <input type="text" id="ac_zone" name="ac_zone" class="form-group__input" readonly>
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_group">GROUP</label>
      <input type="hidden" id="group" name="group" class="form-group__input">
     <select name="ac_group" id="ac_group" class="form-group__input">
        <option value="">Select Option</option>
        <option value="I">I</option>
        <option value="IIA">IIA</option>
        <option value="IIB">IIB</option>
        <option value="IIC">IIC</option>
        <option value="IIIA">IIIA</option>
        <option value="IIIB">IIIB</option>
        <option value="IIIC">IIIC</option>
      </select>
    </div>    

    <div class="form-group">
      <label class="form-group__label" for="ac_t_class">T CLASS</label>
      <input type="hidden" id="t_class" name="t_class" class="form-group__input">
      <select name="ac_t_class" id="ac_t_class" class="form_group">
        <option value="">Select Option</option>
        <option value="T1">T1</option>
        <option value="T2">T2</option>
        <option value="T3">T3</option>
        <option value="T4">T4</option>
        <option value="T5">T5</option>
        <option value="T6">T6</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_ip">IP</label>
      <input type="text" id="ac_ip" name="ac_ip" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_amb_min">AMB MIN °C</label>
      <input type="text" id="ac_amb_min" name="ac_amb_min" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="ac_amb_max">AMB MAX °C</label>
      <input type="text" id="ac_amb_max" name="ac_amb_max" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="certificate">CERTIFICATE OF CONFORMITY</label>
      <input type="text" id="certificate" name="certificate" class="form-group__input">
    </div>
  
    <h3 class="section-header">Device Ex Rating</h3>

    <div class="form-group">
      <label class="form-group__label" for="xr_protection">PROTECTION</label>
      <input type="text" id="xr_protection" name="xr_protection" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_epl">EPL</label>
      <input type="text" id="xr_epl" name="xr_epl" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_group">GROUP</label>
      <input type="text" id="xr_group" name="xr_group" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_t_class">T CLASS</label>
      <input type="text" id="xr_t_class" name="xr_t_class" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_ip">IP</label>
      <input type="text" id="xr_ip" name="xr_ip" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_amb_min">AMB MIN °C</label>
      <input type="text" id="xr_amb_min" name="xr_amb_min" class="form-group__input">
    </div>

    <div class="form-group">
      <label class="form-group__label" for="xr_amb_max">AMB MAX °C</label>
      <input type="text" id="xr_amb_max" name="xr_amb_max" class="form-group__input">
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
      <label class="form-group__label" for="er_hz">FREQ<sub>(Hz)</sub></label>
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

    <button type="submit" class="btn submit-btn section-header">Update</button>
  </form>
</div>
<script>
  
</script>

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
    console.log(r);
    const row = Array.from(r.children);
    console.log(row);
    let data = [];
    editPopBox.classList.remove('hidden');

    for (let element of row.slice(2, -4)) {
        data.push(element.textContent)
        // console.log(element);
    } // audit fields
   

    // console.log(data);
    // console.log(editInputElements);

    editInputElements[0].value = row[1].textContent

    for (let i = 1; i <= 4; i++) {
        // console.log(row[row.length-i]);
        editInputElements[i].value = row[row.length-i].textContent;
    }

    for (let [i, val] of data.entries()) {
        editInputElements[i+5].value = val;
    }

    console.log(r.getElementsByClassName('ac_epl')[0].textContent);
    const acEpl = document.getElementById('ac_epl');
    const acGroup = document.getElementById('ac_group');
    const actclass = document.getElementById('ac_t_class');
    acEpl.value = r.getElementsByClassName('ac_epl')[0].textContent;
    acGroup.value = r.getElementsByClassName('ac_group')[0].textContent;
    actclass.value = r.getElementsByClassName('ac_t_class')[0].textContent;
}

function hide(e) {
    e.classList.add('hidden')
}

function addRow() {
    for (const e of addInputElements) {
        e.value = '';
    }

    addPopBox.classList.remove('hidden');
}

function zone()
{
  var select = document.getElementById("a_epl").value;
  if(select == "Ga")
  {
    document.getElementById("a_zone").value= "0";
  }
  else 
  if(select == "Gb")
  {
    document.getElementById("a_zone").value= "1";
  }
  else 
  if(select == "Gc")
  {
    document.getElementById("a_zone").value= "2";
  }
  else 
  if(select == "Ma")
  {
    document.getElementById("a_zone").value= "ERZ0";
  }
  else 
  if(select == "Mb")
  {
    document.getElementById("a_zone").value= "ERZ1";
  }
  else 
  if(select == "Da")
  {
    document.getElementById("a_zone").value= "20";
  }
  else 
  if(select == "Db")
  {
    document.getElementById("a_zone").value= "21";
  }
  else 
  if(select == "Dc")
  {
    document.getElementById("a_zone").value= "22";
  }
  else
  if(select == "Safe Tree")
  {
    document.getElementById("a_zone").value="";
  }
  else
  {
    document.getElementById("a_zone").value="";
  }
}

function xone()
{
  var select = document.getElementById("ac_epl").value;
  console.log(select)
  if(select == "Ga")
  {
    document.getElementById("ac_zone").value= "0";
  }
  else 
  if(select == "Gb")
  {
    document.getElementById("ac_zone").value= "1";
  }
  else 
  if(select == "Gc")
  {
    document.getElementById("ac_zone").value= "2";
  }
  else 
  if(select == "Ma")
  {
    document.getElementById("ac_zone").value= "ERZ0";
  }
  else 
  if(select == "Mb")
  {
    document.getElementById("ac_zone").value= "ERZ1";
  }
  else 
  if(select == "Da")
  {
    document.getElementById("ac_zone").value= "20";
  }
  else 
  if(select == "Db")
  {
    document.getElementById("ac_zone").value= "21";
  }
  else 
  if(select == "Dc")
  {
    document.getElementById("ac_zone").value= "22";
  }  
  else
  if(select == "Safe")
  {
    document.getElementById("ac_zone").value="";
  }
  else
  {
    document.getElementById("ac_zone").value="";
  }
}
</script> 
