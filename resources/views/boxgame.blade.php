<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/base16-dark.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/clike/clike.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            text-decoration: none;
            /* 底線去除 */
            list-style: none;
            /* 去除清單前面的符號 */
        }

        :root {
            --bg-color: #222327;
            --text-color: #333333;
            --main-color: #6875F5;
        }

        body {
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 6%;
        }
        
        .header {
            position: absolute;
            width: 100%;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 2% 0px;
            background: rgba(186,189,205, 0.8);
            /* 透明背景 */
            transition: all 0.50s ease;
        }

        .breadcrumbs {
            letter-spacing: 5px;
            /* 字元間距 */
            font-size: 24px;
            font-family: sans-serif;
        }

        /*@keyframes animate {
            from {
                transform: translateX(0); 起始位置
            }
            to {
                transform: translateX(50px); 結束位置
            }
        }*/

        .breadcrumbs__item {
            display: inline-block;
        }

        .breadcrumbs__item:not(:last-of-type)::after {
            content: '\203a';
            margin: 0 5px;
            color: #fff;
        }

        .breadcrumbs__link {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .breadcrumbs__link:hover {
            text-decoration: underline;
        }

        .breadcrumbs__link__active {
            text-decoration: none;
            color: #3E5D53;
            font-weight: bold;
        }

        .navbar {
            display: flex;
            align-items: center;
            /* 確保垂直方向對齊 */
            margin-left: auto;
            /* 讓 navbar 靠右對齊 */
        }

        .navbar .time {
            display: none;
            color: #fff;
            font-size: 20px;
            font-weight: bolder;
            letter-spacing: 5px;
            padding: 5px 15px;
            margin: 0px 30px;
            transition: all 0.50s ease;
        }

        .navbar a {
            color: #fff;
            font-size: 20px;
            font-weight: bolder;
            text-align: center;
            border: 2px solid #fff;
            border-radius: 5px;
            padding: 5px 15px;
            margin: 0px 30px;
            transition: all 0.50s ease;
        }

        .navbar a:hover {
            color: #999999;
            border: 2px solid #999999;
            background: #fff;
        }

        .main {
            display: flex;
            align-items: center;
        }

        .main a {
            margin-right: 25px;
            margin-left: 10px;
            color: var(--text-color);
            font-size: 20px;
            font-weight: 500;
            transition: all 0.50s ease;
        }

        .user {
            display: flex;
            align-items: center;
        }

        .main a:hover {
            color: var(--main-color);
        }

        #menu-icon {
            font-size: 35px;
            color: #fff;
            cursor: pointer;
            z-index: 10001;
            display: none;
        }
        .question {
            width: 100%;
            height: 100px;
            background-color: #FFFDD3;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
        }
        .question p {
            font-size: 20px;
            font-weight:bold;
        }
        #treasure-box {
            width: 100%;
            height: 400px;
            background: url('/images/boxes/closebox.svg') no-repeat center;
            transition: background 0.5s;
        }
        .img{
            width: 60px;
            height: 60px;
            position: relative;
            top: 50%;  
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #treasure-box.open {
            background: url('/images/boxes/openbox.svg') no-repeat center;
            background-size: contain;
        }
        .textarea-container {
            width: 100%;
            height: 100%;
            margin-top: -15px;
            display: flex;
            align-items: center;
        }
        textarea {
            width: 100%;
            height: 100%;
            font-size: 16px;
        }
        .CodeMirror{
            width: 100%;
            height: 550px;
            border: 2px solid #ccc;
            border-radius: 10px;
        }
        .CodeMirror-scroll {
            overflow: auto;
        }
        .btn-container{
            display:flex;
            justify-content:center;
            align-items: center;
        }
        .btn-container button{
            font-size:18px;
            margin: 5px;
            border-radius:5px;
        }

    </style>
</head>
<body>

    <div class="header">
        <div class="row">
            <ul class="col-ms-8 breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">綠野仙蹤</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">遊戲種類</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link__active">解鎖寶箱</a>
                </li>
            </ul>

            <ul class="col-ms-6 navbar">
                <li><a href="#" onclick="togglePopup2()"> 知識卡</a></li>
                <li><a href="#" onclick="history.back()"> 回上一頁</a></li>
                <li class="time" id="timer">00:00:00</li>
            </ul>

            <div class="main">
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        </div>
        
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-container">
                <div class="question">
                    <p>要打開寶箱，必須產製一個特殊鑰匙<br>鑰匙的形狀可以設為變數，用亂數產生1</p>
                </div>
                <div id="treasure-box">
                    <img class="img" id="randomImg" src="/images/boxes/triangle.png" alt="">
                </div>
                <button onclick="openBox()">打開寶箱</button>
            </div>
            <div class="col-md-6 right-container">
                <div class="textarea-container">
                    <textarea id="code-editor">
public class StarPatterns {
    public static void main(String[] args) {
        int n = 3;
        
        // 判斷式撰寫區域
    }
}
                    </textarea>
                </div>
                <div class="btn-container">
                    <button id="send-code" class="btn-submit">提交</button>
                    <button><a href="{{ route('home') }}">回第一頁</a></button>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = [
                '/images/boxes/triangle.png',
                '/images/boxes/left-triangle.png',
                '/images/boxes/right-triangle.png',
                '/images/boxes/shape.png'
            ];

            function getRandomImg() {
                // 返回0~4之間，不包含4的隨機數，Math.floor()向下取整數，image.length = 4
                const randomIndex = Math.floor(Math.random() * images.length);
                return images[randomIndex];
            }

            function changeImg() {
                const imgElement = document.getElementById('randomImg');
                imgElement.src = getRandomImg();
            }

            // 變換三角形
            changeImg();
        });

        function openBox() {
            const box = document.getElementById("treasure-box");
            box.classList.add("open");

            const imgElement = document.getElementById("randomImg");
            imgElement.style.display = 'none'; 
        }

        var editor = CodeMirror.fromTextArea(document.getElementById("code-editor"), {
            lineNumbers: true,
            mode: "text/x-java",
            theme: "base16-dark"
        });



        var submitBtn = document.getElementById('send-code');

        submitBtn.addEventListener('click', () => {
            var userCode = editor.getValue().split('// 判斷式撰寫區域');
            console.log(userCode);
            sendCode = userCode[1].replace('\n    }\n}', '').trim();
            if (sendCode != '') {
                alert('您輸入的code為：\n' + sendCode);
                // 將程式碼送入演算法，或是後端的判斷，如果success，顯現相應的效果，並執行通關
            } else {
                alert('打打字阿傻逼');
            }
        });
    </script>
</body>
</html>
