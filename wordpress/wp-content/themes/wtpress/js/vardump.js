$(document).ready(() => {
    $vardump = $('.xdebug-var-dump')
    if ($vardump){
        $vardump.hide()
        $('#content').prepend($vardump)
        $vardump.show()
    }
})