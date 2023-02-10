window.onload = function () {


    var current = $('#current'),
        maximum = $('#maximum'),
        characterCount = $('#content').val().length,
        theCount = $('#the-count');
    current.text(characterCount);

    if (characterCount < 167) {
        current.css('color', '#023047');
    }
    if (characterCount > 167 && characterCount < 334) {
        current.css('color', '#5F8090');
    }
    if (characterCount > 334 && characterCount < 500) {
        current.css('color', '#5F8090');
    }
    if (characterCount > 667 && characterCount < 834) {
        current.css('color', '#F37460');
    }
    if (characterCount > 834 && characterCount < 1000) {
        current.css('color', '#FC482C');
    }

    if (characterCount >= 1000) {
        maximum.css('color', '#DE1E00');
        current.css('color', '#DE1E00');
        theCount.css('font-weight', 'bold');
    } else {
        maximum.css('color', '#023047');
        theCount.css('font-weight', 'normal');
    }
}