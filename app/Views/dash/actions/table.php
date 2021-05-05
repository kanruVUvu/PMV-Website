<div class="table-container">
  <table id="main-table">
    <tr>
      <th class="action-column">Actions</th>
      <th class="action-column">Tag Number</th>
      <th class="action-column">Area</th>
      <th class="action-column">Type</th>
      <th class="action-column">Site</th>
      <th class="action-column">Description</th>
      <th class="action-column">Details</th>
      <th class="action-column">Entry Date</th>
      <th class="action-column">Priority</th>
      <th class="action-column">Status</th>
    </tr>
    <?php foreach ($actions as $i => $action) : ?>
      <tr id="<?= $i ?>">
        <td>
          <form class="update_form-btn-container" action="<?= base_url() ?>/dash/deleteAction/<?= $action['action_id'] ?>">
            <button type="submit" class="btn btn--crud"><i class="fa fa-trash"></i></button>
          </form>
          <button class="btn btn--crud" onclick="editRow(<?= $i ?>)"><i class="fa fa-pencil"></i></button>
        </td>
        <?php foreach ($action as $i => $val) : ?>
          <td class="<?= $i ?>"><?= $val ?></td>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </table>
</div>

<div class="draggable-container hidden" id="add-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/addAction" method="POST" id="adder-form">
    <div class="form-group">
      <label class="form-group__label" for="tag_number">Tag Number</label>
      <select type="text" name="equipment_id" class="form-group__input">
      <?php foreach ($tags as $tag_number) : ?>
        <option value="<?= $tag_number[0] ?>"><?= $tag_number[1] ?></option>
      <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="area">Area</label>
      <input type="text" name="area" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="type">Type</label>
      <input type="text" name="type" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="site">Site</label>
      <input type="text" name="site" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="description">Description</label>
      <textarea type="text" name="description" class="form-group__input"></textarea>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="details">Details</label>
      <input type="text" name="details" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="entry_date">Entry Date</label>
      <input type="date" name="entry_date" class="form-group__input" type="date">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="priority">Priority</label>
      <select name="priority" class="form-group__input">
        <option value="high">High</option>
        <option value="medium">Medium</option>
        <option value="low">Low</option>
      </select>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="status">Status</label>
      <select name="status" class="form-group__input">
        <option value="open">Open</option>
      </select>
    </div>
    <button type="submit" class="btn submit-btn section-header">Add</button>
  </form>
</div>

<div class="draggable-container hidden" id="edit-box">
  <div class="close" onclick="hide(this.parentElement)">&times;</div>
  <form class="editor-form" action="<?= base_url() ?>/dash/updateAction" method="POST" id="editor-form">
    <input type="text" id="edit-equipment_id" name="equipment_id" style="display: none;">
    <input type="text" id="edit-action_id" name="action_id" style="display: none;">
    <?php foreach ($read_only_fields as $i => $field) : ?>
      <div class="form-group">
        <label class="form-group__label" for="<?= $field ?>"><?= $field ?></label>
        <input type="text" id="edit-<?= $field ?>" name="<?= $field ?>" class="form-group__input" readonly>
      </div>
    <?php endforeach ?>
    <div class="form-group">
      <label class="form-group__label" for="tag_number">Tag Number</label>
      <input type="text" id="edit-tag_number" name="tag_number" class="form-group__input" readonly>
    </div>
    <div class="form-group">
      <label class="form-group__label" for="area">Area</label>
      <input type="text" id="edit-area" name="area" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="type">Type</label>
      <input type="text" id="edit-type" name="type" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="site">Site</label>
      <input type="text" id="edit-site" name="site" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="description">Description</label>
      <input type="text" id="edit-description" name="description" class="form-group__input">
    </div>
    <div class="form-group">
      <label class="form-group__label" for="entry_date">Entry Date</label>
      <input type="date" id="edit-entry_date" name="entry_date" class="form-group__input" readonly>
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
        <option value="close">Close</option>
      </select>
    </div>
    <button type="submit" class="btn submit-btn section-header">Update</button>
  </form>
  <div class="comments-container">
    <h3 class="section-header">Comments</h3>
    <form action="" class="commenter-form" id="comment-form">
      <div class="form-group">
        <!-- <label for="comment" class="form-group__label">Comment</label> -->
        <input type="text" class="form-group__input" id="comment">
      </div>
      <input name="action_id" id="com-ac-hook" style="display: none;">
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

  async function getComments(actionId) {
    const loc = window.location;
    const url = `<?= base_url() ?>/api/comments/${actionId}`;
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
    const actionId = document.getElementById('edit-action_id').value;
    const url = `<?= base_url() ?>/api/add_comment`;

    const inputs = commentForm.getElementsByTagName('input');

    const data = {
      comment: document.getElementById('comment').value,
      action_id: actionId,
      priority: document.getElementById('edit-priority').value,
      status: document.getElementById('edit-status').value
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
    const comments = await getComments(actionId);

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
      const lastActionBy = document.createElement('td');
      const lastActionOn = document.createElement('td');

      cmt.textContent = c.comment;
      priority.textContent = c.priority;
      status.textContent = c.status;
      lastActionBy.textContent = c.last_modified_by;
      lastActionOn.textContent = c.last_modified_on;

      console.log(cmt);

      row.appendChild(status);
      row.appendChild(cmt);
      row.appendChild(priority);
      row.appendChild(lastActionBy);
      row.appendChild(lastActionOn);

      commentsTable.appendChild(row);
    }
  }

  async function editRow(rowId) {
    const row = document.getElementById(rowId);

    console.log(row);

    editPopBox.classList.remove('hidden');

    const fields = [
      'action_id',
      'tag_number',
      <?php foreach ($fields as $field) : ?>
      '<?= $field ?>',
      <?php endforeach ?>
    ]

    for (const field of fields) {
      console.log(field);
      document.getElementById('edit-'+field).value = row.getElementsByClassName(field)[0].textContent;
    }

    populateComments(await getComments(row.getElementsByClassName('action_id')[0].textContent));

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