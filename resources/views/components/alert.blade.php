@props(['type','msg'])
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toast = Swal.mixin({
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 3000,
            padding: "2em",
            timerProgressBar: true,
            
        });
        toast.fire({
            icon: '{{ $type }}',
            title: '{{ $msg }}',
            padding: "2em",
        });
    });
</script>