    var $window = $(window);
    var wrap = $(".wrap");
    var banner = $(".banner");
    var logo = $(".logo");
    var footer = $("footer");
    var head = $("head");

    // prepend檔頭
    head.prepend("<link rel=\"bookmark\" href=\"images/header/favico.ico\">"); 
    head.prepend("<link rel=\"shortcut icon\" href=\"images/header/favico.ico\">"); 
    head.prepend("<title>UniSay｜由你說</title>"); 

    // banner fixed 動畫
    $window.on("scroll", function(e) {
      if (this.scrollY > 0) {
        banner.addClass("banner2");
      }
      else {
        banner.removeClass("banner2");
      }
    });



    var nav=$("nav");
    var sandwich=$(".sandwich");
    var fixed_shadowbg=$("div.fixed_shadowbg");

    var cart_icon=$(".cart_icon");
    var member_icon=$(".member_icon");
    var cart_sidebar=$(".cart_sidebar");
    var member_sidebar=$(".member_sidebar");

    // ajax載入購物車和會員中心側邊欄內容
    // cart_sidebar.load("ajax/cart_and_member.html .cart_sidebar_content");
    cart_sidebar.load("side_cart.php");
    // member_sidebar.load("ajax/cart_and_member.html .member_sidebar_content");
    // member_sidebar.load("ajax/cart_and_member.html .member_sidebar_content2");
    // member_sidebar.load("cart_and_member.php .member_sidebar_content");
    member_sidebar.load("side_member.php");
    footer.load("ajax/cart_and_member.html .footer_content");

    // 三明治選單收合
    sandwich.click(function(){
      if(nav.hasClass("leftshow")){ //已經打開
        nav.removeClass("leftshow");

        fixed_shadowbg.removeClass("shadowshow");

        logo.removeClass("logo2");

      }else{ //還沒打開
        nav.addClass("leftshow");
        fixed_shadowbg.addClass("shadowshow");
        logo.addClass("logo2");

        // 其他通通關起來
        cart_icon.removeClass("cart_icon2");
        member_icon.removeClass("member_icon2");
        cart_sidebar.removeClass("rightshow");
        member_sidebar.removeClass("rightshow");

        $(".cart_sidebar_content .products_qty_note").removeClass("products_qty_note2");

      }
    });



    // 購物車sidebar收合
    cart_icon.click(function(){
      if(cart_sidebar.hasClass("rightshow")){ //已經打開
        cart_sidebar.removeClass("rightshow");
        cart_icon.removeClass("cart_icon2");
        $(".cart_sidebar_content .products_qty_note").removeClass("products_qty_note2");

        fixed_shadowbg.removeClass("shadowshow");
        logo.removeClass("logo2");

      }else{ //還沒打開
        cart_sidebar.addClass("rightshow");
        cart_icon.addClass("cart_icon2");
        $(".cart_sidebar_content .products_qty_note").addClass("products_qty_note2");

        fixed_shadowbg.addClass("shadowshow");
        logo.addClass("logo2");
      }
    });



    // 會員sidebar收合
    member_icon.click(function(){
      if(member_sidebar.hasClass("rightshow")){ //已經打開
        member_sidebar.removeClass("rightshow");
        member_icon.removeClass("member_icon2");

        fixed_shadowbg.removeClass("shadowshow");
        logo.removeClass("logo2");

      }else{ //還沒打開
        member_sidebar.addClass("rightshow");
        member_icon.addClass("member_icon2");

        fixed_shadowbg.addClass("shadowshow");
        logo.addClass("logo2");

      }
    });



    // 暗幕點了全部收起來
    fixed_shadowbg.click(function(){
        nav.removeClass("leftshow");

        fixed_shadowbg.removeClass("shadowshow");
        logo.removeClass("logo2");

        cart_icon.removeClass("cart_icon2");
        member_icon.removeClass("member_icon2");
        cart_sidebar.removeClass("rightshow");
        member_sidebar.removeClass("rightshow");

        $(".cart_sidebar_content .products_qty_note").removeClass("products_qty_note2");

    })



    // 捲回置頂
    var totop_icon=$(".totop_icon");
    var parallax=$(".parallax");

    totop_icon.click(function(){

        $('html,body').stop(true,false).animate({scrollTop:0},1000);

        parallax.stop(true,false).animate({scrollTop:0},2000); /*有動畫捲慢一點*/

    });



// 因為有可能載入畫面時，剛好停在有動畫元件的位置，這時就寫下面這行，window一載入就觸發scroll事件
$window.trigger('scroll');
