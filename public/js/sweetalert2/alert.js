// $(document).ready(function() {
//     $(document).on('click', '.delete', function(event) {
//         event.preventDefault();

//         swal({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//         }).then((result) => {
//         if (result.value) {

//             $.ajax({
//                 url: "{{route('users.delete')}}",
//                 type: 'post',
//                 dataType: 'json',
//                 data: 
//                 {
//                     '_token': $('input[name=_token]').val(),
//                     'id':$(this).attr('id'),
//                 },
//             })
//             .done(function(data) {
//                 swal(
//             'Deleted!',
//             'User Deleted',
//             'success'
//             )
//                 setInterval(function(){
//                 location.reload();
//                 },600);
//             })
//             .fail(function() {
//                 console.log("error");
//             });
//         }
//         })
//     });
// });