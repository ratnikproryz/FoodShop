$('.checkbox-wrapper').on('click', function() {
    $(this).parents('.card').find('.checkbox-children').prop('checked', $(this).prop('checked'));
})

$('.check-all').on('click', function() {
    $(this).parents().find('.checkbox-wrapper').prop('checked', $(this).prop('checked'));
    $(this).parents().find('.checkbox-children').prop('checked', $(this).prop('checked'));
})