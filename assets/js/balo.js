// var clickLogin= document.querySelector('.js-hearder-seach');
// var clickRemove = document.querySelector('.js-modal-list__icon');
// var deleteRemove=document.querySelector('.js-modal-inner');

// var onModal = document.querySelector('.modal');

// clickLogin.onclick = function(e){
//     onModal.classList.add('open');
// };

// clickRemove.onclick = function(e){
//     onModal.classList.remove('open');
// };
// onModal.onclick = function(e){
//     onModal.classList.remove('open');
// }
// deleteRemove.onclick = function(event){
//     event.stopPropagation()
// }

/* làm bảng menu */
var clickMenu = document.querySelector('.js-menu__icon');
var clickDelete = document.querySelector('.js-hearder-modal');
var stopPropaga = document.querySelector('.js-list__menu');
var clickIcon = document.querySelector('.js-icon__times');
clickMenu.onclick = function(){
    clickDelete.classList.add('open');
}
clickIcon.onclick = function(){
    clickDelete.classList.remove('open');
}
clickDelete.onclick = function(){
    clickDelete.classList.remove('open');
}
stopPropaga.onclick = function(event){
    event.stopPropagation();
}

/*làm thanh trở về màn hình */

$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()){
            $('.backtop').fadeIn();
        }else{
            $('.backtop').fadeOut();
        }
    });
    $(".backtop").click(function(){
        $('html,body').animate({
            scrollTop:0
        },50);
    })
});



/*làm slide*/
let counter =1;
setInterval(function(){
    document.getElementById('bottom_'+counter).checked = true;
    counter++;
    if(counter>2){
        counter = 1;
    }
},4000);