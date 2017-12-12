$(document).ready(() => {

    $popup = $('.popup-overlay')
    $popup.hide()

    $('body').prepend($popup)
    $popup.show()

    $('.close-popup').click(() => {
        $popup.hide()
    })
})