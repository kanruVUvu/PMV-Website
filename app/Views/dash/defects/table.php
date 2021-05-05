<div class="table-container">
  <table id="main-table">
    <tr>
      <th>Action</th>
      <th>Tag Number</th>
      <th>Item Number</th>
      <th>Site</th>
      <th>Area</th>
      <th>Description</th>
      <th>Inspection</th>
      <th>Details</th>
      <th>Priority</th>
      <th>Status</th>
    </tr>
    <?php foreach ($defects as $i => $defect) : ?>
      <tr id="<?= $i ?>">
        <td>
          <form class="update_form-btn-container" action="<?= base_url() ?>/dash/deleteDefect/<?= $defect['defect_id'] ?>" onclick="return confirm('Are you sure you want to delete this item')">
            <button type="submit" class="btn btn--crud"><i class="fa fa-trash"></i></button>
          </form>
          <button class="btn btn--crud" onclick="editRow(<?= $i ?>)"><i class="fa fa-pencil"></i></button>
        </td>
          <td class="defect_id" style="display: none"><?= $defect['defect_id'] ?></td>
          <td class="insert_id" style="display: none"><?= $defect['insert_id'] ?></td>
          <td class="tag_number"><?= $defect['tag_number'] ?></td>
          <td class="item_number"><?= $defect['item_number'] ?></td>
          <td class="site"><?= $defect['site'] ?></td>
          <td class="area"><?= $defect['area'] ?></td>
          <td class="description"><?= $defect['description'] ?></td>
          <td class="inspection"><?= $defect['inspection'] ?></td>
          <td class="details"><?= $defect['details'] ?></td>
          <td class="priority"><?= $defect['priority'] ?></td>
          <td class="status"><?= $defect['status'] ?></td>
      </tr>
    <?php endforeach ?>
  </table>
</div>

<div class="draggable-container hidden" id="add-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/addDefect" method="POST" id="adder-form">
    <div class="form-group">
      <label class="form-group__label" for="tag_number">Tag Number</label>
      <input type="text" name="tag_number" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="item_number">Item Number</label>
      <input type="text" name="item_number" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="site">Site</label>
      <input type="text" name="site" class="form-group__input">
    </div>
    <div class="form-group">
      <ltatbel class="form-group__label" for="area">Area</label>
      <input type="text" name="area" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="description">Description</label>
      <textarea type="text" name="description" class="form-group__input"></textarea>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="inspection">Inspection</label>
      <input type="text" name="inspection" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="details">Details</label>
      <input type="text" name="details" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="priority">Priority</label>
      <select priority="text" name="priority" class="form-group__input">
        <option value="high">High</option>
        <option value="medium">Medium</option>
        <option value="low">Low</option>
      </select>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="priority">Status</label>
      <select id="edit-status" name="status" class="form-group__input">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>
    <button type="submit" class="btn submit-btn section-header">Add</button>
  </form>
</div>

<div class="draggable-container hidden" id="edit-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/updateDefect" method="POST" id="editor-form">
    <input type="hidden" id="edit-defect_id" name='defect_id' style="display: none;">
    <div class="form-group">
      <label class="form-group__label" for="tag_number">Tag Number</label>
      <input type="text" id="edit-tag_number" name="tag_number" class="form-group__input" readonly>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="item_number">Item Number</label>
      <input type="text" id="edit-item_number" name="item_number" class="form-group__input" readonly>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="site">Site</label>
      <input type="text" id="edit-site" name="site" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="area">Area</label>
      <input type="text" id="edit-area" name="area" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="description">Description</label>
      <input type="text" id="edit-description" name="description" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="inspection">Inspection</label>
      <input type="text" id="edit-inspection" name="inspection" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="edit-details">Details</label>
      <input type="text" id="edit-details" name="details" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="priority">Priority</label>
      <select id="edit-priority" name="priority" class="form-group__input">
        <option value="high">High</option>
        <option value="medium">Medium</option>
        <option value="low">Low</option>
      </select>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="status">Status</label>
      <select id="edit-status" name="status" class="form-group__input">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>
    <button type="submit" class="btn submit-btn section-header">Update</button>
  </form>
  <div class="comments-container">
    <h3 class="section-header">Comments</h3>
    <form defect="" class="commenter-form" id="comment-form">
      <div class="form-group">
        <!-- <label for="comment" class="form-group__label">Comment</label> -->
        <input type="text" class="form-group__input" id="comment">
      </div>
      <input name="defect_id" id="com-ac-hook" style="display: none;">
      <button class="btn submit-btn" id="comment-adder-btn">Add Comment</button>
    </form>
    <table class="comments-table" id="comments-table">
      <tr id="comments-header-row">
        <th>Status</th>
        <th>Comment</th>
        <th>Priority</th>
        <th>Last Action By</th>
        <th>Last Action Date</th>
      </tr>
    </table>
  </div>
