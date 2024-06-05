require('./bootstrap');
let currentNoteId = null;

function goToEdit(id) {
    // Set the current note id
    currentNoteId = id;

    // Get the note content
    const noteContent = document.querySelector(`#note-${id} p`).innerText;

    // Populate the modal with the note content
    document.getElementById('edit-note-content').value = noteContent;

    // Display the modal
    document.getElementById('edit-note-modal').style.display = 'block';
}

function saveNote() {
    if (currentNoteId !== null) {
        // Get the edited content
        const editedContent = document.getElementById('edit-note-content').value;

        // Update the note content
        document.querySelector(`#note-${currentNoteId} p`).innerText = editedContent;

        // Hide the modal
        closeEditModal();
    }
}

function closeEditModal() {
    // Hide the modal
    document.getElementById('edit-note-modal').style.display = 'none';

    // Clear the current note id
    currentNoteId = null;
}
