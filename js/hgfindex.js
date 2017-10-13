alert(55555);
var temT,
    nextPage,
    temStr = '<span>正在加载……</span>',
    temStrEnd = '<span>哎呀~没有更多了</span>',
    temId = null,
    distinguish = 0;
if(navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i)){
    window.location.href="https://m.hy9z.com/";
}
$.get("/api/get_cate_list", function (result) {
    if (result.code == 0) {
        var str = '';
        if (result.data.length != 0) {
            for (var i = 0; i < result.data.length; i++) {
                str += '<li><a href="javascript:;">' + result.data[i].name + '</a></li>'
            }
            $('#major_label_details').append(str);
            $('#major_label_details a').click(function () {
                $('#loading').html('');
                $(this).parent().addClass('active').siblings().removeClass('active');

                if(distinguish == '0'){
                    if ($(this).html() == '全部') {
                        $.get('/api/get_tpl_list', function (data) {
                            temId = null;
                            nextPage = data.next_page_url;
                            addItemList(data.data);
                        })
                    } else {
                        temId = $(this).html();
                        $.get('/api/get_tpl_list?cat_id=' + $(this).html(), function (data) {
                            nextPage = data.next_page_url;
                            addItemList(data.data);
                        })
                    }
                }else if(distinguish == '1'){
                    if ($(this).html() == '全部') {
                        $.get('/api/get_sce_list', function (data) {
                            temId = null;
                            nextPage = data.next_page_url;
                            addSceneItemList(data.data);
                        })
                    } else {
                        temId = $(this).html();
                        $.get('/api/get_sce_list?cat_id=' + $(this).html(), function (data) {
                            nextPage = data.next_page_url;
                            addSceneItemList(data.data);
                        })
                    }
                }
            })
        }
    }else{
        codeState(result.code);
    }
});

$('.major_in li').click(function(){
    $('.major_in li').removeClass('active');    
    $(this).addClass('active')
    $('#major_label_details a').parent().removeClass('active');
    $('#major_label_details a:first').parent().addClass('active');
    distinguish = $(this).attr('index');
    getList(distinguish);
})




$(window).on('scroll', function () {
    if (scrollTop() + windowHeight() >= (documentHeight())) {
        waterallowData();
    }
});

addTplList()


function getList(id){
    if(id == '0'){
        addTplList()
    }else if(id == '1'){
        addSceneList();
    }
}

function addTplList(){
    $.get('/api/get_tpl_list', function (data) {
        nextPage = data.next_page_url;
        temId = null;
        addItemList(data.data);
    })
}
function addSceneList(){
    $.get('/api/get_sce_list', function (data) {
        nextPage = data.next_page_url;
        temId = null;
        addSceneItemList(data.data);
    })
}

function editorUse(id) {
    if(distinguish == '0'){
        $.get('/api/set_use_count/' + id, function (res) {
            if (res.code == 0) {
                $.get('/api/get_tpl_list?tpl_id=' + id, function (result) {
                    setCookie('tpl_data', '10');
                    setTimeout(function () {
                        location.href = "/editor?tplid=" + id;
                    }, 200);
                })
            }else{
                codeState(res.code);
            }
        })
    }else if(distinguish == '1'){
        $.get('/api/set_sce_use_count/' + id, function (res) {
            if (res.code == 0) {
                $.get('/api/get_sce_list?sce_id=' + id, function (result) {
                    setCookie('sce_data', '10');
                    setTimeout(function () {
                        location.href = "/sc_editor?sceid=" + id;
                    }, 200);
                })
            }else{
                codeState(res.code);
            }
        })
    }
}

function addSceneItemList(obj){
    $('#item_list ul li:gt(0)').remove();
    var str = '';
    for (var i = 0; i < obj.length; i++) {
        str += `
                <li>
                    <img onclick="previewSce(${obj[i].sce_id})" src="${obj[i].sce_url}">
                    <div class="item_bottom">
                        <a href="javascript:;" onclick="editorUse(${obj[i].sce_id})">立即使用</a>
                        <span>免费</span>
                    </div>
                </li>
                `
    }
    $('#item_list ul').append(str);
}

