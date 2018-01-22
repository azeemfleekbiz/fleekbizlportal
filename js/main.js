$(document).ready(function () {
var navListItems = $('div.setup-panel div .navButton'),
allWells = $('.setup-content'),
allNextBtn = $('.nextBtn');
allPrevBtn = $('.prevBtn');
allWells.hide();
navListItems.click(function (e) {
e.preventDefault();
var $target = $($(this).attr('href')),
$item = $(this);
if (!$item.hasClass('disabled')) {
navListItems.closest(".stepwizard-step").removeClass('btn-primary');
$item.closest(".stepwizard-step").addClass('btn-primary');
allWells.hide();
$target.show();
$target.find('input:eq(0)').focus();
}
});
allNextBtn.click(function(){
var curStep = $(this).closest(".setup-content"),
curStepBtn = curStep.attr("id"),
nextStepWizard = $('div.setup-panel div a.navButton[href="#' + curStepBtn + '"]').parent().next().children("a"),
curInputs = curStep.find("input[type='text'],input[type='url'],input[type='number'],input[type='email']"),
isValid = true;
$(".form-group").removeClass("has-error");
for(var i=0; i<curInputs.length; i++){
if (!curInputs[i].validity.valid){
isValid = false;
$(curInputs[i]).closest(".form-group").addClass("has-error");
}
}
if (isValid)
nextStepWizard.removeAttr('disabled').trigger('click');
});
allPrevBtn.click(function(){
var curStep = $(this).closest(".setup-content"),
curStepBtn = curStep.attr("id"),
prevStepWizard = $('div.setup-panel div a.navButton[href="#' + curStepBtn + '"]').parent().prev().children("a"),
curInputs = curStep.find("input[type='text'],input[type='url'],input[type='number'],input[type='email']"),
isValid = true;
prevStepWizard.removeAttr('disabled').trigger('click');
});
$('div.setup-panel div .navButton.first').trigger('click');
});