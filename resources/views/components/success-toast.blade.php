<script>
    // Display a success message if it exists
    @if (session('success'))
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            gravity: "bottom",
            position: "center",
            backgroundColor: "#333333",
        }).showToast();
    @endif
</script>
