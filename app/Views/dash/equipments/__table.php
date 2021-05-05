<? if (! empty($rows)) : ?>
<div class="table-container">
  <table id="main-table">
    <tr>
      <th>Actions</th>
      <?php foreach ($rows[0] as $col => $_) : ?>
        <th class="<?= $col ?>"><?= $col ?></th>
      <?php endforeach ?>
    </tr>
    <?php foreach ($rows as $i => $row) : ?>
      <tr id="<?= $i ?>">
        <td>
          <form class="update_form-btn-container" action="<?php echo base_url() . '/dash/deleteEquipment/' . $row[$primary_key] ?>">
            <button type="submit" class="btn btn--crud"><i class="fa fa-trash"></i></button>
          </form>
          <button class="btn btn--crud" onclick="editRow(<?= $i ?>)"><i class="fa fa-pencil"></i></button>
        </td>
        <?php foreach ($row as $col => $val) : ?>
          <td class="<?= $col ?>"><?= $val ?></td>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </table>
</div>

<div class="draggable-container hidden" id="add-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="/dash/addEquipment" method="POST" id="adder-form">
    <?php foreach ($rows as $field => $_) : ?>
      <div class="form-group">
        <label class="form-group__label" for="<?= $field ?>"><?= $field ?></label>
        <input type="text" id="<?= $field ?>" name="<?= $field ?>" class="form-group__input">
      </div>
    <?php endforeach ?>
    <button type="submit" class="btn submit-btn">Add</button>
  </form>
</div>

<div class="draggable-container hidden" id="edit-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="/dash/updateEquipment" method="POST" id="editor-form">
    <input type="text" id="eid-hook" name='equipment_id'>
    <?php foreach ($read_only_fields as $i => $field) : ?>
      <div class="form-group">
        <label class="form-group__label" for="<?= $field ?>"><?= $field ?></label>
        <input type="text" id="<?= $field ?>" name="<?= $field ?>" class="form-group__input" readonly>
      </div>
    <?php endforeach ?>
    <button type="submit" class="btn submit-btn">Update</button>
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
<? else: ?>
<p>No data.</p>
<? endif; ?>