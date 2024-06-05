<?php
    include "_scripts/db.php";
    /**
     * @var $db mysqli
     */
    $new = $db->query("SELECT * FROM products WHERE Is_new")->fetch_all(MYSQLI_ASSOC);
    $cat_1 = $db->query("SELECT * FROM products WHERE Category_id = 1 AND NOT Is_new")->fetch_all(MYSQLI_ASSOC);
    $cat_2 = $db->query("SELECT * FROM products WHERE Category_id = 2 AND NOT Is_new")->fetch_all(MYSQLI_ASSOC);
    $cat_3 = $db->query("SELECT * FROM products WHERE Category_id = 3 AND NOT Is_new")->fetch_all(MYSQLI_ASSOC);
    session_start();
    $cart = $_SESSION["cart"] ?? [];
    $user_id = $_SESSION["user_id"] ?? false;
    $user_name = $_SESSION["user_name"] ?? "";
    $user_phone = $_SESSION["user_phone"] ?? "";
    $cart_count = 0;
    $cart_price = 0;
    $cart_info = [];
    foreach ($cart as $id => $count) {
        $cart_count += $count;
        $product = $db->query("SELECT * FROM products WHERE Id = $id");
        if ($product && $product->num_rows > 0) {
            $product = $product->fetch_assoc();
            $cart_price += $product['Price'] * $count;
        }
        $cart_info[] = [
            "name" => $product['Name'],
            "price" => $product['Price'],
            "total_price" => $product['Price'] * $count,
            "count" => $count
        ];
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!--metatextblock-->
    <title>Главная страница</title>
    <meta property="og:url" content="http://internet-magazin-odejdi.tilda.ws"/>
    <meta property="og:title" content="Главная страница"/>
    <meta property="og:description" content=""/>
    <meta property="og:type" content="website"/>
    <meta property="og:image"
          content="images/tild6637-3436-4337-b163-396636386561__-__resize__504x__x1600_adc85e33ca.jpg"/>
    <link rel="canonical" href="http://internet-magazin-odejdi.tilda.ws"><!--/metatextblock-->
    <meta name="format-detection" content="telephone=no"/>
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="dns-prefetch" href="https://ws.tildacdn.com">
    <link rel="shortcut icon" href="images/tild3933-3337-4237-b338-623034613532__group_142.svg" type="image/x-icon"/>
    <!-- Assets -->
    <script src="https://neo.tildacdn.com/js/tilda-fallback-1.0.min.js" async charset="utf-8"></script>
    <link rel="stylesheet" href="css/tilda-grid-3.0.min.css" type="text/css" media="all" onerror="this.loaderr='y';"/>
    <link rel="stylesheet"
          href="https://static.tildacdn.com/ws/project2393167/tilda-blocks-page49329775.min.css?t=1717081484"
          type="text/css" media="all" onerror="this.loaderr='y';"/>
    <link rel="stylesheet" href="css/tilda-animation-2.0.min.css" type="text/css" media="all"
          onerror="this.loaderr='y';"/>
    <link rel="stylesheet" href="css/highlight.min.css" type="text/css" media="all" onerror="this.loaderr='y';"/>
    <link rel="stylesheet" href="css/tilda-popup-1.1.min.css" type="text/css" media="print" onload="this.media='all';"
          onerror="this.loaderr='y';"/>
    <noscript>
        <link rel="stylesheet" href="css/tilda-popup-1.1.min.css" type="text/css" media="all"/>
    </noscript>
    <script nomodule src="js/tilda-polyfill-1.0.min.js" charset="utf-8"></script>
    <script type="text/javascript">function t_onReady(func) {
        if (document.readyState != 'loading') {
            func();
        } else {
            document.addEventListener('DOMContentLoaded', func);
        }
    }

    function t_onFuncLoad(funcName, okFunc, time) {
        if (typeof window[funcName] === 'function') {
            okFunc();
        } else {
            setTimeout(function () {
                t_onFuncLoad(funcName, okFunc, time);
            }, (time || 100));
        }
    }

    window.tildaApiServiceRootDomain = "tildaapi.pro";

    function t396_initialScale(t) {
        t = document.getElementById("rec" + t);
        if (t) {
            t = t.querySelector(".t396__artboard");
            if (t) {
                var e, r = document.documentElement.clientWidth, a = [];
                if (l = t.getAttribute("data-artboard-screens")) for (var l = l.split(","), i = 0; i < l.length; i++) a[i] = parseInt(l[i], 10); else a = [320, 480, 640, 960, 1200];
                for (i = 0; i < a.length; i++) {
                    var o = a[i];
                    o <= r && (e = o)
                }
                var n = "edit" === window.allrecords.getAttribute("data-tilda-mode"),
                    d = "center" === t396_getFieldValue(t, "valign", e, a),
                    u = "grid" === t396_getFieldValue(t, "upscale", e, a), c = t396_getFieldValue(t, "height_vh", e, a),
                    g = t396_getFieldValue(t, "height", e, a),
                    s = !!window.opr && !!window.opr.addons || !!window.opera || -1 !== navigator.userAgent.indexOf(" OPR/");
                if (!n && d && !u && !c && g && !s) {
                    for (var _ = parseFloat((r / e).toFixed(3)), f = [t, t.querySelector(".t396__carrier"), t.querySelector(".t396__filter")], i = 0; i < f.length; i++) f[i].style.height = Math.floor(parseInt(g, 10) * _) + "px";
                    t396_scaleInitial__getElementsToScale(t).forEach(function (t) {
                        t.style.zoom = _
                    })
                }
            }
        }
    }

    function t396_scaleInitial__getElementsToScale(t) {
        t = Array.prototype.slice.call(t.querySelectorAll(".t396__elem"));
        if (!t.length) return [];
        var e = [];
        return (t = t.filter(function (t) {
            t = t.closest('.t396__group[data-group-type-value="physical"]');
            return !t || (-1 === e.indexOf(t) && e.push(t), !1)
        })).concat(e)
    }

    function t396_getFieldValue(t, e, r, a) {
        var l = a[a.length - 1],
            i = r === l ? t.getAttribute("data-artboard-" + e) : t.getAttribute("data-artboard-" + e + "-res-" + r);
        if (!i) for (var o = 0; o < a.length; o++) {
            var n = a[o];
            if (!(n <= r) && (i = n === l ? t.getAttribute("data-artboard-" + e) : t.getAttribute("data-artboard-" + e + "-res-" + n))) break
        }
        return i
    }</script>
    <script src="js/jquery-1.10.2.min.js" charset="utf-8" onerror="this.loaderr='y';"></script>
    <script src="js/tilda-scripts-3.0.min.js" charset="utf-8" defer onerror="this.loaderr='y';"></script>
    <script src="https://static.tildacdn.com/ws/project2393167/tilda-blocks-page49329775.min.js?t=1717081484"
            charset="utf-8" async onerror="this.loaderr='y';"></script>
    <script src="js/tilda-animation-2.0.min.js" charset="utf-8" async onerror="this.loaderr='y';"></script>
    <script src="js/tilda-zero-1.1.min.js" charset="utf-8" async onerror="this.loaderr='y';"></script>
    <script src="js/highlight.min.js" charset="utf-8" onerror="this.loaderr='y';"></script>
    <script src="js/tilda-popup-1.0.min.js" charset="utf-8" async onerror="this.loaderr='y';"></script>
    <script src="js/tilda-animation-sbs-1.0.min.js" charset="utf-8" async onerror="this.loaderr='y';"></script>
    <script src="js/tilda-zero-scale-1.0.min.js" charset="utf-8" async onerror="this.loaderr='y';"></script>
    <script src="js/tilda-events-1.0.min.js" charset="utf-8" async onerror="this.loaderr='y';"></script>
    <script type="text/javascript">window.dataLayer = window.dataLayer || [];</script>
    <script type="text/javascript">(function () {
        if ((/bot|google|yandex|baidu|bing|msn|duckduckbot|teoma|slurp|crawler|spider|robot|crawling|facebook/i.test(navigator.userAgent)) === false && typeof (sessionStorage) != 'undefined' && sessionStorage.getItem('visited') !== 'y' && document.visibilityState) {
            var style = document.createElement('style');
            style.type = 'text/css';
            style.innerHTML = '@media screen and (min-width: 980px) {.t-records {opacity: 0;}.t-records_animated {-webkit-transition: opacity ease-in-out .2s;-moz-transition: opacity ease-in-out .2s;-o-transition: opacity ease-in-out .2s;transition: opacity ease-in-out .2s;}.t-records.t-records_visible {opacity: 1;}}';
            document.getElementsByTagName('head')[0].appendChild(style);

            function t_setvisRecs() {
                var alr = document.querySelectorAll('.t-records');
                Array.prototype.forEach.call(alr, function (el) {
                    el.classList.add("t-records_animated");
                });
                setTimeout(function () {
                    Array.prototype.forEach.call(alr, function (el) {
                        el.classList.add("t-records_visible");
                    });
                    sessionStorage.setItem("visited", "y");
                }, 400);
            }

            document.addEventListener('DOMContentLoaded', t_setvisRecs);
        }
    })();</script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="t-body" style="margin:0;"><!--allrecords-->
<div id="allrecords" data-tilda-export="yes" class="t-records" data-hook="blocks-collection-content-node"
     data-tilda-project-id="2393167" data-tilda-page-id="49329775"
     data-tilda-formskey="dd040428992badd1e9ce5e5a92393167" data-tilda-project-lang="RU" data-tilda-root-zone="pro">
    <div id="rec754377702" class="r t-rec" style=" " data-record-type="215">
        <a name="glavnaya" style="font-size:0;"></a>
    </div>
    <div id="rec751569073" class="r t-rec t-rec_pb_0" style="padding-bottom:0px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec751569073 .t396__artboard {
            min-height: 650px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec751569073 .t396__filter {
            min-height: 650px;
            height: 0vh;
        }

        #rec751569073 .t396__carrier {
            min-height: 650px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec751569073 .t396__artboard, #rec751569073 .t396__filter, #rec751569073 .t396__carrier {
            }

            #rec751569073 .t396__filter {
            }

            #rec751569073 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec751569073 .t396__artboard, #rec751569073 .t396__filter, #rec751569073 .t396__carrier {
            }

            #rec751569073 .t396__filter {
            }

            #rec751569073 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec751569073 .t396__artboard, #rec751569073 .t396__filter, #rec751569073 .t396__carrier {
            }

            #rec751569073 .t396__filter {
            }

            #rec751569073 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .t396__artboard, #rec751569073 .t396__filter, #rec751569073 .t396__carrier {
                height: 460px;
            }

            #rec751569073 .t396__filter {
            }

            #rec751569073 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716911648916"] {
            z-index: 2;
            top: 146px;
            left: calc(50% - 600px + 6px);
            width: 1200px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716911648916"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716911648916"] {
                top: 315px;
                left: calc(50% - 160px + 12px);
                width: 296px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716724325988"] {
            color: #d2bbab;
            z-index: 3;
            top: 4px;
            left: calc(50% - 600px + 547px);
            width: 63px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716724325988"] .tn-atom {
            color: #d2bbab;
            font-size: 36px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 600;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716724325988"] {
                top: 127px;
                left: calc(50% - 160px + 107px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716724679124"] {
            color: #000000;
            z-index: 4;
            top: 84px;
            left: calc(50% - 600px + 562px);
            width: 73px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716724679124"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716724679124"] {
                top: 195px;
                left: calc(50% - 160px + 217px);
            }

            #rec751569073 .tn-elem[data-elem-id="1716724679124"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716724735991"] {
            color: #000000;
            z-index: 5;
            top: 84px;
            left: calc(50% - 600px + 476px);
            width: 60px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716724735991"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716724735991"] {
                top: 195px;
                left: calc(50% - 160px + 131px);
            }

            #rec751569073 .tn-elem[data-elem-id="1716724735991"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716724741560"] {
            color: #000000;
            z-index: 6;
            top: 84px;
            left: calc(50% - 600px + 659px);
            width: 58px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716724741560"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716724741560"] {
                top: 244px;
                left: calc(50% - 160px + 88px);
            }

            #rec751569073 .tn-elem[data-elem-id="1716724741560"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716724742885"] {
            color: #000000;
            z-index: 7;
            top: 84px;
            left: calc(50% - 600px + 386px);
            width: 60px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716724742885"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716724742885"] {
                top: 195px;
                left: calc(50% - 160px + 41px);
            }

            #rec751569073 .tn-elem[data-elem-id="1716724742885"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716724744124"] {
            color: #000000;
            z-index: 8;
            top: 84px;
            left: calc(50% - 600px + 741px);
            width: 60px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716724744124"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716724744124"] {
                top: 244px;
                left: calc(50% - 160px + 170px);
            }

            #rec751569073 .tn-elem[data-elem-id="1716724744124"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716725092696"] {
            color: #000000;
            z-index: 9;
            top: 20px;
            left: calc(50% - 600px + 12px);
            width: 117px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716725092696"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716725092696"] {
                top: 15px;
                left: calc(50% - 160px + 25px);
            }

            #rec751569073 .tn-elem[data-elem-id="1716725092696"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716725171465"] {
            color: #000000;
            z-index: 10;
            top: 20px;
            left: calc(50% - 600px + 148px);
            width: 88px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716725171465"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716725171465"] {
                top: 51px;
                left: calc(50% - 160px + 25px);
            }

            #rec751569073 .tn-elem[data-elem-id="1716725171465"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716726847178"] {
            z-index: 11;
            top: 23px;
            left: calc(50% - 600px + 1169px);
            width: 19px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716726847178"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716726847178"] {
                top: 54px;
                left: calc(50% - 160px + 275px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716728035324"] {
            color: #d2bbab;
            z-index: 12;
            top: 280px;
            left: calc(50% - 600px + 455px);
            width: 289px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716728035324"] .tn-atom {
            color: #d2bbab;
            font-size: 46px;
            font-family: 'Georgia', serif;
            line-height: 1.55;
            font-weight: 300;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716728035324"] {
                top: 347px;
                left: calc(50% - 160px + 117px);
                width: 94px;
            }

            #rec751569073 .tn-elem[data-elem-id="1716728035324"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716728674758"] {
            color: #ffffff;
            z-index: 13;
            top: 343px;
            left: calc(50% - 600px + 361px);
            width: 478px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716728674758"] .tn-atom {
            color: #ffffff;
            font-size: 56px;
            font-family: 'Georgia', serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716728674758"] {
                top: 364px;
                left: calc(50% - 160px + 78px);
                width: 174px;
            }

            #rec751569073 .tn-elem[data-elem-id="1716728674758"] .tn-atom {
                font-size: 20px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716728948719"] {
            color: #000000;
            text-align: center;
            z-index: 14;
            top: 444px;
            left: calc(50% - 600px + 499px);
            width: 202px;
            height: 51px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716728948719"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            border-radius: 30px;
            background-color: #ffffff;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec751569073 .tn-elem[data-elem-id="1716728948719"] .tn-atom:hover {
                background-color: #d2bbab;
                background-image: none;
            }

            #rec751569073 .tn-elem[data-elem-id="1716728948719"] .tn-atom:hover {
                color: #000000;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716728948719"] {
                top: 402px;
                left: calc(50% - 160px + 117px);
                width: 87px;
                height: 22px;
            }

            #rec751569073 .tn-elem[data-elem-id="1716728948719"] .tn-atom {
                font-size: 8px;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716742016388"] {
            z-index: 15;
            top: 21px;
            left: calc(50% - 600px + 1134px);
            width: 21px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716742016388"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716742016388"] {
                top: 15px;
                left: calc(50% - 160px + 274px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716829777339"] {
            z-index: 16;
            top: 42px;
            left: calc(50% - 600px + 12px);
            width: 116px;
        }

        #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716829777339"] {
            opacity: 0;
        }

        #rec751569073 .tn-elem[data-elem-id="1716829777339"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec751569073 .tn-elem[data-elem-id="1716829777339"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716829777339"] {
                top: 37px;
                left: calc(50% - 160px + 25px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716830404735"] {
            z-index: 17;
            top: 42px;
            left: calc(50% - 600px + 146px);
            width: 136px;
        }

        #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716830404735"] {
            opacity: 0;
        }

        #rec751569073 .tn-elem[data-elem-id="1716830404735"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec751569073 .tn-elem[data-elem-id="1716830404735"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716830404735"] {
                top: 73px;
                left: calc(50% - 160px + 22px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716832085845"] {
            z-index: 18;
            top: 23px;
            left: calc(50% - 600px + 1169px);
            width: 19px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716832085845"] {
                opacity: 0;
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716832085845"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716832085845"] {
                top: 54px;
                left: calc(50% - 160px + 275px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716841777739"] {
            z-index: 19;
            top: 107px;
            left: calc(50% - 600px + 738px);
            width: 78px;
        }

        #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841777739"] {
            opacity: 0;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841777739"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841777739"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716841777739"] {
                top: 266px;
                left: calc(50% - 160px + 162px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716841832077"] {
            z-index: 20;
            top: 107px;
            left: calc(50% - 600px + 657px);
            width: 62px;
        }

        #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841832077"] {
            opacity: 0;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841832077"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841832077"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716841832077"] {
                top: 266px;
                left: calc(50% - 160px + 81px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716841853346"] {
            z-index: 21;
            top: 107px;
            left: calc(50% - 600px + 560px);
            width: 75px;
        }

        #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841853346"] {
            opacity: 0;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841853346"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841853346"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716841853346"] {
                top: 217px;
                left: calc(50% - 160px + 210px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716841878182"] {
            z-index: 22;
            top: 108px;
            left: calc(50% - 600px + 474px);
            width: 65px;
        }

        #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841878182"] {
            opacity: 0;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841878182"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841878182"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716841878182"] {
                top: 218px;
                left: calc(50% - 160px + 124px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716841918299"] {
            z-index: 23;
            top: 108px;
            left: calc(50% - 600px + 384px);
            width: 69px;
        }

        #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841918299"] {
            opacity: 0;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841918299"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec751569073 .tn-elem[data-elem-id="1716841918299"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716841918299"] {
                top: 218px;
                left: calc(50% - 160px + 34px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716842063870"] {
            z-index: 24;
            top: 24px;
            left: calc(50% - 600px + 1135px);
            width: 20px;
            pointer-events: none;
        }

        #rec751569073 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716842063870"] {
            opacity: 0;
        }

        #rec751569073 .tn-elem[data-elem-id="1716842063870"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec751569073 .tn-elem[data-elem-id="1716842063870"] {
                top: 17px;
                left: calc(50% - 160px + 275px);
            }
        }

        #rec751569073 .tn-elem[data-elem-id="1716845075853"] {
            z-index: 25;
            top: 768px;
            left: calc(50% - 600px + 31px);
            width: 560px;
            height: 170px;
        }

        #rec751569073 .tn-elem[data-elem-id="1716845075853"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="751569073" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="650" data-artboard-valign="center" data-artboard-upscale="window"
                 data-artboard-height-res-320="460"
            >
                <div class="t396__carrier" data-artboard-recid="751569073"></div>
                <div class="t396__filter" data-artboard-recid="751569073"></div>
                <div class='t396__elem tn-elem tn-elem__7515690731716911648916' data-elem-id='1716911648916'
                     data-elem-type='image' data-field-top-value="146" data-field-left-value="6"
                     data-field-width-value="1200" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="1200"
                     data-field-fileheight-value="496" data-field-top-res-320-value="315"
                     data-field-left-res-320-value="12" data-field-width-res-320-value="296"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img'
                             src='images/tild6165-3036-4266-a633-393135363061__amazing-young-woman-.png' alt=''
                             imgfield='tn_img_1716911648916'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716724325988' data-elem-id='1716724325988'
                     data-elem-type='text' data-field-top-value="4" data-field-left-value="547"
                     data-field-width-value="63" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="127"
                     data-field-left-res-320-value="107"
                >
                    <div class='tn-atom'>
                        <a href="#glavnaya" target="_blank" style="color: inherit">Velvet</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716724679124' data-elem-id='1716724679124'
                     data-elem-type='text' data-field-top-value="84" data-field-left-value="562"
                     data-field-width-value="73" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="195"
                     data-field-left-res-320-value="217"
                >
                    <div class='tn-atom'>
                        <a href="#onas" style="color: inherit">О бренде</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716724735991' data-elem-id='1716724735991'
                     data-elem-type='text' data-field-top-value="84" data-field-left-value="476"
                     data-field-width-value="60" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="195"
                     data-field-left-res-320-value="131"
                >
                    <div class='tn-atom'>
                        <a href="#catalog" style="color: inherit">Каталог</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716724741560' data-elem-id='1716724741560'
                     data-elem-type='text' data-field-top-value="84" data-field-left-value="659"
                     data-field-width-value="58" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="244"
                     data-field-left-res-320-value="88"
                >
                    <div class='tn-atom'>
                        <a href="#foto" style="color: inherit">Отчёты</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716724742885' data-elem-id='1716724742885'
                     data-elem-type='text' data-field-top-value="84" data-field-left-value="386"
                     data-field-width-value="60" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="195"
                     data-field-left-res-320-value="41"
                >
                    <div class='tn-atom'>
                        <a href="#novinki" style="color: inherit">Новинки</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716724744124' data-elem-id='1716724744124'
                     data-elem-type='text' data-field-top-value="84" data-field-left-value="741"
                     data-field-width-value="60" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="244"
                     data-field-left-res-320-value="170"
                >
                    <div class='tn-atom'>
                        <a href="#contact" style="color: inherit">Контакты</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716725092696' data-elem-id='1716725092696'
                     data-elem-type='text' data-field-top-value="20" data-field-left-value="12"
                     data-field-width-value="117" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="15"
                     data-field-left-res-320-value="25"
                >
                    <div class='tn-atom' field='tn_text_1716725092696'>
                        <a href="tel:+7 707-772-25-24" target="_blank"
                           style="color:rgb(0, 0, 0) !important;text-decoration: none;border-bottom: 0px solid;box-shadow: inset 0px -0px 0px 0px;-webkit-box-shadow: inset 0px -0px 0px 0px;-moz-box-shadow: inset 0px -0px 0px 0px;">
                            +7 707-772-25-24
                        </a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716725171465' data-elem-id='1716725171465'
                     data-elem-type='text' data-field-top-value="20" data-field-left-value="148"
                     data-field-width-value="88" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="51"
                     data-field-left-res-320-value="25"
                >
                    <div class='tn-atom' field='tn_text_1716725171465'>style.velvet@mail.ru</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716726847178' data-elem-id='1716726847178'
                     data-elem-type='image' data-field-top-value="23" data-field-left-value="1169"
                     data-field-width-value="19" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="112"
                     data-field-fileheight-value="112" data-field-top-res-320-value="54"
                     data-field-left-res-320-value="275"
                     id="cart_button"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' test1
                             src='images/tild3438-3738-4163-a366-333737326330__shopping-cart_icon-i.svg' alt=''
                             imgfield='tn_img_1716726847178'/>
                    </div>
                    <span class="count"><?= $cart_count ?></span>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716728035324' data-elem-id='1716728035324'
                     data-elem-type='text' data-field-top-value="280" data-field-left-value="455"
                     data-field-width-value="289" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="347"
                     data-field-left-res-320-value="117" data-field-width-res-320-value="94"
                >
                    <div class='tn-atom' field='tn_text_1716728035324'>Наш особый</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716728674758' data-elem-id='1716728674758'
                     data-elem-type='text' data-field-top-value="343" data-field-left-value="361"
                     data-field-width-value="478" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="364"
                     data-field-left-res-320-value="78" data-field-width-res-320-value="174"
                >
                    <div class='tn-atom' field='tn_text_1716728674758'>Модный Тренд</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716728948719' data-elem-id='1716728948719'
                     data-elem-type='button' data-field-top-value="444" data-field-left-value="499"
                     data-field-height-value="51" data-field-width-value="202" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="402" data-field-left-res-320-value="117"
                     data-field-height-res-320-value="22" data-field-width-res-320-value="87"
                >
                    <a class='tn-atom' href="#catalog">КУПИТЬ СЕЙЧАС</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716742016388' data-elem-id='1716742016388'
                     data-elem-type='image' data-field-top-value="21" data-field-left-value="1134"
                     data-field-width-value="21" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256" data-field-top-res-320-value="15"
                     data-field-left-res-320-value="274"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716742016388'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716742016388' data-elem-id='1716742016388'
                     data-elem-type='image' data-field-top-value="22" data-field-left-value="1100"
                     data-field-width-value="21" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256" data-field-top-res-320-value="15"
                     data-field-left-res-320-value="274" id="user_block"
                >
                    <?php if ($user_id): ?>
                        <a id="logout" href="_scripts/logout.php" class='tn-atom'>
                            <span><?= $user_name ?></span>
                            <img class='tn-atom__img' src='images/logout-svgrepo-com.svg' alt=''/>
                        </a>
                    <?php else: ?>
                    <div id="show_dialog_user" class='tn-atom'>
                        <img class='tn-atom__img' src='images/user-svgrepo-com.svg' alt=''/>
                    </div>
                    <?php endif; ?>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716829777339 t396__elem--anim-hidden'
                     data-elem-id='1716829777339' data-elem-type='vector' data-field-top-value="42"
                     data-field-left-value="12" data-field-width-value="116" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716725092696"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="116" data-field-fileheight-value="4" data-field-top-res-320-value="37"
                     data-field-left-res-320-value="25"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5412 4742 116.00439453125 4">
                            <line fill="transparent" fill-opacity="1" stroke="#000000" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg9d728a3e4b" x1="5413.999866832384"
                                  y1="4743.99982244318" x2="5526.004465776842" y2="4743.99982244318"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716830404735 t396__elem--anim-hidden'
                     data-elem-id='1716830404735' data-elem-type='vector' data-field-top-value="42"
                     data-field-left-value="146" data-field-width-value="136" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716725171465"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="136" data-field-fileheight-value="4" data-field-top-res-320-value="73"
                     data-field-left-res-320-value="22"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5546 4742 136 4">
                            <line fill="transparent" fill-opacity="1" stroke="#000000" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg178a0740a50" x1="5547.999830163044"
                                  y1="4744.000233525816" x2="5680.0000000002065" y2="4744.000233525816"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716832085845 t396__elem--anim-hidden'
                     data-elem-id='1716832085845' data-elem-type='image' data-field-top-value="23"
                     data-field-left-value="1169" data-field-width-value="19" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716726847178"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.05,'sy':1.05,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="112" data-field-fileheight-value="112"
                     data-field-top-res-320-value="54" data-field-left-res-320-value="275"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' test2
                             src='images/tild3438-3738-4163-a366-333737326330__shopping-cart_icon-i.svg' alt=''
                             imgfield='tn_img_1716832085845'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716841777739 t396__elem--anim-hidden'
                     data-elem-id='1716841777739' data-elem-type='vector' data-field-top-value="107"
                     data-field-left-value="738" data-field-width-value="78" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716724744124"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="78" data-field-fileheight-value="4" data-field-top-res-320-value="266"
                     data-field-left-res-320-value="162"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="6138.99951171875 4807 78.00732421875 4">
                            <line fill="transparent" fill-opacity="1" stroke="#d2bbab" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg5c8237f62e" x1="6140.99958881579"
                                  y1="4808.9998972039475" x2="6215.006757799847" y2="4808.9998972039475"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716841832077 t396__elem--anim-hidden'
                     data-elem-id='1716841832077' data-elem-type='vector' data-field-top-value="107"
                     data-field-left-value="657" data-field-width-value="62" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716724741560"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="62" data-field-fileheight-value="4" data-field-top-res-320-value="266"
                     data-field-left-res-320-value="81"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="6057.99169921875 4805 62.01708984375 4">
                            <line fill="transparent" fill-opacity="1" stroke="#d2bbab" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvgbaa73615d2" x1="6059.991668156608"
                                  y1="4807" x2="6118.008618811163" y2="4807" stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716841853346 t396__elem--anim-hidden'
                     data-elem-id='1716841853346' data-elem-type='vector' data-field-top-value="107"
                     data-field-left-value="560" data-field-width-value="75" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716724679124"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="75" data-field-fileheight-value="4" data-field-top-res-320-value="217"
                     data-field-left-res-320-value="210"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5960.9716796875 4807 75.03564453125 4">
                            <line fill="transparent" fill-opacity="1" stroke="#d2bbab" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg127d97fa447" x1="5962.971845190454"
                                  y1="4808.999794407895" x2="6034.0071395426685" y2="4808.999794407895"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716841878182 t396__elem--anim-hidden'
                     data-elem-id='1716841878182' data-elem-type='vector' data-field-top-value="108"
                     data-field-left-value="474" data-field-width-value="65" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716724735991"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="65" data-field-fileheight-value="4" data-field-top-res-320-value="218"
                     data-field-left-res-320-value="124"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5874 4808 65.03173828125 4">
                            <line fill="transparent" fill-opacity="1" stroke="#d2bbab" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg90e3142939" x1="5875.999999999951"
                                  y1="4810.00007709704" x2="5937.03169929271" y2="4810.00007709704"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716841918299 t396__elem--anim-hidden'
                     data-elem-id='1716841918299' data-elem-type='vector' data-field-top-value="108"
                     data-field-left-value="384" data-field-width-value="69" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716724742885"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="69" data-field-fileheight-value="4" data-field-top-res-320-value="218"
                     data-field-left-res-320-value="34"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5784 4805 69.0078125 4">
                            <line fill="transparent" fill-opacity="1" stroke="#d2bbab" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg37dc5b8082" x1="5785.999999999675"
                                  y1="4806.999794407895" x2="5851.00781333587" y2="4806.999794407895"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716842063870 t396__elem--anim-hidden'
                     data-elem-id='1716842063870' data-elem-type='image' data-field-top-value="24"
                     data-field-left-value="1135" data-field-width-value="20" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click"
                     data-animate-sbs-trgels="1716740663662,1716742016388"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="17" data-field-left-res-320-value="275"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716842063870'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7515690731716845075853' data-elem-id='1716845075853'
                     data-elem-type='html' data-field-top-value="768" data-field-left-value="31"
                     data-field-height-value="170" data-field-width-value="560" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <div class='tn-atom tn-atom__html'>
                        <style>.img-good {
                            border-radius: 25px;
                            overflow: hidden;
                        }

                        .img-good .tn-atom {
                            border-radius: 25px;
                            transition: transform 200ms ease-in-out;
                        }

                        .img-good:hover .tn-atom {
                            transform: scale(115%);
                        }</style>
                    </div>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('751569073');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('751569073');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754377527" class="r t-rec" style=" " data-record-type="215">
        <a name="novinki" style="font-size:0;"></a>
    </div>
    <div id="rec753708294" class="r t-rec t-rec_pt_0" style="padding-top:0px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec753708294 .t396__artboard {
            min-height: 650px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec753708294 .t396__filter {
            min-height: 650px;
            height: 0vh;
        }

        #rec753708294 .t396__carrier {
            min-height: 650px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec753708294 .t396__artboard, #rec753708294 .t396__filter, #rec753708294 .t396__carrier {
            }

            #rec753708294 .t396__filter {
            }

            #rec753708294 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec753708294 .t396__artboard, #rec753708294 .t396__filter, #rec753708294 .t396__carrier {
            }

            #rec753708294 .t396__filter {
            }

            #rec753708294 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec753708294 .t396__artboard, #rec753708294 .t396__filter, #rec753708294 .t396__carrier {
            }

            #rec753708294 .t396__filter {
            }

            #rec753708294 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .t396__artboard, #rec753708294 .t396__filter, #rec753708294 .t396__carrier {
                height: 2200px;
            }

            #rec753708294 .t396__filter {
            }

            #rec753708294 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716731200284"] {
            color: #000000;
            z-index: 2;
            top: 20px;
            left: calc(50% - 600px + 80px);
            width: 82px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716731200284"] .tn-atom {
            color: #000000;
            font-size: 32px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716731200284"] {
                top: 4px;
                left: calc(50% - 160px + 35px);
            }

            #rec753708294 .tn-elem[data-elem-id="1716731200284"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716731847735"] {
            z-index: 3;
            top: 94px;
            left: calc(50% - 600px + 80px);
            width: 251px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716731847735"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716731847735"] {
                top: 47px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716732063043"] {
            z-index: 4;
            top: 94px;
            left: calc(50% - 600px + 343px);
            width: 251px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716732063043"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716732063043"] {
                top: 559px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716741697713"] {
            z-index: 5;
            top: 94px;
            left: calc(50% - 600px + 80px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec753708294 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716741697713"] {
                opacity: 0;
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716741697713"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716741697713"] {
                top: 47px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716732114801"] {
            z-index: 6;
            top: 94px;
            left: calc(50% - 600px + 869px);
            width: 251px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716732114801"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716732114801"] {
                top: 1583px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716732117900"] {
            z-index: 7;
            top: 94px;
            left: calc(50% - 600px + 606px);
            width: 251px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716732117900"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716732117900"] {
                top: 1071px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818314567"] {
            z-index: 8;
            top: 94px;
            left: calc(50% - 600px + 343px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec753708294 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716818314567"] {
                opacity: 0;
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818314567"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716818314567"] {
                top: 559px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818347014"] {
            z-index: 9;
            top: 94px;
            left: calc(50% - 600px + 606px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec753708294 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716818347014"] {
                opacity: 0;
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818347014"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716818347014"] {
                top: 1071px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818350434"] {
            z-index: 10;
            top: 94px;
            left: calc(50% - 600px + 869px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec753708294 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716818350434"] {
                opacity: 0;
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818350434"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716818350434"] {
                top: 1583px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716735440737"] {
            color: #ffffff;
            text-align: center;
            z-index: 13;
            top: 602px;
            left: calc(50% - 600px + 532px);
            width: 137px;
            height: 38px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716735440737"] .tn-atom {
            color: #ffffff;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #232323;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753708294 .tn-elem[data-elem-id="1716735440737"] .tn-atom:hover {
                background-color: #e3cbba;
                background-image: none;
            }

            #rec753708294 .tn-elem[data-elem-id="1716735440737"] .tn-atom:hover {
                color: #000000;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716735440737"] {
                top: 2095px;
                left: calc(50% - 160px + 92px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740480399"] {
            z-index: 16;
            top: 113px;
            left: calc(50% - 600px + 557px);
            width: 20px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740480399"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740480399"] {
                top: 578px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740497653"] {
            z-index: 19;
            top: 113px;
            left: calc(50% - 600px + 818px);
            width: 20px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740497653"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740497653"] {
                top: 1090px;
                left: calc(50% - 160px + 247px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740663662"] {
            z-index: 20;
            top: 112px;
            left: calc(50% - 600px + 296px);
            width: 18px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740663662"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740663662"] {
                top: 65px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740695611"] {
            z-index: 23;
            top: 112px;
            left: calc(50% - 600px + 296px);
            width: 18px;
            pointer-events: none;
        }

        #rec753708294 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716740695611"] {
            opacity: 0;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740695611"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740695611"] {
                top: 65px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744152497"] {
            color: #000000;
            z-index: 24;
            top: 447px;
            left: calc(50% - 600px + 97px);
            width: 217px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744152497"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744152497"] {
                top: 400px;
                left: calc(50% - 160px + 52px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744402393"] {
            color: #000000;
            z-index: 25;
            top: 447px;
            left: calc(50% - 600px + 368px);
            width: 201px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744402393"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744402393"] {
                top: 912px;
                left: calc(50% - 160px + 60px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744411903"] {
            color: #000000;
            text-align: center;
            z-index: 26;
            top: 447px;
            left: calc(50% - 600px + 635px);
            width: 194px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744411903"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744411903"] {
                top: 1424px;
                left: calc(50% - 160px + 64px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744421678"] {
            color: #000000;
            text-align: center;
            z-index: 27;
            top: 447px;
            left: calc(50% - 600px + 892px);
            width: 205px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744421678"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744421678"] {
                top: 1936px;
                left: calc(50% - 160px + 58px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744526606"] {
            color: #000000;
            z-index: 28;
            top: 474px;
            left: calc(50% - 600px + 177px);
            width: 58px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744526606"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744526606"] {
                top: 427px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744584752"] {
            color: #000000;
            z-index: 29;
            top: 474px;
            left: calc(50% - 600px + 441px);
            width: 56px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744584752"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744584752"] {
                top: 939px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744601973"] {
            color: #000000;
            z-index: 30;
            top: 493px;
            left: calc(50% - 600px + 704px);
            width: 56px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744601973"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744601973"] {
                top: 1470px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744625783"] {
            color: #000000;
            z-index: 31;
            top: 493px;
            left: calc(50% - 600px + 966px);
            width: 58px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744625783"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744625783"] {
                top: 1982px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716744975080"] {
            z-index: 32;
            top: 111px;
            left: calc(50% - 600px + 1083px);
            width: 20px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716744975080"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716744975080"] {
                top: 1600px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716746137303"] {
            color: #000000;
            text-align: center;
            z-index: 33;
            top: 528px;
            left: calc(50% - 600px + 147px);
            width: 118px;
            height: 38px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716746137303"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753708294 .tn-elem[data-elem-id="1716746137303"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec753708294 .tn-elem[data-elem-id="1716746137303"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716746137303"] {
                top: 481px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716746875535"] {
            color: #000000;
            text-align: center;
            z-index: 34;
            top: 528px;
            left: calc(50% - 600px + 410px);
            width: 118px;
            height: 38px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716746875535"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753708294 .tn-elem[data-elem-id="1716746875535"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec753708294 .tn-elem[data-elem-id="1716746875535"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716746875535"] {
                top: 993px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716746919029"] {
            color: #000000;
            text-align: center;
            z-index: 35;
            top: 528px;
            left: calc(50% - 600px + 673px);
            width: 118px;
            height: 38px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716746919029"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753708294 .tn-elem[data-elem-id="1716746919029"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec753708294 .tn-elem[data-elem-id="1716746919029"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716746919029"] {
                top: 1505px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716746966944"] {
            color: #000000;
            text-align: center;
            z-index: 36;
            top: 528px;
            left: calc(50% - 600px + 936px);
            width: 118px;
            height: 38px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716746966944"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753708294 .tn-elem[data-elem-id="1716746966944"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec753708294 .tn-elem[data-elem-id="1716746966944"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716746966944"] {
                top: 2017px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818016234"] {
            z-index: 37;
            top: 116px;
            left: calc(50% - 600px + 558px);
            width: 18px;
            pointer-events: none;
        }

        #rec753708294 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716818016234"] {
            opacity: 0;
        }

        #rec753708294 .tn-elem[data-elem-id="1716818016234"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716818016234"] {
                top: 581px;
                left: calc(50% - 160px + 250px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818022861"] {
            z-index: 38;
            top: 116px;
            left: calc(50% - 600px + 819px);
            width: 18px;
            pointer-events: none;
        }

        #rec753708294 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716818022861"] {
            opacity: 0;
        }

        #rec753708294 .tn-elem[data-elem-id="1716818022861"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716818022861"] {
                top: 1093px;
                left: calc(50% - 160px + 248px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716818024530"] {
            z-index: 39;
            top: 114px;
            left: calc(50% - 600px + 1084px);
            width: 18px;
            pointer-events: none;
        }

        #rec753708294 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716818024530"] {
            opacity: 0;
        }

        #rec753708294 .tn-elem[data-elem-id="1716818024530"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716818024530"] {
                top: 1603px;
                left: calc(50% - 160px + 250px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740034335"] {
            z-index: 11;
            top: 106px;
            left: calc(50% - 600px + 90px);
            width: 55px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740034335"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740034335"] {
                top: 59px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716739802774"] {
            color: #000000;
            z-index: 12;
            top: 111px;
            left: calc(50% - 600px + 100px);
            width: 28px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716739802774"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716739802774"] {
                top: 64px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740329346"] {
            z-index: 14;
            top: 106px;
            left: calc(50% - 600px + 353px);
            width: 55px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740329346"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740329346"] {
                top: 571px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740329344"] {
            color: #000000;
            z-index: 15;
            top: 111px;
            left: calc(50% - 600px + 363px);
            width: 34px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740329344"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740329344"] {
                top: 576px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740347881"] {
            z-index: 17;
            top: 106px;
            left: calc(50% - 600px + 618px);
            width: 55px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740347881"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740347881"] {
                top: 1083px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740347878"] {
            color: #000000;
            z-index: 18;
            top: 111px;
            left: calc(50% - 600px + 628px);
            width: 34px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740347878"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740347878"] {
                top: 1088px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740351882"] {
            z-index: 21;
            top: 106px;
            left: calc(50% - 600px + 881px);
            width: 55px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740351882"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740351882"] {
                top: 1595px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec753708294 .tn-elem[data-elem-id="1716740351879"] {
            color: #000000;
            z-index: 22;
            top: 111px;
            left: calc(50% - 600px + 891px);
            width: 34px;
        }

        #rec753708294 .tn-elem[data-elem-id="1716740351879"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753708294 .tn-elem[data-elem-id="1716740351879"] {
                top: 1600px;
                left: calc(50% - 160px + 57px);
            }
        }</style>
        <div class='t396'>
            <div>
                <div class="fuck_tilda_wrapper">
                    <h2 class="fuck_tilda_h2">Новинки</h2>
                    <div class="fuck_tilda_products">
                        <?php
                            foreach ($new as $product):
                                $images = json_decode($product["Images"], true);
                        ?>
                            <div class="fuck_tilda_product_row">
                                <div class="product">
                                    <div class="new">НОВОЕ</div>
                                    <div class="like">
                                        <img src="images/tild3536-3430-4336-b536-376435366263__ph_heart.svg" alt="">
                                        <img src="images/tild3665-3236-4633-b331-333533376265__vector_4.svg" alt="">
                                    </div>
                                    <div class="images">
                                        <img src="images/<?= $images[0] ?>" alt="">
                                        <img src="images/<?= $images[1] ?? $images[0] ?>" alt="">
                                    </div>
                                    <p class="name"><?= $product["Name"] ?></p>
                                    <p class="price"><?= $product["Price"] ?> тг.</p>
                                    <a href="_scripts/add_to_cart.php?id=<?= $product["Id"] ?>">
                                        <button class="add_to_cart">Добавить в корзину</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="show_more">Загрузить ещё</button>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('753708294');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('753708294');
            });
        });</script><!-- /T396 --></div>
    <div id="rec753784440" class="r t-rec t-rec_pt_0 t-rec_pb_30" style="padding-top:0px;padding-bottom:30px; "
         data-animationappear="off" data-record-type="396"><!-- T396 -->
        <style>#rec753784440 .t396__artboard {
            min-height: 650px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec753784440 .t396__filter {
            min-height: 650px;
            height: 0vh;
        }

        #rec753784440 .t396__carrier {
            min-height: 650px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec753784440 .t396__artboard, #rec753784440 .t396__filter, #rec753784440 .t396__carrier {
            }

            #rec753784440 .t396__filter {
            }

            #rec753784440 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec753784440 .t396__artboard, #rec753784440 .t396__filter, #rec753784440 .t396__carrier {
            }

            #rec753784440 .t396__filter {
            }

            #rec753784440 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec753784440 .t396__artboard, #rec753784440 .t396__filter, #rec753784440 .t396__carrier {
            }

            #rec753784440 .t396__filter {
            }

            #rec753784440 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .t396__artboard, #rec753784440 .t396__filter, #rec753784440 .t396__carrier {
                height: 2080px;
            }

            #rec753784440 .t396__filter {
            }

            #rec753784440 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716745435201"] {
            z-index: 2;
            top: 70px;
            left: calc(50% - 600px + 80px);
            width: 251px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716745435201"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716745435201"] {
                top: 20px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841496137"] {
            z-index: 3;
            top: 70px;
            left: calc(50% - 600px + 80px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec753784440 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841496137"] {
                opacity: 0;
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841496137"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716841496137"] {
                top: 20px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716745556344"] {
            z-index: 4;
            top: 70px;
            left: calc(50% - 600px + 343px);
            width: 251px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716745556344"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716745556344"] {
                top: 509px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841493675"] {
            z-index: 5;
            top: 70px;
            left: calc(50% - 600px + 343px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec753784440 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841493675"] {
                opacity: 0;
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841493675"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716841493675"] {
                top: 509px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716745561399"] {
            z-index: 6;
            top: 70px;
            left: calc(50% - 600px + 869px);
            width: 251px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716745561399"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716745561399"] {
                top: 1487px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841489637"] {
            z-index: 7;
            top: 70px;
            left: calc(50% - 600px + 869px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec753784440 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841489637"] {
                opacity: 0;
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841489637"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716841489637"] {
                top: 1487px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716745558351"] {
            z-index: 8;
            top: 70px;
            left: calc(50% - 600px + 606px);
            width: 251px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716745558351"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716745558351"] {
                top: 998px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841491429"] {
            z-index: 9;
            top: 70px;
            left: calc(50% - 600px + 606px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec753784440 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841491429"] {
                opacity: 0;
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841491429"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716841491429"] {
                top: 998px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716735440737"] {
            color: #ffffff;
            text-align: center;
            z-index: 10;
            top: 563px;
            left: calc(50% - 600px + 532px);
            width: 137px;
            height: 38px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716735440737"] .tn-atom {
            color: #ffffff;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #000000;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753784440 .tn-elem[data-elem-id="1716735440737"] .tn-atom:hover {
                background-color: #d2bbab;
                background-image: none;
            }

            #rec753784440 .tn-elem[data-elem-id="1716735440737"] .tn-atom:hover {
                color: #000000;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716735440737"] {
                top: 1976px;
                left: calc(50% - 160px + 92px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744152497"] {
            color: #000000;
            z-index: 11;
            top: 423px;
            left: calc(50% - 600px + 107px);
            width: 197px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744152497"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744152497"] {
                top: 373px;
                left: calc(50% - 160px + 62px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744402393"] {
            color: #000000;
            z-index: 12;
            top: 423px;
            left: calc(50% - 600px + 395px);
            width: 147px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744402393"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744402393"] {
                top: 862px;
                left: calc(50% - 160px + 87px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744411903"] {
            color: #000000;
            text-align: center;
            z-index: 13;
            top: 423px;
            left: calc(50% - 600px + 624px);
            width: 215px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744411903"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744411903"] {
                top: 1351px;
                left: calc(50% - 160px + 53px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744421678"] {
            color: #000000;
            text-align: center;
            z-index: 14;
            top: 423px;
            left: calc(50% - 600px + 886px);
            width: 218px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744421678"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744421678"] {
                top: 1840px;
                left: calc(50% - 160px + 52px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744526606"] {
            color: #000000;
            z-index: 19;
            top: 450px;
            left: calc(50% - 600px + 177px);
            width: 58px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744526606"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744526606"] {
                top: 400px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744584752"] {
            color: #000000;
            z-index: 20;
            top: 450px;
            left: calc(50% - 600px + 439px);
            width: 59px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744584752"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744584752"] {
                top: 889px;
                left: calc(50% - 160px + 131px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744601973"] {
            color: #000000;
            z-index: 23;
            top: 450px;
            left: calc(50% - 600px + 704px);
            width: 56px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744601973"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744601973"] {
                top: 1378px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744625783"] {
            color: #000000;
            z-index: 24;
            top: 450px;
            left: calc(50% - 600px + 965px);
            width: 60px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744625783"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744625783"] {
                top: 1867px;
                left: calc(50% - 160px + 131px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744792972"] {
            color: #000000;
            text-align: center;
            z-index: 27;
            top: 485px;
            left: calc(50% - 600px + 147px);
            width: 118px;
            height: 34px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744792972"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #d2bbab;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753784440 .tn-elem[data-elem-id="1716744792972"] .tn-atom:hover {
                background-color: #000000;
                background-image: none;
            }

            #rec753784440 .tn-elem[data-elem-id="1716744792972"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744792972"] {
                top: 435px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744905680"] {
            color: #000000;
            text-align: center;
            z-index: 28;
            top: 485px;
            left: calc(50% - 600px + 410px);
            width: 118px;
            height: 34px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744905680"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #d2bbab;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753784440 .tn-elem[data-elem-id="1716744905680"] .tn-atom:hover {
                background-color: #000000;
                background-image: none;
            }

            #rec753784440 .tn-elem[data-elem-id="1716744905680"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744905680"] {
                top: 924px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744910314"] {
            color: #000000;
            text-align: center;
            z-index: 29;
            top: 485px;
            left: calc(50% - 600px + 673px);
            width: 118px;
            height: 34px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744910314"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #d2bbab;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753784440 .tn-elem[data-elem-id="1716744910314"] .tn-atom:hover {
                background-color: #000000;
                background-image: none;
            }

            #rec753784440 .tn-elem[data-elem-id="1716744910314"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744910314"] {
                top: 1413px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744925579"] {
            color: #000000;
            text-align: center;
            z-index: 30;
            top: 485px;
            left: calc(50% - 600px + 936px);
            width: 118px;
            height: 34px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744925579"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #d2bbab;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec753784440 .tn-elem[data-elem-id="1716744925579"] .tn-atom:hover {
                background-color: #000000;
                background-image: none;
            }

            #rec753784440 .tn-elem[data-elem-id="1716744925579"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744925579"] {
                top: 1902px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740480399"] {
            z-index: 31;
            top: 89px;
            left: calc(50% - 600px + 557px);
            width: 20px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740480399"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740480399"] {
                top: 528px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740497653"] {
            z-index: 32;
            top: 89px;
            left: calc(50% - 600px + 818px);
            width: 20px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740497653"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740497653"] {
                top: 1017px;
                left: calc(50% - 160px + 247px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716744975080"] {
            z-index: 33;
            top: 87px;
            left: calc(50% - 600px + 1083px);
            width: 20px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716744975080"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716744975080"] {
                top: 1504px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740663662"] {
            z-index: 34;
            top: 88px;
            left: calc(50% - 600px + 296px);
            width: 18px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740663662"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740663662"] {
                top: 38px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841317458"] {
            z-index: 35;
            top: 88px;
            left: calc(50% - 600px + 296px);
            width: 18px;
            pointer-events: none;
        }

        #rec753784440 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841317458"] {
            opacity: 0;
        }

        #rec753784440 .tn-elem[data-elem-id="1716841317458"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716841317458"] {
                top: 38px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841331907"] {
            z-index: 36;
            top: 92px;
            left: calc(50% - 600px + 558px);
            width: 18px;
            pointer-events: none;
        }

        #rec753784440 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841331907"] {
            opacity: 0;
        }

        #rec753784440 .tn-elem[data-elem-id="1716841331907"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716841331907"] {
                top: 531px;
                left: calc(50% - 160px + 250px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841346519"] {
            z-index: 37;
            top: 92px;
            left: calc(50% - 600px + 819px);
            width: 18px;
            pointer-events: none;
        }

        #rec753784440 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841346519"] {
            opacity: 0;
        }

        #rec753784440 .tn-elem[data-elem-id="1716841346519"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716841346519"] {
                top: 1020px;
                left: calc(50% - 160px + 248px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716841364570"] {
            z-index: 38;
            top: 90px;
            left: calc(50% - 600px + 1084px);
            width: 18px;
            pointer-events: none;
        }

        #rec753784440 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716841364570"] {
            opacity: 0;
        }

        #rec753784440 .tn-elem[data-elem-id="1716841364570"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716841364570"] {
                top: 1507px;
                left: calc(50% - 160px + 250px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740347881"] {
            z-index: 15;
            top: 82px;
            left: calc(50% - 600px + 618px);
            width: 55px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740347881"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740347881"] {
                top: 1010px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740347878"] {
            color: #000000;
            z-index: 16;
            top: 87px;
            left: calc(50% - 600px + 627px);
            width: 36px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740347878"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740347878"] {
                top: 1015px;
                left: calc(50% - 160px + 56px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740351882"] {
            z-index: 17;
            top: 82px;
            left: calc(50% - 600px + 881px);
            width: 55px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740351882"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740351882"] {
                top: 1499px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740351879"] {
            color: #000000;
            z-index: 18;
            top: 87px;
            left: calc(50% - 600px + 890px);
            width: 36px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740351879"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740351879"] {
                top: 1504px;
                left: calc(50% - 160px + 56px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740034335"] {
            z-index: 21;
            top: 82px;
            left: calc(50% - 600px + 90px);
            width: 55px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740034335"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740034335"] {
                top: 32px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716739802774"] {
            color: #000000;
            z-index: 22;
            top: 87px;
            left: calc(50% - 600px + 99px);
            width: 36px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716739802774"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716739802774"] {
                top: 37px;
                left: calc(50% - 160px + 54px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740329346"] {
            z-index: 25;
            top: 82px;
            left: calc(50% - 600px + 353px);
            width: 55px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740329346"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740329346"] {
                top: 521px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec753784440 .tn-elem[data-elem-id="1716740329344"] {
            color: #000000;
            z-index: 26;
            top: 87px;
            left: calc(50% - 600px + 362px);
            width: 36px;
        }

        #rec753784440 .tn-elem[data-elem-id="1716740329344"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec753784440 .tn-elem[data-elem-id="1716740329344"] {
                top: 526px;
                left: calc(50% - 160px + 54px);
            }
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="753784440" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="650" data-artboard-valign="center" data-artboard-upscale="window"
                 data-artboard-height-res-320="2080"
            >
                <div class="t396__carrier" data-artboard-recid="753784440"></div>
                <div class="t396__filter" data-artboard-recid="753784440"></div>
                <div class='t396__elem tn-elem tn-elem__7537844401716745435201' data-elem-id='1716745435201'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="80"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744" data-field-top-res-320-value="20"
                     data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6336-6333-4434-b434-326162356561__81974010_1_7.png'
                             alt='' imgfield='tn_img_1716745435201'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716841496137 t396__elem--anim-hidden'
                     data-elem-id='1716841496137' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="80" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716745435201"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                     data-field-top-res-320-value="20" data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3362-3736-4261-b030-326534613230__81974010_1_14.png'
                             alt='' imgfield='tn_img_1716841496137'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716745556344' data-elem-id='1716745556344'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="343"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744" data-field-top-res-320-value="509"
                     data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3965-3633-4362-b335-313336306538__81974010_1_8.png'
                             alt='' imgfield='tn_img_1716745556344'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716841493675 t396__elem--anim-hidden'
                     data-elem-id='1716841493675' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="343" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716745556344"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                     data-field-top-res-320-value="509" data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3934-3831-4266-b562-383033343761__81974010_1_15.png'
                             alt='' imgfield='tn_img_1716841493675'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716745561399' data-elem-id='1716745561399'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="869"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744" data-field-top-res-320-value="1487"
                     data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3231-3433-4637-a461-613863623537__81974010_1_10.png'
                             alt='' imgfield='tn_img_1716745561399'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716841489637 t396__elem--anim-hidden'
                     data-elem-id='1716841489637' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="869" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716745561399"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                     data-field-top-res-320-value="1487" data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3235-3837-4765-a339-333438333636__81974010_1_17.png'
                             alt='' imgfield='tn_img_1716841489637'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716745558351' data-elem-id='1716745558351'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="606"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744" data-field-top-res-320-value="998"
                     data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6239-6365-4564-b335-636662376662__81974010_1_9.png'
                             alt='' imgfield='tn_img_1716745558351'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716841491429 t396__elem--anim-hidden'
                     data-elem-id='1716841491429' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="606" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716745558351"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                     data-field-top-res-320-value="998" data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3033-3963-4635-a637-336663373531__81974010_1_16.png'
                             alt='' imgfield='tn_img_1716841491429'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716735440737' data-elem-id='1716735440737'
                     data-elem-type='button' data-field-top-value="563" data-field-left-value="532"
                     data-field-height-value="38" data-field-width-value="137" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1976" data-field-left-res-320-value="92"
                >
                    <a class='tn-atom' href="#collection">Скрыть</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744152497' data-elem-id='1716744152497'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="107"
                     data-field-width-value="197" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="373"
                     data-field-left-res-320-value="62"
                >
                    <div class='tn-atom' field='tn_text_1716744152497'>Топ с драпировкой укороченный
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744402393' data-elem-id='1716744402393'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="395"
                     data-field-width-value="147" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="862"
                     data-field-left-res-320-value="87"
                >
                    <div class='tn-atom' field='tn_text_1716744402393'>Платье мини-из бархата
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744411903' data-elem-id='1716744411903'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="624"
                     data-field-width-value="215" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1351" data-field-left-res-320-value="53"
                >
                    <div class='tn-atom' field='tn_text_1716744411903'>Пиджак однобортный прямого кроя
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744421678' data-elem-id='1716744421678'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="886"
                     data-field-width-value="218" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1840" data-field-left-res-320-value="52"
                >
                    <div class='tn-atom' field='tn_text_1716744421678'>Пиджак однобортный прямого кроя
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744526606' data-elem-id='1716744526606'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="177"
                     data-field-width-value="58" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="400"
                     data-field-left-res-320-value="132"
                >
                    <div class='tn-atom' field='tn_text_1716744526606'>39.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744584752' data-elem-id='1716744584752'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="439"
                     data-field-width-value="59" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="889"
                     data-field-left-res-320-value="131"
                >
                    <div class='tn-atom' field='tn_text_1716744584752'>25.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744601973' data-elem-id='1716744601973'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="704"
                     data-field-width-value="56" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1378" data-field-left-res-320-value="133"
                >
                    <div class='tn-atom' field='tn_text_1716744601973'>37.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744625783' data-elem-id='1716744625783'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="965"
                     data-field-width-value="60" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1867" data-field-left-res-320-value="131"
                >
                    <div class='tn-atom' field='tn_text_1716744625783'>45.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744792972' data-elem-id='1716744792972'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="147"
                     data-field-height-value="34" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="435" data-field-left-res-320-value="102"
                >
                    <a class='tn-atom' href="#collection">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744905680' data-elem-id='1716744905680'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="410"
                     data-field-height-value="34" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="924" data-field-left-res-320-value="102"
                >
                    <a class='tn-atom' href="#collection">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744910314' data-elem-id='1716744910314'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="673"
                     data-field-height-value="34" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1413" data-field-left-res-320-value="102"
                >
                    <a class='tn-atom' href="#collection">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744925579' data-elem-id='1716744925579'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="936"
                     data-field-height-value="34" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1902" data-field-left-res-320-value="102"
                >
                    <a class='tn-atom' href="#collection">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740480399' data-elem-id='1716740480399'
                     data-elem-type='image' data-field-top-value="89" data-field-left-value="557"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256" data-field-top-res-320-value="528"
                     data-field-left-res-320-value="249"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716740480399'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740497653' data-elem-id='1716740497653'
                     data-elem-type='image' data-field-top-value="89" data-field-left-value="818"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256" data-field-top-res-320-value="1017"
                     data-field-left-res-320-value="247"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716740497653'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716744975080' data-elem-id='1716744975080'
                     data-elem-type='image' data-field-top-value="87" data-field-left-value="1083"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256" data-field-top-res-320-value="1504"
                     data-field-left-res-320-value="249"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716744975080'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740663662' data-elem-id='1716740663662'
                     data-elem-type='image' data-field-top-value="88" data-field-left-value="296"
                     data-field-width-value="18" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="224"
                     data-field-fileheight-value="192" data-field-top-res-320-value="38"
                     data-field-left-res-320-value="251"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6134-6636-4038-b161-386661333762__vector_5.svg' alt=''
                             imgfield='tn_img_1716740663662'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716841317458 t396__elem--anim-hidden'
                     data-elem-id='1716841317458' data-elem-type='image' data-field-top-value="88"
                     data-field-left-value="296" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click" data-animate-sbs-trgels="1716740663662"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="38" data-field-left-res-320-value="251"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716841317458'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716841331907 t396__elem--anim-hidden'
                     data-elem-id='1716841331907' data-elem-type='image' data-field-top-value="92"
                     data-field-left-value="558" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click" data-animate-sbs-trgels="1716740480399"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="531" data-field-left-res-320-value="250"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716841331907'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716841346519 t396__elem--anim-hidden'
                     data-elem-id='1716841346519' data-elem-type='image' data-field-top-value="92"
                     data-field-left-value="819" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click" data-animate-sbs-trgels="1716740497653"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="1020" data-field-left-res-320-value="248"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716841346519'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716841364570 t396__elem--anim-hidden'
                     data-elem-id='1716841364570' data-elem-type='image' data-field-top-value="90"
                     data-field-left-value="1084" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click" data-animate-sbs-trgels="1716744975080"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="1507" data-field-left-res-320-value="250"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716841364570'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740347881' data-elem-id='1716740347881'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="618"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32" data-field-top-res-320-value="1010"
                     data-field-left-res-320-value="47"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716740347881'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740347878' data-elem-id='1716740347878'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="627"
                     data-field-width-value="36" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1015" data-field-left-res-320-value="56"
                >
                    <div class='tn-atom' field='tn_text_1716740347878'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740351882' data-elem-id='1716740351882'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="881"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32" data-field-top-res-320-value="1499"
                     data-field-left-res-320-value="47"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716740351882'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740351879' data-elem-id='1716740351879'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="890"
                     data-field-width-value="36" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1504" data-field-left-res-320-value="56"
                >
                    <div class='tn-atom' field='tn_text_1716740351879'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740034335' data-elem-id='1716740034335'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="90"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32" data-field-top-res-320-value="32"
                     data-field-left-res-320-value="45"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716740034335'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716739802774' data-elem-id='1716739802774'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="99"
                     data-field-width-value="36" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="37"
                     data-field-left-res-320-value="54"
                >
                    <div class='tn-atom' field='tn_text_1716739802774'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740329346' data-elem-id='1716740329346'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="353"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32" data-field-top-res-320-value="521"
                     data-field-left-res-320-value="45"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716740329346'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7537844401716740329344' data-elem-id='1716740329344'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="362"
                     data-field-width-value="36" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="526"
                     data-field-left-res-320-value="54"
                >
                    <div class='tn-atom' field='tn_text_1716740329344'>НОВОЕ</div>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('753784440');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('753784440');
            });
        });</script><!-- /T396 --></div>
    <div id="rec753733955" class="r t-rec" style=" " data-animationappear="off" data-record-type="131"><!-- T123 -->
        <div class="t123">
            <div class="t-container_100 ">
                <div class="t-width t-width_100 ">

                    <style>
                        #rec753784440 {
                            display: none;
                        }</style>
                    <script>
                        $('[href = "#collection"]').click(function () {
                            $('#rec753784440').slideToggle(300);
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
    <div id="rec754709004" class="r t-rec" style=" " data-record-type="215">
        <a name="catalog" style="font-size:0;"></a>
    </div>
    <div id="rec754379811" class="r t-rec t-rec_pt_0 t-rec_pb_60" style="padding-top:0px;padding-bottom:60px; "
         data-animationappear="off" data-record-type="396"><!-- T396 -->
        <style>#rec754379811 .t396__artboard {
            min-height: 840px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754379811 .t396__filter {
            min-height: 840px;
            height: 0vh;
        }

        #rec754379811 .t396__carrier {
            min-height: 840px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754379811 .t396__artboard, #rec754379811 .t396__filter, #rec754379811 .t396__carrier {
            }

            #rec754379811 .t396__filter {
            }

            #rec754379811 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754379811 .t396__artboard, #rec754379811 .t396__filter, #rec754379811 .t396__carrier {
            }

            #rec754379811 .t396__filter {
            }

            #rec754379811 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754379811 .t396__artboard, #rec754379811 .t396__filter, #rec754379811 .t396__carrier {
            }

            #rec754379811 .t396__filter {
            }

            #rec754379811 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .t396__artboard, #rec754379811 .t396__filter, #rec754379811 .t396__carrier {
                height: 760px;
            }

            #rec754379811 .t396__filter {
            }

            #rec754379811 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716843980670"] {
            z-index: 2;
            top: 106px;
            left: calc(50% - 600px + 80px);
            width: 514px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716843980670"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716843980670"] {
                top: 88px;
                left: calc(50% - 160px + 25px);
                width: 270px;
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716843501351"] {
            z-index: 3;
            top: 106px;
            left: calc(50% - 600px + 606px);
            width: 514px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716843501351"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716843501351"] {
                top: 299px;
                left: calc(50% - 160px + 25px);
                width: 270px;
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716843679969"] {
            z-index: 4;
            top: 461px;
            left: calc(50% - 600px + 343px);
            width: 514px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716843679969"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716843679969"] {
                top: 510px;
                left: calc(50% - 160px + 25px);
                width: 270px;
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716843039685"] {
            color: #000000;
            z-index: 5;
            top: 32px;
            left: calc(50% - 600px + 80px);
            width: 121px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716843039685"] .tn-atom {
            color: #000000;
            font-size: 32px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716843039685"] {
                top: 20px;
                left: calc(50% - 160px + 35px);
                width: 72px;
            }

            #rec754379811 .tn-elem[data-elem-id="1716843039685"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716843187920"] {
            color: #ffffff;
            z-index: 6;
            top: 128px;
            left: calc(50% - 600px + 104px);
            width: 160px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716843187920"] .tn-atom {
            color: #ffffff;
            font-size: 24px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716843187920"] {
                top: 102px;
                left: calc(50% - 160px + 39px);
                width: 125px;
            }

            #rec754379811 .tn-elem[data-elem-id="1716843187920"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716843215479"] {
            color: #ffffff;
            z-index: 7;
            top: 403px;
            left: calc(50% - 600px + 104px);
            width: 121px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716843215479"] .tn-atom {
            color: #ffffff;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716843215479"] {
                top: 232px;
                left: calc(50% - 160px + 39px);
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716843254820"] {
            z-index: 8;
            top: 410px;
            left: calc(50% - 600px + 225px);
            width: 24px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716843254820"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec754379811 .tn-elem[data-elem-id="1716843254820"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716843254820"] {
                top: 239px;
                left: calc(50% - 160px + 160px);
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716844003144"] {
            color: #ffffff;
            z-index: 9;
            top: 130px;
            left: calc(50% - 600px + 630px);
            width: 78px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844003144"] .tn-atom {
            color: #ffffff;
            font-size: 24px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716844003144"] {
                top: 313px;
                left: calc(50% - 160px + 42px);
                width: 63px;
            }

            #rec754379811 .tn-elem[data-elem-id="1716844003144"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716844034275"] {
            color: #ffffff;
            z-index: 10;
            top: 485px;
            left: calc(50% - 600px + 367px);
            width: 107px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844034275"] .tn-atom {
            color: #ffffff;
            font-size: 24px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716844034275"] {
                top: 524px;
                left: calc(50% - 160px + 39px);
                width: 86px;
            }

            #rec754379811 .tn-elem[data-elem-id="1716844034275"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716844048650"] {
            color: #ffffff;
            z-index: 11;
            top: 758px;
            left: calc(50% - 600px + 367px);
            width: 121px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844048650"] .tn-atom {
            color: #ffffff;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716844048650"] {
                top: 654px;
                left: calc(50% - 160px + 39px);
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716844048648"] {
            z-index: 12;
            top: 765px;
            left: calc(50% - 600px + 488px);
            width: 24px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844048648"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844048648"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716844048648"] {
                top: 661px;
                left: calc(50% - 160px + 160px);
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716844078245"] {
            color: #ffffff;
            z-index: 13;
            top: 403px;
            left: calc(50% - 600px + 630px);
            width: 121px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844078245"] .tn-atom {
            color: #ffffff;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716844078245"] {
                top: 443px;
                left: calc(50% - 160px + 39px);
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716844078243"] {
            z-index: 14;
            top: 410px;
            left: calc(50% - 600px + 751px);
            width: 24px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844078243"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844078243"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754379811 .tn-elem[data-elem-id="1716844078243"] {
                top: 450px;
                left: calc(50% - 160px + 160px);
            }
        }

        #rec754379811 .tn-elem[data-elem-id="1716844636072"] {
            z-index: 15;
            top: 937px;
            left: calc(50% - 600px + -103px);
            width: 560px;
            height: 170px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844636072"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754379811 .tn-elem[data-elem-id="1716844691529"] {
            z-index: 16;
            top: 937px;
            left: calc(50% - 600px + 457px);
            width: 560px;
            height: 170px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844691529"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754379811 .tn-elem[data-elem-id="1716844707323"] {
            z-index: 17;
            top: 1107px;
            left: calc(50% - 600px + 165px);
            width: 560px;
            height: 170px;
        }

        #rec754379811 .tn-elem[data-elem-id="1716844707323"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="754379811" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="840" data-artboard-valign="center" data-artboard-upscale="window"
                 data-artboard-height-res-320="760"
            >
                <div class="t396__carrier" data-artboard-recid="754379811"></div>
                <div class="t396__filter" data-artboard-recid="754379811"></div>
                <div class='t396__elem tn-elem img-zoom tn-elem__7543798111716843980670' data-elem-id='1716843980670'
                     data-elem-type='image' data-field-top-value="106" data-field-left-value="80"
                     data-field-width-value="514" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="1380"
                     data-field-fileheight-value="920" data-field-top-res-320-value="88"
                     data-field-left-res-320-value="25" data-field-width-res-320-value="270"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6637-3666-4661-a638-663331643934__image_33_7.png'
                             alt='' imgfield='tn_img_1716843980670'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem img-zoom1 tn-elem__7543798111716843501351' data-elem-id='1716843501351'
                     data-elem-type='image' data-field-top-value="106" data-field-left-value="606"
                     data-field-width-value="514" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="1380"
                     data-field-fileheight-value="920" data-field-top-res-320-value="299"
                     data-field-left-res-320-value="25" data-field-width-res-320-value="270"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6664-6562-4736-a464-383033383365__image_33_2.png'
                             alt='' imgfield='tn_img_1716843501351'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem img-zoom2 tn-elem__7543798111716843679969' data-elem-id='1716843679969'
                     data-elem-type='image' data-field-top-value="461" data-field-left-value="343"
                     data-field-width-value="514" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="1380"
                     data-field-fileheight-value="920" data-field-top-res-320-value="510"
                     data-field-left-res-320-value="25" data-field-width-res-320-value="270"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3531-3234-4639-b462-383736326634__image_33_3.png'
                             alt='' imgfield='tn_img_1716843679969'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716843039685' data-elem-id='1716843039685'
                     data-elem-type='text' data-field-top-value="32" data-field-left-value="80"
                     data-field-width-value="121" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="20"
                     data-field-left-res-320-value="35" data-field-width-res-320-value="72"
                >
                    <div class='tn-atom' field='tn_text_1716843039685'>Каталог</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716843187920' data-elem-id='1716843187920'
                     data-elem-type='text' data-field-top-value="128" data-field-left-value="104"
                     data-field-width-value="160" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="102"
                     data-field-left-res-320-value="39" data-field-width-res-320-value="125"
                >
                    <div class='tn-atom'>
                        <a href="#ubki" style="color: inherit">Юбки и шорты</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716843215479' data-elem-id='1716843215479'
                     data-elem-type='text' data-field-top-value="403" data-field-left-value="104"
                     data-field-width-value="121" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="232"
                     data-field-left-res-320-value="39"
                >
                    <div class='tn-atom'>
                        <a href="#ubki" style="color: inherit">Перейти в раздел</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716843254820' data-elem-id='1716843254820'
                     data-elem-type='vector' data-field-top-value="410" data-field-left-value="225"
                     data-field-width-value="24" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="24"
                     data-field-fileheight-value="9" data-field-top-res-320-value="239"
                     data-field-left-res-320-value="160"
                >
                    <a class='tn-atom tn-atom__vector' href="#ubki"><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5625 5043 24 9">
                            <line fill="transparent" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                  stroke-width="1" fill-rule="evenodd" id="tSvg7e79a74cdb" x1="5628" y1="5048" x2="5646"
                                  y2="5048" stroke-linecap="butt" marker-end="url(#tSvgMarkerend7e79a74cdb)"></line>
                            <defs>
                                <marker data-type="line-arrow" id="tSvgMarkerend7e79a74cdb" markerWidth="5"
                                        markerHeight="8" viewBox="0 0 5 8" refX="3.2" refY="3.68"
                                        orient="auto-start-reverse" fill="#ffffff">
                                    <path d="M4.03557 4.03553C4.23077 3.84027 4.23077 3.52369 4.03557 3.32843L0.853575 0.146446C0.658275 -0.0488154 0.341675 -0.0488154 0.146475 0.146446C-0.048825 0.341708 -0.048825 0.658291 0.146475 0.85355L2.97487 3.68198L0.146475 6.51041C-0.048825 6.70567 -0.048825 7.02225 0.146475 7.21751C0.341675 7.41278 0.658275 7.41278 0.853575 7.21751L4.03557 4.03553Z"></path>
                                </marker>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844003144' data-elem-id='1716844003144'
                     data-elem-type='text' data-field-top-value="130" data-field-left-value="630"
                     data-field-width-value="78" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="313"
                     data-field-left-res-320-value="42" data-field-width-res-320-value="63"
                >
                    <div class='tn-atom'>
                        <a href="#platie" style="color: inherit">Платья
                            <br>
                        </a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844034275' data-elem-id='1716844034275'
                     data-elem-type='text' data-field-top-value="485" data-field-left-value="367"
                     data-field-width-value="107" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="524"
                     data-field-left-res-320-value="39" data-field-width-res-320-value="86"
                >
                    <div class='tn-atom'>
                        <a href="#kostum" style="color: inherit">Костюмы</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844048650' data-elem-id='1716844048650'
                     data-elem-type='text' data-field-top-value="758" data-field-left-value="367"
                     data-field-width-value="121" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="654"
                     data-field-left-res-320-value="39"
                >
                    <div class='tn-atom'>
                        <a href="#kostum" style="color: inherit">Перейти в раздел</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844048648' data-elem-id='1716844048648'
                     data-elem-type='vector' data-field-top-value="765" data-field-left-value="488"
                     data-field-width-value="24" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="24"
                     data-field-fileheight-value="9" data-field-top-res-320-value="661"
                     data-field-left-res-320-value="160"
                >
                    <a class='tn-atom tn-atom__vector' href="#kostum"><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5625 5043 24 9">
                            <line fill="transparent" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                  stroke-width="1" fill-rule="evenodd" id="tSvg7e79a74cdb" x1="5628" y1="5048" x2="5646"
                                  y2="5048" stroke-linecap="butt" marker-end="url(#tSvgMarkerend7e79a74cdb)"></line>
                            <defs>
                                <marker data-type="line-arrow" id="tSvgMarkerend7e79a74cdb" markerWidth="5"
                                        markerHeight="8" viewBox="0 0 5 8" refX="3.2" refY="3.68"
                                        orient="auto-start-reverse" fill="#ffffff">
                                    <path d="M4.03557 4.03553C4.23077 3.84027 4.23077 3.52369 4.03557 3.32843L0.853575 0.146446C0.658275 -0.0488154 0.341675 -0.0488154 0.146475 0.146446C-0.048825 0.341708 -0.048825 0.658291 0.146475 0.85355L2.97487 3.68198L0.146475 6.51041C-0.048825 6.70567 -0.048825 7.02225 0.146475 7.21751C0.341675 7.41278 0.658275 7.41278 0.853575 7.21751L4.03557 4.03553Z"></path>
                                </marker>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844078245' data-elem-id='1716844078245'
                     data-elem-type='text' data-field-top-value="403" data-field-left-value="630"
                     data-field-width-value="121" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="443"
                     data-field-left-res-320-value="39"
                >
                    <div class='tn-atom'>
                        <a href="#platia" style="color: inherit">Перейти в раздел</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844078243' data-elem-id='1716844078243'
                     data-elem-type='vector' data-field-top-value="410" data-field-left-value="751"
                     data-field-width-value="24" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="24"
                     data-field-fileheight-value="9" data-field-top-res-320-value="450"
                     data-field-left-res-320-value="160"
                >
                    <a class='tn-atom tn-atom__vector' href="#platia"><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5625 5043 24 9">
                            <line fill="transparent" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                  stroke-width="1" fill-rule="evenodd" id="tSvg7e79a74cdb" x1="5628" y1="5048" x2="5646"
                                  y2="5048" stroke-linecap="butt" marker-end="url(#tSvgMarkerend7e79a74cdb)"></line>
                            <defs>
                                <marker data-type="line-arrow" id="tSvgMarkerend7e79a74cdb" markerWidth="5"
                                        markerHeight="8" viewBox="0 0 5 8" refX="3.2" refY="3.68"
                                        orient="auto-start-reverse" fill="#ffffff">
                                    <path d="M4.03557 4.03553C4.23077 3.84027 4.23077 3.52369 4.03557 3.32843L0.853575 0.146446C0.658275 -0.0488154 0.341675 -0.0488154 0.146475 0.146446C-0.048825 0.341708 -0.048825 0.658291 0.146475 0.85355L2.97487 3.68198L0.146475 6.51041C-0.048825 6.70567 -0.048825 7.02225 0.146475 7.21751C0.341675 7.41278 0.658275 7.41278 0.853575 7.21751L4.03557 4.03553Z"></path>
                                </marker>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844636072' data-elem-id='1716844636072'
                     data-elem-type='html' data-field-top-value="937" data-field-left-value="-103"
                     data-field-height-value="170" data-field-width-value="560" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <div class='tn-atom tn-atom__html'>
                        <style>.img-zoom {
                            border-radius: 25px;
                            overflow: hidden;
                        }

                        .img-zoom .tn-atom {
                            border-radius: 25px;
                            transition: transform 300ms ease-in-out;
                        }

                        .img-zoom:hover .tn-atom {
                            transform: scale(115%);
                        }</style>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844691529' data-elem-id='1716844691529'
                     data-elem-type='html' data-field-top-value="937" data-field-left-value="457"
                     data-field-height-value="170" data-field-width-value="560" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <div class='tn-atom tn-atom__html'>
                        <style>.img-zoom1 {
                            border-radius: 25px;
                            overflow: hidden;
                        }

                        .img-zoom1 .tn-atom {
                            border-radius: 25px;
                            transition: transform 300ms ease-in-out;
                        }

                        .img-zoom1:hover .tn-atom {
                            transform: scale(115%);
                        }</style>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543798111716844707323' data-elem-id='1716844707323'
                     data-elem-type='html' data-field-top-value="1107" data-field-left-value="165"
                     data-field-height-value="170" data-field-width-value="560" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <div class='tn-atom tn-atom__html'>
                        <style>.img-zoom2 {
                            border-radius: 25px;
                            overflow: hidden;
                        }

                        .img-zoom2 .tn-atom {
                            border-radius: 25px;
                            transition: transform 300ms ease-in-out;
                        }

                        .img-zoom2:hover .tn-atom {
                            transform: scale(115%);
                        }</style>
                    </div>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754379811');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754379811');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754392192" class="r t-rec" style=" " data-record-type="215">
        <a name="ubki" style="font-size:0;"></a>
    </div>
    <div id="rec754388700" class="r t-rec t-rec_pb_30" style="padding-bottom:30px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec754388700 .t396__artboard {
            min-height: 650px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754388700 .t396__filter {
            min-height: 650px;
            height: 0vh;
        }

        #rec754388700 .t396__carrier {
            min-height: 650px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754388700 .t396__artboard, #rec754388700 .t396__filter, #rec754388700 .t396__carrier {
            }

            #rec754388700 .t396__filter {
            }

            #rec754388700 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754388700 .t396__artboard, #rec754388700 .t396__filter, #rec754388700 .t396__carrier {
            }

            #rec754388700 .t396__filter {
            }

            #rec754388700 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754388700 .t396__artboard, #rec754388700 .t396__filter, #rec754388700 .t396__carrier {
            }

            #rec754388700 .t396__filter {
            }

            #rec754388700 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .t396__artboard, #rec754388700 .t396__filter, #rec754388700 .t396__carrier {
                height: 2130px;
            }

            #rec754388700 .t396__filter {
            }

            #rec754388700 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846405090"] {
            z-index: 2;
            top: 106px;
            left: calc(50% - 600px + 869px);
            width: 251px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716846405090"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716846405090"] {
                top: 1551px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846258577"] {
            z-index: 3;
            top: 106px;
            left: calc(50% - 600px + 606px);
            width: 251px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716846258577"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716846258577"] {
                top: 1058px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846088959"] {
            z-index: 4;
            top: 106px;
            left: calc(50% - 600px + 343px);
            width: 251px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716846088959"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716846088959"] {
                top: 565px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845859905"] {
            z-index: 5;
            top: 106px;
            left: calc(50% - 600px + 80px);
            width: 251px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845859905"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845859905"] {
                top: 72px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845891593"] {
            z-index: 6;
            top: 106px;
            left: calc(50% - 600px + 80px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754388700 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845891593"] {
                opacity: 0;
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845891593"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845891593"] {
                top: 72px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846099642"] {
            z-index: 7;
            top: 106px;
            left: calc(50% - 600px + 343px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754388700 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716846099642"] {
                opacity: 0;
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846099642"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716846099642"] {
                top: 565px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846299977"] {
            z-index: 8;
            top: 106px;
            left: calc(50% - 600px + 606px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754388700 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716846299977"] {
                opacity: 0;
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846299977"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716846299977"] {
                top: 1058px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846407275"] {
            z-index: 9;
            top: 106px;
            left: calc(50% - 600px + 869px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754388700 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716846407275"] {
                opacity: 0;
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716846407275"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716846407275"] {
                top: 1551px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845414413"] {
            color: #000000;
            z-index: 10;
            top: 32px;
            left: calc(50% - 600px + 80px);
            width: 224px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845414413"] .tn-atom {
            color: #000000;
            font-size: 32px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845414413"] {
                top: 20px;
                left: calc(50% - 160px + 35px);
                width: 127px;
            }

            #rec754388700 .tn-elem[data-elem-id="1716845414413"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431238"] {
            z-index: 11;
            top: 118px;
            left: calc(50% - 600px + 90px);
            width: 55px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431238"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431238"] {
                top: 84px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431236"] {
            color: #000000;
            z-index: 12;
            top: 123px;
            left: calc(50% - 600px + 100px);
            width: 28px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431236"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431236"] {
                top: 89px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431235"] {
            color: #ffffff;
            text-align: center;
            z-index: 13;
            top: 603px;
            left: calc(50% - 600px + 532px);
            width: 137px;
            height: 38px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431235"] .tn-atom {
            color: #ffffff;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #232323;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754388700 .tn-elem[data-elem-id="1716845431235"] .tn-atom:hover {
                background-color: #e3cbba;
                background-image: none;
            }

            #rec754388700 .tn-elem[data-elem-id="1716845431235"] .tn-atom:hover {
                color: #000000;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431235"] {
                top: 2044px;
                left: calc(50% - 160px + 92px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431232"] {
            z-index: 14;
            top: 118px;
            left: calc(50% - 600px + 353px);
            width: 55px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431232"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431232"] {
                top: 577px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431230"] {
            color: #000000;
            z-index: 15;
            top: 123px;
            left: calc(50% - 600px + 363px);
            width: 34px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431230"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431230"] {
                top: 582px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431228"] {
            z-index: 16;
            top: 125px;
            left: calc(50% - 600px + 557px);
            width: 20px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431228"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431228"] {
                top: 584px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431226"] {
            z-index: 17;
            top: 118px;
            left: calc(50% - 600px + 618px);
            width: 55px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431226"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431226"] {
                top: 1070px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431224"] {
            color: #000000;
            z-index: 18;
            top: 123px;
            left: calc(50% - 600px + 628px);
            width: 34px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431224"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431224"] {
                top: 1075px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431221"] {
            z-index: 19;
            top: 125px;
            left: calc(50% - 600px + 818px);
            width: 20px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431221"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431221"] {
                top: 1077px;
                left: calc(50% - 160px + 247px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431219"] {
            z-index: 20;
            top: 124px;
            left: calc(50% - 600px + 296px);
            width: 18px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431219"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431219"] {
                top: 90px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431216"] {
            z-index: 21;
            top: 118px;
            left: calc(50% - 600px + 881px);
            width: 55px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431216"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431216"] {
                top: 1563px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431215"] {
            color: #000000;
            z-index: 22;
            top: 123px;
            left: calc(50% - 600px + 891px);
            width: 34px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431215"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431215"] {
                top: 1568px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431212"] {
            z-index: 23;
            top: 124px;
            left: calc(50% - 600px + 296px);
            width: 18px;
            pointer-events: none;
        }

        #rec754388700 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431212"] {
            opacity: 0;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431212"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431212"] {
                top: 90px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431210"] {
            color: #000000;
            z-index: 24;
            top: 459px;
            left: calc(50% - 600px + 126px);
            width: 160px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431210"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431210"] {
                top: 425px;
                left: calc(50% - 160px + 81px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431208"] {
            color: #000000;
            z-index: 25;
            top: 459px;
            left: calc(50% - 600px + 435px);
            width: 68px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431208"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431208"] {
                top: 918px;
                left: calc(50% - 160px + 127px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431205"] {
            color: #000000;
            text-align: center;
            z-index: 26;
            top: 459px;
            left: calc(50% - 600px + 698px);
            width: 67px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431205"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431205"] {
                top: 1411px;
                left: calc(50% - 160px + 127px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431203"] {
            color: #000000;
            text-align: center;
            z-index: 27;
            top: 459px;
            left: calc(50% - 600px + 898px);
            width: 193px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431203"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431203"] {
                top: 1904px;
                left: calc(50% - 160px + 64px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431201"] {
            color: #000000;
            z-index: 28;
            top: 486px;
            left: calc(50% - 600px + 177px);
            width: 58px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431201"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431201"] {
                top: 452px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431199"] {
            color: #000000;
            z-index: 29;
            top: 486px;
            left: calc(50% - 600px + 441px);
            width: 56px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431199"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431199"] {
                top: 945px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431197"] {
            color: #000000;
            z-index: 30;
            top: 486px;
            left: calc(50% - 600px + 704px);
            width: 56px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431197"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431197"] {
                top: 1438px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431195"] {
            color: #000000;
            z-index: 31;
            top: 486px;
            left: calc(50% - 600px + 966px);
            width: 58px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431195"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431195"] {
                top: 1931px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431192"] {
            z-index: 32;
            top: 123px;
            left: calc(50% - 600px + 1083px);
            width: 20px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431192"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431192"] {
                top: 1568px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431191"] {
            color: #000000;
            text-align: center;
            z-index: 33;
            top: 521px;
            left: calc(50% - 600px + 147px);
            width: 118px;
            height: 38px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431191"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754388700 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754388700 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431191"] {
                top: 487px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431189"] {
            color: #000000;
            text-align: center;
            z-index: 34;
            top: 521px;
            left: calc(50% - 600px + 410px);
            width: 118px;
            height: 38px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431189"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754388700 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754388700 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431189"] {
                top: 980px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431188"] {
            color: #000000;
            text-align: center;
            z-index: 35;
            top: 521px;
            left: calc(50% - 600px + 673px);
            width: 118px;
            height: 38px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431188"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754388700 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754388700 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431188"] {
                top: 1473px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431186"] {
            color: #000000;
            text-align: center;
            z-index: 36;
            top: 521px;
            left: calc(50% - 600px + 936px);
            width: 118px;
            height: 38px;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431186"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754388700 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754388700 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431186"] {
                top: 1966px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431184"] {
            z-index: 37;
            top: 128px;
            left: calc(50% - 600px + 558px);
            width: 18px;
            pointer-events: none;
        }

        #rec754388700 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431184"] {
            opacity: 0;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431184"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431184"] {
                top: 587px;
                left: calc(50% - 160px + 250px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431181"] {
            z-index: 38;
            top: 128px;
            left: calc(50% - 600px + 819px);
            width: 18px;
            pointer-events: none;
        }

        #rec754388700 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431181"] {
            opacity: 0;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431181"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431181"] {
                top: 1080px;
                left: calc(50% - 160px + 248px);
            }
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431177"] {
            z-index: 39;
            top: 126px;
            left: calc(50% - 600px + 1084px);
            width: 18px;
            pointer-events: none;
        }

        #rec754388700 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431177"] {
            opacity: 0;
        }

        #rec754388700 .tn-elem[data-elem-id="1716845431177"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754388700 .tn-elem[data-elem-id="1716845431177"] {
                top: 1571px;
                left: calc(50% - 160px + 250px);
            }
        }</style>
        <div class='t396'>
            <div>

                <div class="fuck_tilda_wrapper">
                    <h2 class="fuck_tilda_h2">Юбки и шорты</h2>
                    <div class="fuck_tilda_products">
                        <?php
                        foreach ($cat_1 as $product):
                            $images = json_decode($product["Images"], true);
                            ?>
                            <div class="fuck_tilda_product_row">
                                <div class="product">
                                    <div class="like">
                                        <img src="images/tild3536-3430-4336-b536-376435366263__ph_heart.svg" alt="">
                                        <img src="images/tild3665-3236-4633-b331-333533376265__vector_4.svg" alt="">
                                    </div>
                                    <div class="images">
                                        <img src="images/<?= $images[0] ?>" alt="">
                                        <img src="images/<?= $images[1] ?? $images[0] ?>" alt="">
                                    </div>
                                    <p class="name"><?= $product["Name"] ?></p>
                                    <p class="price"><?= $product["Price"] ?> тг.</p>
                                    <a href="_scripts/add_to_cart.php?id=<?= $product["Id"] ?>">
                                        <button class="add_to_cart">Добавить в корзину</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="show_more">Загрузить ещё</button>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754388700');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754388700');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754393261" class="r t-rec t-rec_pt_0 t-rec_pb_30" style="padding-top:0px;padding-bottom:30px; "
         data-animationappear="off" data-record-type="396"><!-- T396 -->
        <style>#rec754393261 .t396__artboard {
            min-height: 650px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754393261 .t396__filter {
            min-height: 650px;
            height: 0vh;
        }

        #rec754393261 .t396__carrier {
            min-height: 650px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754393261 .t396__artboard, #rec754393261 .t396__filter, #rec754393261 .t396__carrier {
            }

            #rec754393261 .t396__filter {
            }

            #rec754393261 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754393261 .t396__artboard, #rec754393261 .t396__filter, #rec754393261 .t396__carrier {
            }

            #rec754393261 .t396__filter {
            }

            #rec754393261 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754393261 .t396__artboard, #rec754393261 .t396__filter, #rec754393261 .t396__carrier {
            }

            #rec754393261 .t396__filter {
            }

            #rec754393261 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .t396__artboard, #rec754393261 .t396__filter, #rec754393261 .t396__carrier {
                height: 2100px;
            }

            #rec754393261 .t396__filter {
            }

            #rec754393261 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847348388"] {
            z-index: 2;
            top: 70px;
            left: calc(50% - 600px + 869px);
            width: 251px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716847348388"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716847348388"] {
                top: 1519px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847247673"] {
            z-index: 3;
            top: 70px;
            left: calc(50% - 600px + 343px);
            width: 251px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716847247673"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716847247673"] {
                top: 533px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847122028"] {
            z-index: 4;
            top: 70px;
            left: calc(50% - 600px + 606px);
            width: 251px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716847122028"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716847122028"] {
                top: 1026px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847012115"] {
            z-index: 5;
            top: 70px;
            left: calc(50% - 600px + 80px);
            width: 251px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716847012115"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716847012115"] {
                top: 40px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847017362"] {
            z-index: 6;
            top: 70px;
            left: calc(50% - 600px + 80px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754393261 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716847017362"] {
                opacity: 0;
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847017362"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716847017362"] {
                top: 40px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847128818"] {
            z-index: 7;
            top: 70px;
            left: calc(50% - 600px + 606px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754393261 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716847128818"] {
                opacity: 0;
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847128818"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716847128818"] {
                top: 1026px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847255687"] {
            z-index: 8;
            top: 70px;
            left: calc(50% - 600px + 343px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754393261 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716847255687"] {
                opacity: 0;
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847255687"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716847255687"] {
                top: 533px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847401462"] {
            z-index: 9;
            top: 70px;
            left: calc(50% - 600px + 869px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754393261 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716847401462"] {
                opacity: 0;
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716847401462"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716847401462"] {
                top: 1519px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431238"] {
            z-index: 10;
            top: 82px;
            left: calc(50% - 600px + 90px);
            width: 55px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431238"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431238"] {
                top: 52px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431236"] {
            color: #000000;
            z-index: 11;
            top: 87px;
            left: calc(50% - 600px + 100px);
            width: 28px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431236"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431236"] {
                top: 57px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431235"] {
            color: #ffffff;
            text-align: center;
            z-index: 12;
            top: 567px;
            left: calc(50% - 600px + 532px);
            width: 137px;
            height: 38px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431235"] .tn-atom {
            color: #ffffff;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #232323;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754393261 .tn-elem[data-elem-id="1716845431235"] .tn-atom:hover {
                background-color: #e3cbba;
                background-image: none;
            }

            #rec754393261 .tn-elem[data-elem-id="1716845431235"] .tn-atom:hover {
                color: #000000;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431235"] {
                top: 2012px;
                left: calc(50% - 160px + 92px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431232"] {
            z-index: 13;
            top: 82px;
            left: calc(50% - 600px + 353px);
            width: 55px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431232"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431232"] {
                top: 545px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431230"] {
            color: #000000;
            z-index: 14;
            top: 87px;
            left: calc(50% - 600px + 363px);
            width: 34px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431230"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431230"] {
                top: 550px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431228"] {
            z-index: 15;
            top: 89px;
            left: calc(50% - 600px + 557px);
            width: 20px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431228"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431228"] {
                top: 552px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431226"] {
            z-index: 16;
            top: 82px;
            left: calc(50% - 600px + 618px);
            width: 55px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431226"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431226"] {
                top: 1038px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431224"] {
            color: #000000;
            z-index: 17;
            top: 87px;
            left: calc(50% - 600px + 628px);
            width: 34px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431224"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431224"] {
                top: 1043px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431221"] {
            z-index: 18;
            top: 89px;
            left: calc(50% - 600px + 818px);
            width: 20px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431221"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431221"] {
                top: 1045px;
                left: calc(50% - 160px + 247px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431219"] {
            z-index: 19;
            top: 88px;
            left: calc(50% - 600px + 296px);
            width: 18px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431219"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431219"] {
                top: 58px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431216"] {
            z-index: 20;
            top: 82px;
            left: calc(50% - 600px + 881px);
            width: 55px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431216"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431216"] {
                top: 1531px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431215"] {
            color: #000000;
            z-index: 21;
            top: 87px;
            left: calc(50% - 600px + 891px);
            width: 34px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431215"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431215"] {
                top: 1536px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431212"] {
            z-index: 22;
            top: 88px;
            left: calc(50% - 600px + 296px);
            width: 18px;
            pointer-events: none;
        }

        #rec754393261 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431212"] {
            opacity: 0;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431212"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431212"] {
                top: 58px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431210"] {
            color: #000000;
            z-index: 23;
            top: 423px;
            left: calc(50% - 600px + 137px);
            width: 138px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431210"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431210"] {
                top: 393px;
                left: calc(50% - 160px + 92px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431208"] {
            color: #000000;
            z-index: 24;
            top: 423px;
            left: calc(50% - 600px + 363px);
            width: 211px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431208"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431208"] {
                top: 886px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431205"] {
            color: #000000;
            text-align: center;
            z-index: 25;
            top: 423px;
            left: calc(50% - 600px + 646px);
            width: 172px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431205"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431205"] {
                top: 1379px;
                left: calc(50% - 160px + 75px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431203"] {
            color: #000000;
            text-align: center;
            z-index: 26;
            top: 423px;
            left: calc(50% - 600px + 890px);
            width: 209px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431203"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431203"] {
                top: 1872px;
                left: calc(50% - 160px + 56px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431201"] {
            color: #000000;
            z-index: 27;
            top: 450px;
            left: calc(50% - 600px + 177px);
            width: 58px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431201"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431201"] {
                top: 420px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431199"] {
            color: #000000;
            z-index: 28;
            top: 450px;
            left: calc(50% - 600px + 441px);
            width: 56px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431199"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431199"] {
                top: 913px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431197"] {
            color: #000000;
            z-index: 29;
            top: 450px;
            left: calc(50% - 600px + 704px);
            width: 56px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431197"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431197"] {
                top: 1406px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431195"] {
            color: #000000;
            z-index: 30;
            top: 450px;
            left: calc(50% - 600px + 966px);
            width: 58px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431195"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431195"] {
                top: 1899px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431192"] {
            z-index: 31;
            top: 87px;
            left: calc(50% - 600px + 1083px);
            width: 20px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431192"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431192"] {
                top: 1536px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431191"] {
            color: #000000;
            text-align: center;
            z-index: 32;
            top: 485px;
            left: calc(50% - 600px + 147px);
            width: 118px;
            height: 38px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431191"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754393261 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754393261 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431191"] {
                top: 455px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431189"] {
            color: #000000;
            text-align: center;
            z-index: 33;
            top: 485px;
            left: calc(50% - 600px + 410px);
            width: 118px;
            height: 38px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431189"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754393261 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754393261 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431189"] {
                top: 948px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431188"] {
            color: #000000;
            text-align: center;
            z-index: 34;
            top: 485px;
            left: calc(50% - 600px + 673px);
            width: 118px;
            height: 38px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431188"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754393261 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754393261 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431188"] {
                top: 1441px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431186"] {
            color: #000000;
            text-align: center;
            z-index: 35;
            top: 485px;
            left: calc(50% - 600px + 936px);
            width: 118px;
            height: 38px;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431186"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754393261 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754393261 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431186"] {
                top: 1934px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431184"] {
            z-index: 36;
            top: 92px;
            left: calc(50% - 600px + 558px);
            width: 18px;
            pointer-events: none;
        }

        #rec754393261 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431184"] {
            opacity: 0;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431184"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431184"] {
                top: 555px;
                left: calc(50% - 160px + 250px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431181"] {
            z-index: 37;
            top: 92px;
            left: calc(50% - 600px + 819px);
            width: 18px;
            pointer-events: none;
        }

        #rec754393261 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431181"] {
            opacity: 0;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431181"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431181"] {
                top: 1048px;
                left: calc(50% - 160px + 248px);
            }
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431177"] {
            z-index: 38;
            top: 90px;
            left: calc(50% - 600px + 1084px);
            width: 18px;
            pointer-events: none;
        }

        #rec754393261 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431177"] {
            opacity: 0;
        }

        #rec754393261 .tn-elem[data-elem-id="1716845431177"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754393261 .tn-elem[data-elem-id="1716845431177"] {
                top: 1539px;
                left: calc(50% - 160px + 250px);
            }
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="754393261" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="650" data-artboard-valign="center" data-artboard-upscale="window"
                 data-artboard-height-res-320="2100"
            >
                <div class="t396__carrier" data-artboard-recid="754393261"></div>
                <div class="t396__filter" data-artboard-recid="754393261"></div>
                <div class='t396__elem tn-elem tn-elem__7543932611716847348388' data-elem-id='1716847348388'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="869"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744" data-field-top-res-320-value="1519"
                     data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3164-3466-4230-b831-393264313037__81974010_1_33.png'
                             alt='' imgfield='tn_img_1716847348388'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716847247673' data-elem-id='1716847247673'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="343"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744" data-field-top-res-320-value="533"
                     data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6334-3232-4831-b732-326566666462__81974010_1_31.png'
                             alt='' imgfield='tn_img_1716847247673'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716847122028' data-elem-id='1716847122028'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="606"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744" data-field-top-res-320-value="1026"
                     data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6330-3462-4132-a261-666237343830__81974010_1_29.png'
                             alt='' imgfield='tn_img_1716847122028'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716847012115' data-elem-id='1716847012115'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="80"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744" data-field-top-res-320-value="40"
                     data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3866-3732-4834-b135-326664353964__81974010_1_27.png'
                             alt='' imgfield='tn_img_1716847012115'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716847017362 t396__elem--anim-hidden'
                     data-elem-id='1716847017362' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="80" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716847012115"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                     data-field-top-res-320-value="40" data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3361-3865-4430-a162-626361656666__81974010_1_28.png'
                             alt='' imgfield='tn_img_1716847017362'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716847128818 t396__elem--anim-hidden'
                     data-elem-id='1716847128818' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="606" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716847122028"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                     data-field-top-res-320-value="1026" data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3835-3866-4631-a439-366432303634__81974010_1_30.png'
                             alt='' imgfield='tn_img_1716847128818'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716847255687 t396__elem--anim-hidden'
                     data-elem-id='1716847255687' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="343" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716847247673"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                     data-field-top-res-320-value="533" data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3033-3662-4231-a464-646338303166__81974010_1_32.png'
                             alt='' imgfield='tn_img_1716847255687'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716847401462 t396__elem--anim-hidden'
                     data-elem-id='1716847401462' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="869" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716847348388"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                     data-field-top-res-320-value="1519" data-field-left-res-320-value="35"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6430-6132-4234-b439-633565616430__81974010_1_34.png'
                             alt='' imgfield='tn_img_1716847401462'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431238' data-elem-id='1716845431238'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="90"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32" data-field-top-res-320-value="52"
                     data-field-left-res-320-value="45"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716845431238'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431236' data-elem-id='1716845431236'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="100"
                     data-field-width-value="28" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="57"
                     data-field-left-res-320-value="55"
                >
                    <div class='tn-atom' field='tn_text_1716845431236'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431235' data-elem-id='1716845431235'
                     data-elem-type='button' data-field-top-value="567" data-field-left-value="532"
                     data-field-height-value="38" data-field-width-value="137" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="2012" data-field-left-res-320-value="92"
                >
                    <a class='tn-atom' href="#collection1">Скрыть</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431232' data-elem-id='1716845431232'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="353"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32" data-field-top-res-320-value="545"
                     data-field-left-res-320-value="45"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716845431232'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431230' data-elem-id='1716845431230'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="363"
                     data-field-width-value="34" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="550"
                     data-field-left-res-320-value="55"
                >
                    <div class='tn-atom' field='tn_text_1716845431230'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431228' data-elem-id='1716845431228'
                     data-elem-type='image' data-field-top-value="89" data-field-left-value="557"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256" data-field-top-res-320-value="552"
                     data-field-left-res-320-value="249"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716845431228'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431226' data-elem-id='1716845431226'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="618"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32" data-field-top-res-320-value="1038"
                     data-field-left-res-320-value="47"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716845431226'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431224' data-elem-id='1716845431224'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="628"
                     data-field-width-value="34" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1043" data-field-left-res-320-value="57"
                >
                    <div class='tn-atom' field='tn_text_1716845431224'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431221' data-elem-id='1716845431221'
                     data-elem-type='image' data-field-top-value="89" data-field-left-value="818"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256" data-field-top-res-320-value="1045"
                     data-field-left-res-320-value="247"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716845431221'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431219' data-elem-id='1716845431219'
                     data-elem-type='image' data-field-top-value="88" data-field-left-value="296"
                     data-field-width-value="18" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="224"
                     data-field-fileheight-value="192" data-field-top-res-320-value="58"
                     data-field-left-res-320-value="251"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6134-6636-4038-b161-386661333762__vector_5.svg' alt=''
                             imgfield='tn_img_1716845431219'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431216' data-elem-id='1716845431216'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="881"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32" data-field-top-res-320-value="1531"
                     data-field-left-res-320-value="47"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716845431216'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431215' data-elem-id='1716845431215'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="891"
                     data-field-width-value="34" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1536" data-field-left-res-320-value="57"
                >
                    <div class='tn-atom' field='tn_text_1716845431215'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431212 t396__elem--anim-hidden'
                     data-elem-id='1716845431212' data-elem-type='image' data-field-top-value="88"
                     data-field-left-value="296" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click"
                     data-animate-sbs-trgels="1716740663662,1716845431219"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="58" data-field-left-res-320-value="251"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716845431212'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431210' data-elem-id='1716845431210'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="137"
                     data-field-width-value="138" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="393"
                     data-field-left-res-320-value="92"
                >
                    <div class='tn-atom' field='tn_text_1716845431210'>Юбка мини с бахромой
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431208' data-elem-id='1716845431208'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="363"
                     data-field-width-value="211" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="886"
                     data-field-left-res-320-value="55"
                >
                    <div class='tn-atom' field='tn_text_1716845431208'>Юбка мини с разрезом лавандовый
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431205' data-elem-id='1716845431205'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="646"
                     data-field-width-value="172" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1379" data-field-left-res-320-value="75"
                >
                    <div class='tn-atom' field='tn_text_1716845431205'>Шорты с высокой посадкой
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431203' data-elem-id='1716845431203'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="890"
                     data-field-width-value="209" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1872" data-field-left-res-320-value="56"
                >
                    <div class='tn-atom' field='tn_text_1716845431203'>Шорты с высокой посадкой синие
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431201' data-elem-id='1716845431201'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="177"
                     data-field-width-value="58" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="420"
                     data-field-left-res-320-value="132"
                >
                    <div class='tn-atom' field='tn_text_1716845431201'>32.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431199' data-elem-id='1716845431199'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="441"
                     data-field-width-value="56" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="913"
                     data-field-left-res-320-value="133"
                >
                    <div class='tn-atom' field='tn_text_1716845431199'>11.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431197' data-elem-id='1716845431197'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="704"
                     data-field-width-value="56" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1406" data-field-left-res-320-value="133"
                >
                    <div class='tn-atom' field='tn_text_1716845431197'>12.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431195' data-elem-id='1716845431195'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="966"
                     data-field-width-value="58" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1899" data-field-left-res-320-value="132"
                >
                    <div class='tn-atom' field='tn_text_1716845431195'>18.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431192' data-elem-id='1716845431192'
                     data-elem-type='image' data-field-top-value="87" data-field-left-value="1083"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256" data-field-top-res-320-value="1536"
                     data-field-left-res-320-value="249"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716845431192'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431191' data-elem-id='1716845431191'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="147"
                     data-field-height-value="38" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="455" data-field-left-res-320-value="102"
                >
                    <a class='tn-atom' href="Sinatech.pro">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431189' data-elem-id='1716845431189'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="410"
                     data-field-height-value="38" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="948" data-field-left-res-320-value="102"
                >
                    <a class='tn-atom' href="Sinatech.pro">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431188' data-elem-id='1716845431188'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="673"
                     data-field-height-value="38" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1441" data-field-left-res-320-value="102"
                >
                    <a class='tn-atom' href="Sinatech.pro">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431186' data-elem-id='1716845431186'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="936"
                     data-field-height-value="38" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="1934" data-field-left-res-320-value="102"
                >
                    <a class='tn-atom' href="Sinatech.pro">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431184 t396__elem--anim-hidden'
                     data-elem-id='1716845431184' data-elem-type='image' data-field-top-value="92"
                     data-field-left-value="558" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click"
                     data-animate-sbs-trgels="1716740480399,1716845431228"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="555" data-field-left-res-320-value="250"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716845431184'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431181 t396__elem--anim-hidden'
                     data-elem-id='1716845431181' data-elem-type='image' data-field-top-value="92"
                     data-field-left-value="819" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click"
                     data-animate-sbs-trgels="1716740497653,1716845431221"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="1048" data-field-left-res-320-value="248"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716845431181'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7543932611716845431177 t396__elem--anim-hidden'
                     data-elem-id='1716845431177' data-elem-type='image' data-field-top-value="90"
                     data-field-left-value="1084" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="click"
                     data-animate-sbs-trgels="1716744975080,1716845431192"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                     data-field-top-res-320-value="1539" data-field-left-res-320-value="250"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716845431177'/>
                    </div>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754393261');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754393261');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754394995" class="r t-rec" style=" " data-animationappear="off" data-record-type="131"><!-- T123 -->
        <div class="t123">
            <div class="t-container_100 ">
                <div class="t-width t-width_100 ">

                    <style>
                        #rec754393261 {
                            display: none;
                        }</style>
                    <script>
                        $('[href = "#collection1"]').click(function () {
                            $('#rec754393261').slideToggle(300);
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
    <div id="rec754708719" class="r t-rec" style=" " data-record-type="215">
        <a name="platie" style="font-size:0;"></a>
    </div>
    <div id="rec754687403" class="r t-rec t-rec_pb_30" style="padding-bottom:30px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec754687403 .t396__artboard {
            min-height: 650px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754687403 .t396__filter {
            min-height: 650px;
            height: 0vh;
        }

        #rec754687403 .t396__carrier {
            min-height: 650px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754687403 .t396__artboard, #rec754687403 .t396__filter, #rec754687403 .t396__carrier {
            }

            #rec754687403 .t396__filter {
            }

            #rec754687403 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754687403 .t396__artboard, #rec754687403 .t396__filter, #rec754687403 .t396__carrier {
            }

            #rec754687403 .t396__filter {
            }

            #rec754687403 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754687403 .t396__artboard, #rec754687403 .t396__filter, #rec754687403 .t396__carrier {
            }

            #rec754687403 .t396__filter {
            }

            #rec754687403 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .t396__artboard, #rec754687403 .t396__filter, #rec754687403 .t396__carrier {
                height: 2130px;
            }

            #rec754687403 .t396__filter {
            }

            #rec754687403 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899501041"] {
            z-index: 2;
            top: 106px;
            left: calc(50% - 600px + 869px);
            width: 251px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716899501041"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716899501041"] {
                top: 1551px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899189225"] {
            z-index: 3;
            top: 106px;
            left: calc(50% - 600px + 606px);
            width: 251px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716899189225"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716899189225"] {
                top: 1058px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899184468"] {
            z-index: 4;
            top: 106px;
            left: calc(50% - 600px + 343px);
            width: 251px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716899184468"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716899184468"] {
                top: 565px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899003081"] {
            z-index: 5;
            top: 106px;
            left: calc(50% - 600px + 80px);
            width: 251px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716899003081"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716899003081"] {
                top: 72px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899022940"] {
            z-index: 6;
            top: 106px;
            left: calc(50% - 600px + 80px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687403 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716899022940"] {
                opacity: 0;
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899022940"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716899022940"] {
                top: 72px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899186211"] {
            z-index: 7;
            top: 106px;
            left: calc(50% - 600px + 343px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687403 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716899186211"] {
                opacity: 0;
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899186211"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716899186211"] {
                top: 565px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899192836"] {
            z-index: 8;
            top: 106px;
            left: calc(50% - 600px + 606px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687403 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716899192836"] {
                opacity: 0;
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899192836"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716899192836"] {
                top: 1058px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899503687"] {
            z-index: 9;
            top: 106px;
            left: calc(50% - 600px + 869px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687403 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716899503687"] {
                opacity: 0;
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716899503687"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716899503687"] {
                top: 1551px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845414413"] {
            color: #000000;
            z-index: 10;
            top: 32px;
            left: calc(50% - 600px + 80px);
            width: 112px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845414413"] .tn-atom {
            color: #000000;
            font-size: 32px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845414413"] {
                top: 20px;
                left: calc(50% - 160px + 35px);
                width: 66px;
            }

            #rec754687403 .tn-elem[data-elem-id="1716845414413"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431238"] {
            z-index: 11;
            top: 118px;
            left: calc(50% - 600px + 90px);
            width: 55px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431238"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431238"] {
                top: 84px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431235"] {
            color: #ffffff;
            text-align: center;
            z-index: 12;
            top: 603px;
            left: calc(50% - 600px + 532px);
            width: 137px;
            height: 38px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431235"] .tn-atom {
            color: #ffffff;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #232323;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687403 .tn-elem[data-elem-id="1716845431235"] .tn-atom:hover {
                background-color: #e3cbba;
                background-image: none;
            }

            #rec754687403 .tn-elem[data-elem-id="1716845431235"] .tn-atom:hover {
                color: #000000;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431235"] {
                top: 2044px;
                left: calc(50% - 160px + 92px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431232"] {
            z-index: 13;
            top: 118px;
            left: calc(50% - 600px + 353px);
            width: 55px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431232"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431232"] {
                top: 577px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431226"] {
            z-index: 14;
            top: 118px;
            left: calc(50% - 600px + 618px);
            width: 55px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431226"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431226"] {
                top: 1070px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431216"] {
            z-index: 15;
            top: 118px;
            left: calc(50% - 600px + 881px);
            width: 55px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431216"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431216"] {
                top: 1563px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431224"] {
            color: #000000;
            z-index: 16;
            top: 123px;
            left: calc(50% - 600px + 628px);
            width: 34px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431224"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431224"] {
                top: 1075px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431230"] {
            color: #000000;
            z-index: 17;
            top: 123px;
            left: calc(50% - 600px + 363px);
            width: 34px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431230"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431230"] {
                top: 582px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431215"] {
            color: #000000;
            z-index: 18;
            top: 123px;
            left: calc(50% - 600px + 891px);
            width: 34px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431215"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431215"] {
                top: 1568px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431236"] {
            color: #000000;
            z-index: 19;
            top: 123px;
            left: calc(50% - 600px + 100px);
            width: 28px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431236"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431236"] {
                top: 89px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431228"] {
            z-index: 20;
            top: 125px;
            left: calc(50% - 600px + 557px);
            width: 20px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431228"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431228"] {
                top: 584px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431221"] {
            z-index: 21;
            top: 125px;
            left: calc(50% - 600px + 818px);
            width: 20px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431221"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431221"] {
                top: 1077px;
                left: calc(50% - 160px + 247px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431219"] {
            z-index: 22;
            top: 124px;
            left: calc(50% - 600px + 296px);
            width: 18px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431219"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431219"] {
                top: 90px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431212"] {
            z-index: 23;
            top: 124px;
            left: calc(50% - 600px + 296px);
            width: 18px;
            pointer-events: none;
        }

        #rec754687403 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431212"] {
            opacity: 0;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431212"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431212"] {
                top: 90px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431210"] {
            color: #000000;
            z-index: 24;
            top: 455px;
            left: calc(50% - 600px + 92px);
            width: 228px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431210"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431210"] {
                top: 421px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431208"] {
            color: #000000;
            z-index: 25;
            top: 455px;
            left: calc(50% - 600px + 395px);
            width: 147px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431208"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431208"] {
                top: 914px;
                left: calc(50% - 160px + 87px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431205"] {
            color: #000000;
            text-align: center;
            z-index: 26;
            top: 455px;
            left: calc(50% - 600px + 632px);
            width: 200px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431205"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431205"] {
                top: 1407px;
                left: calc(50% - 160px + 61px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431203"] {
            color: #000000;
            text-align: center;
            z-index: 27;
            top: 459px;
            left: calc(50% - 600px + 898px);
            width: 193px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431203"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431203"] {
                top: 1904px;
                left: calc(50% - 160px + 64px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431201"] {
            color: #000000;
            z-index: 28;
            top: 486px;
            left: calc(50% - 600px + 177px);
            width: 58px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431201"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431201"] {
                top: 452px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431199"] {
            color: #000000;
            z-index: 29;
            top: 486px;
            left: calc(50% - 600px + 440px);
            width: 58px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431199"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431199"] {
                top: 945px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431197"] {
            color: #000000;
            z-index: 30;
            top: 486px;
            left: calc(50% - 600px + 704px);
            width: 56px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431197"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431197"] {
                top: 1438px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431195"] {
            color: #000000;
            z-index: 31;
            top: 486px;
            left: calc(50% - 600px + 966px);
            width: 58px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431195"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431195"] {
                top: 1931px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431192"] {
            z-index: 32;
            top: 123px;
            left: calc(50% - 600px + 1083px);
            width: 20px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431192"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431192"] {
                top: 1568px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431191"] {
            color: #000000;
            text-align: center;
            z-index: 33;
            top: 521px;
            left: calc(50% - 600px + 147px);
            width: 118px;
            height: 38px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431191"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687403 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754687403 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431191"] {
                top: 487px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431189"] {
            color: #000000;
            text-align: center;
            z-index: 34;
            top: 521px;
            left: calc(50% - 600px + 410px);
            width: 118px;
            height: 38px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431189"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687403 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754687403 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431189"] {
                top: 980px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431188"] {
            color: #000000;
            text-align: center;
            z-index: 35;
            top: 521px;
            left: calc(50% - 600px + 673px);
            width: 118px;
            height: 38px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431188"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687403 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754687403 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431188"] {
                top: 1473px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431186"] {
            color: #000000;
            text-align: center;
            z-index: 36;
            top: 521px;
            left: calc(50% - 600px + 936px);
            width: 118px;
            height: 38px;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431186"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687403 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754687403 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431186"] {
                top: 1966px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431184"] {
            z-index: 37;
            top: 128px;
            left: calc(50% - 600px + 558px);
            width: 18px;
            pointer-events: none;
        }

        #rec754687403 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431184"] {
            opacity: 0;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431184"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431184"] {
                top: 587px;
                left: calc(50% - 160px + 250px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431181"] {
            z-index: 38;
            top: 128px;
            left: calc(50% - 600px + 819px);
            width: 18px;
            pointer-events: none;
        }

        #rec754687403 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431181"] {
            opacity: 0;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431181"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431181"] {
                top: 1080px;
                left: calc(50% - 160px + 248px);
            }
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431177"] {
            z-index: 39;
            top: 126px;
            left: calc(50% - 600px + 1084px);
            width: 18px;
            pointer-events: none;
        }

        #rec754687403 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431177"] {
            opacity: 0;
        }

        #rec754687403 .tn-elem[data-elem-id="1716845431177"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754687403 .tn-elem[data-elem-id="1716845431177"] {
                top: 1571px;
                left: calc(50% - 160px + 250px);
            }
        }</style>
        <div class='t396'>
            <div>

                <div class="fuck_tilda_wrapper">
                    <h2 class="fuck_tilda_h2">Платья</h2>
                    <div class="fuck_tilda_products">
                        <?php
                        foreach ($cat_2 as $product):
                            $images = json_decode($product["Images"], true);
                            ?>
                            <div class="fuck_tilda_product_row">
                                <div class="product">
                                    <div class="like">
                                        <img src="images/tild3536-3430-4336-b536-376435366263__ph_heart.svg" alt="">
                                        <img src="images/tild3665-3236-4633-b331-333533376265__vector_4.svg" alt="">
                                    </div>
                                    <div class="images">
                                        <img src="images/<?= $images[0] ?>" alt="">
                                        <img src="images/<?= $images[1] ?? $images[0] ?>" alt="">
                                    </div>
                                    <p class="name"><?= $product["Name"] ?></p>
                                    <p class="price"><?= $product["Price"] ?> тг.</p>
                                    <a href="_scripts/add_to_cart.php?id=<?= $product["Id"] ?>">
                                        <button class="add_to_cart">Добавить в корзину</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="show_more">Загрузить ещё</button>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754687403');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754687403');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754687654" class="r t-rec t-rec_pb_15" style="padding-bottom:15px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec754687654 .t396__artboard {
            min-height: 650px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754687654 .t396__filter {
            min-height: 650px;
            height: 0vh;
        }

        #rec754687654 .t396__carrier {
            min-height: 650px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754687654 .t396__artboard, #rec754687654 .t396__filter, #rec754687654 .t396__carrier {
            }

            #rec754687654 .t396__filter {
            }

            #rec754687654 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754687654 .t396__artboard, #rec754687654 .t396__filter, #rec754687654 .t396__carrier {
            }

            #rec754687654 .t396__filter {
            }

            #rec754687654 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754687654 .t396__artboard, #rec754687654 .t396__filter, #rec754687654 .t396__carrier {
            }

            #rec754687654 .t396__filter {
            }

            #rec754687654 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754687654 .t396__artboard, #rec754687654 .t396__filter, #rec754687654 .t396__carrier {
            }

            #rec754687654 .t396__filter {
            }

            #rec754687654 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716900193585"] {
            z-index: 2;
            top: 70px;
            left: calc(50% - 600px + 869px);
            width: 251px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716900193585"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716900189832"] {
            z-index: 3;
            top: 70px;
            left: calc(50% - 600px + 606px);
            width: 251px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716900189832"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716900181216"] {
            z-index: 4;
            top: 70px;
            left: calc(50% - 600px + 343px);
            width: 251px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716900181216"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716900034978"] {
            z-index: 5;
            top: 70px;
            left: calc(50% - 600px + 80px);
            width: 251px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716900034978"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716900038095"] {
            z-index: 6;
            top: 70px;
            left: calc(50% - 600px + 80px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687654 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716900038095"] {
                opacity: 0;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716900038095"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716900184540"] {
            z-index: 7;
            top: 70px;
            left: calc(50% - 600px + 343px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687654 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716900184540"] {
                opacity: 0;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716900184540"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716900186835"] {
            z-index: 8;
            top: 70px;
            left: calc(50% - 600px + 606px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687654 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716900186835"] {
                opacity: 0;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716900186835"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716900196137"] {
            z-index: 9;
            top: 70px;
            left: calc(50% - 600px + 869px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687654 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716900196137"] {
                opacity: 0;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716900196137"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431238"] {
            z-index: 10;
            top: 82px;
            left: calc(50% - 600px + 90px);
            width: 55px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431238"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431235"] {
            color: #ffffff;
            text-align: center;
            z-index: 11;
            top: 567px;
            left: calc(50% - 600px + 532px);
            width: 137px;
            height: 38px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431235"] .tn-atom {
            color: #ffffff;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #232323;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687654 .tn-elem[data-elem-id="1716845431235"] .tn-atom:hover {
                background-color: #e3cbba;
                background-image: none;
            }

            #rec754687654 .tn-elem[data-elem-id="1716845431235"] .tn-atom:hover {
                color: #000000;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431232"] {
            z-index: 12;
            top: 82px;
            left: calc(50% - 600px + 353px);
            width: 55px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431232"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431228"] {
            z-index: 13;
            top: 89px;
            left: calc(50% - 600px + 557px);
            width: 20px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431228"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431226"] {
            z-index: 14;
            top: 82px;
            left: calc(50% - 600px + 618px);
            width: 55px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431226"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431221"] {
            z-index: 15;
            top: 89px;
            left: calc(50% - 600px + 818px);
            width: 20px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431221"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431219"] {
            z-index: 16;
            top: 88px;
            left: calc(50% - 600px + 296px);
            width: 18px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431219"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431216"] {
            z-index: 17;
            top: 82px;
            left: calc(50% - 600px + 881px);
            width: 55px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431216"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431224"] {
            color: #000000;
            z-index: 18;
            top: 87px;
            left: calc(50% - 600px + 628px);
            width: 34px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431224"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431230"] {
            color: #000000;
            z-index: 19;
            top: 87px;
            left: calc(50% - 600px + 363px);
            width: 34px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431230"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431236"] {
            color: #000000;
            z-index: 20;
            top: 87px;
            left: calc(50% - 600px + 100px);
            width: 28px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431236"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431215"] {
            color: #000000;
            z-index: 21;
            top: 87px;
            left: calc(50% - 600px + 891px);
            width: 34px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431215"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431212"] {
            z-index: 22;
            top: 88px;
            left: calc(50% - 600px + 296px);
            width: 18px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687654 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431212"] {
                opacity: 0;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431212"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431210"] {
            color: #000000;
            z-index: 23;
            top: 423px;
            left: calc(50% - 600px + 156px);
            width: 99px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431210"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431208"] {
            color: #000000;
            z-index: 24;
            top: 422px;
            left: calc(50% - 600px + 415px);
            width: 107px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431208"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431205"] {
            color: #000000;
            text-align: center;
            z-index: 25;
            top: 423px;
            left: calc(50% - 600px + 642px);
            width: 180px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431205"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431203"] {
            color: #000000;
            text-align: center;
            z-index: 26;
            top: 423px;
            left: calc(50% - 600px + 916px);
            width: 158px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431203"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431201"] {
            color: #000000;
            z-index: 27;
            top: 450px;
            left: calc(50% - 600px + 177px);
            width: 58px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431201"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431199"] {
            color: #000000;
            z-index: 28;
            top: 450px;
            left: calc(50% - 600px + 441px);
            width: 56px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431199"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431197"] {
            color: #000000;
            z-index: 29;
            top: 450px;
            left: calc(50% - 600px + 704px);
            width: 59px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431197"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431195"] {
            color: #000000;
            z-index: 30;
            top: 450px;
            left: calc(50% - 600px + 966px);
            width: 58px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431195"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431192"] {
            z-index: 31;
            top: 87px;
            left: calc(50% - 600px + 1083px);
            width: 20px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431192"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431191"] {
            color: #000000;
            text-align: center;
            z-index: 32;
            top: 485px;
            left: calc(50% - 600px + 147px);
            width: 118px;
            height: 38px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431191"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687654 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754687654 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431189"] {
            color: #000000;
            text-align: center;
            z-index: 33;
            top: 485px;
            left: calc(50% - 600px + 410px);
            width: 118px;
            height: 38px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431189"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687654 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754687654 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431188"] {
            color: #000000;
            text-align: center;
            z-index: 34;
            top: 485px;
            left: calc(50% - 600px + 673px);
            width: 118px;
            height: 38px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431188"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687654 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754687654 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431186"] {
            color: #000000;
            text-align: center;
            z-index: 35;
            top: 485px;
            left: calc(50% - 600px + 936px);
            width: 118px;
            height: 38px;
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431186"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754687654 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754687654 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431184"] {
            z-index: 36;
            top: 92px;
            left: calc(50% - 600px + 558px);
            width: 18px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687654 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431184"] {
                opacity: 0;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431184"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431181"] {
            z-index: 37;
            top: 92px;
            left: calc(50% - 600px + 819px);
            width: 18px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687654 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431181"] {
                opacity: 0;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431181"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431177"] {
            z-index: 38;
            top: 90px;
            left: calc(50% - 600px + 1084px);
            width: 18px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754687654 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431177"] {
                opacity: 0;
            }
        }

        #rec754687654 .tn-elem[data-elem-id="1716845431177"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="754687654" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="650" data-artboard-valign="center" data-artboard-upscale="window"
            >
                <div class="t396__carrier" data-artboard-recid="754687654"></div>
                <div class="t396__filter" data-artboard-recid="754687654"></div>
                <div class='t396__elem tn-elem tn-elem__7546876541716900193585' data-elem-id='1716900193585'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="869"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6539-3165-4135-a462-383031626261__81974010_4.png'
                             alt='' imgfield='tn_img_1716900193585'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716900189832' data-elem-id='1716900189832'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="606"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6339-6330-4438-a566-313639613431__81974010_7.png'
                             alt='' imgfield='tn_img_1716900189832'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716900181216' data-elem-id='1716900181216'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="343"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3764-3438-4335-b634-303238366364__81974010_2.png'
                             alt='' imgfield='tn_img_1716900181216'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716900034978' data-elem-id='1716900034978'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="80"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="548"
                     data-field-fileheight-value="744"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3562-3562-4635-a237-623333323331__81974010_1_45.png'
                             alt='' imgfield='tn_img_1716900034978'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716900038095 ' data-elem-id='1716900038095'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="80"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-animate-sbs-event="hover"
                     data-animate-sbs-trgels="1716900034978"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6163-6465-4239-b763-373638663631__81974010_5.png'
                             alt='' imgfield='tn_img_1716900038095'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716900184540 ' data-elem-id='1716900184540'
                     data-elem-type='image' data-field-top-value="70" data-field-left-value="343"
                     data-field-width-value="251" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-animate-sbs-event="hover"
                     data-animate-sbs-trgels="1716900181216"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6330-3934-4066-b938-633835353665__81974010_6.png'
                             alt='' imgfield='tn_img_1716900184540'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716900186835 t396__elem--anim-hidden'
                     data-elem-id='1716900186835' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="606" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716900189832"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6263-3036-4433-a436-613733343062__81974010_3.png'
                             alt='' imgfield='tn_img_1716900186835'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716900196137 t396__elem--anim-hidden'
                     data-elem-id='1716900196137' data-elem-type='image' data-field-top-value="70"
                     data-field-left-value="869" data-field-width-value="251" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="hover" data-animate-sbs-trgels="1716900193585"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="548" data-field-fileheight-value="744"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3833-6532-4763-b064-616632643431__81974010_8.png'
                             alt='' imgfield='tn_img_1716900196137'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431238' data-elem-id='1716845431238'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="90"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716845431238'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431235' data-elem-id='1716845431235'
                     data-elem-type='button' data-field-top-value="567" data-field-left-value="532"
                     data-field-height-value="38" data-field-width-value="137" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <a class='tn-atom' href="#collection2">Скрыть</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431232' data-elem-id='1716845431232'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="353"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716845431232'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431228' data-elem-id='1716845431228'
                     data-elem-type='image' data-field-top-value="89" data-field-left-value="557"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716845431228'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431226' data-elem-id='1716845431226'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="618"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716845431226'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431221' data-elem-id='1716845431221'
                     data-elem-type='image' data-field-top-value="89" data-field-left-value="818"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716845431221'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431219' data-elem-id='1716845431219'
                     data-elem-type='image' data-field-top-value="88" data-field-left-value="296"
                     data-field-width-value="18" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="224"
                     data-field-fileheight-value="192"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6134-6636-4038-b161-386661333762__vector_5.svg' alt=''
                             imgfield='tn_img_1716845431219'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431216' data-elem-id='1716845431216'
                     data-elem-type='image' data-field-top-value="82" data-field-left-value="881"
                     data-field-width-value="55" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="68"
                     data-field-fileheight-value="32"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6262-6262-4565-b032-313233333730__rectangle_22_3.svg'
                             alt='' imgfield='tn_img_1716845431216'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431224' data-elem-id='1716845431224'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="628"
                     data-field-width-value="34" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431224'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431230' data-elem-id='1716845431230'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="363"
                     data-field-width-value="34" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431230'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431236' data-elem-id='1716845431236'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="100"
                     data-field-width-value="28" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431236'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431215' data-elem-id='1716845431215'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="891"
                     data-field-width-value="34" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431215'>НОВОЕ</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431212 t396__elem--anim-hidden'
                     data-elem-id='1716845431212' data-elem-type='image' data-field-top-value="88"
                     data-field-left-value="296" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="click" data-animate-sbs-trgels="1716740663662,1716845431219"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716845431212'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431210' data-elem-id='1716845431210'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="156"
                     data-field-width-value="99" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431210'>Платье по косой
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431208' data-elem-id='1716845431208'
                     data-elem-type='text' data-field-top-value="422" data-field-left-value="415"
                     data-field-width-value="107" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431208'>Платье-трапеция
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431205' data-elem-id='1716845431205'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="642"
                     data-field-width-value="180" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431205'>Платье со съемными перьями
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431203' data-elem-id='1716845431203'
                     data-elem-type='text' data-field-top-value="423" data-field-left-value="916"
                     data-field-width-value="158" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431203'>Платье с отрезной талией
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431201' data-elem-id='1716845431201'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="177"
                     data-field-width-value="58" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431201'>28.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431199' data-elem-id='1716845431199'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="441"
                     data-field-width-value="56" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431199'>17.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431197' data-elem-id='1716845431197'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="704"
                     data-field-width-value="59" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431197'>22.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431195' data-elem-id='1716845431195'
                     data-elem-type='text' data-field-top-value="450" data-field-left-value="966"
                     data-field-width-value="58" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716845431195'>49.000 тг.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431192' data-elem-id='1716845431192'
                     data-elem-type='image' data-field-top-value="87" data-field-left-value="1083"
                     data-field-width-value="20" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="256"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3536-3430-4336-b536-376435366263__ph_heart.svg' alt=''
                             imgfield='tn_img_1716845431192'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431191' data-elem-id='1716845431191'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="147"
                     data-field-height-value="38" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <a class='tn-atom' href="Sinatech.pro">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431189' data-elem-id='1716845431189'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="410"
                     data-field-height-value="38" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <a class='tn-atom' href="Sinatech.pro">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431188' data-elem-id='1716845431188'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="673"
                     data-field-height-value="38" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <a class='tn-atom' href="Sinatech.pro">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431186' data-elem-id='1716845431186'
                     data-elem-type='button' data-field-top-value="485" data-field-left-value="936"
                     data-field-height-value="38" data-field-width-value="118" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                >
                    <a class='tn-atom' href="Sinatech.pro">Добавить в корзину</a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431184 t396__elem--anim-hidden'
                     data-elem-id='1716845431184' data-elem-type='image' data-field-top-value="92"
                     data-field-left-value="558" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="click" data-animate-sbs-trgels="1716740480399,1716845431228"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716845431184'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431181 t396__elem--anim-hidden'
                     data-elem-id='1716845431181' data-elem-type='image' data-field-top-value="92"
                     data-field-left-value="819" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="click" data-animate-sbs-trgels="1716740497653,1716845431221"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716845431181'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7546876541716845431177 t396__elem--anim-hidden'
                     data-elem-id='1716845431177' data-elem-type='image' data-field-top-value="90"
                     data-field-left-value="1084" data-field-width-value="18" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-sbs-event="click" data-animate-sbs-trgels="1716744975080,1716845431192"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1.1,'sy':1.1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="224" data-field-fileheight-value="192"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3665-3236-4633-b331-333533376265__vector_4.svg' alt=''
                             imgfield='tn_img_1716845431177'/>
                    </div>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754687654');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754687654');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754687813" class="r t-rec t-rec_pt_30" style="padding-top:30px; " data-animationappear="off"
         data-record-type="131"><!-- T123 -->
        <div class="t123">
            <div class="t-container_100 ">
                <div class="t-width t-width_100 ">

                    <style>
                        #rec754687654 {
                            display: none;
                        }</style>
                    <script>
                        $('[href = "#collection2"]').click(function () {
                            $('#rec754687654').slideToggle(300);
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
    <div id="rec754718956" class="r t-rec" style=" " data-record-type="215">
        <a name="kostum" style="font-size:0;"></a>
    </div>
    <div id="rec754711888" class="r t-rec t-rec_pb_30" style="padding-bottom:30px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec754711888 .t396__artboard {
            min-height: 610px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754711888 .t396__filter {
            min-height: 610px;
            height: 0vh;
        }

        #rec754711888 .t396__carrier {
            min-height: 610px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754711888 .t396__artboard, #rec754711888 .t396__filter, #rec754711888 .t396__carrier {
            }

            #rec754711888 .t396__filter {
            }

            #rec754711888 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754711888 .t396__artboard, #rec754711888 .t396__filter, #rec754711888 .t396__carrier {
            }

            #rec754711888 .t396__filter {
            }

            #rec754711888 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754711888 .t396__artboard, #rec754711888 .t396__filter, #rec754711888 .t396__carrier {
            }

            #rec754711888 .t396__filter {
            }

            #rec754711888 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .t396__artboard, #rec754711888 .t396__filter, #rec754711888 .t396__carrier {
                height: 2050px;
            }

            #rec754711888 .t396__filter {
            }

            #rec754711888 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901454865"] {
            z-index: 2;
            top: 106px;
            left: calc(50% - 600px + 869px);
            width: 251px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716901454865"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716901454865"] {
                top: 1551px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901345891"] {
            z-index: 3;
            top: 106px;
            left: calc(50% - 600px + 606px);
            width: 251px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716901345891"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716901345891"] {
                top: 1058px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901185866"] {
            z-index: 4;
            top: 106px;
            left: calc(50% - 600px + 343px);
            width: 251px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716901185866"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716901185866"] {
                top: 565px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901025636"] {
            z-index: 5;
            top: 106px;
            left: calc(50% - 600px + 80px);
            width: 251px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716901025636"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716901025636"] {
                top: 72px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901033431"] {
            z-index: 6;
            top: 106px;
            left: calc(50% - 600px + 80px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754711888 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716901033431"] {
                opacity: 0;
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901033431"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716901033431"] {
                top: 72px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901188526"] {
            z-index: 7;
            top: 106px;
            left: calc(50% - 600px + 343px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754711888 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716901188526"] {
                opacity: 0;
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901188526"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716901188526"] {
                top: 565px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901349451"] {
            z-index: 8;
            top: 106px;
            left: calc(50% - 600px + 606px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754711888 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716901349451"] {
                opacity: 0;
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901349451"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716901349451"] {
                top: 1058px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901451814"] {
            z-index: 9;
            top: 106px;
            left: calc(50% - 600px + 869px);
            width: 251px;
            pointer-events: none;
        }

        @media (min-width: 1200px) {
            #rec754711888 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716901451814"] {
                opacity: 0;
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716901451814"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716901451814"] {
                top: 1551px;
                left: calc(50% - 160px + 35px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845414413"] {
            color: #000000;
            z-index: 10;
            top: 32px;
            left: calc(50% - 600px + 80px);
            width: 112px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845414413"] .tn-atom {
            color: #000000;
            font-size: 32px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845414413"] {
                top: 20px;
                left: calc(50% - 160px + 35px);
                width: 81px;
            }

            #rec754711888 .tn-elem[data-elem-id="1716845414413"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431238"] {
            z-index: 11;
            top: 118px;
            left: calc(50% - 600px + 90px);
            width: 55px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431238"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431238"] {
                top: 84px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431232"] {
            z-index: 12;
            top: 118px;
            left: calc(50% - 600px + 353px);
            width: 55px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431232"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431232"] {
                top: 577px;
                left: calc(50% - 160px + 45px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431226"] {
            z-index: 13;
            top: 118px;
            left: calc(50% - 600px + 618px);
            width: 55px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431226"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431226"] {
                top: 1070px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431216"] {
            z-index: 14;
            top: 118px;
            left: calc(50% - 600px + 881px);
            width: 55px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431216"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431216"] {
                top: 1563px;
                left: calc(50% - 160px + 47px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431224"] {
            color: #000000;
            z-index: 15;
            top: 123px;
            left: calc(50% - 600px + 628px);
            width: 34px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431224"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431224"] {
                top: 1075px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431230"] {
            color: #000000;
            z-index: 16;
            top: 123px;
            left: calc(50% - 600px + 363px);
            width: 34px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431230"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431230"] {
                top: 582px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431215"] {
            color: #000000;
            z-index: 17;
            top: 123px;
            left: calc(50% - 600px + 891px);
            width: 34px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431215"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431215"] {
                top: 1568px;
                left: calc(50% - 160px + 57px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431236"] {
            color: #000000;
            z-index: 18;
            top: 123px;
            left: calc(50% - 600px + 100px);
            width: 28px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431236"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431236"] {
                top: 89px;
                left: calc(50% - 160px + 55px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431228"] {
            z-index: 19;
            top: 125px;
            left: calc(50% - 600px + 557px);
            width: 20px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431228"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431228"] {
                top: 584px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431221"] {
            z-index: 20;
            top: 125px;
            left: calc(50% - 600px + 818px);
            width: 20px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431221"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431221"] {
                top: 1077px;
                left: calc(50% - 160px + 247px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431219"] {
            z-index: 21;
            top: 124px;
            left: calc(50% - 600px + 296px);
            width: 18px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431219"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431219"] {
                top: 90px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431212"] {
            z-index: 22;
            top: 124px;
            left: calc(50% - 600px + 296px);
            width: 18px;
            pointer-events: none;
        }

        #rec754711888 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431212"] {
            opacity: 0;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431212"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431212"] {
                top: 90px;
                left: calc(50% - 160px + 251px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431210"] {
            color: #000000;
            z-index: 23;
            top: 455px;
            left: calc(50% - 600px + 150px);
            width: 111px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431210"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431210"] {
                top: 421px;
                left: calc(50% - 160px + 105px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431208"] {
            color: #000000;
            z-index: 24;
            top: 455px;
            left: calc(50% - 600px + 411px);
            width: 115px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431208"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431208"] {
                top: 914px;
                left: calc(50% - 160px + 103px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431205"] {
            color: #000000;
            text-align: center;
            z-index: 25;
            top: 455px;
            left: calc(50% - 600px + 622px);
            width: 219px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431205"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431205"] {
                top: 1407px;
                left: calc(50% - 160px + 51px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431203"] {
            color: #000000;
            text-align: center;
            z-index: 26;
            top: 455px;
            left: calc(50% - 600px + 933px);
            width: 123px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431203"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 700;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431203"] {
                top: 1900px;
                left: calc(50% - 160px + 99px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431201"] {
            color: #000000;
            z-index: 27;
            top: 486px;
            left: calc(50% - 600px + 177px);
            width: 58px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431201"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431201"] {
                top: 452px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431199"] {
            color: #000000;
            z-index: 28;
            top: 486px;
            left: calc(50% - 600px + 440px);
            width: 58px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431199"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431199"] {
                top: 945px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431197"] {
            color: #000000;
            z-index: 29;
            top: 486px;
            left: calc(50% - 600px + 704px);
            width: 56px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431197"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431197"] {
                top: 1438px;
                left: calc(50% - 160px + 133px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431195"] {
            color: #000000;
            z-index: 30;
            top: 486px;
            left: calc(50% - 600px + 966px);
            width: 58px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431195"] .tn-atom {
            color: #000000;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431195"] {
                top: 1931px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431192"] {
            z-index: 31;
            top: 123px;
            left: calc(50% - 600px + 1083px);
            width: 20px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431192"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431192"] {
                top: 1568px;
                left: calc(50% - 160px + 249px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431191"] {
            color: #000000;
            text-align: center;
            z-index: 32;
            top: 521px;
            left: calc(50% - 600px + 147px);
            width: 118px;
            height: 38px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431191"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754711888 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754711888 .tn-elem[data-elem-id="1716845431191"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431191"] {
                top: 487px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431189"] {
            color: #000000;
            text-align: center;
            z-index: 33;
            top: 521px;
            left: calc(50% - 600px + 410px);
            width: 118px;
            height: 38px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431189"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754711888 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754711888 .tn-elem[data-elem-id="1716845431189"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431189"] {
                top: 980px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431188"] {
            color: #000000;
            text-align: center;
            z-index: 34;
            top: 521px;
            left: calc(50% - 600px + 673px);
            width: 118px;
            height: 38px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431188"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754711888 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754711888 .tn-elem[data-elem-id="1716845431188"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431188"] {
                top: 1473px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431186"] {
            color: #000000;
            text-align: center;
            z-index: 35;
            top: 521px;
            left: calc(50% - 600px + 936px);
            width: 118px;
            height: 38px;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431186"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media (hover), (min-width: 0\0
        ) {
            #rec754711888 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                background-color: #232323;
                background-image: none;
            }

            #rec754711888 .tn-elem[data-elem-id="1716845431186"] .tn-atom:hover {
                color: #ffffff;
            }
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431186"] {
                top: 1966px;
                left: calc(50% - 160px + 102px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431184"] {
            z-index: 36;
            top: 128px;
            left: calc(50% - 600px + 558px);
            width: 18px;
            pointer-events: none;
        }

        #rec754711888 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431184"] {
            opacity: 0;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431184"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431184"] {
                top: 587px;
                left: calc(50% - 160px + 250px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431181"] {
            z-index: 37;
            top: 128px;
            left: calc(50% - 600px + 819px);
            width: 18px;
            pointer-events: none;
        }

        #rec754711888 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431181"] {
            opacity: 0;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431181"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431181"] {
                top: 1080px;
                left: calc(50% - 160px + 248px);
            }
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431177"] {
            z-index: 38;
            top: 126px;
            left: calc(50% - 600px + 1084px);
            width: 18px;
            pointer-events: none;
        }

        #rec754711888 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716845431177"] {
            opacity: 0;
        }

        #rec754711888 .tn-elem[data-elem-id="1716845431177"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754711888 .tn-elem[data-elem-id="1716845431177"] {
                top: 1571px;
                left: calc(50% - 160px + 250px);
            }
        }</style>
        <div class='t396'>
            <div>

                <div class="fuck_tilda_wrapper">
                    <h2 class="fuck_tilda_h2">Костюмы</h2>
                    <div class="fuck_tilda_products">
                        <?php
                        foreach ($cat_3 as $product):
                            $images = json_decode($product["Images"], true);
                            ?>
                            <div class="fuck_tilda_product_row">
                                <div class="product">
                                    <div class="like">
                                        <img src="images/tild3536-3430-4336-b536-376435366263__ph_heart.svg" alt="">
                                        <img src="images/tild3665-3236-4633-b331-333533376265__vector_4.svg" alt="">
                                    </div>
                                    <div class="images">
                                        <img src="images/<?= $images[0] ?>" alt="">
                                        <img src="images/<?= $images[1] ?? $images[0] ?>" alt="">
                                    </div>
                                    <p class="name"><?= $product["Name"] ?></p>
                                    <p class="price"><?= $product["Price"] ?> тг.</p>
                                    <a href="_scripts/add_to_cart.php?id=<?= $product["Id"] ?>">
                                        <button class="add_to_cart">Добавить в корзину</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="show_more">Загрузить ещё</button>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754711888');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754711888');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754772076" class="r t-rec" style=" " data-record-type="215">
        <a name="onas" style="font-size:0;"></a>
    </div>
    <div id="rec754738185" class="r t-rec t-rec_pb_30" style="padding-bottom:30px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec754738185 .t396__artboard {
            min-height: 400px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754738185 .t396__filter {
            min-height: 400px;
            height: 0vh;
        }

        #rec754738185 .t396__carrier {
            min-height: 400px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754738185 .t396__artboard, #rec754738185 .t396__filter, #rec754738185 .t396__carrier {
            }

            #rec754738185 .t396__filter {
            }

            #rec754738185 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754738185 .t396__artboard, #rec754738185 .t396__filter, #rec754738185 .t396__carrier {
            }

            #rec754738185 .t396__filter {
            }

            #rec754738185 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754738185 .t396__artboard, #rec754738185 .t396__filter, #rec754738185 .t396__carrier {
            }

            #rec754738185 .t396__filter {
            }

            #rec754738185 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754738185 .t396__artboard, #rec754738185 .t396__filter, #rec754738185 .t396__carrier {
                height: 530px;
            }

            #rec754738185 .t396__filter {
            }

            #rec754738185 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754738185 .tn-elem[data-elem-id="1716904007609"] {
            z-index: 2;
            top: 32px;
            left: calc(50% - 600px + 80px);
            width: 502px;
        }

        #rec754738185 .tn-elem[data-elem-id="1716904007609"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754738185 .tn-elem[data-elem-id="1716904007609"] {
                top: 20px;
                left: calc(50% - 160px + 35px);
                width: 250px;
            }
        }

        #rec754738185 .tn-elem[data-elem-id="1716904032252"] {
            color: #000000;
            z-index: 3;
            top: 78px;
            left: calc(50% - 600px + 614px);
            width: 506px;
        }

        #rec754738185 .tn-elem[data-elem-id="1716904032252"] .tn-atom {
            color: #000000;
            font-size: 24px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754738185 .tn-elem[data-elem-id="1716904032252"] {
                top: 200px;
                left: calc(50% - 160px + 35px);
                width: 251px;
            }

            #rec754738185 .tn-elem[data-elem-id="1716904032252"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754738185 .tn-elem[data-elem-id="1716904065283"] {
            color: #000000;
            z-index: 4;
            top: 176px;
            left: calc(50% - 600px + 614px);
            width: 538px;
        }

        #rec754738185 .tn-elem[data-elem-id="1716904065283"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754738185 .tn-elem[data-elem-id="1716904065283"] {
                top: 302px;
                left: calc(50% - 160px + 35px);
                width: 250px;
            }

            #rec754738185 .tn-elem[data-elem-id="1716904065283"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec754738185 .tn-elem[data-elem-id="1716904418995"] {
            color: #000000;
            text-align: center;
            z-index: 5;
            top: 275px;
            left: calc(50% - 600px + 614px);
            width: 161px;
            height: 45px;
        }

        #rec754738185 .tn-elem[data-elem-id="1716904418995"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            border-radius: 10px;
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754738185 .tn-elem[data-elem-id="1716904418995"] {
                top: 452px;
                left: calc(50% - 160px + 35px);
            }
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="754738185" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="400" data-artboard-valign="center" data-artboard-upscale="window"
                 data-artboard-height-res-320="530"
            >
                <div class="t396__carrier" data-artboard-recid="754738185"></div>
                <div class="t396__filter" data-artboard-recid="754738185"></div>
                <div class='t396__elem tn-elem tn-elem__7547381851716904007609' data-elem-id='1716904007609'
                     data-elem-type='image' data-field-top-value="32" data-field-left-value="80"
                     data-field-width-value="502" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="1200"
                     data-field-fileheight-value="800" data-field-top-res-320-value="20"
                     data-field-left-res-320-value="35" data-field-width-res-320-value="250"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6430-3963-4634-a135-633636663435__image_34.png' alt=''
                             imgfield='tn_img_1716904007609'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547381851716904032252' data-elem-id='1716904032252'
                     data-elem-type='text' data-field-top-value="78" data-field-left-value="614"
                     data-field-width-value="506" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="200"
                     data-field-left-res-320-value="35" data-field-width-res-320-value="251"
                >
                    <div class='tn-atom' field='tn_text_1716904032252'>VELVET - молодая Казахстанская
                        <br>
                        марка женской одежды.
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547381851716904065283' data-elem-id='1716904065283'
                     data-elem-type='text' data-field-top-value="176" data-field-left-value="614"
                     data-field-width-value="538" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="302"
                     data-field-left-res-320-value="35" data-field-width-res-320-value="250"
                >
                    <div class='tn-atom' field='tn_text_1716904065283'>Наша концепция - стильный, современный, базовый
                        гардероб. В течение года выпускаем несколько капсул актуальных моделей отвечающих всем
                        современным тенденциям.
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547381851716904418995' data-elem-id='1716904418995'
                     data-elem-type='button' data-field-top-value="275" data-field-left-value="614"
                     data-field-height-value="45" data-field-width-value="161" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="452" data-field-left-res-320-value="35"
                >
                    <a class='tn-atom' href="#popupzero">Подробнее</a>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754738185');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754738185');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754752625" class="r t-rec t-rec_pt_0" style="padding-top:0px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec754752625 .t396__artboard {
            min-height: 540px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754752625 .t396__filter {
            min-height: 540px;
            height: 0vh;
        }

        #rec754752625 .t396__carrier {
            min-height: 540px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754752625 .t396__artboard, #rec754752625 .t396__filter, #rec754752625 .t396__carrier {
            }

            #rec754752625 .t396__filter {
            }

            #rec754752625 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754752625 .t396__artboard, #rec754752625 .t396__filter, #rec754752625 .t396__carrier {
            }

            #rec754752625 .t396__filter {
            }

            #rec754752625 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754752625 .t396__artboard, #rec754752625 .t396__filter, #rec754752625 .t396__carrier {
            }

            #rec754752625 .t396__filter {
            }

            #rec754752625 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754752625 .t396__artboard, #rec754752625 .t396__filter, #rec754752625 .t396__carrier {
            }

            #rec754752625 .t396__filter {
            }

            #rec754752625 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754752625 .tn-elem[data-elem-id="1716906051885"] {
            z-index: 2;
            top: 0px;
            left: calc(50% - 600px + 0px);
            width: 649px;
            height: 540px;
        }

        #rec754752625 .tn-elem[data-elem-id="1716906051885"] .tn-atom {
            background-color: #e3cbba;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754752625 .tn-elem[data-elem-id="1716906051885"] {
                top: 20px;
                left: calc(50% - 160px + 59px);
                width: 582px;
                height: 486px;
            }
        }

        #rec754752625 .tn-elem[data-elem-id="1716904772011"] {
            color: #000000;
            z-index: 3;
            top: 97px;
            left: calc(50% - 600px + 24px);
            width: 285px;
        }

        #rec754752625 .tn-elem[data-elem-id="1716904772011"] .tn-atom {
            color: #000000;
            font-size: 28px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754752625 .tn-elem[data-elem-id="1716904772011"] {
                top: 108px;
                left: calc(50% - 160px + 80px);
                width: 185px;
            }

            #rec754752625 .tn-elem[data-elem-id="1716904772011"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754752625 .tn-elem[data-elem-id="1716905019222"] {
            color: #000000;
            z-index: 4;
            top: 250px;
            left: calc(50% - 600px + 24px);
            width: 553px;
        }

        #rec754752625 .tn-elem[data-elem-id="1716905019222"] .tn-atom {
            color: #000000;
            font-size: 18px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754752625 .tn-elem[data-elem-id="1716905019222"] {
                top: 211px;
                left: calc(50% - 160px + 80px);
                width: 233px;
            }

            #rec754752625 .tn-elem[data-elem-id="1716905019222"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec754752625 .tn-elem[data-elem-id="1716905075976"] {
            color: #000000;
            z-index: 5;
            top: 358px;
            left: calc(50% - 600px + 24px);
            width: 430px;
        }

        #rec754752625 .tn-elem[data-elem-id="1716905075976"] .tn-atom {
            color: #000000;
            font-size: 18px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754752625 .tn-elem[data-elem-id="1716905075976"] {
                top: 359px;
                left: calc(50% - 160px + 80px);
                width: 217px;
            }

            #rec754752625 .tn-elem[data-elem-id="1716905075976"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec754752625 .tn-elem[data-elem-id="1716905937915"] {
            z-index: 6;
            top: 0px;
            left: calc(50% - 600px + -360px);
            width: 360px;
        }

        #rec754752625 .tn-elem[data-elem-id="1716905937915"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754752625 .tn-elem[data-elem-id="1716905937915"] {
                top: 20px;
                left: calc(50% - 160px + -265px);
                width: 324px;
            }
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="754752625" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="540" data-artboard-valign="center" data-artboard-upscale="grid"
            >
                <div class="t396__carrier" data-artboard-recid="754752625"></div>
                <div class="t396__filter" data-artboard-recid="754752625"></div>
                <div class='t396__elem tn-elem tn-elem__7547526251716906051885' data-elem-id='1716906051885'
                     data-elem-type='shape' data-field-top-value="0" data-field-left-value="0"
                     data-field-height-value="540" data-field-width-value="649" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="px"
                     data-field-top-res-320-value="20" data-field-left-res-320-value="59"
                     data-field-height-res-320-value="486" data-field-width-res-320-value="582"
                >
                    <div class='tn-atom'></div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547526251716904772011' data-elem-id='1716904772011'
                     data-elem-type='text' data-field-top-value="97" data-field-left-value="24"
                     data-field-width-value="285" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="108"
                     data-field-left-res-320-value="80" data-field-width-res-320-value="185"
                >
                    <div class='tn-atom' field='tn_text_1716904772011'>VELVET - молодая
                        <br>
                        казахстанская марка
                        <br>
                        женской одежды
                        <br>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547526251716905019222' data-elem-id='1716905019222'
                     data-elem-type='text' data-field-top-value="250" data-field-left-value="24"
                     data-field-width-value="553" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="211"
                     data-field-left-res-320-value="80" data-field-width-res-320-value="233"
                >
                    <div class='tn-atom' field='tn_text_1716905019222'>Наша концепция — стильный, современный, базовый
                        гардероб. В течение года выпускаем несколько капсул актуальных моделей отвечающим современным
                        тенденциям.
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547526251716905075976' data-elem-id='1716905075976'
                     data-elem-type='text' data-field-top-value="358" data-field-left-value="24"
                     data-field-width-value="430" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="359"
                     data-field-left-res-320-value="80" data-field-width-res-320-value="217"
                >
                    <div class='tn-atom' field='tn_text_1716905075976'>Тщательно следим за качеством, поэтому в цеху не
                        пооперационный пошив, а каждое изделие бережно отшивает одна швея.
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547526251716905937915' data-elem-id='1716905937915'
                     data-elem-type='image' data-field-top-value="0" data-field-left-value="-360"
                     data-field-width-value="360" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="740"
                     data-field-fileheight-value="1110" data-field-top-res-320-value="20"
                     data-field-left-res-320-value="-265" data-field-width-res-320-value="324"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3165-6333-4464-a334-663133356134__image_36_1.png'
                             alt='' imgfield='tn_img_1716905937915'/>
                    </div>
                </div>
            </div>
        </div>
        <script>t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754752625');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754750651" class="r t-rec" style=" " data-record-type="390">
        <div class="t390">
            <div
                    class="t-popup" data-tooltip-hook="#popupzero"
                    role="dialog"
                    aria-modal="true"
                    tabindex="-1"
                    aria-label="Content Oriented Web">
                <div class="t-popup__close t-popup__block-close">
                    <button
                            type="button"
                            class="t-popup__close-wrapper t-popup__block-close-button"
                            aria-label="Закрыть диалоговое окно"
                    >
                        <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px"
                             viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                                <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) "
                                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                                <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) "
                                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                            </g>
                        </svg>
                    </button>
                </div>
                <div class="t-popup__container t-width t-width_10" style="background-color:#fbfbf9;">
                    <img class="t390__img t-img"
                         src="images/tild6637-3436-4337-b163-396636386561__x1600_adc85e33ca.jpg"
                         imgfield="img"
                         alt="">
                    <div class="t390__wrapper t-align_center">
                        <div class="t390__title t-heading t-heading_lg" id="popuptitle_754750651">Content Oriented Web
                        </div>
                        <div class="t390__descr t-descr t-descr_xs">Make great presentations, longreads, and landing
                            pages, as well as photo stories, blogs, lookbooks, and all other kinds of content oriented
                            projects.
                        </div>
                        <div class="t390__social">
                            <div class="t390__circle-lg ">
                                <script type="text/javascript" src="js/ya-share.js" charset="utf-8"></script>
                                <div class="ya-share2" data-access-token:facebook="" data-yashareL10n="en"
                                     data-services="facebook,twitter" data-counter=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">t_onReady(function () {
            var rec = document.querySelector('#rec754750651');
            if (!rec) return;
            rec.setAttribute('data-animationappear', 'off');
            rec.style.opacity = 1;
            t_onFuncLoad('t390_initPopup', function () {
                t390_initPopup('754750651');
            });
        });</script>
    </div>
    <div id="rec754752408" class="r t-rec" style=" " data-animationappear="off" data-record-type="131"><!-- T123 -->
        <div class="t123">
            <div class="t-container_100 ">
                <div class="t-width t-width_100 ">

                    <style>
                        .shirina {
                            background: none !important;
                            right: 0 !important;
                            left: 0 !important;
                        }

                        .parpadding {
                            padding: 0 !important;
                        }

                        .tn-atom .t-form__errorbox-wrapper, .tn-form__errorbox-popup, .t-form-success-popup {
                            z-index: 9999999 !important;
                        }
                    </style>
                    <script>
                        $(document).ready(function () {
                            var ZeroPopID = '#rec754752625';
                            var PopWindID = '#rec754750651';

                            $(PopWindID + " .t-popup__container").addClass("shirina").html($(ZeroPopID)).parent(".t-popup").addClass("parpadding");
                            $('a[href^="#popupzero"]').click(function (e) {
                                e.preventDefault();
                                setTimeout(function () {
                                    window.dispatchEvent(new Event('resize'));
                                }, 10);
                            });
                            $(document).on('click', 'a[href="#close"], ' + ZeroPopID + ' .t396__filter', function (e) {
                                e.preventDefault();
                                t390_closePopup(PopWindID.replace(/[^0-9]/gim, ""));
                            });
                            $(ZeroPopID).delegate(".t-submit", "click", function () {
                                setTimeout(function () {
                                    if ($(ZeroPopID + " .t-form").hasClass("js-send-form-success")) {
                                        t390_closePopup(PopWindID.replace(/[^0-9]/gim, ""))
                                    }
                                }, 1000);
                            });
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
    <div id="rec754772220" class="r t-rec" style=" " data-record-type="215">
        <a name="foto" style="font-size:0;"></a>
    </div>
    <div id="rec754766389" class="r t-rec" style=" " data-animationappear="off" data-record-type="396"><!-- T396 -->
        <style>#rec754766389 .t396__artboard {
            min-height: 640px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754766389 .t396__filter {
            min-height: 640px;
            height: 0vh;
        }

        #rec754766389 .t396__carrier {
            min-height: 640px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754766389 .t396__artboard, #rec754766389 .t396__filter, #rec754766389 .t396__carrier {
            }

            #rec754766389 .t396__filter {
            }

            #rec754766389 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754766389 .t396__artboard, #rec754766389 .t396__filter, #rec754766389 .t396__carrier {
            }

            #rec754766389 .t396__filter {
            }

            #rec754766389 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754766389 .t396__artboard, #rec754766389 .t396__filter, #rec754766389 .t396__carrier {
            }

            #rec754766389 .t396__filter {
            }

            #rec754766389 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754766389 .t396__artboard, #rec754766389 .t396__filter, #rec754766389 .t396__carrier {
            }

            #rec754766389 .t396__filter {
            }

            #rec754766389 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754766389 .tn-elem[data-elem-id="1716906424438"] {
            color: #000000;
            z-index: 2;
            top: 32px;
            left: calc(50% - 600px + 80px);
            width: 169px;
        }

        #rec754766389 .tn-elem[data-elem-id="1716906424438"] .tn-atom {
            color: #000000;
            font-size: 32px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754766389 .tn-elem[data-elem-id="1716906424438"] {
                top: 20px;
                left: calc(50% - 160px + 35px);
                width: 97px;
            }

            #rec754766389 .tn-elem[data-elem-id="1716906424438"] .tn-atom {
                font-size: 18px;
            }
        }

        #rec754766389 .tn-elem[data-elem-id="1716906562452"] {
            color: #000000;
            z-index: 3;
            top: 106px;
            left: calc(50% - 600px + 80px);
            width: 429px;
        }

        #rec754766389 .tn-elem[data-elem-id="1716906562452"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754766389 .tn-elem[data-elem-id="1716906562452"] {
                top: 72px;
                left: calc(50% - 160px + 35px);
                width: 196px;
            }

            #rec754766389 .tn-elem[data-elem-id="1716906562452"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec754766389 .tn-elem[data-elem-id="1716906705182"] {
            z-index: 4;
            top: 180px;
            left: calc(50% - 600px + 80px);
            width: 242px;
        }

        #rec754766389 .tn-elem[data-elem-id="1716906705182"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754766389 .tn-elem[data-elem-id="1716906705182"] {
                top: 178px;
                left: calc(50% - 160px + 35px);
                width: 119px;
            }
        }

        #rec754766389 .tn-elem[data-elem-id="1716906713419"] {
            z-index: 5;
            top: 180px;
            left: calc(50% - 600px + 346px);
            width: 242px;
        }

        #rec754766389 .tn-elem[data-elem-id="1716906713419"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754766389 .tn-elem[data-elem-id="1716906713419"] {
                top: 178px;
                left: calc(50% - 160px + 166px);
                width: 119px;
            }
        }

        #rec754766389 .tn-elem[data-elem-id="1716906719118"] {
            z-index: 6;
            top: 180px;
            left: calc(50% - 600px + 878px);
            width: 242px;
        }

        #rec754766389 .tn-elem[data-elem-id="1716906719118"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754766389 .tn-elem[data-elem-id="1716906719118"] {
                top: 388px;
                left: calc(50% - 160px + 166px);
                width: 119px;
            }
        }

        #rec754766389 .tn-elem[data-elem-id="1716906725115"] {
            z-index: 7;
            top: 180px;
            left: calc(50% - 600px + 612px);
            width: 242px;
        }

        #rec754766389 .tn-elem[data-elem-id="1716906725115"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754766389 .tn-elem[data-elem-id="1716906725115"] {
                top: 388px;
                left: calc(50% - 160px + 35px);
                width: 119px;
            }
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="754766389" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="640" data-artboard-valign="center" data-artboard-upscale="window"
            >
                <div class="t396__carrier" data-artboard-recid="754766389"></div>
                <div class="t396__filter" data-artboard-recid="754766389"></div>
                <div class='t396__elem tn-elem tn-elem__7547663891716906424438' data-elem-id='1716906424438'
                     data-elem-type='text' data-field-top-value="32" data-field-left-value="80"
                     data-field-width-value="169" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="20"
                     data-field-left-res-320-value="35" data-field-width-res-320-value="97"
                >
                    <div class='tn-atom' field='tn_text_1716906424438'>Вы в Velvet</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547663891716906562452' data-elem-id='1716906562452'
                     data-elem-type='text' data-field-top-value="106" data-field-left-value="80"
                     data-field-width-value="429" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="72"
                     data-field-left-res-320-value="35" data-field-width-res-320-value="196"
                >
                    <div class='tn-atom' field='tn_text_1716906562452'>Делитесь своими образами, отмечайте нас в
                        соцсетях, чтобы попасть в подборку
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547663891716906705182' data-elem-id='1716906705182'
                     data-elem-type='image' data-field-top-value="180" data-field-left-value="80"
                     data-field-width-value="242" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="740"
                     data-field-fileheight-value="1110" data-field-top-res-320-value="178"
                     data-field-left-res-320-value="35" data-field-width-res-320-value="119"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3366-6134-4238-b636-313633306363__image_40.png' alt=''
                             imgfield='tn_img_1716906705182'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547663891716906713419' data-elem-id='1716906713419'
                     data-elem-type='image' data-field-top-value="180" data-field-left-value="346"
                     data-field-width-value="242" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="740"
                     data-field-fileheight-value="1110" data-field-top-res-320-value="178"
                     data-field-left-res-320-value="166" data-field-width-res-320-value="119"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3534-3230-4535-a331-323666333065__image_39.png' alt=''
                             imgfield='tn_img_1716906713419'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547663891716906719118' data-elem-id='1716906719118'
                     data-elem-type='image' data-field-top-value="180" data-field-left-value="878"
                     data-field-width-value="242" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="740"
                     data-field-fileheight-value="1109" data-field-top-res-320-value="388"
                     data-field-left-res-320-value="166" data-field-width-res-320-value="119"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6236-3434-4435-b532-386137663835__image_38.png' alt=''
                             imgfield='tn_img_1716906719118'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547663891716906725115' data-elem-id='1716906725115'
                     data-elem-type='image' data-field-top-value="180" data-field-left-value="612"
                     data-field-width-value="242" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="740"
                     data-field-fileheight-value="1110" data-field-top-res-320-value="388"
                     data-field-left-res-320-value="35" data-field-width-res-320-value="119"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3961-3365-4535-b966-303634373334__image_37.png' alt=''
                             imgfield='tn_img_1716906725115'/>
                    </div>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754766389');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754766389');
            });
        });</script><!-- /T396 --></div>
    <div id="rec754801843" class="r t-rec" style=" " data-record-type="215">
        <a name="contact" style="font-size:0;"></a>
    </div>
    <div id="rec754775342" class="r t-rec t-rec_pb_15" style="padding-bottom:15px; " data-animationappear="off"
         data-record-type="396"><!-- T396 -->
        <style>#rec754775342 .t396__artboard {
            min-height: 300px;
            height: 0vh;
            background-color: #ffffff;
        }

        #rec754775342 .t396__filter {
            min-height: 300px;
            height: 0vh;
        }

        #rec754775342 .t396__carrier {
            min-height: 300px;
            height: 0vh;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 1199px) {
            #rec754775342 .t396__artboard, #rec754775342 .t396__filter, #rec754775342 .t396__carrier {
            }

            #rec754775342 .t396__filter {
            }

            #rec754775342 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 959px) {
            #rec754775342 .t396__artboard, #rec754775342 .t396__filter, #rec754775342 .t396__carrier {
            }

            #rec754775342 .t396__filter {
            }

            #rec754775342 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 639px) {
            #rec754775342 .t396__artboard, #rec754775342 .t396__filter, #rec754775342 .t396__carrier {
            }

            #rec754775342 .t396__filter {
            }

            #rec754775342 .t396__carrier {
                background-attachment: scroll;
            }
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .t396__artboard, #rec754775342 .t396__filter, #rec754775342 .t396__carrier {
                height: 865px;
            }

            #rec754775342 .t396__filter {
            }

            #rec754775342 .t396__carrier {
                background-attachment: scroll;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907193556"] {
            color: #000000;
            z-index: 2;
            top: 20px;
            left: calc(50% - 600px + 20px);
            width: 560px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907193556"] .tn-atom {
            color: #000000;
            font-size: 20px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
        }

        #rec754775342 .tn-elem[data-elem-id="1716907222561"] {
            color: #d2bbab;
            z-index: 3;
            top: 32px;
            left: calc(50% - 600px + 86px);
            width: 63px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907222561"] .tn-atom {
            color: #d2bbab;
            font-size: 36px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 600;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907222561"] {
                top: 14px;
                left: calc(50% - 160px + 85px);
            }

            #rec754775342 .tn-elem[data-elem-id="1716907222561"] .tn-atom {
                font-size: 36px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907244317"] {
            color: #000000;
            text-align: center;
            z-index: 4;
            top: 83px;
            left: calc(50% - 600px + 97px);
            width: 127px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907244317"] .tn-atom {
            color: #000000;
            font-size: 10px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907244317"] {
                top: 61px;
                left: calc(50% - 160px + 76px);
                width: 168px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907244317"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907309211"] {
            color: #000000;
            z-index: 5;
            top: 46px;
            left: calc(50% - 600px + 319px);
            width: 104px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907309211"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907309211"] {
                top: 130px;
                left: calc(50% - 160px + 113px);
                width: 93px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907309211"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907346017"] {
            color: #000000;
            z-index: 6;
            top: 46px;
            left: calc(50% - 600px + 507px);
            width: 98px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907346017"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907346017"] {
                top: 207px;
                left: calc(50% - 160px + 120px);
                width: 80px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907346017"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907354110"] {
            color: #000000;
            z-index: 7;
            top: 46px;
            left: calc(50% - 600px + 691px);
            width: 142px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907354110"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907354110"] {
                top: 342px;
                left: calc(50% - 160px + 97px);
                width: 125px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907354110"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907356321"] {
            color: #000000;
            z-index: 8;
            top: 46px;
            left: calc(50% - 600px + 918px);
            width: 115px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907356321"] .tn-atom {
            color: #000000;
            font-size: 16px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 500;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907356321"] {
                top: 585px;
                left: calc(50% - 160px + 111px);
                width: 99px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907356321"] .tn-atom {
                font-size: 14px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907431011"] {
            color: #000000;
            z-index: 9;
            top: 87px;
            left: calc(50% - 600px + 319px);
            width: 50px;
        }

        @media (min-width: 1200px) {
            #rec754775342 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716907431011"] {
                opacity: 0;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907431011"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907431011"] {
                top: 162px;
                left: calc(50% - 160px + 136px);
                width: 47px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907431011"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907482900"] {
            color: #000000;
            z-index: 10;
            top: 87px;
            left: calc(50% - 600px + 507px);
            width: 63px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907482900"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907482900"] {
                top: 239px;
                left: calc(50% - 160px + 133px);
                width: 54px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907482900"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907503730"] {
            color: #000000;
            z-index: 11;
            top: 121px;
            left: calc(50% - 600px + 507px);
            width: 54px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907503730"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907503730"] {
                top: 269px;
                left: calc(50% - 160px + 134px);
                width: 43px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907503730"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907558660"] {
            color: #000000;
            z-index: 12;
            top: 155px;
            left: calc(50% - 600px + 507px);
            width: 54px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907558660"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907558660"] {
                top: 299px;
                left: calc(50% - 160px + 132px);
            }

            #rec754775342 .tn-elem[data-elem-id="1716907558660"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907811038"] {
            z-index: 13;
            top: 193px;
            left: calc(50% - 600px + 691px);
            width: 14px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907811038"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907811038"] {
                top: 547px;
                left: calc(50% - 160px + 153px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907813053"] {
            z-index: 14;
            top: 125px;
            left: calc(50% - 600px + 691px);
            width: 14px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907813053"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907813053"] {
                top: 452px;
                left: calc(50% - 160px + 153px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907814663"] {
            z-index: 15;
            top: 128px;
            left: calc(50% - 600px + 918px);
            width: 14px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907814663"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907814663"] {
                top: 693px;
                left: calc(50% - 160px + 154px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907816098"] {
            z-index: 16;
            top: 160px;
            left: calc(50% - 600px + 691px);
            width: 14px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907816098"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907816098"] {
                top: 501px;
                left: calc(50% - 160px + 153px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907817560"] {
            z-index: 17;
            top: 91px;
            left: calc(50% - 600px + 918px);
            width: 14px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907817560"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907817560"] {
                top: 644px;
                left: calc(50% - 160px + 154px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907820538"] {
            z-index: 18;
            top: 91px;
            left: calc(50% - 600px + 691px);
            width: 14px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907820538"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907820538"] {
                top: 403px;
                left: calc(50% - 160px + 153px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907959608"] {
            color: #000000;
            z-index: 19;
            top: 87px;
            left: calc(50% - 600px + 715px);
            width: 63px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907959608"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907959608"] {
                top: 376px;
                left: calc(50% - 160px + 130px);
                width: 59px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907959608"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716907977288"] {
            color: #000000;
            z-index: 20;
            top: 121px;
            left: calc(50% - 600px + 714px);
            width: 63px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716907977288"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716907977288"] {
                top: 425px;
                left: calc(50% - 160px + 133px);
                width: 54px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716907977288"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908003440"] {
            color: #000000;
            z-index: 21;
            top: 155px;
            left: calc(50% - 600px + 715px);
            width: 63px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908003440"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908003440"] {
                top: 474px;
                left: calc(50% - 160px + 106px);
            }

            #rec754775342 .tn-elem[data-elem-id="1716908003440"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908033107"] {
            color: #000000;
            z-index: 22;
            top: 189px;
            left: calc(50% - 600px + 715px);
            width: 123px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908033107"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908033107"] {
                top: 520px;
                left: calc(50% - 160px + 107px);
                width: 105px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716908033107"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908126396"] {
            z-index: 23;
            top: 159px;
            left: calc(50% - 600px + 918px);
            width: 14px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908126396"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908126396"] {
                top: 736px;
                left: calc(50% - 160px + 151px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908166480"] {
            color: #000000;
            z-index: 24;
            top: 155px;
            left: calc(50% - 600px + 942px);
            width: 103px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908166480"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908166480"] {
                top: 709px;
                left: calc(50% - 160px + 117px);
                width: 87px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716908166480"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908188252"] {
            color: #000000;
            z-index: 25;
            top: 121px;
            left: calc(50% - 600px + 942px);
            width: 71px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908188252"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908188252"] {
                top: 666px;
                left: calc(50% - 160px + 130px);
                width: 61px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716908188252"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908202710"] {
            color: #000000;
            z-index: 26;
            top: 87px;
            left: calc(50% - 600px + 942px);
            width: 67px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908202710"] .tn-atom {
            color: #000000;
            font-size: 14px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908202710"] {
                top: 617px;
                left: calc(50% - 160px + 133px);
                width: 56px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716908202710"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908366908"] {
            z-index: 27;
            top: 249px;
            left: calc(50% - 600px + 85px);
            width: 963px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908366908"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908366908"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908366908"] {
                top: 776px;
                left: calc(50% - 160px + -304px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908636820"] {
            z-index: 28;
            top: 274px;
            left: calc(50% - 600px + 88px);
            width: 12px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908636820"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908636820"] {
                top: 843px;
                left: calc(50% - 160px + 99px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908656696"] {
            color: #333333;
            text-align: center;
            z-index: 29;
            top: 270px;
            left: calc(50% - 600px + 102px);
            width: 107px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908656696"] .tn-atom {
            color: #333333;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908656696"] {
                top: 839px;
                left: calc(50% - 160px + 114px);
                width: 107px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716908656696"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716908834904"] {
            color: #333333;
            text-align: center;
            z-index: 30;
            top: 270px;
            left: calc(50% - 600px + 513px);
            width: 175px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716908834904"] .tn-atom {
            color: #333333;
            font-size: 12px;
            font-family: 'ManropeZelAntiqueSEMI', Arial, sans-serif;
            line-height: 1.55;
            font-weight: 400;
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716908834904"] {
                top: 785px;
                left: calc(50% - 160px + 71px);
                width: 177px;
            }

            #rec754775342 .tn-elem[data-elem-id="1716908834904"] .tn-atom {
                font-size: 12px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716909133832"] {
            z-index: 31;
            top: 272px;
            left: calc(50% - 600px + 885px);
            width: 58px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909133832"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716909133832"] {
                top: 816px;
                left: calc(50% - 160px + 71px);
                width: 53px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716909158687"] {
            z-index: 32;
            top: 270px;
            left: calc(50% - 600px + 967px);
            width: 22px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909158687"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716909158687"] {
                top: 815px;
                left: calc(50% - 160px + 150px);
                width: 20px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716909160282"] {
            z-index: 33;
            top: 274px;
            left: calc(50% - 600px + 1013px);
            width: 31px;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909160282"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716909160282"] {
                top: 820px;
                left: calc(50% - 160px + 220px);
                width: 28px;
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716909597078"] {
            z-index: 34;
            top: 109px;
            left: calc(50% - 600px + 317px);
            width: 56px;
        }

        #rec754775342 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716909597078"] {
            opacity: 0;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909597078"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909597078"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716909597078"] {
                top: 182px;
                left: calc(50% - 160px + 132px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716909741222"] {
            z-index: 35;
            top: 109px;
            left: calc(50% - 600px + 506px);
            width: 65px;
        }

        #rec754775342 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716909741222"] {
            opacity: 0;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909741222"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909741222"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716909741222"] {
                top: 259px;
                left: calc(50% - 160px + 127px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716909786667"] {
            z-index: 36;
            top: 143px;
            left: calc(50% - 600px + 506px);
            width: 52px;
        }

        #rec754775342 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716909786667"] {
            opacity: 0;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909786667"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909786667"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716909786667"] {
                top: 288px;
                left: calc(50% - 160px + 130px);
            }
        }

        #rec754775342 .tn-elem[data-elem-id="1716909849312"] {
            z-index: 37;
            top: 177px;
            left: calc(50% - 600px + 506px);
            width: 66px;
        }

        #rec754775342 .tn-elem.t396__elem--anim-hidden[data-elem-id="1716909849312"] {
            opacity: 0;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909849312"] .tn-atom {
            background-position: center center;
            border-color: transparent;
            border-style: solid;
        }

        #rec754775342 .tn-elem[data-elem-id="1716909849312"] .tn-atom__vector svg {
            display: block;
        }

        @media screen and (max-width: 1199px) {
        }

        @media screen and (max-width: 959px) {
        }

        @media screen and (max-width: 639px) {
        }

        @media screen and (max-width: 479px) {
            #rec754775342 .tn-elem[data-elem-id="1716909849312"] {
                top: 318px;
                left: calc(50% - 160px + 126px);
            }
        }</style>
        <div class='t396'>
            <div class="t396__artboard" data-artboard-recid="754775342" data-artboard-screens="320,480,640,960,1200"
                 data-artboard-height="300" data-artboard-valign="center" data-artboard-upscale="window"
                 data-artboard-height-res-320="865"
            >
                <div class="t396__carrier" data-artboard-recid="754775342"></div>
                <div class="t396__filter" data-artboard-recid="754775342"></div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907193556' data-elem-id='1716907193556'
                     data-elem-type='text' data-field-top-value="20" data-field-left-value="20"
                     data-field-width-value="560" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px"
                >
                    <div class='tn-atom' field='tn_text_1716907193556'></div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907222561' data-elem-id='1716907222561'
                     data-elem-type='text' data-field-top-value="32" data-field-left-value="86"
                     data-field-width-value="63" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="14"
                     data-field-left-res-320-value="85"
                >
                    <div class='tn-atom'>
                        <a href="#glavnaya" target="_blank" style="color: inherit">VELVET</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907244317' data-elem-id='1716907244317'
                     data-elem-type='text' data-field-top-value="83" data-field-left-value="97"
                     data-field-width-value="127" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="61"
                     data-field-left-res-320-value="76" data-field-width-res-320-value="168"
                >
                    <div class='tn-atom' field='tn_text_1716907244317'>онлайн магазин стильной женской одежды</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907309211' data-elem-id='1716907309211'
                     data-elem-type='text' data-field-top-value="46" data-field-left-value="319"
                     data-field-width-value="104" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="130"
                     data-field-left-res-320-value="113" data-field-width-res-320-value="93"
                >
                    <div class='tn-atom' field='tn_text_1716907309211'>Покупателям</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907346017' data-elem-id='1716907346017'
                     data-elem-type='text' data-field-top-value="46" data-field-left-value="507"
                     data-field-width-value="98" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="207"
                     data-field-left-res-320-value="120" data-field-width-res-320-value="80"
                >
                    <div class='tn-atom' field='tn_text_1716907346017'>О компании</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907354110' data-elem-id='1716907354110'
                     data-elem-type='text' data-field-top-value="46" data-field-left-value="691"
                     data-field-width-value="142" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="342"
                     data-field-left-res-320-value="97" data-field-width-res-320-value="125"
                >
                    <div class='tn-atom' field='tn_text_1716907354110'>Задавайте вопрос</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907356321' data-elem-id='1716907356321'
                     data-elem-type='text' data-field-top-value="46" data-field-left-value="918"
                     data-field-width-value="115" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="585"
                     data-field-left-res-320-value="111" data-field-width-res-320-value="99"
                >
                    <div class='tn-atom' field='tn_text_1716907356321'>Мы в соцсетях</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907431011 ' data-elem-id='1716907431011'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="319"
                     data-field-width-value="50" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-animate-sbs-event="hover"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0}]"
                     data-field-top-res-320-value="162" data-field-left-res-320-value="136"
                     data-field-width-res-320-value="47"
                >
                    <div class='tn-atom'>
                        <a href="#catalog" style="color: inherit">Каталог</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907482900' data-elem-id='1716907482900'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="507"
                     data-field-width-value="63" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="239"
                     data-field-left-res-320-value="133" data-field-width-res-320-value="54"
                >
                    <div class='tn-atom'>
                        <a href="#onas" style="color: inherit">О бренде</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907503730' data-elem-id='1716907503730'
                     data-elem-type='text' data-field-top-value="121" data-field-left-value="507"
                     data-field-width-value="54" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="269"
                     data-field-left-res-320-value="134" data-field-width-res-320-value="43"
                >
                    <div class='tn-atom'>
                        <a href="#foto" style="color: inherit">Отчёты</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907558660' data-elem-id='1716907558660'
                     data-elem-type='text' data-field-top-value="155" data-field-left-value="507"
                     data-field-width-value="54" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="299"
                     data-field-left-res-320-value="132"
                >
                    <div class='tn-atom'>
                        <a href="#contact" style="color: inherit">Контакты</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907811038' data-elem-id='1716907811038'
                     data-elem-type='image' data-field-top-value="193" data-field-left-value="691"
                     data-field-width-value="14" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="24"
                     data-field-fileheight-value="24" data-field-top-res-320-value="547"
                     data-field-left-res-320-value="153"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img'
                             src='images/tild3334-3963-4534-b234-623562376139__material-symbols_cal.svg' alt=''
                             imgfield='tn_img_1716907811038'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907813053' data-elem-id='1716907813053'
                     data-elem-type='image' data-field-top-value="125" data-field-left-value="691"
                     data-field-width-value="14" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="17"
                     data-field-fileheight-value="17" data-field-top-res-320-value="452"
                     data-field-left-res-320-value="153"
                >
                    <a class='tn-atom' href="https://web.telegram.org/a/">
                        <img class='tn-atom__img' src='images/tild6166-3232-4135-a666-636437356530__vector_10.svg'
                             alt='' imgfield='tn_img_1716907813053'/>
                    </a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907814663' data-elem-id='1716907814663'
                     data-elem-type='image' data-field-top-value="128" data-field-left-value="918"
                     data-field-width-value="14" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="22"
                     data-field-fileheight-value="13" data-field-top-res-320-value="693"
                     data-field-left-res-320-value="154"
                >
                    <a class='tn-atom' href="https://vk.com/feed">
                        <img class='tn-atom__img' src='images/tild3765-3336-4632-b835-383830323065__vector_9.svg' alt=''
                             imgfield='tn_img_1716907814663'/>
                    </a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907816098' data-elem-id='1716907816098'
                     data-elem-type='image' data-field-top-value="160" data-field-left-value="691"
                     data-field-width-value="14" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="20"
                     data-field-fileheight-value="16" data-field-top-res-320-value="501"
                     data-field-left-res-320-value="153"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6463-6663-4231-b432-313637333164__vector_8.svg' alt=''
                             imgfield='tn_img_1716907816098'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907817560' data-elem-id='1716907817560'
                     data-elem-type='image' data-field-top-value="91" data-field-left-value="918"
                     data-field-width-value="14" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="20"
                     data-field-fileheight-value="20" data-field-top-res-320-value="644"
                     data-field-left-res-320-value="154"
                >
                    <a class='tn-atom' href="https://www.instagram.com">
                        <img class='tn-atom__img' src='images/tild3837-3566-4535-b064-353037663164__vector_7.svg' alt=''
                             imgfield='tn_img_1716907817560'/>
                    </a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907820538' data-elem-id='1716907820538'
                     data-elem-type='image' data-field-top-value="91" data-field-left-value="691"
                     data-field-width-value="14" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="20"
                     data-field-fileheight-value="20" data-field-top-res-320-value="403"
                     data-field-left-res-320-value="153"
                >
                    <a class='tn-atom' href="https://www.whatsapp.com">
                        <img class='tn-atom__img' src='images/tild6131-6365-4234-b737-396664343338__vector_6.svg' alt=''
                             imgfield='tn_img_1716907820538'/>
                    </a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907959608' data-elem-id='1716907959608'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="715"
                     data-field-width-value="63" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="376"
                     data-field-left-res-320-value="130" data-field-width-res-320-value="59"
                >
                    <div class='tn-atom'>
                        <a href="https://www.whatsapp.com" style="color: inherit">WhatsApp</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716907977288' data-elem-id='1716907977288'
                     data-elem-type='text' data-field-top-value="121" data-field-left-value="714"
                     data-field-width-value="63" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="425"
                     data-field-left-res-320-value="133" data-field-width-res-320-value="54"
                >
                    <div class='tn-atom'>
                        <a href="https://web.telegram.org/a/" style="color: inherit">Telegram</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908003440' data-elem-id='1716908003440'
                     data-elem-type='text' data-field-top-value="155" data-field-left-value="715"
                     data-field-width-value="63" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="474"
                     data-field-left-res-320-value="106"
                >
                    <div class='tn-atom' field='tn_text_1716908003440'>
                        <a href="mailto:malito:velvetstyle@mail.ru"
                           style="color:rgb(0, 0, 0) !important;text-decoration: none;border-bottom: 0px solid;box-shadow: inset 0px -0px 0px 0px;-webkit-box-shadow: inset 0px -0px 0px 0px;-moz-box-shadow: inset 0px -0px 0px 0px;">
                            style.velvet@mail.ru
                        </a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908033107' data-elem-id='1716908033107'
                     data-elem-type='text' data-field-top-value="189" data-field-left-value="715"
                     data-field-width-value="123" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="520"
                     data-field-left-res-320-value="107" data-field-width-res-320-value="105"
                >
                    <div class='tn-atom' field='tn_text_1716908033107'>
                        <a href="tel:+7 (707) 772-25-24" target="_blank"
                           style="color:rgb(0, 0, 0) !important;text-decoration: none;border-bottom: 0px solid;box-shadow: inset 0px -0px 0px 0px;-webkit-box-shadow: inset 0px -0px 0px 0px;-moz-box-shadow: inset 0px -0px 0px 0px;">
                            +7 (707) 772-25-24
                        </a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908126396' data-elem-id='1716908126396'
                     data-elem-type='image' data-field-top-value="159" data-field-left-value="918"
                     data-field-width-value="14" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="17"
                     data-field-fileheight-value="17" data-field-top-res-320-value="736"
                     data-field-left-res-320-value="151"
                >
                    <a class='tn-atom' href="https://web.telegram.org/a/">
                        <img class='tn-atom__img' src='images/tild6166-3232-4135-a666-636437356530__vector_10.svg'
                             alt='' imgfield='tn_img_1716908126396'/>
                    </a>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908166480' data-elem-id='1716908166480'
                     data-elem-type='text' data-field-top-value="155" data-field-left-value="942"
                     data-field-width-value="103" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="709"
                     data-field-left-res-320-value="117" data-field-width-res-320-value="87"
                >
                    <div class='tn-atom'>
                        <a href="https://web.telegram.org/a/" style="color: inherit">Telegram канал</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908188252' data-elem-id='1716908188252'
                     data-elem-type='text' data-field-top-value="121" data-field-left-value="942"
                     data-field-width-value="71" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="666"
                     data-field-left-res-320-value="130" data-field-width-res-320-value="61"
                >
                    <div class='tn-atom'>
                        <a href="https://vk.com/feed" style="color: inherit">ВКонтакте</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908202710' data-elem-id='1716908202710'
                     data-elem-type='text' data-field-top-value="87" data-field-left-value="942"
                     data-field-width-value="67" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="617"
                     data-field-left-res-320-value="133" data-field-width-res-320-value="56"
                >
                    <div class='tn-atom'>
                        <a href="https://www.instagram.com" style="color: inherit">Instagram</a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908366908' data-elem-id='1716908366908'
                     data-elem-type='vector' data-field-top-value="249" data-field-left-value="85"
                     data-field-width-value="963" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="963"
                     data-field-fileheight-value="2" data-field-top-res-320-value="776"
                     data-field-left-res-320-value="-304"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg"
                             viewBox="5485.9833984375 5103.98388671875 963.03466796875 2">
                            <line fill="transparent" fill-opacity="1" stroke="#000000" stroke-opacity="1"
                                  stroke-width="1" fill-rule="evenodd" id="tSvg22b4103294" x1="5486.983434945681"
                                  y1="5104.983677078984" x2="6448.018006608147" y2="5104.983677078984"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908636820' data-elem-id='1716908636820'
                     data-elem-type='image' data-field-top-value="274" data-field-left-value="88"
                     data-field-width-value="12" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="10"
                     data-field-fileheight-value="10" data-field-top-res-320-value="843"
                     data-field-left-res-320-value="99"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3639-6665-4666-a437-303134633935__photo.svg' alt=''
                             imgfield='tn_img_1716908636820'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908656696' data-elem-id='1716908656696'
                     data-elem-type='text' data-field-top-value="270" data-field-left-value="102"
                     data-field-width-value="107" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="839"
                     data-field-left-res-320-value="114" data-field-width-res-320-value="107"
                >
                    <div class='tn-atom' field='tn_text_1716908656696'>2023-2024 VELVET</div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716908834904' data-elem-id='1716908834904'
                     data-elem-type='text' data-field-top-value="270" data-field-left-value="513"
                     data-field-width-value="175" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-top-res-320-value="785"
                     data-field-left-res-320-value="71" data-field-width-res-320-value="177"
                >
                    <div class='tn-atom'>
                        <a href="https://nzeo-group.com/__privacy_policy?yclid=8990282817686470655"
                           style="color: inherit">Политика конфиденцальности
                        </a>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716909133832' data-elem-id='1716909133832'
                     data-elem-type='image' data-field-top-value="272" data-field-left-value="885"
                     data-field-width-value="58" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="141"
                     data-field-fileheight-value="33" data-field-top-res-320-value="816"
                     data-field-left-res-320-value="71" data-field-width-res-320-value="53"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img'
                             src='images/tild3338-3331-4631-a137-393666346165__kaspi-kz-seeklogo.svg' alt=''
                             imgfield='tn_img_1716909133832'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716909158687' data-elem-id='1716909158687'
                     data-elem-type='image' data-field-top-value="270" data-field-left-value="967"
                     data-field-width-value="22" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="199" data-field-top-res-320-value="815"
                     data-field-left-res-320-value="150" data-field-width-res-320-value="20"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild3634-6236-4461-a133-363437633862__group_141.svg'
                             alt='' imgfield='tn_img_1716909158687'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716909160282' data-elem-id='1716909160282'
                     data-elem-type='image' data-field-top-value="274" data-field-left-value="1013"
                     data-field-width-value="31" data-field-axisy-value="top" data-field-axisx-value="left"
                     data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px"
                     data-field-heightunits-value="" data-field-widthunits-value="px" data-field-filewidth-value="256"
                     data-field-fileheight-value="83" data-field-top-res-320-value="820"
                     data-field-left-res-320-value="220" data-field-width-res-320-value="28"
                >
                    <div class='tn-atom'>
                        <img class='tn-atom__img' src='images/tild6332-6665-4562-b339-333137393531__vector_11.svg'
                             alt='' imgfield='tn_img_1716909160282'/>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716909597078 t396__elem--anim-hidden'
                     data-elem-id='1716909597078' data-elem-type='vector' data-field-top-value="109"
                     data-field-left-value="317" data-field-width-value="56" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716907431011"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="56" data-field-fileheight-value="4" data-field-top-res-320-value="182"
                     data-field-left-res-320-value="132"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5717 5009 56 4">
                            <line fill="transparent" fill-opacity="1" stroke="#000000" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg181a823405e" x1="5719" y1="5011"
                                  x2="5771" y2="5011" stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716909741222 t396__elem--anim-hidden'
                     data-elem-id='1716909741222' data-elem-type='vector' data-field-top-value="109"
                     data-field-left-value="506" data-field-width-value="65" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716907482900"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="65" data-field-fileheight-value="4" data-field-top-res-320-value="259"
                     data-field-left-res-320-value="127"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5906 5009 65.00830078125 4">
                            <line fill="transparent" fill-opacity="1" stroke="#000000" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg4467ff68ba" x1="5907.999812199519"
                                  y1="5010.999774639423" x2="5969.008199839793" y2="5010.999774639423"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716909786667 t396__elem--anim-hidden'
                     data-elem-id='1716909786667' data-elem-type='vector' data-field-top-value="143"
                     data-field-left-value="506" data-field-width-value="52" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716907503730"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="52" data-field-fileheight-value="4" data-field-top-res-320-value="288"
                     data-field-left-res-320-value="130"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5906 5043 52.0107421875 4">
                            <line fill="transparent" fill-opacity="1" stroke="#000000" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg3677cc3913" x1="5907.999999999999"
                                  y1="5044.999774639423" x2="5956.010908406427" y2="5044.999774639423"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
                <div class='t396__elem tn-elem tn-elem__7547753421716909849312 t396__elem--anim-hidden'
                     data-elem-id='1716909849312' data-elem-type='vector' data-field-top-value="177"
                     data-field-left-value="506" data-field-width-value="66" data-field-axisy-value="top"
                     data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px"
                     data-field-leftunits-value="px" data-field-heightunits-value="" data-field-widthunits-value="px"
                     data-animate-mobile="y" data-animate-sbs-event="hover" data-animate-sbs-trgels="1716907558660"
                     data-animate-sbs-opts="[{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':0,'ro':0,'ti':0,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.25,'sy':0.25,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.5,'sy':0.5,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':0.75,'sy':0.75,'op':1,'ro':0,'ti':100,'ea':'0','dt':0},{'mx':0,'my':0,'sx':1,'sy':1,'op':1,'ro':0,'ti':100,'ea':'0','dt':0}]"
                     data-field-filewidth-value="66" data-field-fileheight-value="4" data-field-top-res-320-value="318"
                     data-field-left-res-320-value="126"
                >
                    <div class='tn-atom tn-atom__vector'><?xml version="1.0" encoding="UTF-8"?>
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <!--?xml version="1.0" encoding="UTF-8"?--> <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="5906 5077 66 4">
                            <line fill="transparent" fill-opacity="1" stroke="#000000" stroke-opacity="1"
                                  stroke-width="2" fill-rule="evenodd" id="tSvg1f9d257fd3" x1="5907.999849759614"
                                  y1="5079.0001878004805" x2="5970.0000000007285" y2="5079.0001878004805"
                                  stroke-linecap="butt"></line>
                            <defs></defs>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <script>t_onFuncLoad('t396_initialScale', function () {
            t396_initialScale('754775342');
        });
        t_onReady(function () {
            t_onFuncLoad('t396_init', function () {
                t396_init('754775342');
            });
        });</script><!-- /T396 --></div>
    <div id="rec755760405" class="r t-rec" style=" " data-animationappear="off" data-record-type="131"><!-- T123 -->
        <div class="t123">
            <div class="t-container_100 ">
                <div class="t-width t-width_100 ">

                    <script type="text/javascript">
                        $(document).ready(function () {
                            setTimeout(function () {
                                $('#allrecords').next().remove()
                            }, 500);
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
    <div id="rec753732534" class="r t-rec" style=" " data-record-type="270">
        <div class="t270"></div>
        <script>t_onReady(function () {
            var hash = window.location.hash;
            t_onFuncLoad('t270_scroll', function () {
                t270_scroll(hash, -3);
            });
            setTimeout(function () {
                var curPath = window.location.pathname;
                var curFullPath = window.location.origin + curPath;
                var recs = document.querySelectorAll('.r');
                Array.prototype.forEach.call(recs, function (rec) {
                    var selects =
                        'a[href^="#"]\
:not([href="#"])\
:not(.carousel-control)\
:not(.t-carousel__control)\
:not([href^="#price"])\
:not([href^="#submenu"])\
:not([href^="#popup"])\
:not([href*="#zeropopup"])\
:not([href*="#closepopup"])\
:not([href*="#closeallpopup"])\
:not([href^="#prodpopup"])\
:not([href^="#order"])\
:not([href^="#!"])\
:not([target="_blank"]),' +
                        'a[href^="' + curPath + '#"]\
:not([href*="#!/tfeeds/"])\
:not([href*="#!/tproduct/"])\
:not([href*="#!/tab/"])\
:not([href*="#popup"])\
:not([href*="#zeropopup"])\
:not([href*="#closepopup"])\
:not([href*="#closeallpopup"])\
:not([target="_blank"]),' +
                        'a[href^="' + curFullPath + '#"]\
:not([href*="#!/tfeeds/"])\
:not([href*="#!/tproduct/"])\
:not([href*="#!/tab/"])\
:not([href*="#popup"])\
:not([href*="#zeropopup"])\
:not([href*="#closepopup"])\
:not([href*="#closeallpopup"])\
:not([target="_blank"])';
                    var elements = rec.querySelectorAll(selects);
                    Array.prototype.forEach.call(elements, function (element) {
                        element.addEventListener('click', function (event) {
                            event.preventDefault();
                            var hash = this.hash.trim();
                            t_onFuncLoad('t270_scroll', function () {
                                t270_scroll(hash, -3);
                            });
                        });
                    });
                });
                if (document.querySelectorAll('.js-store').length > 0 || document.querySelectorAll('.js-feed').length > 0) {
                    t_onFuncLoad('t270_scroll', function () {
                        t270_scroll(hash, -3, 1);
                    });
                }
            }, 500);
            setTimeout(function () {
                var hash = window.location.hash;
                if (hash && document.querySelectorAll('a[name="' + hash.slice(1) + '"]').length > 0) {
                    if (window.isMobile) {
                        t_onFuncLoad('t270_scroll', function () {
                            t270_scroll(hash, 0);
                        });
                    } else {
                        t_onFuncLoad('t270_scroll', function () {
                            t270_scroll(hash, 0);
                        });
                    }
                }
            }, 1000);
            window.addEventListener('popstate', function () {
                var hash = window.location.hash;
                if (hash && document.querySelectorAll('a[name="' + hash.slice(1) + '"]').length > 0) {
                    if (window.isMobile) {
                        t_onFuncLoad('t270_scroll', function () {
                            t270_scroll(hash, 0);
                        });
                    } else {
                        t_onFuncLoad('t270_scroll', function () {
                            t270_scroll(hash, 0);
                        });
                    }
                }
            });
        });</script>
    </div>
</div><!--/allrecords--><!-- Tilda copyright. Don't remove this line -->
<div class="t-tildalabel " id="tildacopy" data-tilda-sign="2393167#49329775">
    <a href="https://tilda.kz/" class="t-tildalabel__link">
        <div class="t-tildalabel__wrapper">
            <div class="t-tildalabel__txtleft">Made on</div>
            <div class="t-tildalabel__wrapimg">
                <img src="images/tildacopy.png" class="t-tildalabel__img" fetchpriority="low" alt="">
            </div>
            <div class="t-tildalabel__txtright">Tilda</div>
        </div>
    </a>
</div><!-- Stat -->
<script type="text/javascript">if (!window.mainTracker) {
    window.mainTracker = 'tilda';
}
setTimeout(function () {
    (function (d, w, k, o, g) {
        var n = d.getElementsByTagName(o)[0], s = d.createElement(o), f = function () {
            n.parentNode.insertBefore(s, n);
        };
        s.type = "text/javascript";
        s.async = true;
        s.key = k;
        s.id = "tildastatscript";
        s.src = g;
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, 'd48e8afb12fdaa90d1206d858b98b13a', 'script', 'js/tilda-stat-1.0.min.js');
}, 2000); </script>

<dialog id="dialog_cart">
    <div class="container">
        <div class="form">

            <div class="products">
                <?php foreach ($cart_info as $cart): ?>
                    <div class="product">
                        <p class="name"><?= $cart["name"] ?></p>
                        <p class="price"><?= $cart["count"] ?> * <?= $cart["price"] ?> = <?= $cart["total_price"] ?></p>
                    </div>
                <?php endforeach; ?>
                <div class="product">
                    <p class="name">Итого:</p>
                    <p class="price"><?= $cart_price ?></p>
                </div>
            </div>
            <form action="_scripts/order.php" method="post">
                <h2>Контактные данные</h2>
                <div class="row">
                    <label>
                        <input type="text" name="name" placeholder="Имя" required value="<?= $user_name ?? "" ?>">
                    </label>
                    <label>
                        <input type="tel" name="phone" placeholder="Телефон" required value="<?= $user_phone ?>">
                    </label>
                </div>
                <h2>Способ оплаты</h2>
                <div class="row payment">
                    <label>
                        <input type="radio" name="payment" checked>
                        <span>Kaspi</span>
                    </label>
                    <label>
                        <input type="radio" name="payment">
                        <span>Карта другого банка</span>
                    </label>
                    <label>
                        <input type="radio" name="payment">
                        <span>Наличные</span>
                    </label>
                </div>
                <div class="row">
                    <button>Оформить заказ</button>
                    <button class="cancel">Продолжить покупки</button>
                </div>
            </form>
        </div>
    </div>
</dialog>

<dialog id="dialog_user">
    <div class="container">
        <div class="form">
            <form action="_scripts/login.php" method="post">
                <h2>Авторизация</h2>
                <div class="row">
                    <label>
                        <input type="text" name="login" placeholder="Телефон" required>
                    </label>
                    <label>
                        <input type="password" name="password" placeholder="Пароль" required>
                    </label>
                </div>
                <div class="row">
                    <button>Войти</button>
                    <button class="cancel">Отмена</button>
                </div>
                <p><?= $_GET["login_error"] ?? "" ?></p>
            </form>
            <form action="_scripts/register.php" method="post">
                <h2>Регистрация</h2>
                <div class="row">
                    <label>
                        <input type="text" name="name" placeholder="Имя" required>
                    </label>
                    <label>
                        <input type="tel" name="login" placeholder="Телефон" required>
                    </label>
                    <label>
                        <input type="password" name="password" placeholder="Пароль" required>
                    </label>
                </div>
                <div class="row">
                    <button>Зарегистрироваться</button>
                    <button class="cancel">Отмена</button>
                </div>
                <p><?= $_GET["register_error"] ?? "" ?></p>
            </form>
        </div>
    </div>
</dialog>
<?php if (isset($_GET["login_error"]) || isset($_GET["register_error"])): ?>
<script>
    $("#dialog_user")[0].showModal();
</script>
<?php endif; ?>

<script src="js/css_update.js"></script>
<script src="js/main.js"></script>
</body>
</html>