<div class="table-container">
  <table id="main-table">
    <tr>
      <th>Actions</th>
      <th class="action-column">Tag Number</th>
      <th class="action-column">Manufacturer</th>
      <th class="action-column">Model</th>
      <th class="action-column">Description</th>
      <th class="action-column">Service</th>
      <th class="action-column">Location</th>
      <th class="action-column">Protection</th>
      <th class="action-column">EPL</th>
      <th class="action-column">Group</th>
      <th class="action-column">T Class</th>
      <th class="action-column">IP</th>
      <th class="action-column">Amb Min</th>
      <th class="action-column">Amb Max</th>
      <th class="action-column">Certificate</th>
    </tr>
    <?php foreach ($equipments as $i => $equipment) : ?>
      <tr id="<?= $i ?>">
        <td>
          <form class="update_form-btn-container" action="<?= base_url() ?>/dash/deleteAssociatedEquipment/<?= $equipment['assoc_id'] ?>">
            <button type="submit" class="btn btn--crud"><i class="fa fa-trash"></i></button>
          </form>
          <button class="btn btn--crud" onclick="editRow(<?= $i ?>)"><i class="fa fa-pencil"></i></button>
        </td>
        <?php foreach ($equipment as $i => $val) : ?>
          <td class="<?= $i ?>"><?= $val ?></td>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </table>
</div>

<div class="draggable-container hidden" id="add-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/addAssociatedEquipment" method="POST" id="adder-form">
    <h3 class="section-header">Device</h3>
    <div class="form-group">
      <label class="form-group__label" for="tag_number">Tag Number</label>
      <select type="text" name="equipment_id" class="form-group__input">
      <?php foreach ($tags as $tag_number) : ?>
        <option value="<?= $tag_number[0] ?>"><?= $tag_number[1] ?></option>
      <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="manufacturer">Manufactrurer</label>
      <input type="text" id="add-manufacturer" name="manufacturer" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="model">Model</label>
      <input type="text" id="add-model" name="model" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="description">Description</label>
      <textarea type="text" id="description" name="description" class="form-group__input"></textarea>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="service">Service</label>
      <input type="text" id="add-service" name="service" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="location">Location</label>
      <input type="text" id="location" name="location" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="certificate">Certificate</label>
      <input type="text" id="add-certificate" name="certificate" class="form-group__input">
    </div>
    <h3 class="section-header">Area Classification, Device Rating</h3>
    <div class="form-group">
      <label class="form-group__label" for="protection">Protection</label>
      <input type="text" id="protection" name="protection" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="epl">EPL</label>
      <input type="text" id="add-epl" name="epl" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="eq_group">Group</label>
      <input type="text" id="eq_group" name="eq_group" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="t_class">T Class</label>
      <input type="text" id="add-t_class" name="t_class" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="ip">IP</label>
      <input type="text" id="ip" name="ip" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="amb_min">Amb Min</label>
      <input type="text" id="add-amb_min" name="amb_min" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="amb_max">Amb Max</label>
      <input type="text" id="add-amb_max" name="amb_max" class="form-group__input">
    </div>
    <button type="submit" class="btn submit-btn section-header">Add</button>
  </form>
</div>

<div class="draggable-container hidden" id="edit-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/updateAssociatedEquipment" method="POST" id="editor-form">
    <input type="text" id="edit-equipment_id" name="equipment_id" class="equipment_id">
    <input type="text" id="edit-assoc_id" name="assoc_id" class="assoc_id">
    <input type="text" id="edit-tag_number" name="tag_number" style="display: none;">
    <?php foreach ($read_only_fields as $i => $field) : ?>
      <div class="form-group">
        <label class="form-group__label" for="<?= $field ?>"><?= $field ?></label>
        <input type="text" id="edit-<?= $field ?>" name="<?= $field ?>" class="form-group__input" readonly>
      </div>
    <?php endforeach ?>
    <div class="form-group">
      <label class="form-group__label" for="tag_number">Tag Number</label>
      <select type="text" name="equipment_id" class="form-group__input">
      <?php foreach ($tags as $tag_number) : ?>
        <option value="<?= $tag_number[0] ?>"><?= $tag_number[1] ?></option>
      <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="manufacturer">Manufactrurer</label>
      <input type="text" id="edit-manufacturer" name="manufacturer" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="model">Model</label>
      <input type="text" id="edit-model" name="model" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="description">Description</label>
      <textarea type="text" id="edit-description" name="description" class="form-group__input"></textarea>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="service">Service</label>
      <input type="text" id="edit-service" name="service" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="location">Location</label>
      <input type="text" id="edit-location" name="location" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="certificate">Certificate</label>
      <input type="text" id="edit-certificate" name="certificate" class="form-group__input">
    </div>
    <h3 class="section-header">Area Classification, Device Rating</h3>
    <div class="form-group">
      <label class="form-group__label" for="protection">Protection</label>
      <input type="text" id="edit-protection" name="protection" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="epl">EPL</label>
      <input type="text" id="edit-epl" name="epl" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="eq_group">Group</label>
      <input type="text" id="edit-eq_group" name="eq_group" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="t_class">T Class</label>
      <input type="text" id="edit-t_class" name="t_class" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="ip">IP</label>
      <input type="text" id="edit-ip" name="ip" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="amb_min">Amb Min</label>
      <input type="text" id="edit-amb_min" name="amb_min" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="amb_max">Amb Max</label>
      <input type="text" id="edit-amb_max" name="amb_max" class="form-group__input">
    </div>
    <button type="submit" class="btn submit-btn section-header">Update</button>
  </form>
</div>

<!-- <div class="draggable-container hidden" id="edit-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="/dash/updateEquipment" method="POST" id="editor-form">
    <div class="form-group">
      <label for="">Tag Number</label>
      <input type="text" name="tag">
    </div>
    <div class="form-group">
      <label for="">Site</label>
      <input type="text" name="site">
    </div>
    <div class="form-group">
      <label for="">Area</label>
      <input type="text" name="area">
    </div>
    <div class="form-group">
      <label for="">Description</label>
      <input type="text" name="description">
    </div>
    <button type="submit" class="btn submit-btn">Update</button>
  </form>
</div> -->
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
    const row = document.getElementById(rowId);

    console.log(row);

    editPopBox.classList.remove('hidden');

    const fields = [
      'assoc_id',
      'equipment_id',
      'manufacturer',
      'model',
      'description',
      'service',
      'location',
      'protection',
      'epl',
      'eq_group',
      't_class',
      'ip',
      'amb_min',
      'amb_max',
      'certificate',
      'created_on',
      'created_by',
      'last_modified_on',
      'last_modified_by',
    ]

    for (const field of fields) {
      console.log(field);
      document.getElementById('edit-'+field).value = row.getElementsByClassName(field)[0].textContent;
    }
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
</script>