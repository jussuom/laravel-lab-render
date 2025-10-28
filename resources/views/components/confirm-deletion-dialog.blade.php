{{-- This Blade component renders a confirmation dialog for deleting a resource. --}}

<div class="dialog" id="dialog" style="display: none;">
    <div>
        <p id="question-text"></p>
        <button class="delete" id="confirm-button"></button>
        <button onclick="closeDialog()" id="cancel-button"></button>
    </div>
</div>

<script>
    // This function shows a confirmation dialog when the delete button is clicked.
    // If the user confirms, the form is submitted to delete the bookmark.
    // If the user cancels, the dialog is closed without submitting the form.
    // The "event" parameter is used to prevent the default form submission and to find the
    // correct form to submit when the user confirms the deletion.

    function confirmDelete(event, questionText = '', confirmText = '', cancelText = '') {
        // Prevent the default form submission
        event.preventDefault();
        // Show the confirmation dialog
        const dialog = document.getElementById('dialog');
        dialog.style.display = 'flex';

        // Set the text for the dialog elements
        document.getElementById('question-text').innerHTML = questionText;
        document.getElementById('confirm-button').innerHTML = confirmText;
        document.getElementById('cancel-button').innerHTML = cancelText;

        // Get the delete button and form
        const confirmButton = document.getElementById('confirm-button');
        // Find the closest form element to the clicked button.
        // This way we can ensure that the correct form for deleting
        // the resource is submitted.
        const form = event.target.closest('form');

        // Set the onclick event for the confirm button to submit the form
        // that contains the delete action.
        confirmButton.onclick = function() {
            form.submit();
        };
    }

    function closeDialog() {
        const dialog = document.getElementById('dialog');
        dialog.style.display = 'none';
    }
</script>