function addItemList(obj) {
    $('#item_list ul li:gt(0)').remove();
    var str = '';
    for (var i = 0; i < obj.length; i++) {
        str += `
                <li>
                    <img onclick="previewTpl(${obj[i].tpl_id})" src="${obj[i].tpl_url}">
                    <div class="item_bottom">
                        <a href="javascript:;" onclick="editorUse(${obj[i].tpl_id})">立即使用</a>
                        <span>免费</span>
                    </div>
                </li>
                `
    }
    $('#item_list ul').append(str);
}

function waterallowData() {
    clearTimeout(temT)
    if (nextPage == null) {
        $('#loading').html(temStrEnd);
        return;
    }
    $('#loading').html(temStr);
    temT = setTimeout(function () {
        if(temId != null){
            nextPage += '&cat_id=' + temId;
        }
        $.get(nextPage).success(function (req) {
            nextPage = req.next_page_url;
            var itemdata = req.data;
            itemdata.sort(function (p1, p2) {
                return p2.tpl_id - p1.tpl_id;
            })
            if (itemdata.length != 0) {
                var str = '';
                for (var i = 0; i < itemdata.length; i++) {
                    if(distinguish == '0'){
                        str += `
                            <li>
                                <img onclick="previewTpl(${itemdata[i].tpl_id})" src="${itemdata[i].tpl_url}">
                                <div class="item_bottom">
                                    <a href="javascript:;" onclick="editorUse(${itemdata[i].tpl_id})">立即使用</a>
                                    <span>免费</span>
                                </div>
                            </li>
                        `;
                    }else if(distinguish == '1'){
                        str += `
                            <li>
                                <img onclick="previewSce(${itemdata[i].sce_id})" src="${itemdata[i].sce_url}">
                                <div class="item_bottom">
                                    <a href="javascript:;" onclick="editorUse(${itemdata[i].sce_id})">立即使用</a>
                                    <span>免费</span>
                                </div>
                            </li>
                        `;
                    }
                }
                $('#item_list ul').append(str);
                $('#loading').html('');
                if (nextPage == null) {
                    $('#loading').html(temStrEnd);
                }
            }
        })
    }, 500)
}



function previewTpl(id) {
    $.get('/api/editor/s_show/' + id).success(function (req) {
        if (req.code == 0) {
            $('#fullbg').show();
            $('#preview-wrap').show();
            $('#qrcode img').attr('src', req.data.Qrcode);
            $('#preview-fra iframe').attr('src', req.data.preview_url);
        }else{
            codeState(req.code);
        }
    });
}

function previewSce(id){
    $.get('/api/editor/sce_show/' + id).success(function (req) {
        if (req.code == 0) {
            $('#fullbg').show();
            $('#preview-wrap-sc').show();
            $('#qrcode-sc img').attr('src', req.data.Qrcode);
            $('#preview-fra-sc iframe').attr('src', req.data.preview_url);
        }else{
            codeState(req.code);
        }
    });
}


$('.preview-header-sc a').click(function () {
    $('#fullbg').hide();
    $('#qrcode-sc img').attr('src', '');
    $('#preview-fra-sc iframe').attr('src', '');
    $('#preview-wrap-sc').hide();
})
$('.preview-header a').click(function () {
    $('#fullbg').hide();
    $('#qrcode img').attr('src', '');
    $('#preview-fra iframe').attr('src', '');
    $('#preview-wrap').hide();
})



function setCookie(name, value) {
    var exp = new Date();
    exp.setTime(exp.getTime() + 5 * 60 * 60 * 1000); //5小时过期 
    document.cookie = name + "=" + encodeURIComponent(value) + ";expires=" + exp.toGMTString() + ";path=/";
}

