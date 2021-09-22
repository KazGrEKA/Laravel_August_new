$(function() {
    $("#datatablesSimple").on('click', 'a.delete', function() {
        if (confirm('Подтвердите удаление записи')) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: "/admin/sources/" + $(this).attr('rel'),
                complete: function() {
                    alert('Запись удалена');
                    location.reload();
                }
            })
        }
    })
})