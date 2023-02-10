function sliders()
{
    let keyboard = document.getElementById("keyboardShow");
    let keyboardCopy = document.getElementById("keyboardShowCopy");
    keyboardCopy.checked=  keyboard.checked;

    let voice = document.getElementById("voice");
    let voiceCopy = document.getElementById("voiceCopy");
    voiceCopy.checked=  voice.checked;

    let feedback = document.getElementById("feedback");
    let feedbackCopy = document.getElementById("feedbackCopy");
    feedbackCopy.checked=  feedback.checked;
}
