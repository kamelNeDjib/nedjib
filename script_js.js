var container = document.getElementsByClassName('the_inside'),
    next = document.getElementById('next'),
    previous = document.getElementById('previous'),
    box_card = document.getElementsByClassName('card_box')[0],
    animation_text = document.getElementsByClassName('animation-text'),
    big_card = document.getElementsByClassName('big-card')[0],
    txt = document.getElementsByClassName('text'),
    upcoming = document.getElementsByClassName('upcoming')[0];
window.onresize = function() {
    if (document.documentElement.clientWidth >= 992 && document.documentElement.clientWidth < 1200) {
        container[0].scrollLeft -= 1200;
        container[1].scrollLeft -= 1200;
    } else if (document.documentElement.clientWidth >= 768 && document.documentElement.clientWidth < 992) {
        container[0].scrollLeft -= 1200;
        container[1].scrollLeft -= 1200;
    } else if (document.documentElement.clientWidth >= 576 && document.documentElement.clientWidth < 768) {
        container[0].scrollLeft -= 1200;
        container[1].scrollLeft -= 1200;
    } else if (document.documentElement.clientWidth < 576) {
        container[0].scrollLeft -= 1200;
        container[1].scrollLeft -= 1200;
    }
}

document.onclick = function() {
    // alert(box_card.getBoundingClientRect().width);
    //alert(window.event.target.id);
    if (window.event.target.id == "next_01") {
        if (document.documentElement.clientWidth >= 1200) container[0].scrollLeft += box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 992 && document.documentElement.clientWidth < 1200) container[0].scrollLeft += box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 768 && document.documentElement.clientWidth < 992) container[0].scrollLeft += box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 576 && document.documentElement.clientWidth < 768) container[0].scrollLeft += box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth < 576) container[0].scrollLeft += box_card.getBoundingClientRect().width;
    } else if (window.event.target.id == "previous_01") {
        if (document.documentElement.clientWidth >= 1200) container[0].scrollLeft -= box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 992 && document.documentElement.clientWidth < 1200) container[0].scrollLeft -= box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 768 && document.documentElement.clientWidth < 992) container[0].scrollLeft -= box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 576 && document.documentElement.clientWidth < 768) container[0].scrollLeft -= box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth < 576) container[0].scrollLeft -= box_card.getBoundingClientRect().width;
    }
    if (window.event.target.id == "next_02") {
        if (document.documentElement.clientWidth >= 1200) container[1].scrollLeft += box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 992 && document.documentElement.clientWidth < 1200) container[1].scrollLeft += box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 768 && document.documentElement.clientWidth < 992) container[1].scrollLeft += box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 576 && document.documentElement.clientWidth < 768) container[1].scrollLeft += box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth < 576) container[1].scrollLeft += box_card.getBoundingClientRect().width;
    } else if (window.event.target.id == "previous_02") {
        if (document.documentElement.clientWidth >= 1200) container[1].scrollLeft -= box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 992 && document.documentElement.clientWidth < 1200) container[1].scrollLeft -= box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 768 && document.documentElement.clientWidth < 992) container[1].scrollLeft -= box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth >= 576 && document.documentElement.clientWidth < 768) container[1].scrollLeft -= box_card.getBoundingClientRect().width;
        else if (document.documentElement.clientWidth < 576) container[1].scrollLeft -= box_card.getBoundingClientRect().width;
    }
}
document.onscroll = function() {
    console.log(document.documentElement.scrollTop + " // " + (animation_text[0].getBoundingClientRect().top))
    if (animation_text[0].getBoundingClientRect().top <= 0) {
        animation_text[0].style.animation = '13s 2 drop_down_bg';
        txt[0].style.animation = "1 1s 2s forwards txt_anime_01";
        txt[1].style.animation = "1 1s 2.5s forwards txt_anime_02";
        txt[2].style.animation = "1 1s 3s forwards txt_anime_03";
        txt[3].style.animation = "1 1s 3.5s forwards txt_anime_04";
        txt[4].style.animation = "1 1s 4s forwards txt_anime_05";
    }
    if (animation_text[1].getBoundingClientRect().top <= 0) {
        animation_text[1].style.animation = '13s 2 drop_down_bg';
        txt[5].style.animation = "1 1s 2s forwards txt_anime_01";
        txt[6].style.animation = "1 1s 2.5s forwards txt_anime_02";
        txt[7].style.animation = "1 1s 3s forwards txt_anime_03";
        txt[8].style.animation = "1 1s 3.5s forwards txt_anime_04";
        txt[9].style.animation = "1 1s 4s forwards txt_anime_05";
    }
}