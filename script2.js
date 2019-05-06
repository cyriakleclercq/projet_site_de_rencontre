function  slide() {

    if ($(".footer").hasClass("photo1")) {


        $(".footer  ").removeClass("photo1");
        $(".footer  ").addClass("photo2");

    }


    else if ($(".footer ").hasClass("photo2")) {

        $(".footer  ").addClass("photo3");
        $(".footer  ").removeClass("photo2");

    }

    else {

        $(".footer  ").addClass("photo1");
        $(".footer  ").removeClass("photo3");

    }
    setTimeout(slide,2000);


};

setTimeout(slide,2000);
