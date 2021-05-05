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
    const row = Array.from(document.getElementById(rowId).children);

    let data = [];
    console.log(row);

    editPopBox.classList.remove('hidden');

    for (let element of row.slice(2, -4)) {
        data.push(element.textContent)
    }

    console.log(data);
    console.log(editInputElements);

    editInputElements[0].value = row[1].textContent

    for (let i = 1; i <= 4; i++) {
        console.log(row[row.length-i]);
        editInputElements[i].value = row[row.length-i].textContent;
    }

    for (let [i, val] of data.entries()) {
        editInputElements[i+5].value = val;
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