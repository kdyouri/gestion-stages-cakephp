$(document).on('change', '#StageEntrepriseId', function(){
    if ($(this).val() === '0') {
        $(this).attr('disabled', true).val('');
        $('#SelectEntreprise').addClass('hidden');

        $('#NouvelleEntreprise').removeClass('hidden').find('input').removeAttr('disabled').first().focus();
    }
});

$(document).on('click', '#EntrepriseRetour', function(){
    $('#NouvelleEntreprise').addClass('hidden').find('input').attr('disabled', true);

    $('#SelectEntreprise').removeClass('hidden');
    $('#StageEntrepriseId').attr('disabled', false).val('').focus();
});