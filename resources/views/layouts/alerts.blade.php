  <script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    });
  </script>
  {{-- <script src="{{ asset('admin/vendor/izitoast/js/iziToast.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('admin/vendor/sweetalert/sweetalert.min.js') }}"></script> --}}
  <script src="{{ asset('admin/vendor/sweetalert-2/sweetalert2.min.js') }}"></script>
  @if (session('sukses'))
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '{!! session("sukses") !!}',
    showConfirmButton: false,
    timer: 2000,
    showClass: {
    popup: 'animate__animated animate__jackInTheBox'
    },
    hideClass: {
      popup: 'animate__animated animate__fadeOutUp'
    }
    })
  </script>
  @endif

  @if (session('sukses-tunai'))
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '{!! session("sukses-tunai") !!}',
    showConfirmButton: true,
    timer: 2000,
    showClass: {
    popup: 'animate__animated animate__jackInTheBox'
    },
    hideClass: {
      popup: 'animate__animated animate__fadeOutUp'
    }
    })
  </script>
  @endif

  @if (session('gagal'))
    <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops',
      text: '{!! session("gagal") !!}',
      })
    </script>
  @endif

  @if (session('sukses-kredit'))
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '{!! session("sukses-kredit") !!}',
    showConfirmButton: true,
    timer: 2500,
    showClass: {
    popup: 'animate__animated animate__tada'
    },
    hideClass: {
      popup: 'animate__animated animate__backOutDown'
    }
    })
  </script>
  @endif

@if (session('sukses-update-profile'))
<script>
  Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '{!! session("sukses-update-profile") !!}',
  })
</script>
@endif