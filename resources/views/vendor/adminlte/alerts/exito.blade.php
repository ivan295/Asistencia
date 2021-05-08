@if (Session::has('success'))

<script type="text/javascript">

Swal.fire(
    'Buen trabajo',
    '{!! Session::get('success') !!}',
    'success'
{
    button:'OK',
})
 </script>
 
        @endif
