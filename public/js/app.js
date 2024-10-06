$(document).ready(function() {
    // تحقق مما إذا كانت الرسالة موجودة
    if ($('#success-message').length) {
        // إخفاء الرسالة بعد 3 ثوانٍ
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 3000); // 3000 مللي ثانية = 3 ثوانٍ
    }
});
