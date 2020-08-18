document.addEventListener('DOMContentLoaded', function(){
//прелоадер
    
    $(".fon").fadeOut();
    
///Показ элемента по скроллу
    let sites = document.querySelector('.sites');
    let sites_item = sites.querySelectorAll('.sites_item');
    let advantages_content = document.querySelector('.advantages_content');
    let advantage_item_icon = advantages_content.querySelectorAll('.advantage_item_icon');
    let background = document.querySelector('.background');
    let introduction = document.querySelector('.introduction');
    let introduction_contactUs = introduction.querySelectorAll('.introduction_contactUs');
    let introduction_aboutUs = document.querySelector('.introduction_aboutUs');
    let introduction_p= introduction_aboutUs.querySelectorAll('p');
    let introduction_h1= introduction_aboutUs.querySelectorAll('h1');
    let aboutUs_buttons = introduction_aboutUs.querySelectorAll('.aboutUs-buttons');
    let main_logo = background.querySelectorAll('.logo');
    let header = document.querySelector('.header');
    let nav_block = document.querySelector('nav');
    
    function sites_item_animation(block, items, animation ){
        let widthWindow = window.innerWidth; 
        let mobileVersionWidth = 750;
        let centerHeight = window.innerHeight  ;
        //если анимация выезжает вверх
        if(animation == 1){
            var animation = new String("up_animation");
        }
        //если анимация выезжает вниз
        if(animation == 2){
            var animation = new String("down_animation");
        }
         //если анимация выезжает направо
        if(animation == 3){
            var animation = new String("right_animation");
        }
         //если анимация выезжает налево
        if(animation == 4){
            var animation = new String("left_animation");
        }
        if( widthWindow > mobileVersionWidth ){
            if( block.getBoundingClientRect().top <= centerHeight
                && block.getBoundingClientRect().bottom > 0
            ){
                items.forEach(function(oneItem, index){
                    oneItem.classList.add(animation);
                    oneItem.style.animationDelay = `${index*0.2}s`;
                });
            }
            
        }else{
            items.forEach((oneItem)=>{
                if( oneItem.getBoundingClientRect().top <= centerHeight
                    && oneItem.getBoundingClientRect().bottom > 0
                ){
                    oneItem.classList.add(animation);
                }
            });
           
        }
    }
  //функция вылета элементов при загрузке/скролле страницы   
function fadeInEl() {
    sites_item_animation(sites, sites_item, 1);
    sites_item_animation(advantages_content, advantage_item_icon, 1);
    sites_item_animation(introduction, introduction_contactUs, 1);
  
    sites_item_animation(introduction, introduction_p, 1);
    sites_item_animation(introduction, introduction_h1, 3);
    sites_item_animation(introduction, aboutUs_buttons, 3);
    sites_item_animation(background, main_logo, 2);
    sites_item_animation(document.querySelector('.intro'), document.querySelector('.intro').querySelectorAll('.intro_image'), 3);
    sites_item_animation(document.querySelector('.intro'), document.querySelector('.intro').querySelectorAll('.intro_text'), 4);
    sites_item_animation(document.querySelector('.advantages'), document.querySelectorAll('advantages_image'), 3);

    sites_item_animation(document.querySelector('.feature_2'), document.querySelector('.feature_2').querySelectorAll('.intro_text'), 3);
    sites_item_animation(document.querySelector('.feature_2'), document.querySelector('.feature_2').querySelectorAll('.feature_2_image'), 4);


    sites_item_animation(document.querySelector('.contactUs'), document.querySelector('.contactUs').querySelectorAll('h2'), 4);
    sites_item_animation(document.querySelector('.contactUs'), document.querySelector('.contactUs').querySelectorAll('p'), 3);
    sites_item_animation(document.querySelector('.contactUs'), document.querySelector('.contactUs').querySelectorAll('.contactUsButton'), 3);

    sites_item_animation(document.body, document.querySelector('.cost').querySelectorAll('h2'), 3); //llll

    sites_item_animation(document.querySelector('.clients'), document.querySelector('.clients').querySelectorAll('.client_item'), 1);

    sites_item_animation(document.querySelector('.review_block'), document.querySelector('.review_block').querySelectorAll('.review'), 1);

    sites_item_animation(document.querySelector('.footer'), document.querySelector('.footer').querySelectorAll('.contacts'), 1);
    sites_item_animation(document.querySelector('.footer'), document.querySelector('.footer').querySelectorAll('.footer_form'), 1);

    sites_item_animation(document.querySelector('.social_icons_block'), document.querySelector('.social_icons_block').querySelectorAll('.social_icon_item'), 1);

}
 fadeInEl();  
 sites_item_animation(sites, sites_item, 1);

window.addEventListener('scroll', function(){
    if (header.getBoundingClientRect().top < 0 ){
        header.classList.add("fixed");
    }
    if (header.classList.contains("fixed") && introduction.getBoundingClientRect().bottom > 0 ) {
        header.classList.remove("fixed");
    }
    fadeInEl();
    
});

//Слайдер
var count = $('.review').length;
var slider = $('.slider');
var width = $('.review_block').width();
var margin = width;

current_dot = 0;
$(window).resize(function() {
    if(this.resizeTO) clearTimeout(this.resizeTO);
    this.resizeTO = setTimeout(function() {
        $(this).trigger('resizeEnd');
    }, 500);
});
$(window).bind('resizeEnd', function() {
    var width = $('.review_block').width();
    var margin = width;
        
    check();
    scroll(-margin*current_dot);
});

function scroll(param){
    slider.animate({
        marginLeft: param
    },1000);

}

function check() {
    if (margin == width * count){
        margin = width;
        
        slider.css({
            marginLeft: 0
        });
    }
}
//точки переключения браузера
$('.dots').on('click',function () {
    $( '.dots' ).each(function( index ) {
        $('.dots').eq(index).css("background-color", "#3eb0f798");
    });
    var width = $('.review_block').width();
    var margin = width;
    var dot_index = $('.dots').index(this);
    $('.dots').eq(dot_index).css("background-color", "#3eb0f7");
    check();
    scroll(-margin*dot_index);

    

});

//плавный переход к якорю
$('a[href^="#"]').on('click',function(){
    var el = $(this).attr('href');    
    $('html, body').animate({
        scrollTop: $(el).offset().top
    }, 1000);
    return false; 
});

//раскрытие бургер меню
var header_nav = $("nav");
if( $(window).width() < 850){
    header_nav.css('display', 'none');
}
$(window).resize(function(){
    if( $(window).width() < 850){
        header_nav.css('display', 'none');
    }else if( $(window).width() > 850){
        header_nav.css('display', 'block');
    }
    });

$(".burger").on("click", function(){
    var screen_width = $(window).width();    
    if (header_nav.hasClass('open')){        
        $(this).removeClass('cross').addClass('burger');
        header_nav.removeClass('open');
        header_nav.slideUp(1000);
    }else{
        header_nav.slideDown(1000);
        $(this).removeClass('burger').addClass('cross');
        header_nav.addClass('open');
    }
});

    // функция отправки формы
    function send_data(form){

        var fio_field = form.find("[name='fio']").val();
        var email_field = form.find("[name='email']").val();
        var message_field = form.find("[name='message']").val();

        // проверка на корректное заполнение полей
        if( fio_field === "" || email_field === ""){            
            if( fio_field === ""){
                form.find("[name='fio']").css("background-color", "#ee99998c");
                form.find("[name='fio']").css("border", "1px solid red");
            }
            if( email_field === ""){
                form.find("[name='email']").css("background-color", "#ee99998c");
                form.find("[name='email']").css("border", "1px solid red");
            }
            if( fio_field === "" && email_field === ""){
                form.find("[name='fio']").css("background-color", "#ee8b8bb9");
                form.find("[name='email']").css("background-color", "#ee8b8bb9");
                form.find("[name='fio']").css("border", "1px solid red");
                form.find("[name='email']").css("border", "1px solid red");
            }
        
            
        } else {
            if(email_field.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) ){
            let xhr = new XMLHttpRequest(); 
            xhr.open('POST', '/page.php');
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');//чтобы получился post запрос
            xhr.send('email='+ email_field+"&fio="+fio_field+"&message="+message_field);

        //popup при отправке формы
            $(".introduction .popup").css("display", "flex").hide().fadeIn();
            $(".introduction .popup").css("opacity", "1");
            $(".introduction .p-cross").css("display", "block");
            $("body").css("overflow", "hidden");        
        
            $(".introduction .p-cross").on("click",function(){
                $(".introduction .popup").fadeOut();
                $("body").css("overflow", "auto"); 
                $(".introduction .p-cross").css("display", "none");
            });
    
            $(window).on("keyup", function(e){
                if( e.keyCode == 27 ){
                    $(".introduction .popup").fadeOut();
                    $("body").css("overflow", "auto");  
                }
            });
    
            $(".popup-background").on("click", function(){
                $(".introduction .popup").fadeOut(); 
                $("body").css("overflow", "auto");  
            });
            }else{  
                $(this).find("[name='email']").css("color", "red");   
            }
        }
            
    }
// объявляем формы из которых будут отправляться данные в БД
    let form_introduction = $('.introduction form');
    let form_footer = $('.footer form');
// клик на первую форму
    $(".introduction_contactUs button").click(function(e){    
        e.preventDefault();//выключаем стандартное поведение
        send_data(form_introduction);
    });
// клик на вторую форму
    $(".footer_form button").click(function(e){    
        e.preventDefault();
        send_data(form_footer);
    });

//arrow up
    $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
        $('.arrow-up').fadeIn();
        } else {
            $('.arrow-up').fadeOut();
        }
    });
    $('.arrow-up').click(function() {
        $('body,html').animate({scrollTop:0},800);
    });


});





