const $ = jQuery

$(document).ready(() => {
    let $allSlider = $('.slidornet-container')
    let $currentSlider = $allSlider.first()

    $allSlider.hide()
    $currentSlider.show()

    setInterval(() => {

        $currentSlider.fadeOut(500, () => {
            $currentSlider = $currentSlider.next()

            if ($currentSlider.length < 1) $currentSlider = $allSlider.first()

            $currentSlider.fadeIn()
        })
    }, 3000)
})