function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) {
        return unescape(arr[2]);
    } else {
        return null;
    }
}

function delCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null) {
        document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
    }
}

function toGit() {
    if(distinguish == '0'){
        location.href = "/editor";
    }else if(distinguish == '1'){
        location.href = "/sc_editor";
    }
}

function scrollTop() {
    return Math.max(document.body.scrollTop, document.documentElement.scrollTop);
}

function documentHeight() {
    return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
}

function windowHeight() {
    return (document.compatMode == "CSS1Compat") ? document.documentElement.clientHeight : document.body.clientHeight;
}


// 轮播图
var carouselCur = 0, carouselLen = $(".carousel li").length, $carousel = $(".carousel"), $carouselText = $(".carouselText"), $carouselRBtn = $(".carouselRBtn"), $carouselLBtn = $(".carouselLBtn");
for (var i=0;i<carouselLen;i++) {
    $(".circleBox").append("<li><span></span></li>");
}
$carouselText.eq(0).animate({"opacity":1},400);
$carouselText.eq(0).find(".rightToC, .leftToC").animate({"left":0,"opacity":1},400);
var $circles = $(".circleBox li");
$circles.eq(0).addClass("cur");

setCarouselSize();

$carouselRBtn.click(function(){
    rightBtnFun();
});

function rightBtnFun(){
    carouselCur ++;
    if (carouselCur > carouselLen - 1) {
        carouselCur = 0;
    }
    changPicCircle(carouselCur);
}

var timer = setInterval(rightBtnFun, 3000);

$carouselLBtn.click(function(){
    carouselCur --;
    if (carouselCur < 0) {
        carouselCur = carouselLen - 1;
    }
    changPicCircle(carouselCur);
});

$circles.click(function(){
    carouselCur = $(this).index();
    changPicCircle(carouselCur);
});


$(".carouselBox").mouseenter(function(){
    clearInterval(timer);
}).mouseleave(function(){
    timer = setInterval(rightBtnFun, 3000);
});

$(".carouselBtn").mouseenter(function(){
    $(this).addClass("enter").removeClass("leave");
}).mouseleave(function(){
    $(this).addClass("leave").removeClass("enter");
});

function changPicCircle(index){
    $circles.eq(index).addClass("cur").siblings().removeClass("cur");
    if (!$(".carousel li").is(":animated")) {
        $(".carousel li").removeClass("cur").fadeOut(400).eq(index).addClass("cur").fadeIn(400);
        $carouselText.animate({"opacity":0},400).eq(index).animate({"opacity":1},400);
        $(".rightToC").animate({"left":40,"opacity":0},400);
        $(".leftToC").animate({"left":-40,"opacity":0},400);
        $carouselText.eq(index).find(".rightToC, .leftToC").animate({"left":0,"opacity":1},400);
    }
}

$(window).resize(function(){
    setCarouselSize();
});

function setCarouselSize(){
    var W = $(window).width(), H = $(window).height();
    $(".carouselBox, .carousel, .carousel li").height(H);
    W <= 1500 ? $carousel.addClass("minScreen") : $carousel.removeClass("minScreen");
}

function codeState(code){
    var codeJson = {'0':'成功', '3000':'参数错误', '3001':'数据为空', '3002':'字段不存在', '3003':'当前参数已经存在', '3004':'图库数量超出限制', '4000':'文件类型错误', '4001':'文件错误', '4002':'文件数据为空', '4003':'文件不存在', '5000':'登录失败', '5001': '未登录', '5002':'验证码发送失败', '5003':'验证码过期', '5004':'账户已存在', '6000': '更新失败'};
    if (code == 0) {
        return true;
    } else {
        if (codeJson[code]) {
            alert(codeJson[code]); 
        } else {
            alert('未知错误'); 
        }
        return false;
    }
}