</div>

<script>
  const table = document.getElementById('main-table');
  const commentsTable = document.getElementById('comments-table');

  const addForm = document.getElementById('adder-form');
  const editForm = document.getElementById('editor-form');
  const commentForm = document.getElementById('comment-form');

  const commentAddButton = document.getElementById('comment-adder-btn');

  const editInputElements = editForm.getElementsByTagName('input');
  const addInputElements = addForm.getElementsByTagName('input');

  const equipmentId = document.getElementById('eid-hook');

  const editPopBox = document.getElementById('edit-box');
  const addPopBox = document.getElementById('add-box');

  const lastModifiedBy = document.getElementById('last_modified_by');
  const lastModifiedOn = document.getElementById('last_modified_on');

  const closeButtons = document.getElementsByClassName('close');

  const commentsTableHeader = document.getElementById('comments-header-row');

  async function getComments(defectId) {
    const url = `<?= base_url() ?>/api/defects_comments/${defectId}`;
    const response = await fetch(url, {
        headers: {
          "Accept": "application/json"
        }
    });
    console.log(response);
    const jsonData = await response.json();

    console.log(jsonData);

    return jsonData;
  }

  commentAddButton.addEventListener('click', async (e) => {
    e.preventDefault();
    const tag = document.getElementById('edit-tag_number').value;
    const defectId = document.getElementById('edit-defect_id').value;
    const url = `<?= base_url() ?>/api/add_defect_comment`;

    const inputs = commentForm.getElementsByTagName('input');

    const data = {
      comment: document.getElementById('comment').value,
      defect_id: defectId,
      priority: document.getElementById('edit-priority').value,
      status: document.getElementById('edit-status').value,
    }


    console.log(JSON.stringify(data));

    const response = await fetch(url, {
      body: JSON.stringify(data),
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
      }
    });

    console.log(tag);
    console.log(response);
    const comments = await getComments(defectId);

    console.log(comments);

    populateComments(comments);

  });

  function populateComments(comments) {
    commentsTable.innerHTML = '';
    commentsTable.appendChild(commentsTableHeader);

    for (let c of comments) {
      const row = document.createElement('tr');

      const status = document.createElement('td');
      const cmt = document.createElement('td');
      const priority = document.createElement('td');
      const lastDefectBy = document.createElement('td');
      const lastDefectOn = document.createElement('td');

      cmt.textContent = c.comment;
      priority.textContent = c.priority;
      status.textContent = c.status;
      lastDefectBy.textContent = c.last_modified_by;
      lastDefectOn.textContent = c.last_modified_on;

      console.log(cmt);

      row.appendChild(status);
      row.appendChild(cmt);
      row.appendChild(priority);
      row.appendChild(lastDefectBy);
      row.appendChild(lastDefectOn);

      commentsTable.appendChild(row);
    }
  }

  async function editRow(rowId) {
    const row = document.getElementById(rowId);

    console.log(row);

    editPopBox.classList.remove('hidden');

    const fields = [
      'defect_id',
      'tag_number',
      <?php foreach ($fields as $field) : ?>
      '<?= $field ?>',
      <?php endforeach ?>
    ]

    for (const field of fields) {
      console.log(field);
      document.getElementById('edit-'+field).value = row.getElementsByClassName(field)[0].textContent;
    }

    populateComments(await getComments(row.getElementsByClassName('defect_id')[0].textContent));

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