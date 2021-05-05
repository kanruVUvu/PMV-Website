<div class="table-container">
  <table id="main-table">
    <tr>
      <th class="action-column">Actions</th>
      <th>Document Number</th>
      <th>Type</th>
      <th>Issue</th>
      <th>Description</th>
      <th>Filename</th>
    </tr>
    <?php foreach ($docs as $i => $doc) : ?>
      <tr id="<?= $i ?>">
        <td>
          <form class="update_form-btn-container" action="<?= base_url() ?>/dash/deleteDoc/<?= $doc['id'] ?>">
            <button type="submit" class="btn btn--crud"><i class="fa fa-trash"></i></button>
          </form>
          <button class="btn btn--crud" onclick="editRow(<?= $i ?>)"><i class="fa fa-pencil"></i></button>
        </td>
        <?php foreach ($doc as $i => $val) : ?>
          <td class="<?= $i ?>"><?= $val ?></td>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </table>
</div>

<div class="draggable-container hidden" id="add-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/addDoc" method="POST" id="adder-form" enctype="multipart/form-data">
    <div class="form-group">
      <label class="form-group__label" for="document_number">Document Number</label>
      <input type="text" id="document_number" name="document_number" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="type">Type</label>
      <input type="text" id="type" name="type" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="issue">Issue</label>
      <input type="text" id="issue" name="issue" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="description">Description</label>
      <textarea type="text" id="description" name="description" class="form-group__input"></textarea>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="filename">File</label>
      <input type="file" id="filename" name="filename" class="form-group__input">
    </div>
    <button type="submit" class="btn submit-btn">Add</button>
  </form>
</div>

<div class="draggable-container hidden" id="edit-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/updateDoc" method="POST" id="editor-form">
    <input type="text" id="edit-id" name="id" style="display: none;">
    <?php foreach ($read_only_fields as $i => $field) : ?>
      <div class="form-group">
        <label class="form-group__label" for="<?= $field ?>"><?= $field ?></label>
        <input type="text" id="edit-<?= $field ?>" name="<?= $field ?>" class="form-group__input" readonly>
      </div>
    <?php endforeach ?>
    <div class="form-group">
      <label class="form-group__label" for="document_number">Document Number</label>
      <input type="text" id="edit-document_number" name="document_number" class="form-group__input" readonly>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="type">Type</label>
      <input type="text" id="edit-type" name="type" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="issue">Issue</label>
      <input type="text" id="edit-issue" name="issue" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="description">Description</label>
      <input type="text" id="edit-description" name="description" class="form-group__input">
    </div>
    <!-- <div class="form-group">
      <label class="form-group__label" for="file">File</label>
      <input type="file" id="edit-filename" name="filename" class="form-group__input">
    </div> -->
    <button type="submit" class="btn submit-btn section-header">Update</button>
  </form>
  <form class="editor-form" action="<?= base_url() ?>/dash/updateDocFile" method="POST" id="editor-form" enctype="multipart/form-data">
    <div class="form-group">
      <label class="form-group__label" for="filename">File</label>
      <input type="file" id="edit-filename" name="filename" class="form-group__input" required>
    </div>
    <button type="submit" class="btn submit-btn section-header">Upload</button>
  </form>
</div>

<script>
  const table = document.getElementById('main-table');
  const commentsTable = document.getElementById('comments-table');

  const addForm = document.getElementById('adder-form');
  const editForm = document.getElementById('editor-form');

  const commentAddButton = document.getElementById('comment-adder-btn');

  const editInputElements = editForm.getElementsByTagName('input');
  const addInputElements = addForm.getElementsByTagName('input');

  const editPopBox = document.getElementById('edit-box');
  const addPopBox = document.getElementById('add-box');

  const lastModifiedBy = document.getElementById('last_modified_by');
  const lastModifiedOn = document.getElementById('last_modified_on');

  const closeButtons = document.getElementsByClassName('close');

  const commentsTableHeader = document.getElementById('comments-header-row');

  async function editRow(rowId) {
    const row = document.getElementById(rowId);

    console.log(row);

    editPopBox.classList.remove('hidden');

    const fields = [
      'id',
      'document_number',
      'type',
      'issue',
      'description',
      'created_on',
      'created_by',
      'last_modified_on',
      'last_modified_by',
    ]

    for (const field of fields) {
      console.log(field);
      document.getElementById('edit-' + field).value = row.getElementsByClassName(field)[0].textContent;
    }

    // console.log(row.getElementsByClassName('filename')[0].textContent);
    // const path = `<?= addslashes(WRITEPATH . 'documents\\') ?>${row.getElementsByClassName('filename')[0].textContent}`;
    // console.log(path);
    // document.getElementById('edit-filename').value = path;
  }

  function hide(e) {
    e.classList.add('hidden');
  }

  function addRow() {
    for (const e of addInputElements) {
      e.value = '';
    }

    addPopBox.classList.remove('hidden');
  }
</script>